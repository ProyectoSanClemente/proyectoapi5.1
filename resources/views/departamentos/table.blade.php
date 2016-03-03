<table id="departamentos" class="table">
    <thead>
        <th>Nombre departamento</th>
        <th>Usuarios</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>    
    @foreach($departamentos as $departamento)
        <tr id="{{$departamento->id}}">
            <td>{!! $departamento->nombre!!}</td>
            <td>{!!count($departamento->Usuarios)!!}</td>
            <td>
                <a href="{!! route('departamentos.edit', [$departamento->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('departamentos.delete', [$departamento->id]) !!}" onclick="return confirm('Estás seguro que deseas eliminar este departamento?')"><i class="glyphicon glyphicon-remove"></i></a>
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
        $('#departamentos').DataTable({
            paging:false,
            order:[['1','asc']]
        });
    });
</script>
@if(Auth::user()->rol=='admin')
<!-- Incluir  Css contextMenu-->
{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}
<!-- Jquery menu contextual -->
<script type="text/javascript">
    $(function(){
    $('#departamentos').contextMenu({
        selector: 'tr',
        items: {
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('departamentos.edit', $departamento->id) }}"
                    var url = url.replace("{{$departamento->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar este departamento?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('departamentos.delete', $departamento->id) }}"
                        var url = url.replace("{{$departamento->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
        }
    });
});
</script>
@endif
@endpush