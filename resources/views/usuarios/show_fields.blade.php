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

<!-- email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! $usuario->email !!}
</div>