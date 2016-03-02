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
use Ddeboer\Imap\Exception\MessageDoesNotExistException;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Flag\Unseen;
use Ddeboer\Imap\Message;


class EmailController extends Controller
{
	protected $hostname;
	protected $username;
    protected $password;
    protected $carpeta;
    protected $connection;
    protected $unseen;
    protected $cuenta;
    private $cuentaRepository;
    private $usuarioRepository;

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
		$this->cuenta=$this->cuentaRepository->obtenercuenta($id,'zimbra');		

		$hostname = "sanclemente.cl";
        $port="993";
        $flags="ssl/novalidate-cert";

		$username=$this->cuenta->id_zimbra;
		$password=$this->cuenta->pass_zimbra;
		
		$this->carpeta='attachments/'.$username;		
		if(!File::exists('attachments')){
			File::makeDirectory('attachments');
		}
		if (!File::exists($this->carpeta)) {	//Crear carpeta de archivos adjuntos
		    File::makeDirectory($this->carpeta);
		}
		if(File::lastModified($this->carpeta)<time() - (24*60*60)){//Si los archivos llevan mas de un dia
			File::cleanDirectory($this->carpeta); //Se eliminan los archivos adjuntos del servidor intranet			
		}
        
		$Server=new Server($hostname,$port,$flags);
		$search = new SearchExpression();
        $search->addCondition(new Unseen('UNSEEN'));
		
		$this->connection = $Server->authenticate($username,$password);
        $this->unseen=$this->connection->getMailbox('INBOX')->getMessages($search)->count();
	}

	/**
	 * Display all Inbox Mails.
	 *
	 *
	 * @return Response
	 */
	public function inbox()
    {
    	$inbox=$this->connection->getMailbox('INBOX');
        $messages=$this->getCollectionMessages($inbox->getMessages());
        if(empty($messages->count())) {
		    Flash::warning('La bandeja de entrada esta vacia');
		    return redirect(url('home'));
		}
		return view('emails.index')
			->with('inboxunread',$this->unseen)
			->with('cuenta',$this->cuenta)
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
        $messages=$this->getCollectionMessages($inbox->getMessages($search));;
        if(empty($messages->count()))
        {
    	    Flash::warning('No hay Mensajes No Vistos');
		    return redirect(url('emails/inbox'));
		}        
        
		return view('emails.index')
			->with('inboxunread',$this->unseen)
			->with('cuenta',$this->cuenta)
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

        $sent=$this->connection->getMailbox('Sent');
        $messages=$this->getCollectionMessages($sent);
        if(empty($messages->count()))
        {
    	    Flash::warning('No hay Mensajes Enviados');
		    return redirect(url('emails/inbox'));
		}        
        
		return view('emails.sent')
			->with('inboxunread',$this->unseen)
			->with('cuenta',$this->cuenta)
			->with('mailsinfo',$messages);
    }

	/**
	 * Show the entire Mail.
	 *
	 * @param $number
	 *
	 * @return Response
	 */
	public function show($number)
	{
		$message=$this->SearchMessageinMailboxes($number);
		if($message){
			$search = new SearchExpression();
			$search->addCondition(new Unseen('UNSEEN'));
			$inbox=$this->connection->getMailbox('INBOX'); 
			$unseen=$inbox->getMessages($search);

			return view('emails.show')
				->with('mail',$message)
				->with('cuenta',$this->cuenta)
				->with('inboxunread',count($unseen));
		}

		Flash::warning('Mail no Encontrado');
		return redirect('emails/inbox');		
	}

	/**
	*
	 * Search into mailboxes and get a message by message number
     *
     * @param int $number Message number
     *
     * @return Message
     *
	*/
	public function SearchMessageinMailboxes($number)
	{
		$mailboxes=['INBOX','Sent'];
		foreach ($mailboxes as $mbox) {
			$mailbox=$this->connection->getMailbox($mbox);
			foreach ($mailbox->getMessages() as $key => $message){
				if($message->getNumber()==$number)
					return $this->getObjectMessage($message);
			}
		}
		return False;
	}

	/**
	*
	* @param MessageIterator|Message[]
	*
	* @return Collection
	*/

	public function getCollectionMessages($MessageIterator)
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
            $messages->push($message);
        }

        return $messages->sortByDesc('number');
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
        foreach ($message->Attachments as $attachment) {
        	$attachment->Filename=$attachment->getFilename();
        	$attachment->path=$this->carpeta.'/'.$message->number.'_'.$attachment->Filename;
			File::put($attachment->path,$attachment->getDecodedContent());
		}	
     	return $message;
	}


	public function getunseen()
	{	
        return json_encode($this->unseen);
	}
}
