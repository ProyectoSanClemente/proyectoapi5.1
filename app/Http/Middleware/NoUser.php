<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Flash;
use Closure;

class NoUser
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
        if($this->auth->user()->rol=='usuario'){
            Flash::warning('No tiene los privilegios para acceder a esa sección');
            return redirect()->guest('home');
        }
        return $next($request);
    }
}
