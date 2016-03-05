<!-- Departamento Select -->
<div class="form-group">                           
    {!! Form::label('id_departamento', 'Departamento:',['class'=>"col-md-4 control-label"]) !!}
    <div class="col-md-6">
        {!! Form::select('id_departamento', $departamentos,null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">                           
    {!! Form::label('id_impresora', 'Impresoras:',['class'=>"col-md-4 control-label"]) !!}
    <div class="col-md-6">
        {!! Form::select('id_impresora', $impresoras,null,['class'=>'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>