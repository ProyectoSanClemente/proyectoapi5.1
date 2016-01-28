<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Http\Controllers\Controller;
use Validator, Input, Request, DB;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents['ListConversation']      = Message::ListConversation();
        $contents['CountNewMessage']  = count(Message::CountNewMessage());
        return view('conversation.index',$contents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conversation.create');
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
        //
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
