<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Conversation;
use App\Http\Controllers\Controller;
use Validator, Input, Request, DB;

class MessageController extends Controller
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
        foreach (Message::all() as $Mensaje) {
            Message::UpdateSeen($Mensaje->id);
        }
        return view('messages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
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
            
            $id_conv2=Input::get('conversation2_id');
            $conversation2=Conversation::find($id_conv2);
            if ($validator->fails()) {

                $error = $validator->errors();
                $data['success'] = false;
                //$data['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .implode('', $error->all(':message<br />')). '</div>';
                
            } else {   
                $input=Request::all();
                Message::create($input);
                $id = DB::getPdo()->lastInsertId(); 
                $data = Message::DetailMessage($id);
                $data['user2_accountname']= $input['user2_accountname'];
                //$data = Message::DetailMessage($id);
                //$data['new_count_message'] = count(Message::CountNewMessage());
                $conversation2->unseen++;
                $conversation2->save();                
                $data['success'] = true;
                //$data['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Mensaje Enviado ...</div>';

            }

            return json_encode($data);
    
    }

    /**
     * Display the message history.
     *
     * @return \Illuminate\Http\Response
     */
    public function showmessages()
    {
        $input=Request::all();
        $conv1=Conversation::where('id',Input::get('conversation_id'))->first();        
        $conv2=Conversation::where('user1_id', '=', $conv1->user2_id)->where('user2_id', '=', $conv1->user1_id)->first();
        $messages1=Message::where('conversation_id',$conv1->id)->get();
        $messages2=Message::where('conversation_id',$conv2->id)->get();
        //$messages=DB::select('select * from messages where conversation_id = ? or conversation_id = ? order by created_at', array($conv1->id,$conv2->id));
        $messages=$messages1->merge($messages2);
        $data['user1_id']=$conv1->user1_id;
        $data['user2_id']=$conv1->user2_id;
        $data['user1_accountname']=$conv1->user1_accountname;
        $data['user2_accountname']=$conv1->user2_accountname;
        $data['conversation_id']=$conv1->id;
        $data['conversation2_id']=$conv2->id;
        $data['messages']=$messages->sortBy('created_at')->values();
        return json_encode($data);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
