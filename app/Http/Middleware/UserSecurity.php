<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Flash;
use Closure;

class UserSecurity
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');
        if($this->auth->user()->id!=$id && $this->auth->user()->rol!='admin'){
            Flash::warning('No tiene los privilegios para acceder a esa sección');
            return redirect()->guest('home');
        }
        return $next($request);
    }
}
