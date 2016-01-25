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
                    Aca avisos!<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
