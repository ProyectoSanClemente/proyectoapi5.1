<table id="impresoras" class="table">
    <thead>
    <th>Departamento</th>
	<th>Modelo asignada</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
        @foreach($impresorasasignadas as $asignada)
            <tr id="{{$asignada->id}}">
                <td>{!! $asignada->Departamento->nombre!!}</td>
    			<td>{!! $asignada->Impresora->modelo_impresora !!}</td>
                <td>
                    <a href="{!! route('impresoras.edit', [$asignada->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('impresoras.delete', [$asignada->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar esta asignacion de asignada?')"><i class="glyphicon glyphicon-remove"></i></a>
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
        $('#impresoras').DataTable();
    });
</script>


{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}

<script type="text/javascript">
    $(function(){
    $('#impresoras').contextMenu({
        selector: 'tr',
        items: {
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('impresoras.edit', $asignada->id) }}"
                    var url = url.replace("{{$asignada->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar esta asignacion de asignada?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('impresoras.delete', $asignada->id) }}"
                        var url = url.replace("{{$asignada->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
        }
    });
});
</script>
@endpush