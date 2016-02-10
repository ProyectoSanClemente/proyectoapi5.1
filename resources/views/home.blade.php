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
    @include('flash::message')
    <br>
    <div class="row">   
        <div class="col-md-12">
            <div class="alert alert-success">
                Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-danger" >
                <div class="panel-heading">Avisos</div>
                <div class="panel-body"  style="height:400px">
                @foreach($notices as $notice)
                    <h4><a href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">{!! $notice->titulo !!}</a></h4>
                        @if (strlen($notice->contenido) > 180)
                            {!! substr($notice->contenido, 0, 180)."...";!!}
                        @else
                            {!! $notice->contenido !!}
                        @endif
                        <div class="modal fade" id="myModal{{$notice->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{!!$notice->titulo!!}</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('noticias.show_fields')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info" style="height:auto">
                <div class="panel-heading">Noticias</div>
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
