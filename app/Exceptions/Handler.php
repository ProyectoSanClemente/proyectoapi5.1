<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Adldap\Exceptions\AdldapException as AdldapException;
use Ddeboer\Imap\Exception\AuthenticationFailedException;
use PhpImap\Mailbox;
use Flash;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        
        // if ($e instanceof ModelNotFoundException) {
        //     $e = new NotFoundHttpException($e->getMessage(), $e);
        // }
        // if ($e instanceof AdldapException) {
        //     Flash::warning('No se pudo conectar con el Directorio Activo, reinicie la conexion o revise sus datos.');
        //     return response()->view('errors.errors');
        // }

        // if($e instanceof AuthenticationFailedException){
        //     Flash::warning('Fallo de autentificación servidor de correos.');
        //     return redirect('home');
        // }

        // if($e instanceof Exception){
        //     $message=$e->getMessage();
        //     if($message=='ldap_bind(): Unable to bind to server: Invalid credentials'){
        //         Flash::error('El password ingresado no es válido');
        //         return redirect('login')->withInput();
        //     }
        //     Flash::warning($message);
        //     return redirect(url('home'));
        // }
        
        return parent::render($request, $e);
    }
}
