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
@if($usuario->hasCuenta())
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    {!! $usuario->Cuenta->id_zimbra !!}

</div>
@endif