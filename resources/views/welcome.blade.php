@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    {!!Breadcrumbs::render('welcome')!!}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">    
                    Intranet v1.0       
            {{$username=trim(shell_exec('echo %username%'))}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
