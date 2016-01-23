<div class="panel panel-default">
    <div align ="center" class="panel-heading">Información</div>
        <div class="panel-body">
            <div class="form-group col-sm-6 col-lg-4"> 
                {!! Form::label('Accountname', 'Accountname:') !!}
                {!! Form::text('accountname',$cuenta->accountname, ['class' => 'form-control','readonly' => 'readonly']) !!}
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('id_sidam', 'Sidam Id:') !!}
                {!! Form::text('id_sidam', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Zimbra Pass Field -->
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('pass_sidam', 'Sidam Pass:') !!}
                {!! Form::text('pass_sidam',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Nube Id Field -->
            <div class="form-grouicp col-sm-6 col-lg-4">
                {!! Form::label('id_crecic', 'Crecic Id:') !!}
                {!! Form::text('id_crecic', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nube Pass Field -->
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('pass_crecic', 'Crecic Pass:') !!}
                {!! Form::text('pass_crecic',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <div class="form-grouicp col-sm-6 col-lg-4">
                {!! Form::label('id_zimbra', 'Zimbra Id:') !!}
                {!! Form::text('id_zimbra', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nube Pass Field -->
            <div class="form-group col-sm-6 col-lg-4">
                {!! Form::label('pass_zimbra', 'Zimbra Pass:') !!}
                {!! Form::text('pass_zimbra',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
</div>