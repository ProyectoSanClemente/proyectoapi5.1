<div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default" style="height:auto">
        <div align ="center" class="panel-heading clearfix">
        <h4 class="panel-title pull-center">Cuentas de: {{$usuario->accountname}} </h4></div>        
        <div class="panel-body">
            
            {!! Form::hidden('id_usuario',$usuario->id) !!}
            
            <!-- Zimbra Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_zimbra', 'Zimbra Usuario') !!}
                {!! Form::text('id_zimbra', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Zimbra Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_zimbra', 'Zimbra Contraseña') !!}
                {!! Form::text('pass_zimbra',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">
             <!-- Sidam Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_sidam', 'Sidam Usuario') !!}
            	{!! Form::text('id_sidam', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Sidam Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_sidam', 'Sidam Contraseña') !!}
            	{!! Form::text('pass_sidam',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Crecic Id Field -->
            <div class="form-grouicp col-sm-6">
                {!! Form::label('id_crecic', 'Crecic Usuario') !!}
            	{!! Form::text('id_crecic', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Crecic Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_crecic', 'Crecic Contraseña') !!}
            	{!! Form::text('pass_crecic',null,['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="panel-body">
            <!-- Nube Id Field -->
            <div class="form-grouicp col-sm-6">
                {!! Form::label('id_owncloud', 'Nube Usuario') !!}
                {!! Form::text('id_owncloud', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Nube Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_owncloud', 'Nube Contraseña') !!}
                {!! Form::text('pass_owncloud',null,['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Solicitud Compras Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_solicitudcompras', 'Solicitud Compras Usuario') !!}
                {!! Form::text('id_solicitudcompras', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Solicitid Compas Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_solicitudcompras', 'Solicitud Compras Contraseña') !!}
                {!! Form::text('pass_solicitudcompras',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Boleta Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_boleta', 'Boleta Usuario') !!}
                {!! Form::text('id_boleta', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Boleta Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_boleta', 'Boleta Contraseña') !!}
                {!! Form::text('pass_boleta',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Garantia Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_garantia', 'Garantia Usuario') !!}
                {!! Form::text('id_garantia', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Garantia Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_garantia', 'Garantia Contraseña') !!}
                {!! Form::text('pass_garantia',null, ['class' => 'form-control']) !!}
            </div>
        </div>                

        <div class="panel-body">          
            <!-- Bodega Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_bodega', 'Bodega Usuario') !!}
                {!! Form::text('id_bodega', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Bodega Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_bodega', 'Bodega Contraseña') !!}
                {!! Form::text('pass_bodega',null, ['class' => 'form-control']) !!}
            </div>
        </div>        

        <div class="panel-body">          
            <!-- Social Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_social', 'Social Usuario') !!}
                {!! Form::text('id_social', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Social Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_social', 'Social Contraseña') !!}
                {!! Form::text('pass_social',null, ['class' => 'form-control']) !!}
            </div>
        </div>        

        <div class="panel-body">          
            <!-- Plan Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_plan', 'Plan Usuario') !!}
                {!! Form::text('id_plan', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Plan Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_plan', 'Plan Contraseña') !!}
                {!! Form::text('pass_plan',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Process Maker Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_processmaker', 'ProcessMaker Usuario') !!}
                {!! Form::text('id_processmaker', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Process Maker Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_processmaker', 'ProcessMaker Contraseña') !!}
                {!! Form::text('pass_processmaker',null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="panel-body">          
            <!-- Glpi Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_glpi', 'Glpi Usuario') !!}
                {!! Form::text('id_glpi', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Glpi Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_glpi', 'Glpi Contraseña') !!}
                {!! Form::text('pass_glpi',null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="panel-body">
            <!-- Submit Field -->
            <div class="form-group pull-right">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
</div>
</div>
