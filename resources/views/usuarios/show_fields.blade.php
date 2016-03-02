<div class="form-group">
    {!! Form::label('accountname', 'Cuenta:') !!}
    {!! $usuario->accountname !!}
</div>

<!-- Rut Field -->
<div class="form-group">
    {!! Form::label('rut', 'Rut:') !!}
    {!! $usuario->rut !!}
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! $usuario->nombre !!}
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! $usuario->apellido !!}
</div>

<!-- Correo Field -->
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
@if($usuario->hasCuenta())
    @if(!empty($$usuario->Cuenta->id_zimbra))
            {!! Form::label('id_zimbra', $usuario->Cuenta->id_zimbra) !!}
    @else
            {!! Form::label('id_zimbra', 'Sin Datos',['style'=>'color:red']) !!}
    @endif
@else
    {!! Form::label('id_zimbra', 'Sin Datos',['style'=>'color:red']) !!}
@endif
</div>