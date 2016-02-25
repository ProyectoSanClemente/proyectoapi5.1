<?php

namespace App\Http\Controllers\Auth;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AutoAuthController extends Controller
{
    protected $loginPath = 'login';
    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin($id)
    {
       return view('auth.autologin')
            ->with('id',$id);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function postLogin(Request $request)
    {
        $usuario=Usuario::where('accountname',$request->accountname)->first();        
        if(empty($usuario)){
            return redirect('login');
        }
        else{
            Auth::login($usuario);
            return redirect('home');
        }
    }

}
