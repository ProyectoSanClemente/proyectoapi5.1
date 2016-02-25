@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<form method="post" name="form1" class="KT_tngformerror" action="http://reset.sanclemente.cl/sistemas/orden/garantia.php" style="display:none">
         <div style="font-size:24px"><img src="garantia.png" width="250" height="95" alt="Boleta de Garant&iacute;a"></div>
         <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr title="Debe colocar el usuario">
            <td class="KT_th"><label for="kt_login_user">Usuario:</label></td>
            <td><div align="left">
              <input type="text" name="kt_login_user" id="kt_login_user" value="{!!$user!!}" size="25" />
                </div></td>
          </tr>
          <tr title="Debe colocar su clave secreta">
            <td class="KT_th"><label for="kt_login_password">Contrase&ntilde;a:</label></td>
            <td><div align="left">
              <input type="password" name="kt_login_password" id="kt_login_password" value="{!!$pass!!}" size="25" />
                </div></td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Iniciar Sessi&oacute;n" title="Presione aqu&iacute; para iniciar Sessi&oacute;n" />            </td>
          </tr>
        </table>
      </form>
    </div>


		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#kt_login1').click();
});

</script>
@endpush