@extends('layouts.app')

@section('content')
<style type="text/css">

.panel-body {
   overflow: auto;
}


.row {
 -moz-column-width: 25em;
 -webkit-column-width: 25em;
 -moz-column-gap: .5em;
 -webkit-column-gap: .5em; 
  
}

.panel {
 display: inline-block;
 margin:  .5em;
 padding:  0; 
 width:98%;
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

        <div class="panel panel-success">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body" style="height:75px">
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
            </div>
        </div>
        

        
        <div class="panel panel-danger" >
            <div class="panel-heading">Avisos</div>
            <div class="panel-body"  style="height:370px">
            @foreach($notices as $notice)
                <h3><a href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">{!! $notice->titulo !!}</a></h3>
                {{($notice->contenido)}}
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

        <div class="panel panel-primary" style="height:auto">
            <div class="panel-heading">Muro</div>
                <div class="panel-body" style="height:500px"> 
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                    {{'Propietario script actual: ' . get_current_user()}}
                    
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                                        <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                                        <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                                        <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    <br>
                                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>
                    Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}<br>

        
                    <br>
                </div>
        </div>
        <div class="panel panel-info" style="height:auto">
            <div class="panel-heading">RSS</div>
            <div class="panel-body" style="height:500px">                             
                @foreach ($feed->get_items() as $item)
                    <div class="item">
                      <h4><a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a></h4>
                      <p>{{ $item->get_description() }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


</div>
@endsection
