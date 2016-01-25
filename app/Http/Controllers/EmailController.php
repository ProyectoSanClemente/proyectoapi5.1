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
use PHPMailer;

class EmailController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}

    private function conect(){
		$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="prueba";
     	$password="Prueba2015";
     	$carpeta='attachments/'.$username;
		if (!file_exists($carpeta)){
		    mkdir($carpeta, 0777, true);
		}
     	$mailbox = new ImapMailbox($hostname, $username,$password,$carpeta);	
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

	public function SendMail()
	{

		$mail = new PHPMailer;
		$mail->isSMTP();			                          // Set mailer to use SMTP
		$mail->Host = 'smtp.sanclemente.cl';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'prueba@sanclemente.cl';                 // SMTP username
		$mail->Password = 'Prueba2015';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;	                                  // TCP port to connect to
		$mail->setFrom('prueba@sanclemente.cl', 'Mailer');
		$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
		$mail->addAddress('ellen@example.com');               // Name is optional
		$mail->addReplyTo('info@example.com', 'Information');
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Here is the subject';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->send()) {
		    return 'Message could not be sent.';
		    return 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    return 'Message has been sent';
		}
	}

}
