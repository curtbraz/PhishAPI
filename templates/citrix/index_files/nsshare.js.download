function CreateMainTable()
{
	document.writeln("<table class=\"full_width_height\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">");
}

function CreateBannerI()
{
	document.writeln("<tr>");
	document.writeln("<td valign=\"top\" class=\"full_width\">");
	document.writeln("<table class=\"full_width\" cellspacing=\"0\" cellpadding=\"0\">");
	document.writeln("<tr>");
}

function CreateBannerII()
{
	document.writeln("<td class=\"header_middle\">&nbsp;</td>");
	document.writeln("</tr>");
	document.writeln("<tr>");
	document.writeln("<td colspan=2 class=\"navbar\">&nbsp;</td>");
	document.writeln("</tr>");
	document.writeln("</table></td></tr>");
}

function AddHeaderAndBar()
{
	CreateBannerI();
	document.writeln("<td class=\"header_left\">&nbsp;</td>");
	CreateBannerII();	
}

function AddHeaderAndBarForTM()
{
	CreateBannerI();
	document.writeln("<td class=\"header_left_for_tm\">&nbsp;</td>");
	CreateBannerII();	
}

function AddHeaderAndBarForCitrix()
{
	CreateBannerI();
	document.writeln("<td class=\"header_ctx\">&nbsp;</td>");
	CreateBannerII();	
}

function AddFooter()
{
    document.writeln('<tr class="full_width_height">');
	document.writeln('<td valign="bottom">');
	document.writeln('<table class="full_width" cellspacing="0" cellpadding="0">');
	document.writeln('<tr>');
	document.writeln('<td class="watermark">');
	document.writeln('</td>');
	document.writeln('</tr>');
	document.writeln('</table>');
	document.writeln('</td>');
	document.writeln('</tr>');	
}

function AddBanner()
{
	document.writeln("<TABLE  cellSpacing=0 cellPadding=0 width=\"100%\" border=0>");
    document.writeln("<TBODY>");
    document.writeln("<TR height=94>");
    document.writeln("<TD style=\"BACKGROUND-IMAGE: url(/vpn/images/ctxBanner01.gif); BACKGROUND-REPEAT: no-repeat\" width=701></TD>");
    document.writeln("<TD style=\"BACKGROUND-IMAGE: url(/vpn/images/ctxBanner02.gif); BACKGROUND-REPEAT: repeat-x\">&nbsp;</TD>");
    document.writeln("</TR>");
    document.writeln("<TR>");
    document.writeln("<TD style=\"FONT-SIZE: 1px; HEIGHT: 8px; BACKGROUND-COLOR: white\" vAlign=bottom></TD>");
    document.writeln("</TR></TBODY></TABLE>");
}

var suitable_browser_to_use_png = false;
    
function canShowPNGWell()
{
	//As all morden browsers support PNG alfa transperancy by default this function will return true
	//except for IE 6 and lower, as IE 7 was first browser of IE series to support it
    var usrAgt = navigator.userAgent.toLowerCase();
	var msieOld = /(msie) [1-6]\.+/;
	if(msieOld.test(usrAgt)) {
		return false;
	}
	return true;
}

suitable_browser_to_use_png = canShowPNGWell();

function documentWriteGlowBoxUpper()
{
    if (suitable_browser_to_use_png == true)
        {
            document.write('<table class="CTXMSAM_LogonFont" cellpadding="0" cellspacing="0" align="center" border="0">\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxTop glowBoxLeft glowBoxTopLeftPng"></td>\r\n');
            document.write('<td class="glowBoxTop glowBoxTopMidPng"></td>\r\n');
            document.write('<td class="glowBoxTop glowBoxRight glowBoxTopRightPng"></td>\r\n');
            document.write('</tr>\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxLeft glowBoxMidLeftPng"></td>\r\n');
            document.write('<td class="glowBoxMidPng loginTableMidWidth">\r\n');
        }
        else
        {
            document.write('<table class="CTXMSAM_LogonFont" cellpadding="0" cellspacing="0" align="center" border="0">\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxTop glowBoxLeft glowBoxTopLeft"></td>\r\n');
            document.write('<td class="glowBoxTop glowBoxTopMid"></td>\r\n');
            document.write('<td class="glowBoxTop glowBoxRight glowBoxTopRight"></td>\r\n');
            document.write('</tr>\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxLeft glowBoxMidLeft"></td>\r\n');
            document.write('<td class="glowBoxMid loginTableMidWidth">\r\n');
        }
}

function documentWriteGlowBoxLower()
{
    if (suitable_browser_to_use_png == true)
        {
        	document.write('</td>');
            document.write('<td class="glowBoxRight glowBoxMidRightPng"></td>\r\n');
            document.write('</tr>\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxFooter glowBoxLeft glowBoxFooterLeftPng"></td>\r\n');
            document.write('<td class="glowBoxFooter glowBoxFooterMidPng"></td>\r\n');
            document.write('<td class="glowBoxFooter glowBoxRight glowBoxFooterRightPng"></td>\r\n');
			document.write('</tr>\r\n');
			document.write('</table>\r\n');
        }
        else
        {
        	document.write('</td>');
            document.write('<td class="glowBoxRight glowBoxMidRight"></td>\r\n');
            document.write('</tr>\r\n');
            document.write('<tr>\r\n');
            document.write('<td class="glowBoxFooter glowBoxLeft glowBoxFooterLeft"></td>\r\n');
            document.write('<td class="glowBoxFooter glowBoxFooterMid"></td>\r\n');
            document.write('<td class="glowBoxFooter glowBoxRight glowBoxFooterRight"></td>\r\n');
			document.write('</tr>\r\n');
			document.write('</table>\r\n');
        }
}

function documentWriteActionPane()
{
	if (suitable_browser_to_use_png == true)
		{
			document.write('<div class="actionPanePng">\r\n');
		}
		else
		{
			document.write('<div class="actionPane">\r\n');
		}
}

function DialogueBodyTop()
{
	CreateMainTable();
	AddHeaderAndBarForCitrix();
	document.writeln('<tr class="mainPane">');
	document.writeln('<td class="carbonBoxBottom" valign="bottom">');
	documentWriteGlowBoxUpper();
	document.writeln('<table cellspacing="4" cellpadding="0" border="0" width=100%>');
	document.writeln('<tr><td class="CTX_ContentTitleHeader"><div id="dialogueHeader"></div></td></tr>');
	document.writeln('<tr><td class="CTXMSAM_LogonFont"><div id="dialogueInfo"></div></td></tr>');
	document.writeln('<tr><td valign="top"><div id=content>');
}

function DialogueBodyBottom()
{
	document.writeln('</div></td></tr></table>');
	documentWriteGlowBoxLower();
	document.writeln('</td></tr>');
	AddFooter();
	document.writeln('</table>');

	//change maxLength for new password field to 127, to be compatible with LDAP
	var dlgStr = document.getElementById("dialogueStr").innerHTML;
	dlgStr = dlgStr.toLowerCase();
	if ((dlgStr.indexOf("password expired") > -1) && (dlgStr.indexOf("new password") > -1)) {
		document.getElementById("response").maxLength = 127;
		var localizedStr = _("DIALOGUE_HTML::dialoguePasswordChange");
		if (localizedStr && localizedStr.length > 0) {
			document.getElementById("dialogueStr").innerHTML = localizedStr;
		}
	}

	if (dlgStr.indexOf("confirm password") > -1) {
		document.getElementById("response").maxLength = 127;
		var localizedStr = _("DIALOGUE_HTML::dialogueConfirmPassword");
		if (localizedStr && localizedStr.length > 0) {
			document.getElementById("dialogueStr").innerHTML = localizedStr;
		}
	}

}

function DialogInclude()
{
	document.writeln('<link href="/logon/themes/Default/css/base.css" rel="stylesheet" type="text/css" media="screen"/>');
	document.writeln('<link rel="stylesheet" href="/logon/fonts/citrix-fonts.css" type="text/css">');
	document.writeln('<link href="/logon/themes/Default/css/custom.css" rel="stylesheet" type="text/css" media="screen"/>');
}

function DialogueBodyI()
{							//Having the same markup for both caxton and green bubble themes.
	var ln = "";
	ln += '<div id="authentication">';
	ln += '<div id="logonbelt-topshadow"><table class="full_width">';
	ln += '<tr id="row1"><td class="header_left"></td></tr>';	
	ln += '<tr id="row2"><td colspan="2" class="navbar"></td></tr></tbody></table></div>';
	ln += '<div id="logonbox-container">';
	ln += '<div id="logonbox-innerbox">';
	ln += '<div id="logonbox-logoarea">';
	ln += '<div id="logonbox-logoimage">';
    ln += '</div></div>';
	ln += '<div id="logonbox-logonform">';
	ln += '<table cellspacing="4" cellpadding="0" border="0" width=100%>';
	ln += '<tr><td class="label plain CTX_ContentTitleHeader"><div id="dialogueHeader"></div></td></tr>';
	ln += '<tr><td class="label plain CTXMSAM_LogonFont"><div id="dialogueInfo"></div></td></tr>';
	ln += '<tr><td valign="top"><div id=content>';
	ln += '<FORM class="dialogueForm" METHOD=POST ACTION="/cgi/dlge" NAME="dlgform" autocomplete="off" onsubmit="return validate_entry(event)">';
	ln += '<table id="dialogueTable" class="CTXMSAM_LogonFont">';
	ln += '<tr><td>&nbsp;</td></tr>';
	ln += '<tr><td class="label plain dialogueChallengeCell">';
	document.writeln( ln );
}

function DialogueBodyII()
{
	var ln = "";
	ln += '</td></tr>';
	ln += '<tr><td class="dialogueResponseCell" style="float:left"><input size="35" maxlength="256" id="response" NAME=response TYPE=password tabindex="1"/></td></tr>';
	ln += '<tr><td></td></tr>';
	ln += '<tr><td class="dialogueSubmitCell" style="float:left">';
	ln += '<input id="SubmitButton" type="SUBMIT" value="Submit" tabindex="2" class="custombutton"/>';
	ln += '</td></tr></table>';
	ln += '</FORM>';
	ln += '</div></td></tr></table>';
	ln += '</div></div></div>';
	ln += '<div id="logonbelt-bottomshadow">';
	ln += '</div></div>';
	ln += '<script type="text/javascript"> window.onload = function() {resize(); document.getElementById("response").focus();}; window.onresize = function() {resize();};</script>';
	document.writeln( ln );
	//change maxLength for new password field to 127, to be compatible with LDAP
	var dlgStr = document.getElementById("dialogueStr").innerHTML;
	dlgStr = dlgStr.toLowerCase();
	if ((dlgStr.indexOf("password expired") > -1) && (dlgStr.indexOf("new password") > -1)) {
		document.getElementById("response").maxLength = 127;
		var localizedStr = _("DIALOGUE_HTML::dialoguePasswordChange");
		if (localizedStr && localizedStr.length > 0) {
			document.getElementById("dialogueStr").innerHTML = localizedStr;
		}
	}

	if (dlgStr.indexOf("confirm password") > -1) {
		document.getElementById("response").maxLength = 127;
		var localizedStr = _("DIALOGUE_HTML::dialogueConfirmPassword");
		if (localizedStr && localizedStr.length > 0) {
			document.getElementById("dialogueStr").innerHTML = localizedStr;
		}
	}
}

function validate_entry(ev)
{
        var passwd = document.getElementById("response").value;
        if (passwd == "") {
                window.alert(_("logon::You need to enter passwd"));
                if (ev.preventDefault) {
                        //for firefox and chrome so that they dont post the /cgi/dlge after displaying the error
                        ev.preventDefault();
                }
                //for IE so that it does not post the /cgi/dlge after displaying the error message.
                ev.returnValue = false;

                return false;
        }
        return true;
}

 function TransferInclude()
{
	document.writeln('<link href="/logon/themes/Default/css/base.css" rel="stylesheet" type="text/css" media="screen"/>');
	document.writeln('<link rel="stylesheet" href="/logon/fonts/citrix-fonts.css" type="text/css">');
	document.writeln('<link href="/logon/themes/Default/css/custom.css" rel="stylesheet" type="text/css" media="screen"/>');
}

function TransferOnesessBodyI()
{

var ln = "";
ln += '<div class="header_top"><table class="full_width">';
ln += '<tr id="row1"><td class="header_left"></td></tr>';	
ln += '<tr id="row2"><td colspan="2" class="navbar"></td></tr></tbody></table></div>';
ln += '<div class="header"><div class="branding"><div class="custom_logo"></div></div></div>';
ln+='<div id="messagebox" style="top: 205px; position: relative; display: block; ">';
ln+='<div><div class="ctxsui-messagebox" style="margin-left: auto; margin-right: auto; "><div class="messagebox-middle"><div class="messagebox-middlebody">';
ln+= '<div id="content" class="warning ">';
ln+= '<div id="heading" class="CTX_ContentTitleHeader transfer_heading">Transfer Logon</div>';
ln+=  '<div id="description" class="messageStyle">';
ln+=	'<BR><span id="You are currently logged on to the Access Gateway on another device."></span>';
ln+=	'<BR><span id="Would you like to end that session?"></span><BR>';
ln+=	'</div>';
ln+=	 '<form class="dialogueForm" action="/cgi/tlogin" method="POST" autocomplete="off" onsubmit="changeTransfervalue()">';
ln+=	'<table>';
document.writeln(ln);
}

function TransferMultsessBodyI()
{

var ln = "";
ln += '<div class="header_top"><table class="full_width">';
ln += '<tr id="row1"><td class="header_left"></td></tr>';	
ln += '<tr id="row2"><td colspan="2" class="navbar"></td></tr></tbody></table></div>';
ln += '<div class="header"><div class="branding"><div class="custom_logo"></div></div></div>';
ln+='<div id="messagebox" style="top: 205px; position: relative; display: block; ">';
ln+='<div><div class="ctxsui-messagebox" style="margin-left: auto; margin-right: auto; "><div class="messagebox-middle"><div class="messagebox-middlebody">';
ln+='<div id="content" class="warning">';
ln+='<div id="heading" class="CTX_ContentTitleHeader transfer_heading">Transfer Logon</div>';
ln+='<div id="description" class="messageStyle">';
ln+='<BR><span id="You have reached the limit of the allowed Access Gateway sessions."></span>';
ln+='<BR><span id="Please select which session to release in order to continue with this session."></span><BR><BR></div>';
ln+='<form class="dialogueForm" action="/cgi/tlogin" method="POST" autocomplete="off" onsubmit="changeTransfervalue()">';
ln+='<table class="CTXMSAM_LogonFont">';
ln+='<tr><th></th><th><span id="Intranet IP Address"></span>&nbsp;&nbsp;</th><tab><th><span id="Idle Time"></span></th></tr>';
document.writeln(ln);

}

function changeTransfervalue(){
	document.getElementById("TransferButton").value = "Transfer";
	document.getElementById("CancelButton").value = "Cancel";
}
function TransferBodyII()
{
var ln;
ln='<tr><td colspan=3><BR></td></tr>';
ln+='</table>';
ln+='<div class="transferLogonButtonRow">';
ln+='<input type="submit" id="TransferButton" value="Transfer" name="cm" class="custombutton"/>';
ln+='<input type="submit" id="CancelButton" value="Cancel" name="cm"class="custombutton"/>';
ln+='</div></form></div></div>';
ln+='</div></div></div>';
ln+='</div>';

document.writeln(ln);



}

function resize(){
	
		var windowHeight = window.innerHeight || document.documentElement.clientHeight; //Second function is for supporting method in IE8
		
		if (document.getElementById("logonbelt-topshadow").clientHeight== 88){  //height for header in caxton theme is 88px
			//Logic for moving the watermark on the page on basis of window size.
			var height1 = windowHeight -( document.getElementById("logonbox-container").clientHeight + document.getElementById("logonbelt-topshadow").clientHeight + document.getElementById("logonbelt-bottomshadow").clientHeight);
			if (height1 <= 25){  //Giving gap between container and watwermark as 25px
				document.getElementById("logonbelt-bottomshadow").style.marginTop = "25px";
			}
			else{
					document.getElementById("logonbelt-bottomshadow").style.marginTop = height1+"px";
				}
		}
		else{
			//Logic for Centering the central strip in case gb theme.
			if (windowHeight > document.getElementById("logonbox-container").clientHeight){
					margin_top = "-" + document.getElementById("logonbox-container").clientHeight/2 + "px";   //This centres the middle strip at centre of page in case of GB theme 
					document.getElementById("authentication").style.marginTop= margin_top;
			}
			else
				document.getElementById("authentication").style.marginTop = 0;
		}
}

/*code for generating random form field names- start*/
	var allOriName = {};

	function createRandName()
	{
		var tmpString = "a";
		for(var i=0; i< 16; i++)
		{
			 tmpString = tmpString + Math.floor((Math.random() * 10)); 
		}
		return tmpString;
	}

	function revertNames() 
	{
		var allFields = $("#vpnForm input").each(function (i) {
			$(this).attr("name", allOriName[$(this).attr('id')]);
		})
	}
	
	function randomize(){
	$("#vpnForm input").each( function (i) {
		var newName = createRandName();
		var oldName = $(this).attr("name");
		$(this).attr("name", newName);
		allOriName[$(this).attr('id')] = oldName;
	});
	}
/*code for generating random form field names- end */
/* --------------  Helper functions start -------------------- */

var util = { }		//Generic Utility namespace

util.win = {}		// This namespace should be used for all Windows only util functions


util.emptyFunction = function () {}

util.ajaxGet = function(URL, successCallback, errorcallback)
{
	errorcallback =  (typeof errorcallback !== "undefined") ? errorcallback : util.emptyFunction

	try
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", URL);
		xmlhttp.onerror = errorcallback;
		
		xmlhttp.onreadystatechange=function() 
		{ 
			if (xmlhttp.readyState==4)
			{
				successCallback(xmlhttp);
			}
		}
		xmlhttp.send();
	}
	catch(e)
	{
		errorcallback("Error in sending request" + e);
	}
}

//Please use this function only when it is necessary 
util.synAjax = function(method, URL)
{
	try
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open(method, URL, false);
		xmlhttp.send();
		return xmlhttp;
	}
	catch(e)
	{
		return
	}
}

util.parseToXml = function(xmlString)
{
	var xmlDoc;
	if (window.DOMParser)
	{
		var parser = new DOMParser();
		xmlDoc=parser.parseFromString(xmlString, "text/xml");
	}
	else 
	{
		xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.async = false;
		xmlDoc.loadXML(xmlString);
	}
	return xmlDoc
}

util.extractPluginInfo = function (pluginInfo, repositoryName, pluginActualType)
	{
		for(var i=0; i < pluginInfo.childNodes.length; i++)
		{
			if(pluginInfo.childNodes[i].nodeName !== "repository")
				continue;
				
			if(pluginInfo.childNodes[i].getAttribute("name") !== repositoryName)
				continue;

			var repository = pluginInfo.childNodes[i];
			for(var j=0; j <repository.childNodes.length; j++)
			{
				if(repository.childNodes[j].nodeName !== "plugin")
					continue;
					
				if(repository.childNodes[j].getAttribute("type") === pluginActualType)
				{
					return {
						"path" 				: repository.childNodes[j].getAttribute("path") , 
						"version" 			: repository.childNodes[j].getAttribute("version") , 
						"compatibleFrom" 	: repository.childNodes[j].getAttribute("compatibleFrom"),
						"compatibleTill" 	: repository.childNodes[j].getAttribute("compatibleTill")
					};
				}
			}
		}
		return null
	}
	
util.extractPluginHeader = function(wholeHeader, osType, pluginType)
{
	var pluginName = pluginType.toLowerCase() + "_" + osType.toLowerCase();
	var eachPlugin = wholeHeader.split(";");
	for(var i=0; i < eachPlugin.length; i++)
	{
		var pluginValues = eachPlugin[i].split(":");
		if(pluginValues[0] == pluginName)
			return pluginValues[1];
	}
	return "Always";
}



util.getPluginInfo = function(osType, pluginType)
{
	var reqObj = util.synAjax("GET","/vpn/pluginlist.xml");
	
	var pluginInfo 		= util.parseToXml(reqObj.responseText).firstChild;
	var repositoryName 	= reqObj.getResponseHeader("repository");
	var upgradeType		= util.extractPluginHeader(reqObj.getResponseHeader("Plugin-Upgrade"), osType, pluginType)

	var pluginActualType = osType + "-" + pluginType;
	
	var pluginData;
	if((repositoryName !== null) && (repositoryName !="") )
	{
		pluginData = util.extractPluginInfo(pluginInfo, repositoryName, pluginActualType);
		//if all attributes are proper then only return data
		if( pluginData && (pluginData.path) && (pluginData.version) && (pluginData.compatibleFrom) )
		{
			pluginData["upgradeType"] = upgradeType;
			return pluginData;
		}	
	}
	
	//if we don't find any plugin in that repository or that repository header was NULL, then check in "default"
	pluginData =  util.extractPluginInfo(pluginInfo, "default", pluginActualType);
	pluginData["upgradeType"] = upgradeType;
	return pluginData;
}

util.redirectToPlugin = function(osType, pluginType)
{
	var pluginData = util.getPluginInfo(osType, pluginType)
	window.location.assign(pluginData.path)
}

//this will compare version only upto 4 digit
// negative 	ver1 < ver2 
// 0			ver1 == ver2
// positive		ver1 > ver2 
util.compareVersion = function(ver1, ver2)
{
	var ver1Digit = ver1.split(/[\.,]/);
	var ver2Digit = ver2.split(/[\.,]/);
	
	for(var i=0; i <4; i++)
	{
		var diff = parseInt(ver1Digit[i]) - parseInt(ver2Digit[i]);
		if(diff!==0)
		{
			return diff;
		}
	}
	return 0;
}

//use this function instead IE check
//Even if ActiveXObject is defined, IE 11 reports "typeof ActiveXObject" as undefined. So, don't use typeof operator for this check
util.win.ACTIVEX_SUPPORTED = ("ActiveXObject" in window);		


var winAgentPortForLauncher = 3198;

//function which does actual probing
util.prob = function (requestString, successCallback, errorCallback)
{
	image = new Image();
	image.onload = 	successCallback; 
	image.onerror = errorCallback; 
	image.src = "http://localhost:" + winAgentPortForLauncher + "/" + requestString + "&" + Math.random();
}

//will return empty string on any error
util.getStringFromLauncher =  function(requestName, callBack)
{
	var index = 0;
	var hexResult = [];
	
	var probeError 	= function () { callBack("") }
	
	var probSuccess =  function ()   
	{ 
		hexResult.push(this.height -1); 
		
		if( (hexResult.length > 2) && (hexResult.length % 2 == 0) )
		{
			if( (hexResult[hexResult.length - 1] == 0) &&  (hexResult[hexResult.length - 2] == 0) )		//found whole string
			{
				try
				{
					var encodedString = "";
					
					for (var i = 0; i < hexResult.length-2; i += 2)
					{
						var utf8Val = (hexResult[i]*16 + hexResult[i+1]);
						// add UTF8 character in encoded format
						encodedString += ( "%" +  ( utf8Val < 0x10 ? "0" : "" ) + utf8Val.toString(16) );
					}
					
					callBack( decodeURIComponent(encodedString) );
				}
				catch(e)
				{
					callBack("");
				}
				
				return;
			}
		}
		
		index+=1;
		util.prob(requestName + "&"+ index, probSuccess, probeError);
	} 

	util.prob(requestName + "&"+ index, probSuccess, probeError);
}

util.maxAttempt 	= 20;
util.currentAttempt	= 0;

util._launchErrorHandler 	= util.emptyFunction;
util._launchSuccessHandler 	= util.emptyFunction;


util._checkIfLaunched =  function()
{
	util.currentAttempt+=1;
	if(util.currentAttempt > util.maxAttempt)
	{
		util._launchErrorHandler();
		return;
	}
	
	function errorhandler()
	{
		window.setTimeout(util._checkIfLaunched, 1000);
	}
	util.prob("NOP", util._launchSuccessHandler, errorhandler);
}

util.launchPlugin =  function(successCallback, errorCallback)
{ 
	//If application is not installed Firefox, redirects to blank page. So instead of redirecting to protocol page, open the link in an iframe.
	if(navigator.userAgent.search("Firefox") != -1)	
	{
		var launcherFrame = document.getElementById("launcherIframe");
		if(launcherFrame)
		{
			launcherFrame.parentNode.removeChild(launcherFrame);
		}
		var iFrameChild = document.createElement("iframe");
        iFrameChild.setAttribute("src", "citrixNG://");
        iFrameChild.id = "launcherIframe";
        iFrameChild.style.width = "1px";
        iFrameChild.style.height = "1px";
        iFrameChild.style.visibility = "hidden";
        document.body.appendChild(iFrameChild);
	}
	else
	{
		window.location = "citrixNG://";
	}
	util._launchErrorHandler	= errorCallback;
	util._launchSuccessHandler 	= successCallback;
	window.setTimeout(util._checkIfLaunched(), 2000);		// give little time (2s) to start the plugin
}

util.useLauncher = true;

util.winMaxTimerValue 		=  10;


/* --------------  Helper functions end -------------------- */
