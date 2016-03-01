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
        return view('conversation.index')
            ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrupdate()
    {
        $validator = Validator::make(Input::all(), Conversation::rules(),[],Conversation::niceNames());
        $input=Request::all();
        $conversation=Conversation::where('user1_id', '=', $input['user1_id'])->where('user2_id', '=', $input['user2_id'])->first();
        //$results = DB::select('select * from conversations where user1_id = ? and user2_id = ?', dataay($input['user1_id'],$input['user2_id']));
        $data['user1_id'] = $input['user1_id'];
        $data['user1_accountname'] = $input['user1_accountname'];
        $data['user2_id'] = $input['user2_id'];
        $data['user2_accountname'] = $input['user2_accountname'];
        $data['created'] = false;
        if(empty($conversation)){
            $conversation=Conversation::create($input);            
            $data['id']=$conversation->id;
            $data['created']=true;
            if($input['user1_id']!==$input['user2_id']){
                //$coninver=new Conversation; //Crea la conversacion en el otro sentido
                $inputinver=['user1_id'=>$input['user2_id'],
                        'user2_id'=>$input['user1_id'],
                        'user1_accountname'=>$input['user2_accountname'],
                        'user2_accountname'=>$input['user1_accountname']
                    ];
                $coninver=Conversation::create($inputinver); //Crea la conversacion en el otro sentido
            }
        }
        else
            $data['id']=$conversation->id;

        return json_encode($data);       
    }

    /**
    * Display all conversations
    *
    * @return data array json
    */
    public function showconversations()
    {
        //$results = DB::select('select * from conversations where user1_id = ?', dataay($input['user1_id']));
        $conversations = Conversation::where('user1_id',Input::get('user1_id'))->orderBy('updated_at', 'DESC')->get();
        foreach ($conversations as $conversation) { //Se rellenan las imagenes de usuario en la lista de conversaciones
            $id=$conversation->user2_id; //ID del usuario a buscar
            $imagen=Usuario::find($id)->imagen;
            $conversation['imagen']=$imagen;
        }
        return json_encode($conversations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()    {   
        
        $id=Input::get('conversation_id');
        Conversation::where('id',$id)->update(['unseen'=>0]);
        $data['id']=$id;
        return json_encode($id);
    }

    public function getunseen()
    {
        $accountname=Input::get('accountname');
        $conversations=Conversation::where('user1_accountname',$accountname)->get();
        $unseen=0;
        foreach ($conversations as $key => $conversation) {
            $unseen+=$conversation->unseen;
        }
        return json_encode($unseen);
    }

}
