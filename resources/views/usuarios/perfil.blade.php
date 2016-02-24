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
@if($usuario->hasCuenta())
<div class="form-group">
    {!! Form::label('correo', 'Correo:') !!}
    {!! $usuario->Cuenta->id_zimbra.'@sanclemente.cl'!!}

</div>
@endif
<div align="center">
{!! HTML::image(Auth::user()->imagen,null,["class"=>"img-circle",'width'=>'165px'])!!}
</div>