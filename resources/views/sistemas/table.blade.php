<table id="sistemastable" class="table">
    <thead>
        <th>Nombre Sistema</th>
        <th>Imagen Sistema</th>
        <th>Controlador</th>
        <th>Funcion</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>    
    @foreach($sistemas as $sistema)
        <tr>
            <td>{!! $sistema->nombre_sistema !!}</td>
            <td>{!! $sistema->imagen_sistema !!}</td>
            <td>{!! $sistema->controlador !!}</td>
            <td>{!! $sistema->funcion !!}</td>
            <td>
                <a href="{!! route('sistemas.edit', [$sistema->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('sistemas.delete', [$sistema->id]) !!}" onclick="return confirm('Are you sure wants to delete this Sistema?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#sistemastable').DataTable();
    } );
</script>
@endpush