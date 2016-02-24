@extends('layouts.app')

@section('content')
<style type="text/css">

.panel-body {
   overflow: auto;
}

.panel {
 display: inline-block;
 padding:  0; 
 width:100%;
}
</style>
<style type="text/css">
    @media screen and (min-width: 675px) {
    .modal-dialog  {width:670px;}

}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    @include('flash::message')

    <div class="panel-group" id="accordion">

        <!-- start panel left -->
        <div class="panel-left col-sm-3">
            <!-- start panel -->
            <div class="panel panel-primary" style="height:auto">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Perfil</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-primary glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" data-parent="#accordion" href="#collpaseperfil"></button>
                    </div>
                </div>
                <div id="collpaseperfil" class="panel-collapse collapse">
                    <div class="panel-body" style="height:400px">
                        @include('usuarios.perfil')
                    </div>
                </div>
            </div>
            <!-- end panel -->

            <!-- start panel -->
            <div class="panel panel-danger" style="height:auto">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Avisos</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" data-parent="#accordion" href="#collpaseavisos"></button>
                    </div>
                </div>
                <div id="collpaseavisos" class="panel-collapse collapse in">
                    <div class="panel-body" style="height:400px">
                            @foreach($notices as $notice)
                            <h4><a href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">{!! $notice->titulo !!}</a></h4>
                            @if (strlen($notice->contenido) > 180)
                                {!! substr($notice->contenido, 0, 180)."...";!!}
                            @else
                                {!! $notice->contenido !!}
                            @endif
                            @include('noticias.show')
                            <hr>                    
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end panel -->            
        </div> 
        <!-- end panel left -->

        <!-- start panel right -->
        <div class="panel-left col-sm-9">
            <!-- start panel -->
            <div class="panel panel-primary" style="height:auto">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Comunidad</h4>
                    <div class="btn-group pull-right">
                        <span><a class="btn btn-primary" id="post" data-toggle="modal" href='#modal-id'>Nuevo Post!</a>@include('posts.create')
                        <button class="btn btn-primary glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" data-parent="#accordion" href="#collpasecomunidad"></button></span>
                    </div>
                </div>
                <div id="collpasecomunidad" class="panel-collapse collapse in">
                    <div class="panel-body" style="height:400px">
                        @include('muro')
                    </div>
                    @include('comentarios.create')
                </div>
            </div>
            <!-- end panel -->

            <!-- start panel -->
            <div class="panel panel-info" style="height:auto">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">Noticias</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-info glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" data-parent="#accordion" href="#collpasenotice"></button>
                    </div>
                </div>
                <div id="collpasenotice" class="panel-collapse collapse">
                    <div class="panel-body" style="height:400px">
                        @foreach ($feed->get_items() as $item)
                            <div class="item">
                                <h4><a target="_blank" href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a>
                                </h4>
                                <p>{{ $item->get_description() }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div> 
        <!-- end panel right -->
    </div>
</div>

@endsection

@push('scripts')
    {!! HTML::script('js/post/post.js') !!}
    <!-- {!! HTML::script('js/post/nodesocket.js') !!} -->
@endpush