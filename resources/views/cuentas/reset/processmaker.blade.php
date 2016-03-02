@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
<form accept-charset="UTF-8" role="form" class="form-signin"
  id="bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___" name="login" action="http://www.sanclemente.cl:891//sysworkflow/es/neoclassic/login/authentication.php" method="post" encType="multipart/form-data">

    <div style="display: none;"> <input  class="module_app_input___gray" id="form[USR_PASSWORD]" name="form[USR_PASSWORD]" type="text" size="30" maxlength="32" autocomplete="off" value="{!!$pass!!}" style="" onkeypress=""   pmfieldtype="text" pm:decimal_separator="." /></div>
    <fieldset>
      <label class="panel-login">
        <div class="login_result"></div>
      </label>
      <input  class="module_app_input___gray" id="form[USR_USERNAME]" name="form[USR_USERNAME]" type="text" size="30" maxlength="50" autocomplete="off" value="{!!$user!!}" style="" onkeypress=""   pmfieldtype="text" pm:decimal_separator="." />
      <input class="module_app_input___gray" id="form[USR_PASSWORD_MASK]" name="form[USR_PASSWORD_MASK]" type ="password" autocomplete="off" size="30" maxlength="32" value="{!!$pass!!}" pmfieldtype="password"/>
      <select  class="module_app_input___gray" id="form[USER_LANG]" name="form[USER_LANG]"   pm:label="Language" pmfieldtype="dropdown"pm:dependent="0" ><option value="en">English</option><option value="es" selected="selected">Spanish</option></select>
      <input id="form[URL]" pmfieldtype="hidden" name="form[URL]" type='hidden' value=''/>
      
    </fieldset>
    <fieldset>
        <label class="panel-login">
            <div class="login_result"></div>
        </label>
        <br>
        <input style="" class='module_app_button___gray ' id="form[BSUBMIT]" pmfieldtype="button" name="a" type='button' value="Login"  />
        <a pmfieldtype="link" class="tableOption" href="forgotPassword" id="form[FORGOT_PASWORD_LINK]" name="form[FORGOT_PASWORD_LINK]" pm:field="pm:field"  style="display:none;">Forgot Password</a>
        
    </fieldset>
  
</form>


		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#form[BSUBMIT]').click();
});

</script>
@endpush