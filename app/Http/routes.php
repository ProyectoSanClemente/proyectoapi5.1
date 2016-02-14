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
    return view('welcome');
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
    });

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    
    Route::get('/home', 'HomeController@index');

    Route::resource('usuarios', 'UsuarioController');
    Route::get('usuarios/{id}/delete', [
        'as' => 'usuarios.delete',
        'uses' => 'UsuarioController@destroy',
    ]);

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
    
    Route::group(['prefix' => 'emails'], function(){
    Route::get('index', 'EmailController@index');
    Route::get('sent', 'EmailController@sent');
    Route::get('unseen','EmailController@unseen');
    Route::get('{id}/show','EmailController@show');
    
    Route::get('{id}/markMailAsRead', 'EmailController@markMailAsRead');
    Route::get('{id}/markMailAsUnread','EmailController@markMailAsUnread');

    });
    
    Route::resource('sistemas', 'SistemaController');

    Route::get('sistemas/{id}/delete', [
        'as' => 'sistemas.delete',
        'uses' => 'SistemaController@destroy',
    ]);

    Route::resource('impresoras', 'ImpresoraController');

    Route::get('impresoras/{id}/create', [
         'as' => 'impresoras.create',
         'uses' => 'ImpresoraController@create']);

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
});

