@if(!empty($cuenta))
	<a class="btn btn-primary pull-right" href="{{ route('cuentas.edit',[$cuenta->id]) }}"><i class="glyphicon glyphicon-hdd"></i>Editar Cuenta</a>
		
			 @include('cuentas.show_fields')
		
@else	
	<a class="btn btn-primary pull-right" href="{{ route('cuentas.create',[Auth::id()]) }}"><i class="glyphicon glyphicon-hdd"></i> Añadir Cuentas</a>

	<h4>El Usuario no posee Cuentas asignadas</h4>

@endif