<div class="form-group">
    {!! Form::label('accountname', 'Cuenta:') !!}
    {!! Auth::user()->accountname !!}
</div>

<!-- Rut Field -->
<div class="form-group">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Auth::user()->rut !!}
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Auth::user()->nombre !!}
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Auth::user()->apellido !!}
</div>

<!-- email Field -->
<div class="form-group">
    {!! Form::label('email', 'Correo:') !!}
    {!! Auth::user()->email !!}
</div>
<div align="center">
{!! HTML::image(Auth::user()->imagen,null,["class"=>"img-circle",'width'=>'165px'])!!}
</div>