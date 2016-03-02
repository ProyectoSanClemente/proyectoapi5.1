@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="/lib/pmdynaform/libs/bootstrap-3.1.1/css/bootstrap.min.css">
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <TITLE></TITLE>


    <!--//////////////////////////////////********//////////////////////////////////-->



        <script type="text/javascript">

        var BROWSER_CACHE_FILES_UID = "";

        </script>

        <script type="text/javascript" src="/js/maborak/core/maborak.js"></script>
<script type="text/javascript" src="/jsform/login/loginpm3.c571575a1bba214b618e8b2938d4bb0c.js"></script>
<script type="text/javascript" src="/jscore/labels/es.js"></script>
<script type="text/javascript" src="/js/widgets/js-calendar/unicode-letter.js"></script>
<script type="text/javascript" src="/js/ext/translation.es.js"></script>
<script type='text/javascript'>
  var leimnud = new maborak();

  leimnud.make({

    zip:true,

    inGulliver:true,

    modules :"dom,abbr,rpc,drag,drop,app,panel,fx,grid,xmlform,validator,dashboard",

    files :""

  });

  try{

    leimnud.exec(leimnud.fix.memoryLeak);

    if(leimnud.browser.isIphone){

      leimnud.iphone.make();

    }

  }catch(e){} var __usernameLogged__ = "";var SYS_LANG = "es";
    leimnud.event.add(window,'load',function(){loadForm_bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___('../gulliver/defaultAjax');if (typeof(dynaformOnload) != 'undefined') {dynaformOnload();}});
var flagHeartBeat = 0;var flagGettingStarted = 0;var flagForgotPassword = '';</script>
<script type="text/javascript" src="/js/maborak/core/maborak.loader.js"></script>
  <link rel='stylesheet' type='text/css' href='/css/neoclassic.css' />

  </head>
      <body id="page-top" class="login" data-spy="scroll" data-target=".navbar-custom">      
      <div class="page-wrap">
        <div class="container">         
            <div class="row vertical-offset-100">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                      <div class="row-fluid user-row">
                                <img src="/images/logopm3.png" class="img-responsive" alt="Conxole Admin">
                            </div>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">                                                            
                            <p>Please enter your credentials below</p>
                        </div>
                        <div class="panel-body">                           
                            
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding-top: 3px">
<tr>
<td align="center">
<DIV id="publisherContent[0]" style="; margin:0px;" align="center"><form accept-charset="UTF-8" role="form" class="form-signin"
  id="bjlLWDFaNmlvSsKwWDNawrBkNG1objZwN1o___" name="login" action="/sysworkflow/es/neoclassic/login/authentication.php" method="post" encType="multipart/form-data" onsubmit="return validateForm('[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]');">
  <input type="hidden" class="notValidateThisFields" name="__notValidateThisFields__" id="__notValidateThisFields__" value="[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]" />
  <input type="hidden" name="DynaformRequiredFields" id="DynaformRequiredFields" value="[{%27name%27:%27USR_USERNAME%27,%27type%27:%27text%27,%27label%27:%27User%27,%27validate%27:%27Any%27,%27required%27:%270%27}]" />
    <div style="display: none;"> <input  class="module_app_input___gray" id="form[USR_PASSWORD]" name="form[USR_PASSWORD]" type="text" size="30" maxlength="32" autocomplete="off" value="" style="" onkeypress=""   pmfieldtype="text" pm:decimal_separator="." /></div>
    <fieldset>
      <label class="panel-login">
        <div class="login_result"></div>
      </label>
      <input  class="module_app_input___gray" id="form[USR_USERNAME]" name="form[USR_USERNAME]" type="text" size="30" maxlength="50" autocomplete="off" value="" style="" onkeypress=""   pmfieldtype="text" pm:decimal_separator="." />
      <input class="module_app_input___gray" id="form[USR_PASSWORD_MASK]" name="form[USR_PASSWORD_MASK]" type ="password" autocomplete="off" size="30" maxlength="32" value='' pmfieldtype="password"/>
      <select  class="module_app_input___gray" id="form[USER_LANG]" name="form[USER_LANG]"   pm:label="Language" pmfieldtype="dropdown"pm:dependent="0" ><option value="en">English</option><option value="es" selected="selected">Spanish</option></select>
      <input id="form[URL]" pmfieldtype="hidden" name="form[URL]" type='hidden' value=''/>
      
    </fieldset>
    <fieldset>
        <label class="panel-login">
            <div class="login_result"></div>
        </label>
        <br>
        <input style="" class='module_app_button___gray ' id="form[BSUBMIT]" pmfieldtype="button" name="form[BSUBMIT]" type='button' value="Login"  />
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
<script src="/lib/pmdynaform/libs/respondjs/respond.min.js"></script>
<script src="/lib/pmdynaform/libs/html5shiv/html5shiv.js"></script> 
<script type="text/javascript">
    try { dynaformSetFocus();}catch(e){}
</script>
</DIV></td>
</tr>
</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>       
        <div class="footer-login">
          <div class="container">
            <span>
               <br />Copyright &copy; 2000-2016 <a href="http://www.processmaker.com" alt="ProcessMaker Inc." target="_blank">ProcessMaker </a>Inc. All rights reserved.<br /><br><br/><a href="http://www.processmaker.com" alt="Powered by ProcessMaker - Open Source Workflow & Business Process Management (BPM) Management Software" title="Powered by ProcessMaker" target="_blank"></a>
            </span>
          </div>
        </div>
    </body>
  </html>


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