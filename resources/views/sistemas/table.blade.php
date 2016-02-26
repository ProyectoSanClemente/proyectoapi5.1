<table id="sistemas" class="table">
    <thead>
        <th>Nombre Sistema</th>
        <th>Imagen Sistema</th>
        <th>Controlador</th>
        <th>Funcion</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>    
    @foreach($sistemas as $sistema)
        <tr id="{{$sistema->id}}">
            <td>{!! $sistema->nombre_sistema !!}</td>
            <td>{!! $sistema->imagen_sistema !!}</td>
            <td>{!! $sistema->controlador !!}</td>
            <td>{!! $sistema->funcion !!}</td>
            <td>
                <a href="{!! route('sistemas.edit', [$sistema->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('sistemas.delete', [$sistema->id]) !!}" onclick="return confirm('Estás seguro que deseas eliminar este Sistema?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@push('styles')
    {!! HTML::style('css/jquery.dataTables.css')!!}
    {!! HTML::style('js/jQuery-contextMenu/jquery.contextMenu.css')!!}
@endpush

@push('scripts')
{!! HTML::script('js/jquery.dataTables.js') !!}
<script type="text/javascript">
    $(document).ready(function() {
        $('#sistemas').DataTable();
    });
</script>

<!-- Incluir  Css contextMenu-->
{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}
<!-- Jquery menu contextual -->
<script type="text/javascript">
    $(function(){
    $('#sistemas').contextMenu({
        selector: 'tr',
        items: {
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('sistemas.edit', $sistema->id) }}"
                    var url = url.replace("{{$sistema->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar este sistema?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('sistemas.delete', $sistema->id) }}"
                        var url = url.replace("{{$sistema->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
        }
    });
});
</script>
@endpush