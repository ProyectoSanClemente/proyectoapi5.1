@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

    <div class="col-lg-3">  
        @include('emails.sidebar')
      </div>
       <div class="col-lg-9">     
			<section class="panel panel-default mail-container">
				<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Vista correo</strong></div>
				<div class="panel-body">
                    <div class="mail-header row">
						<div class="col-md-4 col-md-offset-8">
							<div class="pull-right">
								<a href="#/mail/compose" class="btn btn-sm btn-default">Responder <i class="fa fa-mail-reply"></i></a>
								<a href="javascript:;" class="btn btn-sm btn-default"><i class="fa fa-print"></i></a>
								<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i></a>
							</div>
						</div>
					</div>
                
					<div class="mail-header row">
						<div class="col-md-12">
							<h3>{{$mail->subject}}</h3>
						</div>
					</div>
                    
					<div class="mail-info">
						<div class="row">
							<div class="col-md-12">
                                <ul class="list-unstyled list-inline">
                                    <li><i class="fa fa-calendar-o"></i>Fecha: {{$mail->date}}</li>
                                    <li><i class="fa fa-user"></i>De: {{$mail->fromName}}</li>
                                     <li><i class="fa fa-users">Para:</i>
                                    @foreach ($mail->to as $element)
                                    	{{$element}}
                                    @endforeach
                                    </li>                                    
                                </ul>
							</div>
						</div>
					</div>
                    
					<div class="mail-content">
						{{--*/ print(nl2br($mail->textPlain)) /*--}} {{-- Imprime el mail --}}
					</div>
					{{--*/  $archivos=$mail->getAttachments() /*--}} {{-- Se asignan los attachments--}}
					@if(!empty($archivos))
						<div class="mail-attachments">
							<p><i class="fa fa-paperclip"></i> {{count($archivos)}} | <a href="javascript:;">Descargar</a></p>
							<ul class="list-unstyled">
								@foreach ($archivoss as $archivo)
									<li><a>{{ $archivo->name }}</a></li>
								@endforeach
							</ul>							 
						</div>
					@endif
					
					<div class="mail-actions">
                    <a href="#/mail/compose" class="btn btn-sm btn-default">Responder <i class="fa fa-mail-reply"></i></a>	
                    	<ul class="list-unstyled list-inline">
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
						</ul>
                    </div>			
				</div>
			</section>
		</div>
	</div>
</div>
		
@endsection
