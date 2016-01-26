<div class="container spark-screen">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div align ="center" class="panel-heading">Test</div>
                <div class="panel-body">		<!-- Submit Field -->
							<div style="font-weight:bold">
								{!!Form::hidden('noAUTO','1')!!}
						  		{!!Form::hidden('login_name',$info->id_sidam)!!}
						  		{!!Form::hidden('login_password',$info->pass_sidam)!!}
						  	</div>	
					<hr>
					    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
				</div>
		</div>
	</div>
</div>