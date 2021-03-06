<?php
// welcome
Breadcrumbs::register('welcome', function($breadcrumbs)
{
    $breadcrumbs->push('Bievenido', url('/'));
});


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Inicio', url('/home'));
});

// Home > Usuarios
Breadcrumbs::register('usuarios', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Usuarios', url('usuarios'));
});

// Home > Usuarios > Create
Breadcrumbs::register('usuarioscreate', function($breadcrumbs)
{
    $breadcrumbs->parent('usuarios');
    $breadcrumbs->push('Crear', url('usuarios/create'));
});

// Home > Impresoras
Breadcrumbs::register('impresoras',function($breadcrumbs)
{
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Impresoras',url('impresoras'));
});

// Home > Noticias
Breadcrumbs::register('noticias',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Noticias',url('noticias'));
});

// Home > Noticias > create
Breadcrumbs::register('noticiascreate',function($breadcrumbs){
	$breadcrumbs->parent('noticias');
	$breadcrumbs->push('Crear',url('noticias/create'));
});

// Home > Noticias > edit
Breadcrumbs::register('noticiasedit',function($breadcrumbs){
	$breadcrumbs->parent('noticias');
	$breadcrumbs->push('Editar',url('noticias/edit'));
});

// Home > Chat 
Breadcrumbs::register('chat',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Chat',url('chat'));
});

// Home > Sistemas
Breadcrumbs::register('sistemas',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Sistemas',url('sistemas'));
});

// Home > Sistemas >create
Breadcrumbs::register('sistemascreate',function($breadcrumbs){
	$breadcrumbs->parent('sistemas');
	$breadcrumbs->push('Crear',url('sistemas/create'));
});

// Home > Sistemas >edit
Breadcrumbs::register('sistemasedit',function($breadcrumbs){
	$breadcrumbs->parent('sistemas');
	$breadcrumbs->push('Editar',url('sistemas/edit'));
});

// Home > Sistemas >show
Breadcrumbs::register('sistemasshow',function($breadcrumbs){
	$breadcrumbs->parent('sistemas');
	$breadcrumbs->push('Mostrar',url('sistemas/show'));
});

// Home > email> inbox
Breadcrumbs::register('emails',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Correos',url('emails/index'));
});


// Home > email >unseen
Breadcrumbs::register('unseen',function($breadcrumbs){
	$breadcrumbs->parent('emails');
	$breadcrumbs->push('No vistos',url('sistemas/unseen'));
});

// Home > email >unseen
Breadcrumbs::register('sents',function($breadcrumbs){
	$breadcrumbs->parent('emails');
	$breadcrumbs->push('Enviados',url('emails/index'));
});

// Home > email >show
Breadcrumbs::register('emailsshow',function($breadcrumbs){
	$breadcrumbs->parent('emails');
	$breadcrumbs->push('Mostrar',url('emails/show'));
});

// Home > Sistemas
Breadcrumbs::register('contenido',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Contenido',url('contenido'));
});

// Home > Anexos
Breadcrumbs::register('anexo',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Anexo',url('anexos'));
});

// Home > Anexos >create
Breadcrumbs::register('anexocreate',function($breadcrumbs){
	$breadcrumbs->parent('anexo');
	$breadcrumbs->push('Crear',url('anexos/create'));
});

// Home > Anexos >edit
Breadcrumbs::register('anexoedit',function($breadcrumbs){
	$breadcrumbs->parent('anexo');
	$breadcrumbs->push('Editar',url('anexos/edit'));
});


// Home > Departamentos
Breadcrumbs::register('departamentos',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Departamentos',url('departamentos'));
});

// Home > Departamento >create
Breadcrumbs::register('departamentocreate',function($breadcrumbs){
	$breadcrumbs->parent('departamentos');
	$breadcrumbs->push('Crear',url('departamentos/create'));
});

// Home > Departamento >edit
Breadcrumbs::register('departamentoedit',function($breadcrumbs){
	$breadcrumbs->parent('departamentos');
	$breadcrumbs->push('Editar',url('departamentos/edit'));
});

//  Home > Help
Breadcrumbs::register('help',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Ayuda',url('help'));
});


// Home > Repositorio 
Breadcrumbs::register('repositorios',function($breadcrumbs){
	$breadcrumbs->parent('home');
	$breadcrumbs->push('Repositorios',url('repositorios'));
});

// Home > Repositorio >create
Breadcrumbs::register('repositoriocreate',function($breadcrumbs){
	$breadcrumbs->parent('repositorios');
	$breadcrumbs->push('Crear',url('repositorios/create'));
});

// Home > Repositorio >edit
Breadcrumbs::register('repositorioedit',function($breadcrumbs){
	$breadcrumbs->parent('repositorios');
	$breadcrumbs->push('Editar',url('repositorios/edit'));
});

// Home > Documento > Añadir 
Breadcrumbs::register('documentocreate',function($breadcrumbs){
	$breadcrumbs->parent('repositorios');
	$breadcrumbs->push('Agregar Documento',url('documentos/create'));
});

// Home > Documento >edit
Breadcrumbs::register('documentoedit',function($breadcrumbs){
	$breadcrumbs->parent('repositorios');
	$breadcrumbs->push('Editar Documento',url('documentos/edit'));
});


