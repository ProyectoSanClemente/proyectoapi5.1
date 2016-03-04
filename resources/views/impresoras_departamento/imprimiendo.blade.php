<div class="container spark-screen">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div align ="center" class="panel-heading">Impresoras Asignadas al Departamento</div>
                <div class="panel-body">		<!-- Submit Field -->
			    	@foreach($asignaciones as $asignacion)
							<div style="font-weight:bold">
						  		{!!Form::radio("modelo_impresora",$asignacion->Impresora->modelo_impresora,null)!!}
						  		{!!$asignacion->Impresora->modelo_impresora !!}
						  	</div>	
					@endforeach
					<hr>
					    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
				</div>
		</div>
	</div>
	</div>
</div>