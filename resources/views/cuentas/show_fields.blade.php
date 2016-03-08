<div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default" style="height:auto">
        <div align ="center" class="panel-heading clearfix">
        <h4 class="panel-title pull-center">Información Cuentas: {{$cuenta->Usuario->accountname}}</h4></div>
        
        <div class="panel-body">          
            <!-- Zimbra Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_zimbra', 'Zimbra Usuario:') !!}
                @if(empty($cuenta->id_zimbra))
                    {!! Form::label('id_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_zimbra', $cuenta->id_zimbra) !!}
                @endif
            </div>

            <!-- Zimbra Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_zimbra', 'Zimbra Contraseña:') !!}
                @if(empty($cuenta->pass_zimbra))
                    {!! Form::label('pass_zimbra', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_zimbra', $cuenta->pass_zimbra) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">
             <!-- Sidam Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_sidam', 'Sidam Usuario:') !!}
                @if(empty($cuenta->id_sidam))
                    {!! Form::label('id_sidam', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_sidam', $cuenta->id_sidam) !!}
                @endif
            </div>
            <!-- Sidam Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_sidam', 'Sidam Contraseña:') !!}
                @if(empty($cuenta->pass_sidam))
                    {!! Form::label('pass_sidam', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_sidam',$cuenta->pass_sidam) !!}
                @endif
            </div>
        </div>
        <div class="panel-body">
            <!-- Crecic Id Field -->
            <div class="form-grouicp col-sm-6">
                {!! Form::label('id_crecic', 'Crecic Usuario:') !!}
                @if(empty($cuenta->id_crecic))
                    {!! Form::label('id_crecic', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_crecic', $cuenta->id_crecic) !!}
                @endif
            </div>

            <!-- Crecic Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_crecic', 'Crecic Contraseña:') !!}
                @if(empty($cuenta->pass_crecic))
                    {!! Form::label('pass_crecic', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_crecic',$cuenta->pass_crecic) !!}
                @endif
            </div>
        </div>
        <div class="panel-body">
            <!-- Nube Id Field -->
            <div class="form-grouicp col-sm-6">
                {!! Form::label('id_owncloud', 'Nube Usuario:') !!}
                @if(empty($cuenta->id_owncloud))
                    {!! Form::label('id_owncloud', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_owncloud', $cuenta->id_owncloud) !!}
                @endif
            </div>

            <!-- Nube Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_owncloud', 'Nube Contraseña:') !!}
                @if(empty($cuenta->pass_owncloud))
                    {!! Form::label('pass_owncloud', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_owncloud',$cuenta->pass_owncloud) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">          
            <!-- Solicitud Compras Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_solicitudcompras', 'Solicitud Compras Usuario: ') !!}
                @if(empty($cuenta->id_solicitudcompras))
                    {!! Form::label('id_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_solicitudcompras', $cuenta->id_solicitudcompras) !!}
                @endif
            </div>

            <!-- Solicitud Compras Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_solicitudcompras', 'Solicitud Compras Contraseña:') !!}
                @if(empty($cuenta->pass_solicitudcompras))
                    {!! Form::label('pass_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_solicitudcompras',$cuenta->pass_solicitudcompras) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">          
            <!-- Boleta Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_boleta', 'Boleta Usuario: ') !!}
                @if(empty($cuenta->id_boleta))
                    {!! Form::label('id_boleta', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_boleta', $cuenta->id_boleta) !!}
                @endif
            </div>

            <!-- Boleta Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_boleta', 'Boleta Contraseña:') !!}
                @if(empty($cuenta->pass_boleta))
                    {!! Form::label('pass_boleta', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_boleta',$cuenta->pass_boleta) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">          
            <!-- Garantia Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_garantia', 'Garantia Usuario: ') !!}
                @if(empty($cuenta->id_garantia))
                    {!! Form::label('id_garantia', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_garantia', $cuenta->id_garantia) !!}
                @endif
            </div>

            <!-- Garantia Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_garantia', 'Garantia Contraseña:') !!}
                @if(empty($cuenta->pass_garantia))
                    {!! Form::label('pass_garantia', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_garantia',$cuenta->pass_garantia) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">          
            <!-- Plan Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_plan', 'Plan Usuario: ') !!}
                @if(empty($cuenta->id_plan))
                    {!! Form::label('id_plan', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_plan', $cuenta->id_plan) !!}
                @endif
            </div>

            <!-- Plan Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_plan', 'Plan Contraseña:') !!}
                @if(empty($cuenta->pass_plan))
                    {!! Form::label('pass_plan', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_plan',$cuenta->pass_plan) !!}
                @endif
            </div>


        </div>

        <div class="panel-body">          
            <!-- Process Maker Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_processmaker', 'ProcessMaker Usuario: ') !!}
                @if(empty($cuenta->id_processmaker))
                    {!! Form::label('id_processmaker', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_processmaker', $cuenta->id_processmaker) !!}
                @endif
            </div>

            <!-- ProcessMaker Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_processmaker', 'ProcessMaker Contraseña:') !!}
                @if(empty($cuenta->pass_processmaker))
                    {!! Form::label('pass_processmaker', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_processmaker',$cuenta->pass_processmaker) !!}
                @endif
            </div>
        </div>

        <div class="panel-body">          
            <!-- Glpi Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('id_glpi', 'Glpi Usuario: ') !!}
                @if(empty($cuenta->id_glpi))
                    {!! Form::label('id_glpi', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('id_glpi', $cuenta->id_glpi) !!}
                @endif
            </div>

            <!-- Glpi Pass Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pass_glpi', 'Glpi Contraseña:') !!}
                @if(empty($cuenta->pass_glpi))
                    {!! Form::label('pass_glpi', 'Sin Datos',['style'=>'color:red']) !!}
                @else
                    {!! Form::label('pass_glpi',$cuenta->pass_glpi) !!}
                @endif
            </div>
        </div>

    </div>
</div>