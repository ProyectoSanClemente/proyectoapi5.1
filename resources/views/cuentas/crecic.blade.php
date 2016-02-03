@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

</div>
@endsection

<script type="text/javascript">

$(document).ready(function() {

	$('.error').hide();


		//Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
		var dataString = 'TxtUser=' + 'hola' + 'TxtPass=' + 'paasdad';

		$.ajax({
			type: "POST",
			url: "http://sanclemente.crecic.cl/login.php",
			data: dataString,
			success: function() {
		    	$('#TxtUser').val("aasd");
		        $('#message').html("<h2>Tus datos han sido guardados correctamente!</h2>")
		        .hide()
		        .fadeIn(1500, function() {
					$('#message').append("<a href='index.php?action=see'>Ver usuarios registrados</a>");
		        });
		    }
		});
		return false;
	});
});

runOnLoad(function(){
	$("input#name").select().focus();
});
</script>