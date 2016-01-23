<script type="text/javascript">
    $(document).ready(function() {
        $('#usuarios').DataTable();
    } );
</script>

<table id="usuarios" class="table">
    <thead>
        <th>AccountName</th>
        <th>DisplayName</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
    <th width="120px">Acciones</th>
</thead>
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{!! $usuario->accountname !!}</td>
            <td>{!! $usuario->displayname !!}</td>
            <td>{!! $usuario->nombre !!}</td>
            <td>{!! $usuario->apellido !!}</td>
            <td>{!! $usuario->email !!}</td>
            <td>
                <a href='#' data-toggle="modal" data-toggle="modal" data-target="#showModal{{$usuario->id}}" lda><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('usuarios.edit', [$usuario->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('usuarios.delete', [$usuario->id]) !!}" onclick="return confirm('Estas seguro que deseas eliminar este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
                <a href="{{ URL::to('cuentas/' .$usuario->accountname.'/create') }}"><i class="glyphicon glyphicon-hdd"></i></a>
                <a href="{{ URL::to('impresoras/' .$usuario->accountname.'/create') }}"><i class="glyphicon glyphicon-print"></i></a>
                @include('usuarios.show_modal'){{-- Insertar codigo del Modal --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>