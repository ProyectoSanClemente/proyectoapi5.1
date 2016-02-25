@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<form method="post" id="form1" class="KT_tngformerror" action="http://reset.sanclemente.cl/sistemas/bodega/index.php" style="display:none">
  <table cellpadding="2" cellspacing="0" class="KT_tngtable">
    <tr>
      <td class="KT_th"><label for="kt_login_user">Usuario:</label></td>
      <td><input type="text" name="kt_login_user" id="kt_login_user" value="" size="32" />
         </td>
    </tr>
    <tr>
      <td class="KT_th"><label for="kt_login_password">Contraseña:</label></td>
      <td><input type="password" name="kt_login_password" id="kt_login_password" value="" size="32" />
         </td>
    </tr>
    <tr class="KT_buttons">
      <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Entrar" /></td>
    </tr>
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