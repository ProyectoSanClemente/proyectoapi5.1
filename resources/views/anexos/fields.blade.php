<!-- Nombre anexo Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('nombre', 'Nombre anexo:') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<!-- Numero Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('numero', 'Numero:') !!}
	{!! Form::text('numero', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>