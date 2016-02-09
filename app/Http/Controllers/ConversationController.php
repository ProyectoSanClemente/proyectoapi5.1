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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {   
        $input=Request::all();
        $id=$input['conversation_id'];
        $conversa=Conversation::find($id);
        $conversa->unseen=0;
        $conversa->save();
        $data['id']=$id;
        $data['datos']=$input;
        return json_encode($data);
    }

}
