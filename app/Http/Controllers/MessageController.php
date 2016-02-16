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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), Message::rules(),[],Message::niceNames());
        if ($validator->fails()){
            $error = $validator->errors();
            $data['success'] = false;
        }else{ 
            $input=Request::all();
            $message=Message::create($input);
            $id = $message->id;
            $data = Message::find($id)->toArray();
            $data['user2_accountname']= $input['user2_accountname'];
            $id_conv2=$input['conversation2_id'];
            $conversation2=Conversation::find($id_conv2);
            $conversation2->unseen++;
            $conversation2->save();            
            $data['success'] = true;
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

}
