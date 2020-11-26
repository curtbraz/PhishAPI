/* Timestamp: Fri Nov 30 16:41:16 PST 2018 , Code Version: 1543624857327 */
if(!window["v3Lander"]&&navigator.userAgent.indexOf("Opera")==-1&&navigator.userAgent.indexOf("MSIE 6")==-1&&(navigator.userAgent.indexOf("MSIE 7")==-1||navigator.userAgent.indexOf("Trident")!=-1||navigator.userAgent.toLowerCase().indexOf("media center")!=-1)){if(typeof window.v3LanderConfig!="object"){window.v3LanderConfig={};}
var isSameOriginSafe=false;try{var elm=window.parent.v3LanderConfig;isSameOriginSafe=true;}catch(e){isSameOriginSafe=false;}
window.v3Lander={FRAME_ID:"inqChatStage",codeVersion:'1543624857327',v3Frame:false,domState:"defer-failed",domReady:false,secureProtocol:function(url){return url.replace(/^HTTPS?:/i,"https:");},hostToPath:{},hostedFileURL:window.v3LanderConfig.hostedFileURL||(isSameOriginSafe?window.parent.v3LanderConfig&&window.parent.v3LanderConfig.hostedFileURL:"/nuance/nuance-chat.html")||"/nuance/nuance-chat.html",isAtHostedFileURL:false,log:function(s){if(typeof console!="undefined"&&console.log){console.log(s);}},FMProxy:{fcns:{},addFcn:function(name,fcnStr){var obj=null;try{obj=eval("({'"+name+"':"+fcnStr+"})");}
catch(err){throw"function eval failed. err="+err.toString();}
this.fcns[name]=obj[name];},getFcn:function(name){return this.fcns[name];},removeFcn:function(name){if(!!this.fcns[name]){delete this.fcns[name];return true;}
return false;}},_getHostedFileURL:function(domain){if(!domain){domain=window.location.host;}
domain=domain.toUpperCase();if(v3Lander.hostToPath&&v3Lander.hostToPath[domain]){return v3Lander.hostToPath[domain];}else{return v3Lander.hostedFileURL;}},_setHostedFileURL:function(domain){if(!domain){domain=window.location.host;}
domain=domain.toUpperCase();if(v3Lander.hostToPath&&v3Lander.hostToPath[domain]){v3Lander.hostedFileURL=v3Lander.hostToPath[domain];}},showLoader:function(){var loader=document.createElement("div");loader.id="tc-chat-loader";loader.innerHTML='<p style="font-family: Arial,sans-serif;'+'font-size: 42px;'+'width: 100px;'+'margin: 0 auto;'+'margin-top: 25%;">'+'Loading...</p>';document.body.appendChild(loader);},getHostedFileURL:function(domain){var url=this._getHostedFileURL(domain);if(url.indexOf("//")!=0){url="//"+domain+url;}
url=window.location.protocol+url;return url;},establishHostedFileURL:function(){if(window.v3LanderConfig.hostToPath||(isSameOriginSafe&&window.parent.v3LanderConfig&&window.parent.v3LanderConfig.hostToPath)){var hostPaths=window.v3LanderConfig.hostToPath||window.parent.v3LanderConfig.hostToPath
for(var i=0,paths=hostPaths;i<paths.length;i++){if(paths[i].domain&&paths[i].hostedFileDirectory){v3Lander.hostToPath[paths[i].domain.toUpperCase()]=paths[i].hostedFileDirectory+v3Lander.hostedFileURL;}}}
this._setHostedFileURL();},assignDomain:function(){if(this.isAtHostedFileURL){var domainName=document.domain;var temp=domainName.split('.');for(var i=0;i<temp.length;i++){try{var tempwindow=null;if(window.location.search=="")
tempwindow=window.opener;else if(window.location.search.indexOf('?IFRAME')==0||window.location.search=="?IEXF")
tempwindow=window.parent;else if(window.location.search=="?BLNK")
tempwindow=window.parent;else if(window.location.search=="?XHR")
tempwindow=window.parent.parent;else if(window.location.search=="?PRXY")
tempwindow=window.parent.parent;else return;if(document.domain==tempwindow.document.domain){break;}else{temp.shift();if(temp.length>1){document.domain=temp.join('.');}}}
catch(ee){temp.shift();if(temp.length>1){document.domain=temp.join('.');}}}}},embeddedHostedFile:null,embeddedDiv:null,c2cQueryData:null,registerDivRetry:0,resizeAnscestorIframe:function(){var items=name.split("||");var iframeName=items[1];var width=items[2];var height=items[3];var iframeElements=parent.parent.document.getElementsByName(iframeName);if(iframeElements.length>0){try{var iframe=iframeElements[0];iframe.style.cssText+=";"+"width: "+width+"px;"+"height: "+height+"px;"+"display: block;"+"overflow: hidden;"+"overflow-x: hidden;"+"overflow-y: hidden;"+"border-style: hidden;"+"border-style: none;"+"border-width: 0px;";}catch(e){}}},registerDiv:function(retryCount){if(!!retryCount)
v3Lander.registerDivRetry=retryCount;try{if(top["Inq"]==null)throw(new Error("Inq not ready"));if(top.Inq["fireCustomEvent"]==null)throw(new Error("fireCustomEvent not ready"));top.Inq.fireCustomEvent("IframeC2C",{div:v3Lander.embeddedDiv,queryData:v3Lander.c2cQueryData});}catch(e){if(--(v3Lander.registerDivRetry)>0)
window.setTimeout(v3Lander.registerDiv,500);}},resizeIframe:function(width,height){var winName=!!window.name?window.name.replace(/\n|<.*?>/g,"").replace(/\"/g,'\\\''):window.name;var name="RESIZE||"+winName+"||"+width+"||"+height;var div=document.createElement("div");div.innerHTML='<ifr'+'ame id="inqChatStage" name="'+name+'" src="'+this.embeddedHostedFile+'?RSC2C"'
+' style="z-index:9999999;overflow:hidden;position:absolute;height:1px;width:1px;left:0px;top:0px;border-style: none;border-width: 0px;display: none;"'
+' scrolling="NO"'
+' frameborder=0'
+'></ifr'+'ame>';var ifrm=div.firstChild;document.body.appendChild(ifrm);},setSource:function(attributes,domain){v3Lander.embeddedHostedFile=v3Lander.getHostedFileURL(domain);v3Lander.embeddedDiv.innerHTML="";var image=new Image();image.onload=function(e){v3Lander.resizeIframe(this.width,this.height);return false;};for(var attr in attributes){image.setAttribute(attr,attributes[attr]);}
if(!!image.onclick){try{if(!!image.style["cursor"])image.style.cursor="pointer";else image.style.cssText+=";cursor: pointer;cursor: hand;";}catch(e){}
var fun=""+image.onclick;if(fun.indexOf("function")!=0){var funInner=image.onclick;image.onclick=new Function(funInner);}}
v3Lander.embeddedDiv.appendChild(image);},fixV3IFrames:function(div){var inqFrames=div.getElementsByTagName("IFRAME");div.style.cssText="overflow:hidden;position:absolute;height:1px;width:1px;left:0px;top:0px;"
+"border-style: none;border-width: 0px;";for(var ix=0,l=inqFrames.length;ix<l;ix++){inqFrame=inqFrames[ix];inqFrame.allowTransparency="true";inqFrame.border="0";inqFrame.frameBorder="no";inqFrame.frameSpacing=0;inqFrame.marginWidth=0;inqFrame.style.cssText="z-index:9999999;overflow:hidden;position:absolute;left:0px;top:0px;width:1px;height:1px;border-style: none;border-width: 0px;BACKGROUND-COLOR: Transparent;";}},initV3Frame:function(){if(window.frameElement)
window.clientwin=window.parent;else if(window.opener)
window.clientwin=window.opener;if(window.clientwin)
window.clientwin.inqFrame=window;window.inqFrame=window;if(window.inqFrame!=window.parent){window.name=opener?"_inqPersistentChat":"inqV3";}
this.insertLandingTag();},reload:function(){this.domReady=false;setTimeout(function(){v3Lander._reload();},50);},_reload:function(){var chatStage=document.getElementById("inqChatStage");var corner=document.getElementById("inqDivResizeCorner");var title=document.getElementById("inqTitleBar");if(chatStage){document.body.removeChild(chatStage);}
if(corner){document.body.removeChild(corner);}
if(title){document.body.removeChild(title);}
window.inqFrame=null;window.Inq=undefined;this.start();},createV3Frame:function(win){if(top.document.getElementById(v3Lander.FRAME_ID)){return;}
if(!win)win=window;var doc=win.document;var div=doc.createElement("div");var port=(doc.location.port=="")?"":(":"+doc.location.port);var iframesrc=v3Lander.hostedFileURL.indexOf("/")==0?doc.location.protocol+'//'+doc.location.hostname+port+v3Lander.hostedFileURL
+'?IFRAME'+(window.v3LanderConfig.iframeSrcParams||""):v3Lander.hostedFileURL;if(typeof(CEAPI_POST_CHAT_SURVEY_DATA)!="undefined"&&CEAPI_POST_CHAT_SURVEY_DATA!=null){iframesrc=doc.location+'?IFRAME&hostedFileURL=true&siteID='+10005649+'&vanityDomain='+v3Lander.secureProtocol(window.v3LanderConfig.vanityDomain||'https://ups.inq.com');}
if(top!=parent){var rand=(Math.round(Math.random()*1000000000000)).toString(36);iframesrc+=(iframesrc.indexOf('?')==-1)?'?':'&';iframesrc+="rand="+rand;}
div.id=v3Lander.FRAME_ID;div.style.cssText="z-index:9999999;overflow:hidden;position:absolute;height:1px;width:1px;left:0px;top:0px;"
+"border-style: none;border-width: 0px;";iframesrc=v3Lander.encodeURLIfNotEncoded(iframesrc);div.innerHTML='<iframe id="inqChatStage" title="Chat Window"'
+' name="10005649"'
+' src="'+iframesrc+'"'
+' style="z-index:9999999;overflow:hidden;position:absolute;height:1px;width:1px;left:0px;top:0px;border-style: none;border-width: 0px;display: none;"'
+' scrolling="NO"'
+' frameborder=0'
+'></iframe>'
+'<div id="inqTitleBar" style="border-width: 0px; position: absolute; z-index: 9999999; left: 0px; top: 0px; cursor: move; height: 55px; width: 410px; display: none;"></div>'
+'<div id="inqResizeBox" style="border-width: 0px; position: absolute; z-index: 9999999; left: 0px; top: 0px; display:none; height: 0px; width: 0px;">'
+'<div id="inqDivResizeCorner" style="border-width: 0px; position: absolute; z-index: 9999999; left: 424px; top: 284px; cursor: se-resize; height: 16px; width: 16px; display: none;"></div>';var bdy=doc.body;if(bdy){var iframes=div.getElementsByTagName("IFRAME");if(false){this.v3Frame=window;this.initV3Frame();additionalTags();return;}
for(var ix=iframes.length-1;ix>-1;--ix){bdy.appendChild(iframes[ix]);}
additionalTags();}
v3Lander.fixV3IFrames(div);function additionalTags(){var divs=div.getElementsByTagName("DIV");for(var ix=divs.length-1;ix>-1;--ix){bdy.appendChild(divs[ix]);}}},loadScript:function(name,useMediaServer,useClientDomain){var bdy=document.getElementsByTagName("BODY");if(bdy&&bdy[0]){var srctag=document.createElement("SC"+"RIPT");if(false&&useClientDomain){if(isSameOriginSafe&&window.parent.v3LanderConfig&&window.parent.v3LanderConfig.clientStaticUrl){window.v3LanderConfig.clientStaticUrl=window.parent.v3LanderConfig.clientStaticUrl;}
srctag.src=v3Lander.secureProtocol(window.v3LanderConfig.clientStaticUrl||"")+name;}else if(useMediaServer){srctag.src=v3Lander.secureProtocol(window.v3LanderConfig.vanityDomain||"http://mediav3.inq.com"||"https://ups.inq.com")+name;}else{srctag.src=v3Lander.secureProtocol(window.v3LanderConfig.vanityDomain||"https://ups.inq.com")+name;}
srctag.type="text/javascript";srctag.charset="utf-8";srctag.language="javascript";bdy[0].appendChild(srctag);}},inqSiteDataFun:null,inqRulesEngineFun:null,mbusToLoad:[],page:null,cgIDs:null,isBupMode:false,isRplMode:false,loadedMbuRuleDataFuns:[],requestPage:function(){this.resolvePage();},getPage:function(){return this.page;},getContentGroupIDs:function(){return this.cgIDs;},resolvePage:function(){var requestUrl="/tagserver/launch/resolvePage?siteID=10005649&url="+encodeURIComponent(document.URL)+"&codeVersion="+encodeURIComponent(v3Lander.codeVersion);var overriddenPageId=null;if(window.inqSiteID){overriddenPageId=window.inqSiteID;}else if(window.parent&&window.parent.inqSiteID){overriddenPageId=window.parent.inqSiteID;}
if(overriddenPageId){requestUrl+="&overridePageId="+encodeURIComponent(overriddenPageId);}
this.loadScript(requestUrl);},reInitChatData:null,applyPage:function(data){var contains=function(a,obj){for(var i=0;i<a.length;i++){if(a[i]===obj){return true;}}
return false;};var prepareMbusList=function(bUnits){var mbusToLoad=[];for(var i=0;i<bUnits.length;i++){if(!contains(mbusToLoad,bUnits[i])){mbusToLoad.push(bUnits[i]);}}
return mbusToLoad;};if(this.isBupMode&&data.bUnits){this.mbusToLoad=prepareMbusList(data.bUnits);}
if(this.isRplMode&&data.page){this.page=data.page;}
if(this.isRplMode&&data.cgIDs){this.cgIDs=data.cgIDs;}
if(this.reInitChatData){window.Inq.reinitChatV3Callback(this.reInitChatData.pageID,this.reInitChatData.data);this.reInitChatData=null;}else{this.createV3Frame();}},initSiteDefaultData:function(siteData,rulesEngineData,landingData){v3Lander.landingData=landingData;v3Lander.inqSiteDataFun="var initSiteData = "+siteData.toString();v3Lander.inqRulesEngineFun="var initRulesData = "+rulesEngineData.toString();if(!v3Lander.isBupMode||parent.v3Lander.mbusToLoad.length==0){v3Lander.loadTcFramework();}else{v3Lander.loadMbuData();}},loadTcFramework:function(){v3Lander.loadScript(v3Lander.generatePath("tcFramework.min.js"),true,true);},generatePath:function(filename){return(false?"/":((window.v3LanderConfig.vanityDomain?"/chatskins":"/media")+"/launch/"))+filename+"?codeVersion="+encodeURIComponent(v3Lander.codeVersion);},loadMbuData:function(){for(var i=0;i<parent.v3Lander.mbusToLoad.length;i++){this.loadMbuDataForBU(parent.v3Lander.mbusToLoad[i]);}},buDataCallbackFcn:null,loadMbuDataForBU:function(buID,callback){if(!!callback){this.buDataCallbackFcn=callback;}
v3Lander.loadScript((false?"/":"/chatskins/launch/")+"site_10005649_bu_"+buID+".js?codeVersion="+encodeURIComponent(v3Lander.codeVersion),false,true);},applyMbuRuleData:function(mbuRuleData){if(this.buDataCallbackFcn){this.buDataCallbackFcn(mbuRuleData);this.buDataCallbackFcn=null;}
else{v3Lander.loadedMbuRuleDataFuns[v3Lander.loadedMbuRuleDataFuns.length]=mbuRuleData.toString();if(v3Lander.loadedMbuRuleDataFuns.length==parent.v3Lander.mbusToLoad.length){v3Lander.loadTcFramework();}}},insertLandingTag:function(){v3Lander.loadScript(v3Lander.generatePath("site_10005649_default.js"),true,true);},insertPostToServerTag:function(){v3Lander.loadScript((false?"/":"/tagserver/")+"postToServer.min.js"+"?codeVersion="+encodeURIComponent(this.codeVersion),false,true);},parseC2CQueryString:function(){var queryStringIndex=window.location.href.indexOf("?C2C");var queryString=window.location.href.substring(queryStringIndex+4);if(queryString.length>1){var c2cQueryData="{";var queryStringPairs=queryString.substring(1).split("&");for(var i=0;i<queryStringPairs.length;i++){var pair=queryStringPairs[i].split("=");if(pair.length>=1||pair.length<=2)
c2cQueryData+=(i==0?"":", ")
+pair[0]+": "
+(pair.length==2?"\""+unescape(pair[1])+"\"":"\"\"");}
c2cQueryData+="}";v3Lander.c2cQueryData=c2cQueryData;}},renderC2CDiv:function(){document.body.style.cssText="border-style: none; border-width: 0px; margin: 0px; padding: 0px;overflow: hidden;overflow-x: hidden;overflow-y: hidden;";var c2cdiv=document.createElement("DIV");c2cdiv.id=window.name;document.body.appendChild(c2cdiv);v3Lander.embeddedDiv=c2cdiv;c2cdiv["setSource"]=v3Lander.setSource;},setDomReadyTimeout:function(t){setTimeout(function(){v3Lander.onDomReady();},t||0);},onDomReady:function(){if(v3Lander.domReady){return;}
v3Lander.domReady=true;if(window.location.href.indexOf("?C2C")!=-1){try{v3Lander.renderC2CDiv();v3Lander.parseC2CQueryString();v3Lander.registerDiv(200);}catch(e){}
return;}
try{if(window!=window.parent&&!v3Lander.isAtHostedFileURL&&window.document.domain==window.parent.document.domain){return;}}catch(e){}
if(!this.v3Frame){if(this.isBupMode||this.isRplMode){this.requestPage();}
else{this.createV3Frame();}}else{this.initV3Frame();}},injectIntoParent:function(){function whenLoaded(){win.v3Lander=window.v3Lander;instance.createV3Frame(win);}
var instance=this;var win=top.top;var doc=win.document;if(!doc.readyState){}else if(doc.readyState==="complete"||doc.readyState==="loaded"){whenLoaded();}
else{if(window.addEventListener){window.addEventListener('load',whenLoaded,true);}else if(window.attachEvent){window.attachEvent('onload',whenLoaded);}}},testReady:function(){var WAIT_PERIOD=100;var skipDomReadyTest=false;if(typeof jQuery!="undefined"&&jQuery.isReady){v3Lander.setDomReadyTimeout(1);}else if(skipDomReadyTest&&!v3Lander.v3Frame){v3Lander.setDomReadyTimeout(1);}else if(typeof document.readyState=="undefined"){if(document.addEventListener){document.addEventListener("load",v3Lander.setDomReadyTimeout,false);document.addEventListener("DOMContentLoaded",v3Lander.setDomReadyTimeout,false);}
v3Lander.setDomReadyTimeout(WAIT_PERIOD);}else{var tridentVersion=navigator.userAgent.match(/Trident\/(\d+)/);var newIeVersion=tridentVersion&&tridentVersion.length==2&&parseInt(tridentVersion[1])>=6;if(document.readyState=="complete"&&newIeVersion){v3Lander.setDomReadyTimeout();}else if(!newIeVersion&&document.all&&!window.opera){try{var isExitChat=false;if(isExitChat){if(this.isAtHostedFileURL){var frame=document.createElement("iframe");frame.setAttribute("id","tcBBFrame");frame.setAttribute("src",v3Lander.secureProtocol(window.v3LanderConfig.vanityDomain||'https://ups.inq.com'))+'/tagserver/v3/blank.html" ';frame.setAttribute("frameborder","0");frame.setAttribute("style","height: 0px; width: 0px; visibility: hidden");frame.setAttribute("onload","window.v3Lander._tcBBFrameOnload()");document.body.appendChild(frame);}}
var script=document.createElement("script");script.setAttribute("type","text/javascript");script.setAttribute("id","v3ContentLoadTag");script.setAttribute("defer","defer");document.body.appendChild(script);}catch(e){this.log(e);}
var v3ContentLoadTag=document.getElementById("v3ContentLoadTag");if(v3ContentLoadTag){v3ContentLoadTag.onreadystatechange=function(){v3Lander.domState=this.readyState;if(this.readyState=="complete"){v3Lander.setDomReadyTimeout(WAIT_PERIOD);}};}
else{this.uponError();}}
else if(document.addEventListener||(newIeVersion&&document.attachEvent)){if(/loaded|complete/.test(document.readyState)){v3Lander.setDomReadyTimeout();}else{setTimeout(arguments.callee,100);}}}},uponError:function(){if(document.readyState=="complete"){v3Lander.setDomReadyTimeout(1);}
else{document.attachEvent("onreadystatechange",function(){if(document.readyState==="complete"){document.detachEvent("onreadystatechange",arguments.callee);v3Lander.setDomReadyTimeout(1);}});}},removeNode:function(id){try{var tempID=document.getElementById(id);var tag=null;if(!!tempID)
tag=parent.parent.tempID;if(tag){tag=tag.parentNode;var p=tag.parentNode;var grandparent=parent.parent;if(grandparent["Inq"]==null)return;if(grandparent.Inq["removeProxyNode"]==null)
grandparent.Inq["removeProxyNode"]=new grandparent.Function("id",'var node=document.getElementById(id);\n'
+'try{\n'
+'if(!!node) {\n'
+'var p=node.parentNode;\n'
+'p.removeChild(node);\n'
+'node=p;\n'
+'if(!!node) {\n'
+'p=node.parentNode;\n'
+'p.removeChild(node);\n'
+'}\n'
+'}\n'
+'}catch(e){}\n');grandparent.setTimeout('Inq.removeProxyNode("'+id+'")',100);}}catch(ee){}},removeNodeXF:function(id){try{var tag=parent.parent.document.getElementById(id);if(tag){tag=tag.parentNode;var p=tag.parentNode;if(p)try{p.removeChild(tag);}catch(e){}}}catch(e){}},wrapWithTryCatch:function(code){return"try {\n"
+code
+"\n} catch(e){"
+"Inq.log('ERROR:' + e.message);"
+"};";},xframeToIjsf:function(){var items=name.split("||");var code=decodeURIComponent(items[3]);var chatStageWindow=window.parent.parent.parent.document.getElementById('inqChatStage').contentWindow;chatStageWindow.setTimeout(v3Lander.wrapWithTryCatch(code),1);},xhfToIjsf:function(){var code=decodeURIComponent(name);var chatStageWindow=window.parent.parent;chatStageWindow.setTimeout(v3Lander.wrapWithTryCatch(code),1);},postReturnsIE:function(){var items=name.split("||");var code=decodeURIComponent(items[1]);var grandParent=window.parent;grandParent.setTimeout(v3Lander.wrapWithTryCatch(code),1);v3Lander.removeNode(items[0]);},postReturns:function(){var items=name.split("||");var code=decodeURIComponent(items[1]);var grandParent=window.parent.parent;grandParent.setTimeout(v3Lander.wrapWithTryCatch(code),1);v3Lander.removeNode(items[0]);},encodeURLIfNotEncoded:function(urlStr){var decodedUrlStr;if(!urlStr){return urlStr}
try{decodedUrlStr=decodeURI(urlStr);if(decodedUrlStr.length===urlStr.length){return encodeURI(urlStr);}}catch(err){}
return urlStr;},start:function(){try{this.assignDomain();v3Lander.v3Frame=(window.frameElement&&window.frameElement.id=="inqChatStage");}catch(e){v3Lander.v3Frame=false}
var isExitChat=false;if(isExitChat){if(this.isAtHostedFileURL){this.prepBBDetect();}}
v3Lander.testReady();}};v3Lander.hostToPath["UPS6.CUSTHELP.COM"]="/euf/assets/themes/ups/nuance/nuance-chat.html";v3Lander.hostToPath["UPS2.CUSTHELP.COM"]="/euf/assets/themes/ups/nuance/nuance-chat.html";v3Lander.hostToPath["UPS6--TST.CUSTHELP.COM"]="/euf/assets/themes/ups/nuance/nuance-chat.html";v3Lander.establishHostedFileURL();if(window.location.href.indexOf("surveys/launchNativePostChatSurvey")>-1){(v3Lander).isAtHostedFileURL=window.location.href.indexOf("hostedFileURL=true")>-1;}else{(v3Lander).isAtHostedFileURL=window.location.href.indexOf(v3Lander.hostedFileURL)>-1;}
(v3Lander).assignDomain();if(window.location.href.indexOf("?BLNK")!=-1){}
else if(window.location.href.indexOf("?CCFRM")!=-1){var host=(window.v3LanderConfig.vanityDomain||"https://ups.inq.com").replace(/^https?:\/\//,"");var url="http://"+window.document.domain+"/tagserver/ccform/getCreditCardForm?host="+host;window.location.replace(url);}
else if(window.location.href.indexOf("?CCTKN=1")!=-1){var s=document.createElement("script");var params=v3Lander.encodeURLIfNotEncoded(window.location.href.replace(/^.*\?/,"?"));var src=(window.v3LanderConfig.vanityDomain||"https://ups.inq.com")+"/tagserver/cctoken/getToken"+params;s.src=src;document.head.appendChild(s);}
else if(window.location.href.indexOf("?CCTKN=2")!=-1){var s=document.createElement("script");var params=v3Lander.encodeURLIfNotEncoded(window.location.href.replace(/^.*\?/,"?"));var src=(window.v3LanderConfig.vanityDomain||"https://ups.inq.com")+"/tagserver/cctokentest/getToken"+params;s.src=src;document.head.appendChild(s);}
else if(window.location.href.indexOf("?XHR")!=-1){v3Lander.xhfToIjsf();window.close();}
else if(window.location.href.indexOf("?IEXF")!=-1){v3Lander.assignDomain();v3Lander.postReturnsIE();window.close();}
else if(window.location.href.indexOf("?C2C")!=-1){v3Lander.testReady();}
else if(window.location.href.indexOf("?INJECT")!=-1){v3Lander.injectIntoParent();}
else if(window.location.href.indexOf("?RSC2C")!=-1){v3Lander.resizeAnscestorIframe();}
else if(window.location.href.indexOf("?POST2SERVER")!=-1){var href=window.location.href;if(href.indexOf("&URL")!=-1){var query=window.location.search.replace(/&eq;/g,'=');var qs=query.slice(1)&&query.slice(1).split('&');if(qs){window.v3Lander.clientStaticUrl=decodeURI(qs[1].split("=")[1])}}
v3Lander.insertPostToServerTag();}
else if(!!window.name&&window.name.indexOf("||")!=-1&&v3Lander.isAtHostedFileURL){if(window.location.search=="?XFRM"){v3Lander.xframeToIjsf();window.close();}
else{v3Lander.assignDomain();v3Lander.postReturns();window.close();}}
else{if(!window.v3LanderConfig.customLaunching){v3Lander.start();}}
if((window===window.parent)&&(typeof(CEAPI_POST_CHAT_SURVEY_DATA)!="undefined"&&CEAPI_POST_CHAT_SURVEY_DATA!=null)){v3Lander.showLoader();}}