<?php

namespace App\Http\Controllers;
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
        $conversations = Conversation::where('user1_id',Input::get('user1_id'))->get();
        return view('conversation.index')
            ->with('users',$users);

    }
    /**
    * Display all conversations
    *
    * @return dataay json
    */
    public function showconversations()
    {
        //$results = DB::select('select * from conversations where user1_id = ?', dataay($input['user1_id']));
        $conversations = Conversation::where('user1_id',Input::get('user1_id'))->orderBy('updated_at', 'DESC')->get();
        return json_encode($conversations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrupdate()
    {
        $input=Request::all();
        $conversation=Conversation::where('user1_id', '=', $input['user1_id'])->where('user2_id', '=', $input['user2_id'])->first();
        //$results = DB::select('select * from conversations where user1_id = ? and user2_id = ?', dataay($input['user1_id'],$input['user2_id']));
        $data['user1_id'] = $input['user1_id'];
        $data['user1_accountname'] = $input['user1_accountname'];
        $data['user2_id'] = $input['user2_id'];
        $data['user2_accountname'] = $input['user2_accountname'];
        $data['creado'] = false;
        if(empty($conversation)){
            Conversation::create($input);
            
            $data['id']=DB::getPdo()->lastInsertId();
            $data['creado']=true;
            if($input['user1_id']!==$input['user2_id']){
                $coninver=new Conversation; //Crea la conversacion en el otro sentido
                $coninver->user1_id=$input['user2_id'];
                $coninver->user2_id=$input['user1_id'];
                $coninver->user1_accountname=$input['user2_accountname'];
                $coninver->user2_accountname=$input['user1_accountname'];
                $coninver->save();
            }
            
            
        }
        else
            $data['id']=$conversation->id;

        return json_encode($data);       
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
            $data['name'] = Input::get('name');
            $data['email'] = Input::get('email');
            $data['conversation_id'] = Input::get('conversation_id');
            $data['subject'] = Input::get('subject');
            $data['message'] = Input::get('message');

            if ($validator->fails()) {
                
                $error = $validator->errors();
                $data['success'] = false;
                $data['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' .implode('', $error->all(':message<br />')). '</div>';
                
            } else {    
                $message=Request::all();
                Message::create($message);
                $id = DB::getPdo()->lastInsertId();  
                $data = Message::DetailMessage($id);
                $data['new_count_message'] = count(Message::CountNewMessage());
                $data['success'] = true;
                $data['notif'] = '<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 alert alert-success" role="alert"> <i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Mensaje Enviado ...</div>';

            }
            return json_encode($data);
    
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
            $data = Message::DetailMessage($id);
            $data['update_count_message'] = count(Message::CountNewMessage());
            return json_encode($data);

        
        }
    }

}
