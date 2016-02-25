@extends('layouts.app')

@section('content')
<div class="container">
	@include('common.errors')
	<form method="post" id="solicitudcompras" name="form1" class="KT_tngformerror" action="http://reset.sanclemente.cl/sistemas/orden/index.php" style="display:none">
    	<em><img src="images/Logo-solicitud.jpg" width="297" height="58" alt="Solicitud de Compra"></em>

	    <table cellpadding="2" cellspacing="0" class="KT_tngtable" kt_checkboxes_attached="true" kt_uni_attached="true">
		    <tbody>
			    <tr>
			    	<td class="KT_th"><label for="kt_login_user">Usuario:<span classname="KT_required" class="KT_required">*</span></label></td>
			    	<td>

			    	<div align="left">
			        	<input type="text" name="kt_login_user" id="kt_login_user" value="{{$user}}" size="25">
			    	</div>
			    </td>
			    </tr>
			    <tr>
			    	<td class="KT_th"><label for="kt_login_password">Contraseña:<span classname="KT_required" class="KT_required">*</span></label>
			    	</td>
			    	<td>
			    		<div align="left">
			        		<input type="password" name="kt_login_password" id="kt_login_password" value="{{$pass}}" size="25">
			    		</div>
			    	</td>
			    </tr>
			    <tr class="KT_buttons">
			        <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Entrar">
			        </td>
			    </tr>
		    </tbody>
		</table>
    </form>
	<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
	</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#kt_login1').click();
});
</script>
@endpush
