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
    //
});


Route::group(['middleware'], function () {
    Route::group(['prefix' => 'chat'], function () {
        Route::get('/', 'MessageController@index');
        Route::post('/','MessageController@update');
        Route::get('create', 'MessageController@create');
        Route::post('store','MessageController@store');
    });    

    Route::group(['prefix' => 'conversations'], function(){
        Route::get('/','ConversationController@index');
        Route::post('create','ConversationController@create');
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
    
    Route::get('emails/index', [
        'as' => 'emails.index',
        'uses' => 'EmailController@index'
    ]);

    Route::get('emails/unseen', [
        'as' => 'emails.unseen',
        'uses' => 'EmailController@unseen'
    ]);

    Route::get('emails/{id}/show', [
        'as' => 'emails.show',
        'uses' => 'EmailController@show',
    ]);
    
    Route::get('emails/{id}/markMailAsRead', [
        'as' => 'emails.markMailAsRead',
        'uses' => 'EmailController@markMailAsRead',
    ]);

    Route::get('emails/{id}/markMailAsUnread', [
        'as' => 'emails.markMailAsUnread',
        'uses' => 'EmailController@markMailAsUnread',
    ]);

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

