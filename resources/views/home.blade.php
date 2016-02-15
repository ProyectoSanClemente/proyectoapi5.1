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

<div class="container">
    {!! Breadcrumbs::render('home') !!}
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" style="height:auto">
                <div class="panel-heading clearfix">                    
                    <h4 class="panel-title pull-left">Muro</h4>
                    <div class="btn-group pull-right">
                        <button class="btn glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" href="#collpasemuro"></button>
                    </div>
                </div>
                  <div id="collpasemuro" class="panel-collapse collapse">    
                    <div class="panel-body" style="height:400px">                             
                        @include('muro')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-danger" >
                <div class="panel-heading clearfix">                    
                    <h4 class="panel-title pull-left">Avisos</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-danger glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" href="#collpaseavisos"></button>
                    </div>
                </div>            
                
                <div id="collpaseavisos" class="panel-collapse collapse in">
                    <div class="panel-body"  style="height:400px">
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
        </div>
        <div class="col-md-6">
            <div class="panel panel-info" style="height:auto">
                <div class="panel-heading clearfix">                    
                    <h4 class="panel-title pull-left">Noticias</h4>
                    <div class="btn-group pull-right">
                        <button class="btn btn-info glyphicon glyphicon-chevron-down" type="button" data-toggle="collapse" href="#collpasenoticias"></button>
                    </div>
                </div>
                  <div id="collpasenoticias" class="panel-collapse collapse in">    
                    <div class="panel-body" style="height:400px">                             
                        @foreach ($feed->get_items() as $item)
                            <div class="item">
                              <h4><a target="_blank" href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h4>
                              <p>{{ $item->get_description() }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
