<div class="container spark-screen">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div align ="center" class="panel-heading">Test</div>
                <div class="panel-body">		<!-- Submit Field -->
							<div style="font-weight:bold">
								{!!Form::hidden('noAUTO','1')!!}
								{!!Form::hidden('_glpi_csrf_token','84a3b8930ee769cd997f1a029214fbfa')!!}
						  		{!!Form::input('text','login_name','User2',['id'=>'login_name', 'required'=> 'required','class'=>'loginformw'])!!}
						  		{!!Form::input('password','login_password','Diciembre2016',['id'=>'login_password', 'required'=> 'required','class'=> 'loginformw'])!!}
						  	</div>	
					<hr>
					    {!! Form::submit('Aceptar', ['class' => 'btn btn-primary submit','name'=>'submit']) !!}
				</div>
		</div>
	</div>
</div>