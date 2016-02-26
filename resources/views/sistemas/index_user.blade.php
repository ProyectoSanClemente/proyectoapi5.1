<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div align ="center" class="panel-heading">Sistemas</div>
                <div class="panel-body">
                    @foreach($sistemas as $sistema)
                        <div class="col-lg-2 col-md-4 thumb">
                            <a class="thumbnail" target="_blank" href="{!! route($sistema->controlador.'.'.$sistema->funcion, [Auth::user()->id]) !!}">
                            <img class="img-responsive" src="{!!$sistema->imagen_sistema!!}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>