
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Accountname', 'Accountname:') !!}
	{!! Form::text('accountname',$id, ['class' => 'form-control','readonly' => 'readonly']) !!}
</div>
<!-- Modelo Impresora Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('modelo_impresora', 'Modelo Impresora:') !!}
	{!! Form::text('modelo_impresora', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
