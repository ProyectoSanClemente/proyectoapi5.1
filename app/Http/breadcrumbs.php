<?php

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

// Home > Noticias
Breadcrumbs::register('noticiascreate',function($breadcrumbs){
	$breadcrumbs->parent('noticias');
	$breadcrumbs->push('Crear',url('noticias/create'));
});

// Home > Noticias
Breadcrumbs::register('noticiasedit',function($breadcrumbs){
	$breadcrumbs->parent('noticias');
	$breadcrumbs->push('Editar',url('noticias/edit'));
});