@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
<form accept-charset="UTF-8" role="form" class="form-signin"
  id="bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___" name="login" action="http://www.sanclemente.cl:891//sysworkflow/es/neoclassic/login/authentication.php" method="post" encType="multipart/form-data" onsubmit="return validateForm('[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]');">
  <input type="hidden" class="notValidateThisFields" name="__notValidateThisFields__" id="__notValidateThisFields__" value="[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]" />
  <input type="hidden" name="DynaformRequiredFields" id="DynaformRequiredFields" value="[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]" />
    <div style="display: none;"> <input  class="module_app_input___gray" id="form[USR_PASSWORD]" name="form[USR_PASSWORD]" type="text" size="30" maxlength="32" autocomplete="off" value="" style="" onkeypress=""   pmfieldtype="text" pm:decimal_separator="." /></div>
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
    <script type="text/javascript">
      

function getElementsByClassNameIE8(node, classname) {
    var a = [];
    var re = new RegExp('(^| )'+classname+'( |$)');
    var els = node.getElementsByTagName("*");
    for(var i=0,j=els.length; i<j; i++)
        if(re.test(els[i].className))a.push(els[i]);
    return a;
};

window.onload= function(){
   var inputUser,
       inputPass;
   if(document.getElementById('form[USR_USERNAME]').placeholder == undefined && document.getElementById('form[BSUBMIT]').classList == undefined){     
    document.getElementById('form[USR_USERNAME]').value = _('ID_USER');
    document.getElementById('form[USR_PASSWORD_MASK]').value = _('ID_PASSWORD');
    document.getElementById('form[BSUBMIT]').className = "button-login-success";
    inputUser = document.getElementById('form[USR_USERNAME]');
    inputPass = document.getElementById('form[USR_PASSWORD_MASK]');
    
    inputUser.attachEvent("onclick", function (){
      if(_('ID_USER') == inputUser.value){
        inputUser.value="";
      }        
    });
    inputUser.attachEvent("onblur", function (){
      if(inputUser.value == ""){
        inputUser.value=_('ID_USER');
      }        
    });
    
    inputPass.attachEvent("onclick", function (){
      if(_('ID_PASSWORD') == inputPass.value){
        inputPass.value="";
      }        
    });
    
    inputPass.attachEvent("onblur", function (){
      if(inputPass.value == ""){
        inputPass.value = _('ID_PASSWORD');
      }        
    });


  }else{
    document.getElementById('form[USR_USERNAME]').placeholder = _('ID_USER');
    document.getElementById('form[USR_PASSWORD_MASK]').placeholder = _('ID_PASSWORD');
    document.getElementById('form[BSUBMIT]').classList.remove('module_app_button___gray');
    document.getElementById('form[BSUBMIT]').classList.add('button-login-success');
  }   
};

// enable/disable forgot password link
if(flagForgotPassword == 'on' || flagForgotPassword == '1') {
  document.getElementById("form[FORGOT_PASWORD_LINK]").style.display = 'block';//hideRowById('FORGOT_PASWORD_LINK');
}

var panel;

function processHbInfo() {
  ajax_server = "../services/processHeartBeat_Ajax.php";
  parameters = "action=processInformation";
  method = "POST";
  callback = "";
  asynchronous = true;
  ajax_post(ajax_server, parameters, method, callback, asynchronous);
};

function showGettingStarted() {
  panel = new leimnud.module.panel();
  panel.options = {
    size: {w:620,h:500},
    position: {x:50,y:50,center:true},
    control: {close:true,resize:false, drag: false},fx:{modal:true},
    statusBar: false,
    fx: {shadow:true,modal:true}
  };
  panel.make();
  panel.loader.show();
  var r = new leimnud.module.rpc.xmlhttp({
    url:"../services/login_getStarted.php",
    method:"POST"
  });
  r.callback = function(rpc) {
    panel.loader.hide();
    panel.addContent(rpc.xmlhttp.responseText);
  };
  r.make();
};

var saveConfig = function() {
  if (document.getElementById("getStarted").checked == true) {
    var oRPC = new leimnud.module.rpc.xmlhttp({
      url: '../login/login_Ajax',
      async: false,
      method: 'POST',
      args: 'function=getStarted_save'
    });
    oRPC.make();
  }
  panel.remove();
}

var dynaformOnload = function() {
  setFocus(getField('USR_USERNAME'));
  if (flagHeartBeat) {
    processHbInfo();
  }
  if (flagGettingStarted) {
    showGettingStarted();
  }
};

leimnud.event.add(document.getElementById('form[USR_PASSWORD_MASK]'), 'keypress', function(event) {
  var key;
  if(window.event)
    key = window.event.keyCode;     //IE
  else
    key = event.which;     //firefox
  if(key == 13) {
    document.getElementById('form[BSUBMIT]').click();
    return true;
  } else {
    return true;
  }
});

leimnud.event.add(document.getElementById('form[BSUBMIT]'), 'click', function() {
    setNestedProperty(this, Array("disabled"), "true");
    setNestedProperty(this, Array("value"), "Verificando...");

    document.getElementById("form[USR_PASSWORD]").value = document.getElementById("form[USR_PASSWORD_MASK]").value;
    document.getElementById("form[USR_PASSWORD_MASK]").value = "";
    if(!navigator.userAgent.indexOf("MSIE 8.0")>0)
      document.getElementById("form[USR_PASSWORD_MASK]").setAttribute("type", "text");    
    document.login.submit();
}.extend(document.getElementById('form[BSUBMIT]')));


    </script>
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