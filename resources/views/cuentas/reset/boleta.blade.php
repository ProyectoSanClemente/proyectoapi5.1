@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		      <form method="post" id="boletas" class="KT_tngformerror" action="http://reset.sanclemente.cl/sistemas/boleta/index.php" style="display:none">
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr title="Debe colocar el usuario">
            <td class="KT_th"><label for="BoletaUser">Nombre cuenta:</label></td>
            <td><input type="text" name="BoletaUser" id="BoletaUser" value="{!!$user!!}" size="32" />
               </td>
          </tr>
          <tr title="Debe colocar su clave secreta">
            <td class="KT_th"><label for="BoletaPass">Contraseña:</label></td>
            <td><input type="password" name="BoletaPass" id="BoletaPass" value="{!!$pass!!}" size="32" />
               </td>
          </tr>
          <tr class="KT_buttons">
            <td colspan="2"><input type="submit" name="kt_login1" id="kt_login1" value="Iniciar Sesi&oacute;n" title="Presione aqu&iacute; para iniciar Sessi&oacute;n"/></td>
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