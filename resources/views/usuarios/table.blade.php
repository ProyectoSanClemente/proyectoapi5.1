<table id="usuarios" class="table table-responsive" style="display:none">
    <thead>
        <th>Imagen</th>
        <th>Cuenta</th>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Departamento</th>
    <th width="120px">Acciones</th>
</thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr id="{{$usuario->id}}">
            <td><img src="{!! $usuario->imagen !!}" class="img-responsive img-circle" width="20px"></a></td>
            <td>{!! $usuario->accountname !!}</td>
            <td>{!! $usuario->rut !!}</td>
            <td>{!! $usuario->nombre !!}</td>
            <td>{!! $usuario->apellido !!}</td>
            @if($usuario->hasCuenta())
                @if(!empty($usuario->Cuenta->id_zimbra))
                    <td>{!! $usuario->Cuenta->id_zimbra !!}</td>
                @else
                    <td style="color:red">Sin Datos</td>
                @endif
            @else
            <td style="color:red">Sin Datos</td>
            @endif
            <td>{!! ucfirst($usuario->rol) !!}</td>
            <td>{!! $usuario->Departamento->nombre !!}
            <td>
                <a href='#' data-toggle="modal" data-toggle="modal" data-target="#showModal{{$usuario->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{{ route('usuarios.edit', [$usuario->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{{ route('usuarios.delete', [$usuario->id]) }}" onclick="return confirm('Estas seguro que deseas eliminar este usuario?')"><i class="glyphicon glyphicon-trash"></i></a>
                <a href="{{ route('cuentas.create',[$usuario->id]) }}"><i class="glyphicon glyphicon-hdd"></i></a>
                <a href="{{ route('impresoras.create',[$usuario->id]) }}"><i class="glyphicon glyphicon-print"></i></a>
                @include('usuarios.show_modal'){{-- Insertar codigo del Modal --}}
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
    $(document).ready(function () {
    $('#usuarios').dataTable({
        "fnInitComplete": function (oSettings, json) {
            $('#usuarios').show();
        }
    });
})
</script>

<!-- Incluir  Css contextMenu-->
{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}
<!-- Jquery menu contextual -->
<script type="text/javascript">
    $(function(){
    $('#usuarios').contextMenu({
        selector: 'tr',
        items: {
            "show": {name: "Mostrar", icon: "fa-eye",callback: function(){
                    var id=$(this).attr('id');
                    $('#showModal'+id).modal('show');
                }
            },
            "edit": {name: "Editar", icon: "edit",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('usuarios.edit', $usuario->id) }}"
                    var url = url.replace("{{$usuario->id}}",id);
                    window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "fa-trash",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar este usuario?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{{ route('usuarios.delete', $usuario->id) }}"
                        var url = url.replace("{{$usuario->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
            "sep1": "---------",
            "cuentas": {name: "Asignar Cuentas", icon: "fa-hdd-o",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('cuentas.create', $usuario->id) }}"
                    var url = url.replace("{{$usuario->id}}",id);
                    window.location.href = url; 
                }
            },
            "impresora": {name: "Asignar Impresora", icon: "fa-print",callback: function(){
                    var id=$(this).attr('id');
                    url="{{ route('impresoras.create', $usuario->id) }}"
                    var url = url.replace("{{$usuario->id}}",id);
                    window.location.href = url;            
                }
            },
        }
    });
});
</script>
@endpush


