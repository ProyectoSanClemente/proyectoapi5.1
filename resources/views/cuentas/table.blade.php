<table id="cuentastable"  class="table display nowrap" overflow:none style="scrollX: true">
    <thead> 
        <th>Usuario</th>
        <th>Zimbra </th>
		<th>Sidam</th>
		<th>Crecic</th>
        <th>Nube</th>
        <th>Solicitud Compras</th>
        <th>Boleta</th>
        <th>Garantia</th>
        <th>Bodega</th>
        <th>Social</th>
        <th>Plan</th>
        <th>ProcessMaker</th>  
        <th>Glpi</th>     
    <th width="50px">Acciones</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr id="{{$cuenta->id}}">
            <td>U:{!! $cuenta->usuario->accountname!!}</td>
            <td>U:{!! $cuenta->id_zimbra !!}            <br>P:{!! $cuenta->pass_zimbra!!}</td>
			<td>U:{!! $cuenta->id_sidam !!}             <br>P:{!! $cuenta->pass_sidam !!}</td>
			<td>U:{!! $cuenta->id_crecic !!}            <br>P:{!! $cuenta->pass_crecic !!}</td>
            <td>U:{!! $cuenta->id_nube !!}              <br>P:{!! $cuenta->pass_nube !!}</td>
            <td>U:{!! $cuenta->id_solicitudcompras !!}  <br>P:{!! $cuenta->pass_solicitudcompras !!}</td>
            <td>U:{!! $cuenta->id_boleta!!}             <br>P:{!! $cuenta->pass_boleta!!}</td>
            <td>U:{!! $cuenta->id_garantia !!}          <br>P:{!! $cuenta->pass_garantia !!}</td>
            <td>U:{!! $cuenta->id_bodega !!}            <br>P:{!! $cuenta->pass_bodega !!}</td>
            <td>U:{!! $cuenta->id_social !!}            <br>P:{!! $cuenta->pass_social !!} </td>
            <td>U:{!! $cuenta->id_plan !!}              <br>P:{!! $cuenta->pass_plan !!}</td>
            <td>U:{!! $cuenta->id_processmaker !!}      <br>P:{!! $cuenta->pass_processmaker !!}</td>
            <td>U:{!! $cuenta->id_glpi !!}              <br>P:{!! $cuenta->pass_glpi !!}</td>
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
        $('#cuentastable').DataTable({
            "scrollX": true
        });
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