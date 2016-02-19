@if(!empty($cuenta))
	<a class="btn btn-primary pull-right" href="{{ route('cuentas.edit',[$cuenta->Usuario->id]) }}"><i class="glyphicon glyphicon-hdd"></i>Editar Cuenta</a>
		{!! $cuenta->id_zimbra!!}
		{!! $cuenta->pass_zimbra!!}
@else	
	<a class="btn btn-primary pull-right" href="{{ route('cuentas.create',[Auth::id()]) }}"><i class="glyphicon glyphicon-hdd"></i>Añadir Cuenta</a>
	No hay Cuentas asignadas
@endif