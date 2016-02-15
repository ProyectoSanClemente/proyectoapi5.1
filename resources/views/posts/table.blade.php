<script type="text/javascript">
    $(document).ready(function() {
        $('#poststable').DataTable();
    } );
</script>

@if(Auth::user()->rol=='admin')
        <table id="poststable" class="table">
            <thead>
                <th>Nombre post</th>
                <th>Imagen post</th>
                <th>Controlador</th>
                <th>Funcion</th>
            <th width="50px">Action</th>
            </thead>
            <tbody>

            @foreach($posts as $post)
                <tr>
                    <td>{!! $post->nombre_post !!}</td>
                    <td>{!! $post->imagen_post !!}</td>
                    <td>{!! $post->controlador !!}</td>
                    <td>{!! $post->funcion !!}</td>
                    <td>
                        <a href="{!! route('posts.edit', [$post->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('posts.delete', [$post->id]) !!}" onclick="return confirm('Are you sure wants to delete this post?')"><i class="glyphicon glyphicon-remove"></i></a>
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
                <div align ="center" class="panel-heading">posts</div>
                    <div class="panel-body">
                        @foreach($posts as $post)
                            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                <a class="thumbnail" target="_blank" href="{!! route($post->controlador.'.'.$post->funcion, [Auth::user()->id]) !!}">
                                <img class="img-responsive" src="{!!$post->imagen_post!!}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>