<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ddeboer\Imap\Server;
use Ddeboer\Imap\Exception\AuthenticationFailedException;
use Ddeboer\Imap\SearchExpression;
use Ddeboer\Imap\Search\Flag\Unseen;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Auth;

class FunctionsController extends Controller
{
     public function getunseen()
    {
        $usuario=Usuario::find(Auth::id());
        if($usuario->hasCuenta()){
            $cuenta=$usuario->Cuenta;
            $hostname = "sanclemente.cl";
            $port="993";
            $flags="ssl/novalidate-cert";
            $username=$cuenta->id_zimbra;
            $password=$cuenta->pass_zimbra;            
            if(!empty($username) && !empty($password))
            {
                try {
                    $Server=new Server($hostname,$port,$flags);
                    $connection = $Server->authenticate($username,$password);    
                
                } catch (AuthenticationFailedException $e) {
                    return 'fallo';
                }

                $inbox=$connection->getMailbox('Sent');
                $search = new SearchExpression();
                $search->addCondition(new Unseen('UNSEEN'));
                $unseen=$inbox->getMessages($search);
                $messages = new Collection;                

                foreach ($inbox->getMessages() as $mess) {
                    $message = new \stdClass;
                    $message->number=$mess->getNumber();
                    $message->id=$mess->getId();
                    $message->subject=$mess->getSubject();
                    $message->from=$mess->getFrom();
                    $message->to=$mess->getTo();
                    $message->date=$mess->getDate();
                    $message->answered=$mess->isAnswered();
                    $message->deleted=$mess->isDeleted();
                    $message->isdraft=$mess->isDraft();
                    $message->seen=$mess->isSeen();
                    //$message->Body=$mess->getBodyText();
                    $messages->prepend($message);
                }
                dd($messages);
                
            }
        }
    }
}
