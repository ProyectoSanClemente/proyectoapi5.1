<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">
            <div class="panel-heading">
                <a href="{!! route("cuentas.zimbra", [$cuenta->id]) !!}" target="_blank" class="btn btn-block btn-lg btn-default"> Redactar Nuevo Correo</a>
            </div>

            <div class="list-group">
                <a href="{{ url('emails/inbox') }}" class="list-group-item"><i class="glyphicon glyphicon-inbox"></i> Bandeja de Entrada</a>
                 <a href="{{ url('emails/unseen') }}" class="list-group-item"><i class="glyphicon glyphicon-envelope"></i> No vistos<span class="badge">{{$inboxunread}}</span></a>
                <a href="{{ url('emails/sent') }}" class="list-group-item"><i class="glyphicon glyphicon-send"></i> Enviados<span class="badge"></span></a>
               
            </div>
        </section>
    </div>  
</div>