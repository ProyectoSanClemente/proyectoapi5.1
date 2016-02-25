@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')
		<form name="F1" method="post" action="http://reset.sanclemente.cl/sistemas/correspondencia/seguridadLogin/seguridadLogin.php" target="_self" style="display:none"> 
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="96"> 
<input type="hidden" name="script_case_session" value="qpu1cda5vtviq9aj9pceuv2l27"> 
<div style="position: absolute; top: 291px; left: 523px;" id="id_error_display_table_frame">
<table class="scFormErrorTable">
<tbody><tr><td style="padding: 0px" rowspan="2"><img src="/sistemas/correspondencia/_lib/img/scriptcase__NM__icnMensagemAlerta.png" style="border-width: 0px" align="top"></td><td class="scFormErrorTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tbody><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%">ERROR</td><td style="padding: 0px; vertical-align: top"><input type="image" src="/sistemas/correspondencia/_lib/img/sys__NM__nm_boton_musgo_berrm_clse.gif" onclick="scAjaxHideErrorDisplay('table'); return false;" title="Cerrar" style="vertical-align: middle; display:inline-block;">
</td></tr></tbody></table></td></tr>
<tr><td class="scFormErrorMessage"><span id="id_error_display_table_text">Iniciar sesión: Datos requeridos<br></span></td></tr>
</tbody></table>
</div>
<div style="display: none; position: absolute" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tbody><tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><span id="id_message_display_close_icon" onclick="_scAjaxMessageBtnClose(); return false;" class="scButton_default" title="Cerrar" style="vertical-align: middle; display:inline-block;float: right" onmouseover="if(this.disabled){ return false; }else{ main_style = this.className; this.style.cursor='pointer'; this.className = 'scButton_onmouseover'; }" onmouseout="if(this.disabled){ return false;  }else{ this.style.cursor=''; this.className = main_style; }" onmousedown="if(this.disabled){ return false; }else{ this.style.cursor='pointer'; this.className = 'scButton_onmousedown'; }" onmouseup="if(this.disabled){ return false;   }else{ this.style.cursor='pointer'; this.className = 'scButton_onmouseover'; }">Cerrar</span>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><img id="id_message_display_body_icon" src="/sistemas/correspondencia/_lib/img/scriptcase__NM__exclamation.png" style="border-width: 0px; vertical-align: middle">&nbsp;<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onclick="_scAjaxMessageBtnClick()"></div></td>
  </tr>
 </tbody></table>
</div>
<script type="text/javascript">
var scMsgDefTitle = "";
var scMsgDefButton = "Ok";
var scMsgDefClick = "close";
var scMsgDefScInit = "";
</script>
<table id="main_table_form" align="center" cellpadding="0px" class="scFormBorder" width="280">
<tbody><tr><td>
<table width="100%" style="padding: 0px; border-spacing: 0px; border-width: 0px;" cellpadding="0" cellspacing="0">
<tbody><tr align="center">
 <td colspan="3">
     <table style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%" cellpadding="0" cellspacing="0">
       <tbody><tr valign="middle">
         <td align="left"><span class="scFormHeaderFont">  </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="center"><span class="scFormHeaderFont"> <img src="/sistemas/correspondencia/_lib/img/grp__NM__gestion_correspondencia_390x288.gif" border="0"> </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="right"><span class="scFormHeaderFont">  &nbsp;&nbsp;</span></td>
         <td width="3px" class="scFormHeader"></td>
       </tr>
     </tbody></table>
 </td>
</tr>
<tr align="center">
  <td height="5px" class="scFormHeader"></td>
  <td height="1px" class="scFormHeader"></td>
  <td height="1px" class="scFormHeader"></td>
</tr>
</tbody></table></td></tr>
<tr><td>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0"><tbody><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<table align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><tbody><tr>

   
    <td class="scFormLabelOdd" id="hidden_field_label_login" style=";"><span id="id_label_login">Iniciar sesión</span> <span class="scFormRequiredOdd">*</span></td>
    <td class="scFormDataOdd" id="hidden_field_data_login" style=";">
<span id="id_read_on_login" style=";display: none;"></span><span id="id_read_off_login" style="white-space: nowrap;">
 <input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_login" type="text" name="login" value="{!!$user!!}" size="10" maxlength="20" alt="{datatype: 'text', maxLength: 20, allowedChars: 'abcdefghijklmnopqrstuvwxyz0123456789� .,', lettersCase: '', enterTab: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span></td>
   
 
</tr><tr>

   
    <td class="scFormLabelOdd" id="hidden_field_label_pswd" style=";"><span id="id_label_pswd">Contraseña</span> <span class="scFormRequiredOdd">*</span></td>
    <td class="scFormDataOdd" id="hidden_field_data_pswd" style=";">
<span id="id_read_on_pswd" style=";display: none;"></span><span id="id_read_off_pswd" style="white-space: nowrap;"><input class="sc-js-input scFormObjectOdd" style=";" id="id_sc_field_pswd" type="password" name="pswd" value="{!!$pass!!}" size="10" maxlength="20" alt="{datatype: 'text', maxLength: 20, allowedChars: 'abcdefghijklmnopqrstuvwxyz0123456789� .,', lettersCase: '', enterTab: false, autoTab: false, selectOnFocus: false, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"></span></td>
   
 


   </tr></tbody></table>
   </div></td></tr>
</tbody></table><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tbody><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tbody><tr> 
     <td nowrap="" align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
     </td> 
     <td nowrap="" align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
     </td> 
     <td nowrap="" align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
       <span id="sub_form_b" onclick="nm_atualiza('alterar'); return false;; return false;" class="scButton_default" title="Confirmar" style="vertical-align: middle; display:inline-block;" onmouseover="if(this.disabled){ return false; }else{ main_style = this.className; this.style.cursor='pointer'; this.className = 'scButton_onmouseover'; }" onmouseout="if(this.disabled){ return false;  }else{ this.style.cursor=''; this.className = main_style; }" onmousedown="if(this.disabled){ return false; }else{ this.style.cursor='pointer'; this.className = 'scButton_onmousedown'; }" onmouseup="if(this.disabled){ return false;   }else{ this.style.cursor='pointer'; this.className = 'scButton_onmouseover'; }"> Login </span>
 
          </td></tr> 
   </tbody></table> 
   </td></tr></tbody></table> 
</td></tr> 
 
<tr><td><table width="100%"> 
   </table><table width="100%" class="scFormFooter">
    <tbody><tr align="center">
     <td>
      <table style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <tbody><tr align="center" valign="middle">
        <td align="left" rowspan="2" class="scFormFooterFont">
          
        </td>
        <td class="scFormFooterFont">
          
        </td>
       </tr>
       <tr align="right" valign="middle">
        <td class="scFormFooterFont">
          
        </td>
       </tr>
      </tbody></table>
     </td>
    </tr>
   </tbody></table></td></tr></tbody></table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tbody><tr><td class="scFormMessageTitle"><input type="image" src="/sistemas/correspondencia/_lib/img/sys__NM__nm_boton_musgo_berrm_clse.gif" onclick="scAjaxHideDebug(); return false;" title="Cerrar" style="vertical-align: middle; display:inline-block;">
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</tbody></table></div>

</form>


		<div align="center">{!!HTML::image("images/load/default.gif")!!}
			Redireccionando, por favor espere...
		</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {
	$('#nm_form_submit').click();
});

</script>
@endpush