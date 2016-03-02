
<div class="panel panel-default">
    <div align ="center" class="panel-heading">Información</div>
        <div class="panel-body">
            <!-- Accountname Usuario Field -->
            <div class="form-group col-sm-6 col-sm-4"> 
                {!! Form::label('Accountname', 'Cuenta Usuario:') !!}
                {!! Form::text('accountname',$usuario->accountname, ['class' => 'form-control','readonly' => 'readonly']) !!}
            </div>
            <!-- ID usuario Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_usuario', 'ID Usuario:') !!}
                {!! Form::text('id_usuario',$usuario->id, ['class' => 'form-control','readonly' => 'readonly']) !!}
            </div>
        </div>
        
        <div class="panel-body">          
            <!-- Zimbra Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_zimbra', 'Zimbra Id:') !!}
                {!! Form::text('id_zimbra', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Zimbra Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_zimbra', 'Zimbra Pass:') !!}
                {!! Form::text('pass_zimbra',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">
             <!-- Sidam Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_sidam', 'Sidam Id:') !!}
            	{!! Form::text('id_sidam', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Sidam Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_sidam', 'Sidam Pass:') !!}
            	{!! Form::text('pass_sidam',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Crecic Id Field -->
            <div class="form-grouicp col-sm-6 col-sm-4">
                {!! Form::label('id_crecic', 'Crecic Id:') !!}
            	{!! Form::text('id_crecic', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Crecic Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_crecic', 'Crecic Pass:') !!}
            	{!! Form::text('pass_crecic',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Nube Id Field -->
            <div class="form-grouicp col-sm-6 col-sm-4">
                {!! Form::label('id_owncloud', 'Nube Id:') !!}
                {!! Form::text('id_owncloud', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nube Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_owncloud', 'Nube Pass:') !!}
                {!! Form::text('pass_owncloud',null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Solicitud Compras Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_solicitudcompras', 'Solicitud Compras id') !!}
                {!! Form::text('id_solicitudcompras', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Solicitid Compas Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_solicitudcompras', 'Solicitud Compras Pass:') !!}
                {!! Form::text('pass_solicitudcompras',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Boleta Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_boleta', 'Boleta id') !!}
                {!! Form::text('id_boleta', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Boleta Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_boleta', 'Boleta Pass:') !!}
                {!! Form::text('pass_boleta',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Garantia Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_garantia', 'Garantia id') !!}
                {!! Form::text('id_garantia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Garantia Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_garantia', 'Garantia Pass:') !!}
                {!! Form::text('pass_garantia',null, ['class' => 'form-control']) !!}
            </div>
        </div>                

        <div class="panel-body">          
            <!-- Bodega Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_bodega', 'Bodega id') !!}
                {!! Form::text('id_bodega', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Bodega Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_bodega', 'Bodega Pass:') !!}
                {!! Form::text('pass_bodega',null, ['class' => 'form-control']) !!}
            </div>
        </div>        

        <div class="panel-body">          
            <!-- Social Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_social', 'Social id') !!}
                {!! Form::text('id_social', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Social Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_social', 'Social Pass:') !!}
                {!! Form::text('pass_social',null, ['class' => 'form-control']) !!}
            </div>
        </div>        

        <div class="panel-body">          
            <!-- Plan Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_plan', 'Plan id') !!}
                {!! Form::text('id_plan', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Plan Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_plan', 'Plan Pass:') !!}
                {!! Form::text('pass_plan',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Process Maker Id Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('id_processmaker', 'ProcessMaker id') !!}
                {!! Form::text('id_processmaker', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Process Maker Pass Field -->
            <div class="form-group col-sm-6 col-sm-4">
                {!! Form::label('pass_processmaker', 'ProcessMaker Pass:') !!}
                {!! Form::text('pass_processmaker',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="panel-body">
            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
</div>
