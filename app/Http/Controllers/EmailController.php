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
	function __construct()
	{
		//$this->middleware('auth');
	}

    private function conect(){
    	$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="prueba";
     	$password="Prueba2015";
    	$mailbox = new ImapMailbox($hostname, $username,$password);			
    	return $mailbox;
    }

	public function index()
    {
		$mailbox = $this->conect();
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

	public function show($mailId)
	{
		$mailbox = $this->conect();
		$mail = $mailbox->getMail($mailId);
		$mailboxmsginfo = $mailbox->getMailboxInfo();
		return view('emails.show')
				->with('mailId',$mailId)
				->with('mailboxmsginfo',$mailboxmsginfo)
				->with('mail',$mail);
	}

	public function markMailAsUnread($mailId)
	{
		$mailbox = $this->conect();
		$unread=$mailbox->markMailAsUnread($mailId);
		if($unread)
			Flash::success('Correo Marcado como No Leído');
		else
			Flash::error('El correo no se pudo marcar como no Leído');
		
		return redirect()->back();
	}

	public function markMailAsRead($mailId)
	{
		$mailbox = $this->conect();
		$Leído=$mailbox->markMailAsRead($mailId);
		if($Leído)
			Flash::success('Correo Marcado como Leído');
		else
			Flash::error('El correo no se pudo marcar como Leído');
		
		return redirect()->back();

	}


}
