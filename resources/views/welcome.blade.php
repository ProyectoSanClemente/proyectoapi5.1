@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">    
                    Intranet v1.0       
            
            <?php ($_SERVER['REMOTE_USER'])?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
