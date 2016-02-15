<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use Flash;
use HTML;


class EmailController extends Controller
{
	protected $hostname;
	protected $username;
    protected $password;
    protected $carpeta;
    protected $mailbox;
    protected $mailboxmsginfo;
    protected $Unread;
	function __construct()
	{
		$this->middleware('auth');
		$this->hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}";
		$this->username="prueba";
		$this->password="Prueba2015";
		$this->carpeta='attachments/'.$this->username;
		if (!file_exists($this->carpeta)) {	//Crear carpeta de archivos adjuntos
		    mkdir($this->carpeta, 0777, true);
		}
		$files = glob($this->carpeta.'/*'); // Obtener todos los archivos
		foreach($files as $file){ // Iterar sobre los archivos
		  if(is_file($file))
		    unlink($file); 		// Eliminar archivo
		}

		$this->mailbox = new ImapMailbox($this->hostname.'INBOX', $this->username,$this->password,$this->carpeta);
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
    	
    	/*$mbox = imap_open($this->hostname, $this->username,$this->password, OP_HALFOPEN)
      	or die("can't connect: " . imap_last_error());
		$list = imap_getmailboxes($mbox, $this->hostname, "*");
		if (is_array($list)) {
		    foreach ($list as $key => $val) {
		        echo "($key) ";
		        echo imap_utf7_decode($val->name) . ",";
		        echo "'" . $val->delimiter . "',";
		        echo $val->attributes . "<br />\n";
		    }
		} else {
		    echo "imap_getmailboxes failed: " . imap_last_error() . "\n";
		}

		imap_close($mbox);*/

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
		$archivos=$mail->getAttachments();
		$mailbox=null; //Cerramos el mailbox
		$mail->textPlain=(nl2br($mail->textPlain));
		foreach ($archivos as $archivo) {
			var_dump((string)$archivo->filePath);
		}
		
		return view('emails.show')
			->with('mail',$mail)
			->with('inboxunread',$this->Unread)
			->with('archivos',$archivos);
	}

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



	public function markMailAsRead($mailId)
	{
		$mailbox=$this->SearchMailbox($mailId);
		$Leído=$mailbox->markMailAsRead($mailId);
		if($Leído)
			Flash::success('Correo Marcado como Leído');
		else
			Flash::error('El correo no se pudo marcar como Leído');
		
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
