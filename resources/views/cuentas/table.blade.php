<table id="cuentastable"  class="table">
    <thead>
            <th>Accountname</th>
			<th>Id Sidam</th>
			<th>Pass Sidam</th>
			<th>Id Crecic</th>
			<th>Pass Crecic</th>
            <th>Id Zimbra</th>
            <th>Pass Zimbra</th>
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr id="{{$cuenta->id}}">
            <td>{!! $cuenta->usuario->accountname!!}</td>
			<td>{!! $cuenta->id_sidam !!}</td>
			<td>{!! $cuenta->pass_sidam !!}</td>
			<td>{!! $cuenta->id_crecic !!}</td>
			<td>{!! $cuenta->pass_crecic !!}</td>
            <td>{!! $cuenta->id_zimbra !!}</td>
            <td>{!! $cuenta->pass_zimbra !!}</td>
            <td>
                <a href="{!! route('cuentas.edit', [$cuenta->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('cuentas.delete', [$cuenta->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar esta cuenta?')"><i class="glyphicon glyphicon-remove"></i></a>
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
        $('#cuentastable').DataTable();
    });
</script>

{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}

<script type="text/javascript">
    $(function(){
    $('#cuentastable').contextMenu({
        selector: 'tr',
        items: {
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('cuentas.edit', $cuenta->id) }}"
                    var url = url.replace("{{$cuenta->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar esta cuenta?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('cuentas.delete', $cuenta->id) }}"
                        var url = url.replace("{{$cuenta->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
        }
    });
});
</script>

@endpush