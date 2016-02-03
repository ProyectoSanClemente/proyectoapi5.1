<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Usuario;
use App\Models\Conversation;
use App\Http\Controllers\Controller;
use Validator, Input, Request, DB;

class ConversationController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    } 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Usuario::all();        
        $conversations=Conversation::all();
        return view('conversation.index')
            ->with('users',$users)
            ->with('conversations',$conversations);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {     

        $input=Request::all();
        $results = DB::select('select * from conversations where user1 = ? and user2 = ? or user1 = ? and user2 = ?', array($input['user1'],$input['user2'],$input['user2'],$input['user1']));
        $arr['user1'] = $input['user1'];
        $arr['user2'] = $input['user2'];
        $arr['success'] = true;
        if(empty($results)){
            Conversation::create($input);
            $id = DB::getPdo()->lastInsertId(); 
            $arr['id']=$id;
        }
        else{          
            $id=$results[0]->id;
            $arr['id']=$id;
            $mensajes= DB::select('select * from messages where conversation_id = ?', array($id));
            $arr['messages']='';
            foreach ($mensajes as $mensaje){
                if($mensaje->sender==$input['user1']){
                    $arr['messages'].='<p class="bg-success">'.$mensaje->sender.': '.$mensaje->message.'</p>';
                }
                else
                    $arr['messages'].='<p class="bg-warning">'.$mensaje->sender.': '.$mensaje->message.'</p>';
            }

        }
        return json_encode($arr);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(Input::all(), Message::rules(),[],Message::niceNames());
            
            $arr['name'] = Input::get('name');
            $arr['email'] = Input::get('email');
            $arr['conversation_id'] = Input::get('conversation_id');
            $arr['subject'] = Input::get('subject');
            $arr['message'] = Input::get('message');

            if ($validator->fails()) {
                
                $error = $validator->errors();
                $arr['success'] = false;
                $arr['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .implode('', $error->all(':message<br />')). '</div>';
                
            } else {    
                $message=Request::all();
                Message::create($message);
                $id = DB::getPdo()->lastInsertId();  
                $arr = Message::DetailMessage($id);
                $arr['new_count_message'] = count(Message::CountNewMessage());
                $arr['success'] = true;
                $arr['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Mensaje Enviado ...</div>';

            }
            return json_encode($arr);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $id = Input::get('id');
        if($id){

            Message::UpdateSeen($id);
            $arr = Message::DetailMessage($id);
            $arr['update_count_message'] = count(Message::CountNewMessage());
            return json_encode($arr);

        
        }
    }

}
