<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use App\Libraries\Repositories\CuentaRepository;
use App\Libraries\Repositories\UsuarioRepository;
use File, Flash, HTML, Auth;

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
    
	function __construct(CuentaRepository $cuentaRepo,UsuarioRepository $usuarioRepo)
	{
		$this->middleware('auth');
		$this->cuentaRepository = $cuentaRepo;
		$this->usuarioRepository = $usuarioRepo;
		$id=$this->usuarioRepository->find(Auth::user()->id)->Cuenta->id;
		$cuenta=$this->cuentaRepository->obtenercuenta($id,'zimbra');
		$this->hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}";
		$this->carpeta='attachments/'.$this->username;
		if (!File::exists($this->carpeta)) {	//Crear carpeta de archivos adjuntos
		    File::makeDirectory($this->carpeta);
		}
		File::cleanDirectory($this->carpeta); //Se eliminan los archivos

		$this->mailbox = new ImapMailbox($this->hostname.'INBOX', $cuenta->id_zimbra,$cuenta->pass_zimbra,$this->carpeta);
		$this->Unread=$this->mailbox->getMailboxInfo()->Unread;
	}

	/**
	 * Display all Inbox Mails.
	 *
	 *
	 * @return Response
	 */
	public function index()
    {
		$mailsIds = $this->mailbox->searchMailbox('ALL');
		if(!$mailsIds) {
		    Flash::warning('La bandeja de entrada esta vacia');
		    $this->mailbox=null;
		    return redirect(url('emails/index'));
		}
		else{
			$mailsinfo = $this->mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			$this->mailbox=null;		
			return view('emails.index')
	    			->with('inboxunread',$this->Unread)
	    			->with('mailsinfo',$mailsinfo);
		}
    }

    /**
	 * Display Unseen Mails
	 *
	 *
	 * @return Response
	 */
	public function unseen()
	{
		$mailsIds = $this->mailbox->searchMailbox('UNSEEN');
		if(!$mailsIds) {
		    Flash::warning('No hay Correos sin ver');
		    $this->mailbox=null;
		    return redirect(url('emails/index'));
		}
		else{
			$mailsinfo = $this->mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			$this->mailbox=null;
			return view('emails.index')
	    			->with('inboxunread',$this->Unread)
	    			->with('mailsinfo',$mailsinfo);
		}
	}

	/**
	 * Display Sent Mails.
	 *
	 *
	 * @return Response
	 */
    public function sent()
    {
    	$this->mailbox=null; //Cerrando Inbox
    	$mailbox = new ImapMailbox($this->hostname.'Sent', $this->username,$this->password,$this->carpeta);//Conectando al mailbox de los mensajes enviados
		$mailboxmsginfo = $mailbox->getMailboxInfo();		
		$mailsIds = $mailbox->searchMailbox('ALL');		
		if(!$mailsIds) {
		    Flash:warning('La bandeja de entrada esta vacia');
		    $this->mailbox=null;
		    return redirect()->url('emails/index');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			$mailbox=null;// Cerrando Mailbox Sent
			return view('emails.sent')
	    			->with('mailsinfo',$mailsinfo)
	    			->with('inboxunread',$this->Unread);
		}
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
		$mailbox=$this->SearchMailbox($mailId);
		if(!$mailbox){
			Flash::warning('Mail no Encontrado');
			return redirect('emails/index');
		}
		$mail=$mailbox->getMail($mailId);
		$Attachments=$mail->getAttachments();
		foreach ($Attachments as $attachment) {
			$attachment->route=$this->carpeta.'/'.basename($attachment->filePath);
		}
		$mail->textPlain=(strip_tags(nl2br($mail->textPlain), '<br>'));
		$mailbox=null; //Cerramos el mailbox
		return view('emails.show')
			->with('mail',$mail)
			->with('inboxunread',$this->Unread)
			->with('Attachments',$Attachments);
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
	 * Find a Mail into the Mailboxs.
	 *
	 * @param $mailId
	 *
	 * @return Mailbox
	 */
	public function SearchMailbox($mailId){
		$hostnames=['INBOX','Sent'];
		foreach ($hostnames as $hostname) {
			$mailbox = new ImapMailbox($this->hostname.$hostname, $this->username,$this->password,$this->carpeta);
			$mailsIds = $mailbox->searchMailbox('ALL');
			if(in_array($mailId,$mailsIds))
				return $mailbox;
			$mailbox=null;	//Cerrando el Mailbox ya visitado
		}
		return False;
	}

}
