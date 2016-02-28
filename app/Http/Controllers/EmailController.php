<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Repositories\CuentaRepository;
use App\Libraries\Repositories\UsuarioRepository;
use File, Exception, Flash,  Auth;
use Illuminate\Database\Eloquent\Collection;
use Ddeboer\Imap\Server;
use Ddeboer\Imap\Exception\AuthenticationFailedException;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Flag\Unseen;
use Ddeboer\Imap\Message;


class EmailController extends Controller
{
	protected $hostname;
	protected $username;
    protected $password;
    protected $carpeta;
    protected $mailbox;
    protected $Unread;
    private $cuentaRepository;
    private $usuarioRepository;
    protected $connection;

	function __construct(CuentaRepository $cuentaRepo,UsuarioRepository $usuarioRepo)
	{
		$this->middleware('auth');
		
		$this->cuentaRepository = $cuentaRepo;
		$this->usuarioRepository = $usuarioRepo;
		if(!$this->usuarioRepository->hasCuenta(Auth::user()->id))
		{
			throw new Exception("El usuario no tiene Cuentas Asignadas");
		}
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'zimbra');		

		$this->username=$cuenta->id_zimbra;
		$this->password=$cuenta->pass_zimbra;
		$this->hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}";
		
		$this->carpeta='attachments/'.$this->username;
		
		if(!File::exists('attachments')){
			File::makeDirectory('attachments');
		}
		if (!File::exists($this->carpeta)) {	//Crear carpeta de archivos adjuntos
		    File::makeDirectory($this->carpeta);
		}
		File::cleanDirectory($this->carpeta); //Se eliminan los archivos adjuntos del servidor intranet

		$hostname = "sanclemente.cl";
        $port="993";
        $flags="ssl/novalidate-cert";


        /*try{*/
		$Server=new Server($hostname,$port,$flags);
		$this->connection = $Server->authenticate($this->username,$this->password);    
		/*} catch (AuthenticationFailedException $e) {
			return 'fallo';
		}
*/
	}

	/**
	 * Display all Inbox Mails.
	 *
	 *
	 * @return Response
	 */
	public function inbox()
    {
    	$search = new SearchExpression();
    	$search->addCondition(new Unseen('UNSEEN'));
    	$inbox=$this->connection->getMailbox('INBOX');        
        $unseen=$inbox->getMessages($search);
        $MessageIterator=$inbox->getMessages();              
        $messages=$this->getCollectionmessages($MessageIterator);
		if(empty($MessageIterator->count())) {
		    Flash::warning('La bandeja de entrada esta vacia');
		    return redirect(url('home'));
		}
		return view('emails.index')
			->with('inboxunread',count($unseen))
			->with('mailsinfo',$messages);
		/*}*/
    }

    /**
	 * Display Unseen Mails
	 *
	 *
	 * @return Response
	 */
	public function unseen()
	{
		
        $search = new SearchExpression();
        $search->addCondition(new Unseen('UNSEEN'));
        $inbox=$this->connection->getMailbox('INBOX');
        $unseen=$inbox->getMessages($search);
        if(empty($unseen->count()))
        {
    	    Flash::warning('No hay Mensajes No Vistos');
		    $this->mailbox=null;
		    return redirect(url('emails/inbox'));
		}        
        $messages=$this->getCollectionmessages($unseen);
		return view('emails.index')
			->with('inboxunread',count($unseen))
			->with('mailsinfo',$messages);
	}
	

	/**
	 * Display Sent Mails.
	 *
	 *
	 * @return Response
	 */
    public function sent()
    {		
        $search = new SearchExpression();
        $search->addCondition(new Unseen('UNSEEN'));
    	$inbox=$this->connection->getMailbox('INBOX'); 
        $unseen=$inbox->getMessages($search);
        $sent=$this->connection->getMailbox('Sent');
        if(empty($sent->count()))
        {
    	    Flash::warning('No hay Mensajes Enviados');
		    return redirect(url('emails/inbox'));
		}        
        $messages=$this->getCollectionmessages($sent);
		return view('emails.sent')
			->with('inboxunread',count($unseen))
			->with('mailsinfo',$messages);
    }

	/**
	 * Show the entire Mail.
	 *
	 * @param $mailId
	 *
	 * @return Response
	 */
	public function show($mailId)
	{
		$mailboxes=['INBOX','Sent'];
		foreach ($mailboxes as $mbox) {
			$mailbox=$this->connection->getMailbox($mbox);
			$messages=$mailbox->getMessages();
			
			foreach ($messages as $message) {
				if($message->getNumber()==$mailId)
				{
					$value=$mailbox->getMessage($mailId);
					$message=$this->getObjectMessage($value);
					$search = new SearchExpression();
			        $search->addCondition(new Unseen('UNSEEN'));
			    	$inbox=$this->connection->getMailbox('INBOX'); 
			        $unseen=$inbox->getMessages($search);
					/*
					foreach ($Attachments as $attachment) {
						$attachment->route=$this->carpeta.'/'.basename($attachment->filePath);
					}
					$mail->textPlain=(strip_tags(nl2br($mail->textPlain), '<br>'));
					$mailbox=null; //Cerramos el mailbox*/
					return view('emails.show')
						->with('mail',$message)
						->with('inboxunread',count($unseen));
				}				
			}
		}

		Flash::warning('Mail no Encontrado');
		return redirect('emails/inbox');

		
	}

	/**
	 * Mark a Mail has Read.
	 *
	 * @param $mailId
	 *
	 * @return reload page
	 */

	public function markMailAsRead($mailId)
	{
		$mailbox=$this->SearchMailbox($mailId);
		$read=$mailbox->markMailAsRead($mailId);
		if($read)
			Flash::success('Correo Marcado como Leído');
		else
			Flash::error('El correo no se pudo marcar como Leído');
		
		return redirect()->back();
	}

	/**
	 * Mark a Mail as Unread.
	 *
	 * @param $mailId
	 *
	 * @return reload page
	 */
	public function markMailAsUnread($mailId)
	{
		$mailbox=$this->SearchMailbox($mailId);
		$unread=$mailbox->markMailAsUnread($mailId);

		if($unread)
			Flash::success('Correo Marcado como No Leído');
		else
			Flash::error('El correo no se pudo marcar como no Leído');
		
		return redirect()->back();
	}

	/**
	*
	* @param MessageIterator|Message[]
	*
	* @return Collection
	*/

	public function getCollectionmessages($MessageIterator)
	{
	    $messages = new Collection;       

        foreach ($MessageIterator as $value) {
            $message = new \stdClass;
            $message->number=$value->getNumber();
            $message->subject=$value->getSubject();
            $message->from=$value->getFrom();
            $message->size=$value->getSize();
            $message->to=$value->getTo();
            $message->date=$value->getDate()->format('Y-m-d H:i:s');
            $message->seen=$value->isSeen();
            $messages->prepend($message);
        }
        return $messages;
	}

	public function getObjectMessage($value)
	{
		$message = new \stdClass;
		$message->number=$value->getNumber();
        $message->subject=$value->getSubject();
        $message->from=$value->getFrom();
        $message->size=$value->getSize();
        $message->to=$value->getTo();
        $message->date=$value->getDate()->format('Y-m-d H:i:s');
        $message->seen=$value->isSeen();
        $message->textPlain=strip_tags(nl2br($value->getBodyText()), '<br>');
        $message->Attachments=$value->getAttachments();
       	dd($message->Attachments);
     	return $message;
	}
}
