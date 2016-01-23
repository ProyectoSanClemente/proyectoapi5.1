<script type="text/javascript">
    $(document).ready(function() {
        $('#sistemastable').DataTable();
    } );
</script>

@if(Auth::user()->rol=='admin')
        <table id="sistemastable" class="table">
            <thead>
            <th>Nombre Sistema</th>
                    <th>Imagen Sistema</th>
                    <th>Redireccionar</th>
            <th width="50px">Action</th>
            </thead>
            <tbody>

            @foreach($sistemas as $sistema)
                <tr>
                    <td>{!! $sistema->nombre_sistema !!}</td>
                    <td>{!! $sistema->imagen_sistema !!}</td>
                    <td>{!! $sistema->redireccionar !!}</td>
                    <td>
                        <a href="{!! route('sistemas.edit', [$sistema->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('sistemas.delete', [$sistema->id]) !!}" onclick="return confirm('Are you sure wants to delete this Sistema?')"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <hr>
@endif

<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div align ="center" class="panel-heading">Sistemas</div>
                    <div class="panel-body">
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[0]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[0]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[1]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[1]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[2]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[2]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[3]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[3]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[4]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[4]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{!!$sistemas[5]->redireccionar!!}">
                            <img class="img-responsive" src="{!!$sistemas[5]->imagen_sistema!!}" alt="">
                        </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnail" target="_blank" href="{{ URL::to('impresoras/' .Auth::id().'/imprimir') }}">
                            <img class="img-responsive" src="{!!$sistemas[0]->imagen_sistema!!}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>