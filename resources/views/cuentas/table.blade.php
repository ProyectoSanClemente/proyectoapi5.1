<script type="text/javascript">
    $(document).ready(function() {
        $('#cuentastable').DataTable();
    } );
</script>
<table id="cuentastable"  class="table">
    <thead>
            <th>Accountname</th>
			<th>Id Sidam</th>
			<th>Pass Sidam</th>
			<th>Id Crecic</th>
			<th>Pass Crecic</th>
            <th>Id Zimbra</th>
            <th>Pass Zimbra</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($cuentas as $cuenta)
        <tr>
            <td>{!! $cuenta->accountname!!}</td>
			<td>{!! $cuenta->id_sidam !!}</td>
			<td>{!! $cuenta->pass_sidam !!}</td>
			<td>{!! $cuenta->id_crecic !!}</td>
			<td>{!! $cuenta->pass_crecic !!}</td>
            <td>{!! $cuenta->id_zimbra !!}</td>
            <td>{!! $cuenta->pass_zimbra !!}</td>
            <td>
                <a href="{!! route('cuentas.edit', [$cuenta->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('cuentas.delete', [$cuenta->id]) !!}" onclick="return confirm('Are you sure wants to delete this Cuenta?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>