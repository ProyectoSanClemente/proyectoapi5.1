<!-- Usuario Id Field -->
<div class="form-group">
    {!! Form::label('usuario_id', 'Usuario Id:') !!}
    <p>{!! $cuenta->id !!}</p>
</div>

<!-- Zimbra Id Field -->
<div class="form-group">
    {!! Form::label('zimbra_id', 'Zimbra Id:') !!}
    <p>{!! $cuenta->zimbra_id !!}</p>
</div>

<!-- Zimbra Pass Field -->
<div class="form-group">
    {!! Form::label('zimbra_pass', 'Zimbra Pass:') !!}
    <p>{!! $cuenta->zimbra_pass !!}</p>
</div>

<!-- Nube Id Field -->
<div class="form-group">
    {!! Form::label('nube_id', 'Nube Id:') !!}
    <p>{!! $cuenta->nube_id !!}</p>
</div>

<!-- Nube Pass Field -->
<div class="form-group">
    {!! Form::label('nube_pass', 'Nube Pass:') !!}
    <p>{!! $cuenta->nube_pass !!}</p>
</div>

