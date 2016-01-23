<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">
            <div class="panel-heading">
                <a href="http://sanclemente.cl/correo" class="btn btn-block btn-lg btn-default"> Redactar Nuevo Correo</a>
            </div>

            <div class="list-group">
                <a href="{{ route('emails.index') }}" class="list-group-item"><i class="glyphicon glyphicon-inbox"></i> Bandeja de Entrada <span class="badge">{{$mailboxmsginfo->Nmsgs}}</span></a>
                <a href="{{ route('emails.unseen') }}" class="list-group-item"><i class="fa fa-envelope-o"></i> No vistos <span class="badge">{{$mailboxmsginfo->Unread}}</span></a>
            </div>
        </section>
    </div>  
</div>