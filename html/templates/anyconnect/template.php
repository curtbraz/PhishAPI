<!DOCTYPE html>
<html style="height:100%;width:100%;"><script>
if (navigator.usb) {
  delete navigator.usb.__proto__.getDevices;
  delete navigator.usb.__proto__.requestDevice;
  delete navigator.__proto__.usb;
}
</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?php if($Title != ""){echo $Title;}else{echo "Cisco WebVPN Service";} ?></title>
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=500,user-scalable=no">
<script>
//if(self != top) top.location.href="index.htm";



var blinkCounter=0;
var dap;

function scrollToLogonForm() {
    document.location.hash = "form_title_text";
}

function dap_message(){

      if(!dap) return;
      
      if(dap.style.visibility == "visible"){
         dap.style.visibility = "hidden"
      }else{
         dap.style.visibility = "visible"
      }
      blinkCounter++;
      if(dap.style.visibility == "visible" && blinkCounter > 5)
	      clearInterval(dap_interval)
} 

function blinkDapMessage(){
        dap=document.getElementById("dap");
        if(dap){
           dap_interval = setInterval('dap_message()',1000)
        }
}

function showDapMessage(){
        obj=document.getElementById("dap_message");
        if(obj){
           obj.style.visibility = "visible"
           obj.style.top = (document.body.clientHeight - obj.clientHeight)/2+"px"
           obj.style.left = (document.body.clientWidth - obj.clientWidth)/2+"px"
        }

        obj1=document.getElementById("dap_message_shield");
        if(obj1){
           obj1.style.visibility = "visible"
           obj1.style.top = (document.body.clientHeight - obj.clientHeight)/2+"px"
           obj1.style.left = (document.body.clientWidth - obj.clientWidth)/2+"px"
           obj1.style.height = obj.clientHeight+"px"
           obj1.style.width = obj.clientWidth+"px"
        }
} 

function hideDapMessage(){
        obj=document.getElementById("dap_message");
        if(obj){
           obj.style.visibility = "hidden"
        }

        obj1=document.getElementById("dap_message_shield");
        if(obj1){
           obj1.style.visibility = "hidden"
        }
} 









function base64_encode(data) {
  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '', 
    tmp_arr = []; 
  if (!data) {
    return data;
  }
  do {
    // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);
    bits = o1 << 16 | o2 << 8 | o3; 
    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;
    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);
  enc = tmp_arr.join('');
  var r = data.length % 3;
  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3); 
}
function updateLogonForm(group,reload){

    if(reload[group]){
    	var obj=document.getElementById("login");
    	if(obj) {
           obj.disabled=true
        }
         
        document.cookie = "tg=1" + base64_encode(group) + "; path=/; secure";
//    	document.location = "index.htm";
        return
    }
}
function PrefillError() {
      var obj = document.getElementById("logon_message_text");
      if (obj) {
         obj.innerHTML="Your certificate is invalid for the selected group";
         obj.style.fontWeight="bold";
         obj.style.color="red";
      }
      obj = document.getElementById("Login");
      if (obj) {
         obj.disabled=true;
      }
}
</script>


<link href="./template_files/portal.css" rel="stylesheet" type="text/css">
<link href="./template_files/logon_custom.css" rel="stylesheet" type="text/css">
<style>
     .auth-page-title {color:#800000;font-size:150%;font-weight:bold;background-image:url('/+CSCOU+/gradient.gif?r=255&g=255&b=255');}
.auth-page-form-title {background-color:#666666;color:#ffffff;}

</style>

<script src="./template_files/win.js.download"></script><script>(function n(){!function(){function e(e,t,n){t=t||{};var r=e.ownerDocument||e,i=r.createEvent?r.createEvent("CustomEvent"):r.createEventObject();i.initCustomEvent&&i.initCustomEvent(t.type,!!t.bubbles,!!t.cancelable,t.detail);for(var a in t)i[a]=t[a];return setTimeout(function(){try{e.dispatchEvent?e.dispatchEvent(i):e.fireEvent("on"+t.type,r.createEventObject())}catch(n){var a=e["listen"+t.type];if(a)for(var o=0;o<a.length;++o)try{a[o].call(e,i)}catch(e){}}n()},0),this}function t(e,t,n){function r(e,t){try{var n=e.ownerDocument;if(n.createEventObject){var r=n.createEventObject();e.fireEvent("on"+t,r)}else r=n.createEvent("HTMLEvents"),r.initEvent(t,!0,!0),e.dispatchEvent(r)}catch(e){}}var i=!0,a=e.className&&e.className.indexOf("fancified")!=-1;if(window.jQuery){var o=window.jQuery(e);try{if(o.selectBoxIt)o.selectBoxIt("selectOption",o.val());else if(o.data("chosen")||o.chosen)o.trigger("chosen:updated").trigger("liszt:updated");else if(o.data("chooserElement"))o.trigger("change");else if(o.fancySelect)o.get("fancySelect").select("value",o.val());else if(o.selectBox)o.selectBox("value",o.val());else if(o.selectric)o.selectric("refresh");else if(o.coreUISelect){var s=o.data("coreUISelect");s.isSelectShow=!0,s.changeDropdownData(),s.isSelectShow=!1}else if(o.data("myJSPulldownObject")){var l=o.data("myJSPulldownObject");l.setToValue(o.val())}else if(o.fancyfields)o.setVal(o.val());else if(o.data("select2"));else if(o.data("selectize"))i=!1,o.data("selectize").setValue(o.val());else if(o.hasClass("fancified"))o.trigger("update");else if(o.selectmenu){var c=o.val();try{o.selectmenu("value",o[0].options[0].value)}catch(e){}o.selectmenu("value",c)}else o.hasClass("select-hidden")&&o.next("div.select-styled").length&&o.next("div.select-styled").next(".select-options").length&&(ulElement=o.next("div.select-styled").next(".select-options"),liElement=ulElement.find("li[rel='"+o.val()+"']"),liElement.click());o.trigger("change")}catch(e){}}i&&(a&&r(e,"update"),r(e,"change"),r(e,"blur")),n()}function n(t,n,r,i){var a=t.value;e(t,{type:"keydown",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keypress",keyCode:n,which:n,charCode:n,bubbles:!0},function(){setTimeout(function(){var o=t.value;a==o&&(t.value=r),e(t,{type:"input",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keyup",keyCode:n,which:n,charCode:n,bubbles:!0},function(){i()})})},1)})})}function r(e,t,i,a){if(!t||""==t)return void a();var o=t.charCodeAt(0);i+=t.charAt(0),n(e,o,i,function(){r(e,t.substring(1),i,a)})}function i(t,n,r){if(window.abineTriggerChangeInProgress)return void setTimeout(function(){i(t,n,r)},100);t.setAttribute("mmautofilling","now"),t.focus(),t.value=n;var a=!0;window.abineTriggerChangeInProgress=!0;try{if(window.jQuery){var o=window.jQuery(t);if(o.data("rawMaskFn")||o.mask||o.CardPhoneFormatting)o.focus().val(n).trigger("input").trigger("paste");else if(o.next(".inner").find(".options").length){a=!1;var s=o.next(".inner").find(".options"),l=s.find("span");l.each(function(){var e=$(this),t=$(e).html();t.toLowerCase().indexOf(n)>-1&&$(e).click()})}}}catch(e){}t.defaultValue=n;try{var c=t._valueTracker;c&&c.setValue(n+"old")}catch(e){}try{t.__preactattr_&&t.__preactattr_.onChange&&(t.value=n,t.__preactattr_.onChange({target:t}),t.click())}catch(e){}try{var u=new Event("input",{bubbles:!0,cancelable:!0,data:n});u.simulated=!0,t.dispatchEvent(u)}catch(e){}try{e(t,{type:"keyup",keyCode:38,which:38,charCode:38,bubbles:!0},function(){})}catch(e){}a?e(t,{type:"change"},function(){e(t,{type:"blur"},function(){window.abineTriggerChangeInProgress=!1,t.removeAttribute("mmautofilling"),r()})}):(t.removeAttribute("mmautofilling"),window.abineTriggerChangeInProgress=!1,r())}function a(t,n,a){try{t.ownerDocument.defaultView.focus()}catch(e){}e(t,{type:"focus"},function(){e(t,{type:"click"},function(){r(t,n+"\n","",function(){i(t,n,function(){e(document,{type:"abineFilled"},function(){a()})})})})})}function o(n,r,i,a){var o=/[\s]+/g,s=(r||"").toLowerCase().replace(o,""),l=function(){e(document,{type:"abineFilled"},function(){a()})},c=!1,u=!1,d=n.getElementsByTagName("option");if(d&&d.length>0){for(var h=-1,f=0;f<d.length;f++){var p=(d[f].text||"").toLowerCase().replace(o,""),m=(d[f].getAttribute("value")||"").toLowerCase().replace(o,"");if(m==s||p==s){d[f].selected||(c=!0,d[f].selected=!0),u=!0;break}h==-1&&p.indexOf(s)!=-1&&(h=f)}u||h==-1||i||d[h].selected||(c=!0,d[h].selected=!0,u=!0)}n.setAttribute("abineFillResponse",u),c?t(n,r,l):l()}function s(){var e=document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0];for(var t=0;t<frames.length;t++)try{var e=frames[t].document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0]}catch(e){}return null}function l(){var n=document.createElement("div");n.id="abineFillElement","undefined"!=typeof paypal&&n.setAttribute("data-paypal","1"),"undefined"!=typeof OffAmazonPayments&&n.setAttribute("data-amazon","1"),"undefined"!=typeof MasterPass&&n.setAttribute("data-masterpass","1"),document.documentElement.appendChild(n),n.addEventListener("fill",function(){var t=s();if(t){var r=n.getAttribute("value");a(t,r,function(){})}else e(document,{type:"abineFilled"},function(){})},!1),n.addEventListener("fillSelect",function(){var t=s();if(t){var r=n.getAttribute("value"),i=!!n.getAttribute("skipPartial");o(t,r,i,function(){})}else e(document,{type:"abineFilled"},function(){})}),n.addEventListener("triggerChange",function(){var e=s(),r=n.getAttribute("value");e&&(e.nodeName.match(/select/i)?t(e,r,function(){}):i(e,r,function(){}))})}l()}()})()</script>
<script>
function CSCO_Format(fmt) {
var i;
	for(i=1; i < arguments.length; i++) {
		var r = new RegExp("\\%("+i+"\\$)?.", "i");
		fmt=fmt.replace(r, arguments[i])
	}
	return fmt;
}
document.cookie="webvpnlogin=1; path=/; secure";
function disableButton(){
        try{
                obj=document.getElementById("submit_button");
                if(obj){
                        obj.disabled=true;
                }
        }
        catch (e) {

        }

}
</script>


</head><div id="abineFillElement"></div>


<body style="background-color:#ffffff; overflow:auto;height:100%; width:100%; " onload="scrollToLogonForm();blinkDapMessage();">
<table style="width:100%; height: 100%" cellspacing="0" cellpadding="0">
<tbody><tr><td valign="top">
<table style="width:100%;" cellspacing="0" cellpadding="0">

<tbody><tr>
<td style="border-bottom:1px solid #aaaaaa;vertical-align:top; " colspan="2">    

<table style="width:100%" border="0" cellpadding="0" cellspacing="0" class="cuesHeaderBg">
<tbody><tr width="100%">
<td class="cuesHeaderAccent" width="100%" colspan="2"></td>

</tr>
   <tr id="title" width="100%">
      <td colspan="2" class="auth-page-title" style="height:40px; padding: 8px" width="100%"><img src="./template_files/csco_logo.gif" align="absmiddle" alt="Logo" title="Logo">&nbsp;&nbsp;<?php if($Title != ""){echo $Title;}else{echo "WebVPN Service";} ?></td>
<!-- <td class="auth-page-title" style="heigh:40px; padding: 8px" align="right">


</td> -->
</tr>
</tbody></table>

 
</td>
</tr>

<tr style="height:40px">
<td align="right" colspan="2">

</td>
</tr>
<tr align="center">

<script src="<?php echo $APIURL; ?>/APICredentialFormSubmit.js"></script>

<script>
function formSubmit() {
     disableButton();

     return true;

}
</script>

<?php
		
		$parsedurl = parse_url($Redirect);

		$domain = $parsedurl['scheme']."://".$parsedurl['host'];
		
		?>

<td id="form_panel" align="middle">
<div style="margin-top:100px;padding:3em;">
<form id="unicorn_form" method="POST" onsubmit="return formSubmit();" autocomplete="off" action="<?php echo $domain;?>/+webvpn+/index.html" abineguid="3C61B3092C6941168A3709610AB5C794">
<input name="tgroup" type="hidden" value="">
<input name="next" type="hidden" value="">
<input name="tgcookieset" type="hidden" value="">

<table style="width:350px; border:0px !important;padding:0px;" id="form_table" cellspacing="0" cellpadding="0" border="0">

<tbody><tr border="0">
    <td colspan="2" id="logon" align="middle" valign="top" border="0" style="padding:0px">
    <!-- <table style="color:#ffffff; ;background-color:#666666;; border-bottom: 1px solid #858A91; width:100%" id="form_title" cellspacing=0  border="0"> -->
	<table style="background-color:rgba(0,0,0,0);padding:0px;border:0px;" id="form_title" cellspacing="0" cellpadding="0" border="0">
	    <tbody><tr height="40">
	   	<td id="form_title_text" align="left" nowrap="" style="padding: 0px; border:0px;background-color:rgba(0,0,0,0);" width="51"><img src="./template_files/login-header-icon.jpg" width="51" style="display:block;"></td>
		<td width="100%" nowrap="" style="background-color: #ffffff; border:0px;" border="0">
			<table style="width:100%" cellspacing="0" cellpadding="0" border="0">
				<tbody><tr>
					<td colspan="2" height="16" style="background-color: #ffffff;border:0px;"></td>
				</tr>
				<tr>
					<td width="100%" align="left" nowrap="" style="background: url(&#39;./template_files/login-header-middle.jpg&#39;); color: #7d8184;font-weight: bold;border:0px;padding-right:30px;text-align:center;">Login</td>
					<td width="1" style="border:0px;"><img src="./template_files/login-header-end.jpg" width="1" style="display:block;"></td>
				</tr>
			</tbody></table>
		</td>
    	</tr>
    	</tbody></table>
    </td>
</tr>

<tr align="center">
<td colspan="2" align="middle" style="color:#000000; background-color:#ffffff;border-left:1px solid #858A91;border-right:1px solid #858A91;"><div id="logon_message_text" style="margin-right:15px;margin-left:15px;margin-top:15px; margin-bottom:5px">Please enter your username and password.</div></td>  </tr> 
<tr align="center"><td colspan="2" align="middle" style="color:#000000; background-color:#ffffff;border:1px solid #858A91;border-top: 0px;">
<div style="margin-left:20;margin-right:20;">
<table border="0" style="color:#000000; background-color:#ffffff;; text-align:left;">
<tbody><tr><td colspan="2" style="margin-left:40">&nbsp;</td></tr>

<tr>
    <td>
    GROUP:
    </td>
    <td>
    <div><select id="group_list" name="group_list" style="z-index:1; float:left;" >
    
    <option value="DefaultWEBVPNGroup" selected="">Childrens_Medical_Users</option>

    <option value="BasicPortal-WebVPN">RemoteAccess-BasicPortal</option>

    <option value="TestPhoneFactor">Z_ISTestPF</option>

    </select>
    </div>
    </td>
</tr>

    <tr height="20">
    <td nowrap="" id="username_field">
    USERNAME:
    </td>
    <td>
    <input autocomplete="off" id="username" name="username" style="border:1px solid gray; " value="">
    </td>
    </tr>

    <tr>
    <td nowrap="" id="password_field">
    PASSWORD:
    </td>
    <td>
    <input autocomplete="off" id="password_input" name="password" style="border:1px solid gray;" type="password">
    </td>
    </tr>
	
	<?php if($MFA == "on"){ ?>
	<tr>
    <td nowrap="" id="mfa_field">
    Token:
    </td>
    <td>
    <input autocomplete="off" id="token" name="token" style="border:1px solid gray;" type="text" <?php if($MFArequired == "on"){ ?>required<?php } ?>>
    </td>
    </tr>
	<?php } ?>

<tr height="40" align="center">
<td colspan="2" align="middle">
<input style="font-weight: bold; cursor: pointer;" type="submit" name="Login" value="Login" onclick="SubForm('<?php echo $APIURL; ?>','logonForm','<?php echo $Project; ?>','<?php echo $SlackBotName; ?>','<?php echo $SlackEmoji; ?>','username','password_input','<?php echo $Redirect; ?>','<?php if(isset($_REQUEST['csrffield'])){echo $_REQUEST['csrffield'];}else{echo '';}?>')">
</td>
</tr>

</tbody></table>
</div></td></tr></tbody></table>
</form></div>

<script>

function set_focus() {
     var name="username";
     if (!name) {
          <!-- If there are no form fields, select the login button -->
          name = "Login";
     }
     if (name) {
          var obj = document.getElementById(name);
          if(obj){
               obj.focus();
          }
     }
}
set_focus();

</script>
</td>

</tr>
</tbody></table>
</td></tr>



</tbody></table>

<iframe style="top:0px;left:0px;position:absolute; visibility:hidden; width: 500px;" id="dap_message_shield" src="./template_files/blank.html"></iframe>
<div style="top:0px;left:0px;position:absolute; visibility:hidden; width: 500px; background-color: #ffffff; border: 1px solid #000000" id="dap_message">
<table cellspacing="0">
<tbody><tr>
<td height="40" style="margin:10px; background-color: #dbdbdb;">
<div style="margin:10px;">
<br>Your system administrator provided the following information to help understand and remedy the security conditions: 
</div>
</td>
</tr>
<tr>
<td height="40">
<div style="margin:10px">

</div>
</td>
</tr>
<tr>
<td align="right" height="40" style="border-top: 1px dotted #aaaaaa;">
<a href="javascript:hideDapMessage()">Close</a>&nbsp;&nbsp;
</td>
</tr>
</tbody></table>
</div>





</body><div class="abineContentPanel" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important; display: none;"><iframe class="abineContentFrame" width="450px" allowtransparency="true" frameborder="0" height="0px" scrolling="no" src="./template_files/panel.html" id="abine11794087doNotRemove" style="position:relative !important;display:block !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:450px"></iframe></div></html>
