@extends('layouts.app')

@section('content')
<style type="text/css">
    .panel-body1 {
   height: 150px;
   overflow: auto;
    }
</style>

<div class="container spark-screen">
    @include('flash::message')
    <div class="row">

        <div class="col-md-4">
            <div class="panel panel-success">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">RSS</div>
                <div class="panel-body1">
                        Aca noticias de la pag.                        <br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-heading">Avisos</div>
                <div class="panel-body1">
                        Aca avisos!                        <br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Muro</div>
                    <div class="panel-body1">
                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
                        Bienvenido {{Auth::user()->rol}}: {{Auth::user()->displayname}}
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    </div>
            </div>
        </div>

    </div>


</div>
@endsection
