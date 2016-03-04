<div class="container spark-screen">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div align ="center" class="panel-heading">Impresoras</div>
                <div class="panel-body">		<!-- Submit Field -->
			    	@foreach($impresoras as $impresora)
							<div style="font-weight:bold">
						  		{!!Form::radio("modelo",$listaimpresoras[$impresora->modelo_impresora],NULL)!!}
						  		{!!$listaimpresoras[$impresora->modelo_impresora] !!}
						  	</div>	
					@endforeach
					<hr>
					    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
				</div>
		</div>
	</div>
	</div>
</div>