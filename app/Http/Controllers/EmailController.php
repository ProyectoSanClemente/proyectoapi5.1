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

	function __construct()
	{
		$this->middleware('auth');
		$this->hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}";
		$this->username="prueba";
		$this->password="Prueba2015";
		$this->carpeta='attachments/'.$this->username;
	}

	/**
	 * Display all Inbox Mails.
	 *
	 *
	 * @return Response
	 */
	public function index()
    {
    	
    	$hostname=$this->hostname.'INBOX';
     	$mailbox = new ImapMailbox($hostname, $this->username,$this->password,$this->carpeta);
		$mailboxmsginfo = $mailbox->getMailboxInfo();
		$mailsIds = $mailbox->searchMailbox('ALL');
		if(!$mailsIds) {
		    die('La bandeja de entrada esta vacia');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			
			return view('emails.index')
	    			->with('mailboxmsginfo',$mailboxmsginfo)
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
    	$hostname=$this->hostname.'Sent';
     	$mailbox = new ImapMailbox($hostname, $this->username,$this->password,$this->carpeta);
		$mailboxmsginfo = $mailbox->getMailboxInfo();
		$mailsIds = $mailbox->searchMailbox('ALL');
		if(!$mailsIds) {
		    die('La bandeja de entrada esta vacia');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			
			return view('emails.sent')
	    			->with('mailboxmsginfo',$mailboxmsginfo)
	    			->with('mailsinfo',$mailsinfo);
		}
    }

	public function unseen()
	{
		$mailbox = $this->conect();
		$mailboxmsginfo = $mailbox->getMailboxInfo();
		$mailsIds = $mailbox->searchMailbox('UNSEEN');

		if(!$mailsIds) {
			Flash::error('No hay mensajes sin leer!.');
			return redirect()->route('emails.index');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			return view('emails.unseen')
					->with('mailboxmsginfo',$mailboxmsginfo)
	    			->with('mailsinfo',$mailsinfo);
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
		return view('emails.show')
			->with('mail',$mail);		
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
		}
		return False;
	}

}
