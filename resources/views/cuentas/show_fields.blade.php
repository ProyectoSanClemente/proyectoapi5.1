
<div class="panel panel-default col-sm-8 col-sm-offset-2">
    <div align ="center" class="panel-heading">Información Cuentas: {{$cuenta->Usuario->accountname}}</div>
    
    <div class="panel-body">          
        <!-- Zimbra Id Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('id_zimbra', 'Zimbra Id:') !!}
            @if(empty($cuenta->id_zimbra))
                {!! Form::label('id_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('id_zimbra', $cuenta->id_zimbra) !!}
            @endif
        </div>

        <!-- Zimbra Pass Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('pass_zimbra', 'Zimbra Pass:') !!}
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
            {!! Form::label('id_sidam', 'Sidam Id:') !!}
            @if(empty($cuenta->id_sidam))
                {!! Form::label('id_sidam', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('id_sidam', $cuenta->id_sidam) !!}
            @endif
        </div>
        <!-- Sidam Pass Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('pass_sidam', 'Sidam Pass:') !!}
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
            {!! Form::label('id_crecic', 'Crecic Id:') !!}
            @if(empty($cuenta->id_crecic))
                {!! Form::label('id_crecic', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('id_crecic', $cuenta->id_crecic) !!}
            @endif
        </div>

        <!-- Crecic Pass Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('pass_crecic', 'Crecic Pass:') !!}
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
            {!! Form::label('id_owncloud', 'Nube Id:') !!}
            @if(empty($cuenta->id_owncloud))
                {!! Form::label('id_owncloud', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('id_owncloud', $cuenta->id_owncloud) !!}
            @endif
        </div>

        <!-- Nube Pass Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('pass_owncloud', 'Nube Pass:') !!}
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
            {!! Form::label('id_solicitudcompras', 'Solicitud Compras id: ') !!}
            @if(empty($cuenta->id_solicitudcompras))
                {!! Form::label('id_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('id_solicitudcompras', $cuenta->id_solicitudcompras) !!}
            @endif
        </div>

        <!-- Zimbra Pass Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('pass_solicitudcompras', 'Solicitud Compras Pass:') !!}
            @if(empty($cuenta->pass_solicitudcompras))
                {!! Form::label('pass_solicitudcompras', 'Sin Datos',['style'=>'color:red']) !!}
            @else
                {!! Form::label('pass_solicitudcompras',$cuenta->pass_solicitudcompras) !!}
            @endif
        </div>
    </div>
</div>
