<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('home');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware'], function () {
    
    Route::group(['prefix' => 'chat'], function(){
        Route::get('/','ConversationController@index');
        Route::post('create','ConversationController@createorUpdate');
        Route::post('show','ConversationController@showconversations');
        Route::post('update','ConversationController@update');
        Route::post('store','MessageController@store');
        Route::post('showmessages','MessageController@showmessages');
        Route::post('getunseen','ConversationController@getunseen');
    });

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    
    Route::get('login2/{id}', 'Auth\AutoAuthController@getLogin');
    Route::post('login2', 'Auth\AutoAuthController@postLogin');
    
    Route::get('/home', 'HomeController@index');

    Route::resource('usuarios', 'UsuarioController');
    Route::get('usuarios/{id}/delete', [
        'as' => 'usuarios.delete',
        'uses' => 'UsuarioController@destroy',
    ]);

    Route::get('getunseen','FunctionsController@getunseen');

    Route::resource('noticias', 'NoticeController');

    Route::get('noticias/{id}/delete', [
        'as' => 'noticias.delete',
        'uses' => 'NoticeController@destroy',
    ]);

    Route::resource('cuentas', 'CuentaController');

    Route::get('cuentas/{id}/create', [
         'as' => 'cuentas.create',
         'uses' => 'CuentaController@create']);

    Route::get('cuentas/{id}/delete', [
        'as' => 'cuentas.delete',
        'uses' => 'CuentaController@destroy',
    ]);

    Route::get('cuentas/{id}/glpi', [
    'as' => 'cuentas.glpi',
    'uses' => 'CuentaController@glpi']);

    Route::get('cuentas/{id}/sidam', [
    'as' => 'cuentas.sidam',
    'uses' => 'CuentaController@sidam']);

    Route::get('cuentas/{id}/crecic', [
    'as' => 'cuentas.crecic',
    'uses' => 'CuentaController@crecic']);

    Route::get('cuentas/{id}/owncloud', [
    'as' => 'cuentas.owncloud',
    'uses' => 'CuentaController@owncloud']);

    Route::get('cuentas/{id}/zimbra', [
    'as' => 'cuentas.zimbra',
    'uses' => 'CuentaController@zimbra']);

    Route::get('cuentas/{id}/solicitudcompras', [
    'as' => 'cuentas.solicitudcompras',
    'uses' => 'CuentaController@solicitudcompras']);

    Route::get('cuentas/{id}/boleta', [
    'as' => 'cuentas.boleta',
    'uses' => 'CuentaController@boleta']);

    Route::get('cuentas/{id}/garantia', [
    'as' => 'cuentas.garantia',
    'uses' => 'CuentaController@garantia']);

    Route::get('cuentas/{id}/bodega', [
    'as' => 'cuentas.bodega',
    'uses' => 'CuentaController@bodega']);

    Route::get('cuentas/{id}/social', [
    'as' => 'cuentas.social',
    'uses' => 'CuentaController@social']);

    Route::get('cuentas/{id}/plan', [
    'as' => 'cuentas.plan',
    'uses' => 'CuentaController@plan']);

    Route::get('cuentas/{id}/processmaker', [
    'as' => 'cuentas.processmaker',
    'uses' => 'CuentaController@processmaker']);

    Route::group(['prefix' => 'emails'], function(){
        Route::get('inbox', 'EmailController@inbox');
        Route::get('sent', 'EmailController@sent');
        Route::get('unseen','EmailController@unseen');
        Route::get('{id}/show','EmailController@show'); 
    });
    Route::get('getunseen','EmailController@getunseen');
    
    Route::resource('sistemas', 'SistemaController');

    Route::get('sistemas/{id}/delete', [
        'as' => 'sistemas.delete',
        'uses' => 'SistemaController@destroy',
    ]);

    Route::resource('impresoras', 'ImpresoraController');

    Route::get('impresoras/{id}/delete', [
    'as' => 'impresoras.delete',
    'uses' => 'ImpresoraController@destroy']);

    Route::get('impresoras/{id}/imprimir', [
    'as' => 'impresoras.imprimir',
    'uses' => 'ImpresoraController@imprimir']);

    Route::get('getldapusers', [
        'as' => 'getldapusers',
        'uses' => 'UsuarioController@getldapusers'
    ]);

    Route::get('contenido', function(){
        return view('contenido');
    });

    Route::get('help', function(){
        return view('help');
    });

    Route::group(['prefix' => 'posts'], function(){
        Route::get('/','PostController@index');
        Route::post('create','PostController@create');
        Route::post('show','PostController@show');
        Route::post('update','PostController@update');
        Route::post('store',['as'=> 'posts.store','uses'=>'PostController@store']);
        Route::get('{id}/delete',[
            'as' => 'posts.delete',
            'uses' => 'PostController@destroy'
        ]);
    });
    Route::group(['prefix' => 'comentarios'], function(){
        Route::get('/','ComentarioController@index');
        Route::post('create','ComentarioController@create');
        Route::post('update','ComentarioController@update');
        Route::post('store','ComentarioController@store');
        Route::post('show_comentarios','ComentarioController@show_comentarios');
        Route::get('{id}/delete',[
            'as' => 'comentario.delete',
            'uses' => 'ComentarioController@destroy'
        ]);
    });

    Route::resource('anexos', 'AnexoController');

    Route::get('anexos/{id}/delete', [
        'as' => 'anexos.delete',
        'uses' => 'AnexoController@destroy',
    ]);

    Route::resource('departamentos', 'DepartamentoController');

    Route::get('departamentos/{id}/delete', [
        'as' => 'departamentos.delete',
        'uses' => 'DepartamentoController@destroy',
    ]);

    Route::resource('repositorios', 'RepositorioController');

    Route::get('repositorios/{id}/delete', [
        'as' => 'repositorios.delete',
        'uses' => 'RepositorioController@destroy',
    ]);

    Route::resource('documentos', 'DocumentoController');

    Route::get('documentos/{id}/create', [
         'as' => 'documentos.create',
         'uses' => 'DocumentoController@create']);

    Route::get('documentos/{id}/delete', [
        'as' => 'documentos.delete',
        'uses' => 'DocumentoController@destroy',
    ]);
});   