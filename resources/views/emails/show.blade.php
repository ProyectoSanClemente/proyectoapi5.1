@extends('layouts.app')

@section('content')

<div class="container">
	{!!Breadcrumbs::render('emailsshow')!!}
    <div class="row">
    	<div class="col-md-3">  
        	@include('emails.sidebar')
		</div>
       	<div class="col-md-9">     
			<section class="panel panel-default mail-container">
				<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Vista correo</strong></div>
				<div class="panel-body">
                    <div class="mail-header row">
						<div class="col-md-4 col-md-offset-8">
							<div class="pull-right">
								<a href="http://sanclemente.cl/correo" target="_blank" class="btn btn-sm btn-default">Responder <i class="fa fa-mail-reply"></i></a>
								<a onclick="printDiv()" class="btn btn-sm btn-default"><i class="fa fa-print"></i></a>
							</div>
						</div>
					</div>
                	<div id="printableArea">{{-- Inicia el Area imprimible --}}
						<div class="mail-header row">
							<div class="col-md-12">
								<h3>{{$mail->subject}}</h3>
							</div>
						</div>
	                    
						<div class="mail-info">
							<div class="row">
								<div class="col-md-12">
	                                <ul class="list-unstyled list-inline">
	                                    <li><i class="fa fa-calendar-o"></i> Fecha: {{$mail->date}}</li>
	                                    <li><i class="fa fa-user"></i> De: {{$mail->from}}</li>
	                                     <li><i class="fa fa-users"></i> Para:
	                                    	{!!implode(',',$mail->to) !!}
	                                    </li>                                    
	                                </ul>
								</div>
							</div>
						</div>
	                    
						<div class="mail-content">
							{!! $mail->textPlain !!} {{-- Imprime el contenido del mail --}}
						</div>
						<!-- 
						@if(!empty($Attachments))
						<hr>
							<div class="mail-attachments">
								<p>{!!count($Attachments)!!} Archivo/s Adjunto/s</p>
								<ul class="list-unstyled">
									@foreach ($Attachments as $attachment)
										<li><i class="fa fa-paperclip"></i><a href="{{URL::to($attachment->route)}}" target="_blank" download="{{$attachment->name}}">{!! $attachment->name !!}</a></li>
									@endforeach
								</ul>							 
							</div>
						@endif -->
					</div>{{-- Termina el Area Imprimible --}}
				</div>
			</section>
		</div>
	</div>
</div>		
@endsection

@push('scripts')
<script type="text/javascript">
	function printDiv() {
	     var printContents = document.getElementById('printableArea').innerHTML;
	     var originalContents = document.body.innerHTML;
	     document.body.innerHTML = printContents;
	     window.print();
	     document.body.innerHTML = originalContents;
	}
</script>
@endpush