<table id="usuarios" class="table table-responsive">
    <thead>
        <th>AccountName</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
    <th width="120px">Acciones</th>
</thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr id="{{$usuario->id}}">
            <td>{!! $usuario->accountname !!}</td>
            <td>{!! $usuario->nombre !!}</td>
            <td>{!! $usuario->apellido !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>
                <a href='#' data-toggle="modal" data-toggle="modal" data-target="#showModal{{$usuario->id}}" lda><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('usuarios.edit', [$usuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuarios.delete', [$usuario->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar este usuario?')"><i class="glyphicon glyphicon-trash"></i></a>
                <a href="{{ URL::to('cuentas/' .$usuario->accountname.'/create') }}"><i class="glyphicon glyphicon-hdd"></i></a>
                <a href="{{ URL::to('impresoras/' .$usuario->accountname.'/create') }}"><i class="glyphicon glyphicon-print"></i></a>
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
    $(document).ready(function() {
        $('#usuarios').DataTable();
    } );
</script>

{!! HTML::script('js/jQuery-contextMenu/jquery.contextMenu.js')!!}


<script type="text/javascript">
    $(function(){
    $('#usuarios').contextMenu({
        selector: 'tr',
        items: {
            "show": {name: "Mostrar", icon: "show",callback: function(){
                    var id=$(this).attr('id');
                    $('#showModal'+id).modal('show');
                }
            },
            "edit": {name: "Editar", icon: "edit",callback: function(){
                var id=$(this).attr('id');
                url="{!! route('usuarios.edit', $usuario->id) !!}"
                var url = url.replace("{{$usuario->id}}",id);
                window.location.href = url;            
                }
            },
            "delete": {name: "Eliminar", icon: "delete",callback: function(){
                    var answer=confirm('Estas seguro que deseas eliminar este usuario?');
                    if(answer){
                        var id=$(this).attr('id');
                        url="{!! route('usuarios.delete', $usuario->id) !!}"
                        var url = url.replace("{{$usuario->id}}",id);
                        window.location.href = url;        
                    }
                }
            },
            "sep1": "---------",
            "cuentas": {name: "Asignar Cuentas", icon: "delete",callback: function(){
                    alert('falta agregar redirección'+' 1');
                }
            },
            "impresora": {name: "Asignar Impresora", icon: "delete",callback: function(){
                    alert('falta agregar redirección'+' 2');
                }
            },
        }
    });
});
</script>
@endpush


