<script type="text/javascript">
.panel-body {
   overflow: auto;
}
</script>
<table id="cuentastable"  class="table" overflow:none >
    <thead> 
        <th>Usuario</th>
        <th>Zimbra Usuario </th>
        <th>Zimbra Password </th>
		<th>Sidam Usuario </th>
		<th>Sidam Password</th>
		<th>Crecic Usuario</th>
		<th>Crecic Password</th>
        <th>Nube Usuario</th>
        <th>Nube Password</th>
        <th>Solicitud Compras Usuario</th>
        <th>Solicitud Compras Password</th>
        <th>Boleta Usuario</th>
        <th>Boleta Password</th>
        <th>Garantia Usuario</th>
        <th>Garantia Password</th>
        <th>Bodega Usuario</th>
        <th>Bodega Password</th>
        <th>Social Usuario</th>
        <th>Social Password</th>
        <th>Plan Usuario</th>
        <th>Plan Password</th>
        <th>ProcessMaker Usuario</th>
        <th>ProcessMaker Password</th>        
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr id="{{$cuenta->id}}">
            <td>{!! $cuenta->usuario->accountname!!}</td>
            <td>{!! $cuenta->id_zimbra !!}</td>
            <td>{!! $cuenta->pass_zimbra !!}</td>
			<td>{!! $cuenta->id_sidam !!}</td>
			<td>{!! $cuenta->pass_sidam !!}</td>
			<td>{!! $cuenta->id_crecic !!}</td>
			<td>{!! $cuenta->pass_crecic !!}</td>
            <td>{!! $cuenta->id_nube !!}</td>
            <td>{!! $cuenta->pass_nube !!}</td>
            <td>{!! $cuenta->id_solicitudcompras !!}</td>
            <td>{!! $cuenta->pass_solicitudcompras !!}</td>
            <td>{!! $cuenta->id_boleta!!}</td>
            <td>{!! $cuenta->pass_boleta!!}</td>
            <td>{!! $cuenta->id_garantia !!}</td>
            <td>{!! $cuenta->pass_garantia !!}</td>
            <td>{!! $cuenta->id_bodega !!}</td>
            <td>{!! $cuenta->pass_bodega !!}</td>
            <td>{!! $cuenta->id_social !!}</td>
            <td>{!! $cuenta->pass_social !!}</td>
            <td>{!! $cuenta->id_plan !!}</td>
            <td>{!! $cuenta->pass_plan !!}</td>
            <td>{!! $cuenta->id_processmaker !!}</td>
            <td>{!! $cuenta->pass_processmaker !!}</td>
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