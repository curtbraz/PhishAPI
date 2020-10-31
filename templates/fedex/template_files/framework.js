var framework = {};
framework.widget = {
	busy : {},
	calendar : {},
	draganddrop : {},
	floatingwindow : {},
	helpmenu : {},
	menu : {},
	module : {},
	suggest : {},
	table : {},
	viewlinks : {}
};
framework.Status = 
{
	UNDEFINED_ARGUMENT : 100,
	ELEMENT_DOES_NOT_EXIST : 101,
	UNDEFINED_DATA_OBJECT : 102,
	INVALID_ELEMENT_TYPE : 103,
	COULD_NOT_CREATE_DATA_OBJECT : 104,
	EVENT_HANDLER_NOT_FOUND: 105,
	DUPLICATE_EVENT_HANDLER: 106,
	INVALID_ARGUMENT_VALUE : 107,
	EVENT_HANDLER_NOT_A_FUNCTION : 108,
	UNSUPPORTED_EVENT_TYPE : 109,
	NO_MENU_LIST_TO_CLOSE : 110,
	MENU_LIST_IS_NOT_OPEN : 111,
	INVALID_DATE : 112,	
	INVALID_FORMAT : 113,	
	RE_ENTRY_NOT_ALLOWED : 114,	
	SUCCESS : 0
};
framework.EventType =
{
	ABORT : "abort",
	BLUR : "blur",
	CHANGE : "change",
	CLICK : "click",
	DBLCLICK : "dblclick",
	ERROR : "error",
	FOCUS : "focus",
	KEYDOWN : "keydown",
	KEYPRESS : "keypress",
	KEYUP :"keyup",
	LOAD : "load",
	MOUSEDOWN : "mousedown",
	MOUSEMOVE : "mousemove",
	MOUSEOUT : "mouseout",
	MOUSEOVER : "mouseover",
	MOUSEUP : "mouseup",
	MOVE : "move",
	RESET : "reset",
	RESIZE : "resize",
	SCROLL : "scroll",
	SELECT : "select",
	SUBMIT : "submit",
	UNLOAD : "unload",
	TOUCH : "touchstart"
};
framework.InputElementType = 
{
	CHECKBOX : "checkbox", 
	RADIO : "radio",
	SELECT_ONE : "select-one", 
	TEXT : "text", 
	TEXTAREA : "textarea",
	CALENDAR : "calendar",
	HIDDEN : "hidden"
};
framework.DataType = 
{
	ARRAY : "array",
	BOOLEAN : "boolean",
	DATE : "date",
	ERROR : "error",
	FINITE : "finite",
	FUNCTION : "function",
	LENGTH : "length",
	NAN : "nan",
	NULL : "null",
	NUMBER : "number", 
	OBJECT : "object",
	REGEXP : "regexp",
	STRING : "string",
	UNDEFINED : "undefined"
};
framework.Separator = 
{
	AMPERSAND : "&",
	COLON : ":",
	COMMA : ",",
	DATA_BIND_ELEMENT : "$#$",
	DOUBLE_QUOTE : "\"",
	EQUALS : "=",
	EMPTY_STRING : "",
	SPACE : " ",
	OBJECT_NOTATION_OPEN : "{",
	OBJECT_NOTATION_CLOSE : "}"
};
framework.HttpConstants = 
{
	COOKIES : "cookies",
	EXPIRATIONDATE : "expirationDate",
	DEFAULT : "default",
	ERRORTIMEOUT : 1001,
	MICROSOFT_XMLHTTP : "Microsoft.XMLHTTP",
	MSXML2_XMLHTTP : "Msxml2.XMLHTTP",
	READY_STATE_FINISHED : 4,
	READY_STATE_UNINITIALIZED : 0,
	RESPONSE_TEXT : "responseText",
	STATUS : "status",
	STATUS_OK : 200,
	STATUS_BAD : -1,
	TIMEOUT : 15000,
	TIMESTAMP : "timestamp",
	TIMEOUT_ID : "timeoutId",
	URL : "url"
};
framework.WidgetConstants = 
{
	POSITION_LEFT : "left",
	POSITION_RIGHT : "right",
	POSITION_ABOVE : "above",
	POSITION_BELOW : "below",
	POSITION_BELOWRIGHTJUSTIFIED : "belowRightJustified",
	POSITION_RIGHTUPWARD : "rightUpward",
	TABLE_ALIGN_LEFT : "left",
	TABLE_ALIGN_CENTER : "center",
	TABLE_ALIGN_RIGHT : "right",
	TABLE_FORMAT_NONE : "none",
	TABLE_FORMAT_WRAP : "wrap",
	TABLE_FORMAT_HTML : "html",
	TABLE_SORT_NONE : "sortNone",
	TABLE_SORT_ASCENDING : "sortAscending",
	TABLE_SORT_DESCENDING : "sortDescending",
	TABLE_NO_WRAP_LIMIT : 99999,
	AUTO_HEIGHT :  99999,
	 SUNDAY : 0,
	 MONDAY : 1,
	 TUESDAY : 2,
	 WEDNESDAY : 3,
	 THURSDAY : 4,	 	 	 
	 FRIDAY : 5,
	 SATURDAY : 6,
	  CALENDAR_MAX_HEIGHT : 187,
	  CALENDAR_MAX_WIDTH : 177
};
framework.KeyCode = {
	KEY_NONE: 0,
	KEY_TAB: 9,
	KEY_ENTER: 13,
	KEY_ESCAPE: 27,
	KEY_UP_ARROW: 38,
	KEY_DOWN_ARROW: 40
};
framework.constants =
{
	loaded: true
};
framework.datamodel = {
_dataMapper:{},
createDataObject:function(objectId, dataString)
{
	if (objectId && dataString) {
		var dataObjectString = objectId + ' = {' + dataString + '}';
		try
		{
			eval(dataObjectString);
		}
		catch (e)
		{
			
		}
	}
	return _fcst13;
},
getDataObjectAsString:function(objectId)
{
	var object = (_fu13(objectId, _fcd11)) ? objectId : window[objectId];
	if (object)
	{
		var resultString = "";
		var count = 0;
		for (var member in object)
		{
			var dataMember = member.toString();
			var tempObj = object[dataMember];
			if (_fu13(tempObj, _fcd11))
			{
				if (!_fu9(resultString))
				{
					resultString = resultString + _fcse3 + _fcse10;
				}
				resultString = resultString + member.toString() + 
							   _fcse2 + _fcse9 +
							   _fd5(object[dataMember]) + 
							   _fcse8;
				continue;
			}
			if (count !== 0)
			{
				resultString = resultString + _fcse3 + _fcse10;
			}
			var subElement = member.toString();
			switch (typeof(object[member]))
			{
				case _fcd13 : 
					resultString = resultString + subElement + _fcse2  + _fcse5 + object[member] + _fcse5;
					break;
				default:
					resultString = resultString + subElement + _fcse2 + object[member] + _fcse6;
					break;
			}
			count += 1;
		}
		return (resultString);
	}	
	return null;
},
bindData:function(elementId, dataMember)
{
	if (!_fu14(_fd8[dataMember]))
	{
		_fd8[dataMember] = _fd8[dataMember] + _fcse4 + elementId;
	}
	else
	{
		_fd8[dataMember] = elementId;
	}
	return _fcst13;
},
getDataMapAsString:function()
{
	var resultString = "";
	for (var member in _fd8)
	{
		resultString = resultString + member.toString() + _fcse2 + _fd8[member] + _fcse10;
	}
	return resultString.trim();
},
clearDataObject:function(objectId)
{
	var object = eval(objectId);
	if (object)
	{
		for (var member in object)
		{
			var dataMember = member.toString();
			var tempObj = object[dataMember];
			if (_fu13(tempObj, _fcd11))
			{
				_fd2(objectId+"."+dataMember);
				continue;
			}
			var dataMemberQualifier = objectId + "." + dataMember;
			if (_fd8[dataMemberQualifier])
			{
				var htmlElementIds = _fd8[dataMemberQualifier].split(_fcse4);
				for(var idIndex = 0; idIndex < htmlElementIds.length; idIndex += 1)
				{ 
					var htmlElement = document.getElementById(htmlElementIds[idIndex]);
					var htmlElementsString;
					if (_fd8[dataMemberQualifier].split(_fcse3).length > 1)
					{
						htmlElementsString = _fd8[dataMemberQualifier];
						htmlElement = document.getElementById(_fd8[dataMemberQualifier].split(_fcse3)[0]);
					}
					if (!_fu14(htmlElement))
					{
						if (_fu14(htmlElement.type))
						{
							if (htmlElement.getAttribute("type") == _fci1)
							{
								htmlElement.type = _fci1;
							}
												
							return _fcst8;
						}
						switch (htmlElement.type)
						{
							case _fci7 :
							case _fci6 :
							case _fci3 :
								htmlElement.value = object[dataMember] = _fcse6;
								break;
							case _fci2:
								htmlElement.checked = object[dataMember] = false;
								break;
							case _fci5 :
								htmlElement.selectedIndex = 0;
								object[dataMember] = htmlElement.value;
								break;
							case _fci4 :
								var radioButtonsIds = htmlElementsString.split(_fcse3);
								for (var index = 0; index < radioButtonsIds.length; index += 1)
								{
									var element = document.getElementById(radioButtonsIds[index]);
									if (!_fu14(element))
									{
										element.checked = false;
									}
								}
								object[dataMember] = _fcse6;
								break;
							case _fci1 :
								_fwc8(htmlElement.id);
								object[dataMember] = _fcse6;
								break;
						}
					}
				}
			}
		}
	}
	return _fcst13;
},
clearDataObjectOnly:function(objectId)
{
	var object = eval(objectId);
	if (object)
	{
		for (var member in object)
		{
			var dataMember = member.toString();
			var tempObj = object[dataMember];
			if (_fu13(tempObj, _fcd11))
			{
				_fd2(objectId+"."+dataMember);
				continue;
			}
			var dataMemberQualifier = objectId + "." + dataMember;
			if (_fd8[dataMemberQualifier])
			{
				if (object[dataMember]==true || (object[dataMember]==false && !object[dataMember]==""))
				{
					object[dataMember] = false;
				} else
				{
					object[dataMember] = _fcse6;
				}
			}
		}
	}
	return _fcst13;
},
populateDataObjectFromElements:function(objectId)
{
    var object = eval(objectId);
	if (object)
	{
		for (var member in object)
		{
			var dataMember = member.toString();
			var tempObj = object[dataMember];
			if (_fu13(tempObj, _fcd11))
			{
				_fd6(objectId+"."+dataMember);
				continue;
			}
			var dataMemberQualifier = objectId + "." + dataMember;
			if (_fu14(_fd8[dataMemberQualifier]))
			{
				continue;
			}
			var htmlElementIds = _fd8[dataMemberQualifier].split(_fcse4);
			var htmlElement = document.getElementById(htmlElementIds[0]);
			var htmlElementsString;
			if (_fd8[dataMemberQualifier].split(_fcse3).length > 1)
			{
				htmlElementsString = _fd8[dataMemberQualifier];
				htmlElement = document.getElementById(_fd8[dataMemberQualifier].split(_fcse3)[0]);
			}
			if (!_fu14(htmlElement))
			{
				if (_fu14(htmlElement.type))
				{
					if (htmlElement.getAttribute("type") == _fci1)
					{
						htmlElement.type = _fci1;
					}
										
					return _fcst8;
				}
				switch (htmlElement.type)
				{
					case _fci7 :
					case _fci6 :
					case _fci5 :
					case _fci3 :
						if (typeof(object[dataMember]) == _fcd13)
						{
							object[dataMember] = htmlElement.value;
						}
						break;
					case _fci2 :
						if (typeof(object[dataMember]) == _fcd2)
						{
							object[dataMember] = htmlElement.checked;
						}
						break;
					case _fci4 :
						if (typeof(object[dataMember]) == _fcd13)
						{
							var radioButtonsIds = htmlElementsString.split(_fcse3);
							for (var index = 0; index < radioButtonsIds.length; index += 1)
							{
								var element = document.getElementById(radioButtonsIds[index]);
								if ((element) && (element.checked))
								{
									object[dataMember] = element.value;
									break;
								}
							}
						}
						break;
					case _fci1 :
						if (typeof(object[dataMember]) == _fcd13 && !_fu14(htmlElement.id))
						{
							var date = _fwc5(htmlElement.id);
							object[dataMember] = _fwc9("%mm/%dd/%yyyy", date);
						}
						break;
					default:
						break;
				}
			}
		}
	}
	return _fcst13;	
},
populateElementsFromDataObject:function(objectId)
{
	var object = eval(objectId);
	if (object)
	{
		for (var member in object)
		{
			var dataMember = member.toString();
			var tempObj = object[dataMember];
			if (_fu13(tempObj, _fcd11))
			{
				_fd7(objectId+"."+dataMember);
				continue;
			}
			var dataMemberQualifier = objectId + "." + dataMember;
			if (_fu14(_fd8[dataMemberQualifier]))
			{
				continue;
			}
			var htmlElementIds = _fd8[dataMemberQualifier].split(_fcse4);
			for (var idIndex = 0; idIndex < htmlElementIds.length; idIndex += 1)
			{
				var htmlElement = document.getElementById(htmlElementIds[idIndex]);
				var htmlElementsString;
				if (_fd8[dataMemberQualifier].split(_fcse3).length > 1)
				{
					htmlElementsString = _fd8[dataMemberQualifier];
					htmlElement = document.getElementById(_fd8[dataMemberQualifier].split(_fcse3)[0]);
				}
				if (!_fu14(htmlElement))
				{
					if (_fu14(htmlElement.type))
					{
						if (htmlElement.getAttribute("type") == _fci1)
						{
							htmlElement.type = _fci1;
						}
											
						return _fcst8;
					}
					switch (htmlElement.type)
					{
						case _fci7 :
						case _fci6 :
						case _fci3 :
							htmlElement.value = object[dataMember];
							break;
						case _fci2 :
							htmlElement.checked = object[dataMember];
							break;
						case _fci5 :
							var found = false;
							for(var index = 0; index < htmlElement.options.length; index += 1)
							{
								if (object[dataMember] == htmlElement.options[index].value)
								{
									htmlElement.value = object[dataMember];
									found = true;
									break;
								}
							}
							if (!found)
							{
								htmlElement.selectedIndex = 0;
							}
							break;
						case _fci4 :
							var radioButtonsIds = htmlElementsString.split(_fcse3);
							for (index = 0; index < radioButtonsIds.length; index += 1)
							{
								var element = document.getElementById(radioButtonsIds[index]);
								if (!_fu14(element))
								{
									if (element.value == object[dataMember])
									{
										element.checked = true;
									}
									else
									{
										element.checked = false;
									}
								}
							}
							break;
						case _fci1:
							if (typeof(object[dataMember]) == _fcd13 && !_fu14(htmlElement.id))
							{
								var date = new Date(object[dataMember]);
								_fwc22(htmlElement.id, date);
							}
							break;
						default:
							break;
					}
				}
				else
				{
					
				}
			}
		}
	}	
},
loaded:true
};
framework.eventmodel = {
_eventId:1,
addElementEvent:function(elementIdArr, type, handler, context)
{
	if (!_fe11(handler))
	{
		if (typeof(elementIdArr) === "string")
		{
			elementIdArr = [elementIdArr];
		}
		if (elementIdArr && elementIdArr.length) {
			for (var i=0;i<elementIdArr.length;i++)
			{
				var element = document.getElementById(elementIdArr[i]);
				if (!_fe11(element))
				{
					if (!!(context == null))
					{
						context = ""+handler;
					}
					_fe2(element, type, handler, context);
				}
			}
		}
	}
	return _fcst13;
},
addEvent:function(element, type, handler, context) 
{ 
	_fe10("_fe2 - DEBUG - element: "+element+" type: "+type+" handler: "+handler);    
	if (_fe11(handler.uniqueEventId))
	{
		handler.uniqueEventId = _fe6 += 1;
	}
	if (Object.prototype.toString.call(element) !== '[object Array]')
	{
		element = [element];
	}
	if (element.length) 
	{
		for (var i=0;i<element.length;i++)
		{	
			if (element[i])
			{
				if (_fe9(element[i], type, handler))
				{
					_fe10("_fe2 - ERROR - event handler is already registered");
					return;
				}
				if (!element[i].events)
				{
					element[i].events = {};
				}
				var handlers = element[i].events[type];
				if (!handlers) 
				{
					handlers = element[i].events[type] = {};
					if (!element[i].addEventListener && element[i]["on" + type])
					{
				 		handlers[0] = element[i]["on" + type];
					}
				}
				if (typeof(handler) === "function")
				{
					handlers[handler.uniqueEventId] = handler;
				}
				if (element[i].addEventListener)
				{
					element[i].addEventListener(type, _fe8, false);
				}
				else 
				{
					element[i]["on" + type] = _fe8;
				}
			}
		}
	}
	return _fcst13;
},
removeElementEvent:function(elementIdArr, type, handler)
{
	if (typeof(elementIdArr) === "string")
	{
		elementIdArr = [elementIdArr];
	}
	for (var i=0; i<elementIdArr.length; i++)
	{
		var element = document.getElementById(elementIdArr[i]);
		if (!_fe11(element))
		{
			_fe5(element, type, handler);
		}
	}
	return _fcst13;
},
removeEvent:function(element, type, handler) 
{
    if (_fe9(element, type, handler))
    {
		delete element.events[type][handler.uniqueEventId];
    }
    return _fcst13;
},
getEventTarget:function(event) 
{
    if (event) 
    {
	 	var eventTarget = event.target || event.srcElement;
		if (event && eventTarget.nodeType == 3)
		{           
			eventTarget = eventTarget.parentNode;
		}
	}
	return eventTarget; 
},
isUndefinedOrNull:function(element)
{
	return !!(element == null);
},
_handleEvent:function(event) 
{
	var returnValue = true;
	event = event || _fe7(((this.ownerDocument || this.document || this).parentWindow || window).event);
	var handlers = this.events[event.type];
	for (var handlerIndex in handlers) 
	{
		this.handleThisEvent = handlers[handlerIndex];
		if (this.handleThisEvent(event) === false) 
		{
			returnValue = false;
		}
	}
	return returnValue;
},
_fixEvent:function(event)
{
	event.preventDefault = function()
	{
		this.returnValue = false;
	};
	event.stopPropagation = function()
	{
		this.cancelBubble = true;
	};
	return event;
},
_isEventHandlerRegistered:function(element, type, handler) 
{
	if (element && element.events && element.events[type] && handler)
	{
	 	if(!(element.events[type][handler.uniqueEventId]==null))
	    {
			return true;
		}
	}
	return false;
},
setDebugEnabled:function(enabled)
{
	framework.eventmodel._isDebugEnabled = enabled;
},
debug:function(message)
{
	if (framework.eventmodel._isDebugEnabled)
	{
		if (window.console && console.log) console.log( message );
		else if (window.opera && opera.postError) opera.postError( message );
	}
},
_isDebugEnabled:false,
loaded:true
};
framework.http = {
_httpObjectsArray:{},
_httpResultsArray:{},
loadUrl:function(name, url, querystring, callbackSuccess, callbackFailure, timeout, redirectURL, httpMethod, headerParams)
{
	function _getDate()
	{
	 	var myDate=new Date();
	     myDate = myDate.getYear() + "" + (myDate.getMonth() + 1) + "" +
	     		  myDate.getDate() + "" + myDate.getHours() + "" +
	     		  myDate.getMinutes() + "" + myDate.getSeconds();
	     return myDate;		
	};
	querystring = querystring + "&timestamp=" + _getDate();
	callbackSuccess = callbackSuccess + "('" + name + "')";
	callbackFailure = callbackFailure + "('" + name + "')";
	if(httpMethod==null){
		httpMethod = "POST";
	}
	_fh5(name, url, querystring, callbackSuccess, callbackFailure, timeout, redirectURL, httpMethod, headerParams);
},
getHttpCallResults:function (name) 
{
	return _fh9[name];	
},
_executeHttpCall:function(name, url, querystring, callbackSuccess, callbackFailure, timeout, redirectURL, httpMethod, headerParams) 
{
	querystring = querystring + "&cookies=" + escape(document.cookie);
	_fh9[name] = {};
	_fh8[name] = _fh7();
	if (_fh8[name]!=null) 
	{
		_fh8[name].open(httpMethod, url, true); 
		if (headerParams){
			for(var header in headerParams) {
				_fh8[name].setRequestHeader(header, headerParams[header]);
				}
		} else {
			_fh8[name].setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			_fh8[name].setRequestHeader("Content-length", querystring.length);
			_fh8[name].setRequestHeader("Connection", "close");
			}
		_fh8[name].onreadystatechange = function() 
		{
			if (_fh8[name].readyState == 4)
			{
				try 
				{
					if (_fh8[name].status == 200)
					{
						var timeoutId = _fh9[name]["timeoutId"];
						window.clearTimeout(timeoutId);
						_fh9[name].name=name;
						_fh9[name]["responseText"] = _fh8[name].responseText;
						_fh9[name]["url"] = url;
						_fh9[name]["status"] = _fh8[name].status;
						if (redirectURL!=null)
						{
							var text = _fh8[name].responseText;
							if (text.indexOf("<html") > -1 && text.indexOf("</html>") > -1)
							{
								window.location.href = redirectURL;
							}
						}
						try
						{
							eval(callbackSuccess); 
						} 
						catch(e) 
						{	 
						}
					} 
					else 
					{
						var timeoutId = _fh9[name]["timeoutId"];
						window.clearTimeout(timeoutId);
						_fh9[name]["responseText"] = "";
						_fh9[name]["url"] = url;
						_fh9[name]["status"] = _fh8[name].status;
						try
						{
							eval(callbackFailure);
						} 
						catch(e) 
						{ 
						}
					}
				} 
				catch (e)
				{
					var timeoutId = _fh9[name]["timeoutId"];
					window.clearTimeout(timeoutId);
					_fh9[name]["responseText"] = "";
					_fh9[name]["url"] = url;
					_fh9[name]["status"] = -1;
					try
					{
						eval(callbackFailure);
					} 
					catch(e) 
					{ 
					}
				}
			}
		};
		var timeoutId = window.setTimeout(
			function() 
			{
				var readyState = _fh8[name].readyState;
				if (readyState != 4 || readyState != 0)
				{
					_fh8[name].abort();
				}
				if (framework.http._isInternetExplorer())
				{
					_fh8[name].onreadystatechange = function() {};
				}
				else
				{
					_fh8[name].onreadystatechange = null;
				}
				_fh8[name] = {};
				_fh9[name]["responseText"] = "";
				_fh9[name]["url"] = url;
				_fh9[name]["status"] = 1001;
				try
				{
					eval(callbackFailure);
				} 
				catch(e) 
				{ 
					return 113;
				}
			}, 
			timeout);
		_fh9[name]["timeoutId"] = timeoutId;
		_fh8[name].send(querystring);
	}
},
setDebugEnabled:function(enabled)
{
	framework.http._isDebugEnabled = enabled;
},
debug:function(message)
{
	if (framework.http._isDebugEnabled)
	{
		if (window.console && console.log) console.log( message );
		else if (window.opera && opera.postError) opera.postError( message );
	}
},
_isDebugEnabled:false,
_xmlHttpFactories:
[
	function()
	{
		var retval = new XMLHttpRequest();
		_fh15("using XMLHttpRequest");
		return retval;
	},
	function()
	{
		var retval = new ActiveXObject("MSXML2.XMLHTTP.6.0");
		_fh15("MSXML2.XMLHTTP.6.0");
		return retval;
	},
	function()
	{
		var retval = new ActiveXObject("MSXML2.XMLHTTP.3.0");
		_fh15("MSXML2.XMLHTTP.3.0");
		return retval;
	}
],
_getHttpObject:function() 
{
	var xmlHttp = null;
	for (var i = 0; i < _fh10.length; i += 1)
	{
		try
		{
			xmlHttp = _fh10[i]();
		}
		catch (e)
		{
			continue;
		}
		break;
	}
	return xmlHttp;
},
cancelAllHttp:function() 
{
	for (var x in _fh8)
	{
		try
		{
			if (framework.http._isInternetExplorer())
			{
				_fh8[x].onreadystatechange = function() {};
			}
			else
			{
				_fh8[x].onreadystatechange = null;
			}
			if (readyState == 4 || readyState == 0)
			{
				_fh8[name].abort();
			}
			_fh8[x] = null;
		}
		catch (e)
		{
		}
	}
	return 0;
},
cancelSingleHttp:function(name) 
{
	try
	{
		if (framework.http._isInternetExplorer())
		{
			_fh8[name].onreadystatechange = function() {};
		}
		else
		{
			_fh8[name].onreadystatechange = null;
		}_fh8[name].onreadystatechange = function() {};
		if (readyState == 4 || readyState == 0)
		{
			_fh8[name].abort();
		}
		_fh8[name] = null;
	}
	catch (e)
	{
	}
	return 0;
},
_isInternetExplorer:function()
{
	return (!!window.navigate && !!(typeof(document.getElementById) == 'object'));
},
translate : 
{
	_replacementFunc : function()
	{
		var argumentCount = arguments.length;
		for (var index=0;index<argumentCount-2; index++) 
		{
			var entity = arguments[index];
			var propertyValue = /[\w\.]+/.exec(entity);
			var newValue = eval(propertyValue[0]);
			return (newValue) ? newValue : propertyValue;
		};
		return arguments[0];
	},
	phrase : function(value) 
	{
		var reggieCustomEntity = /&![\w\.]+;/gm;
		if (reggieCustomEntity.test(value)) 
		{
        	return value.replace(reggieCustomEntity, _fh14._replacementFunc);
		}
		else
		{
			return value;
		}
	},
	html : function()
	{
		if (document.evaluate && !/Opera/.test(navigator.userAgent)) 
		{
			var currentNode;
			var textNodeArray = document.evaluate("//text()", document, null, XPathResult.ORDERED_NODE_SNAPSHOT_TYPE, null);
			if (textNodeArray)
			{					
				var len=textNodeArray.snapshotLength;
				for (var i=0; i < len; i++) 
				{
					if (textNodeArray.snapshotItem(i).nodeValue.indexOf("document.write")>-1){
						continue;
					}
					textNodeArray.snapshotItem(i).nodeValue = this.phrase(textNodeArray.snapshotItem(i).nodeValue);
				}
			}
			var inputNodeArray = document.evaluate("//input[@value]", document, null, XPathResult.ORDERED_NODE_ITERATOR_TYPE, null);
			if (inputNodeArray)
			{					
				currentNode=inputNodeArray.iterateNext();
				while(currentNode)
				{
					currentNode.value = this.phrase(currentNode.value);
					currentNode=inputNodeArray.iterateNext();
				}
			}
		}
		else 
		{
			function walkTheDOM(node) 
			{
				if (node.nodeType==3)
				{
					node.nodeValue = _fh14.phrase(node.nodeValue);
				}
				else if (node.nodeName=="INPUT")
				{
					node.value = _fh14.phrase(node.value);
				}
				else if (node.nodeName=="TITLE")
				{
					node.text = _fh14.phrase(node.text);
				}
				node = node.firstChild;
				while (node) {
					walkTheDOM(node);
					node = node.nextSibling;
				}
			};
			walkTheDOM(document.documentElement);			
		}
	}
},
_loadedScripts : [],
_timer : {},
loadJS : function(url, callback) 
{
	if (this._loadedScripts.toString().indexOf(url) == -1) 
	{ 
		this._loadedScripts.push(url); 
		var fileref=document.createElement('script');
		fileref.setAttribute("type","text/javascript"); 
		fileref.setAttribute("src", url); 
		fileref.setAttribute("charset", "utf-8");
		fileref.setAttribute("async", "true");
		var head = document.getElementsByTagName("HEAD")[0];
		head.appendChild(fileref);
		function cleanup() {
	 		fileref.onload = null;
	 		fileref.onreadystatechange = null;
	 	}
		if (callback!=null) 
		{
			fileref.onreadystatechange = function () 
			{
				if (fileref.readyState == 'loaded' || fileref.readyState == 'complete') 
				{
					callback();
					cleanup();
					return;
				}
			}                            
			fileref.onload = fileref.onerror = function () 
			{
				callback();
				cleanup();
				return;
			}
            if (!fileref.onreadystatechange && !fileref.onload) {            	
					var that =this;
					this._timer[url] = setInterval(function() 
					{					
						var readyState = document.readyState;
						if (/loaded/.test(readyState) || /complete/.test(readyState)) 
						{
							clearInterval(that._timer[url]);
		                    callback();
		                    cleanup();
						}
					}, 10);				
           }
		}
	}
	else if(callback)
	{
		callback();
	}
},
loadScript:function(id, src)
{
	if (src != null)
	{
		var oScript = document.createElement("script");
		oScript.language = "javascript";
		oScript.type = "text/javascript";
		oScript.charset = "utf-8";
		oScript.async = 'true';
		oScript.id = id;
		oScript.text = src;
		var oHead = document.getElementsByTagName('HEAD').item(0);
		oHead.appendChild(oScript);
	}
},
loadCss:function(id, url)
{
	if (document.getElementById(id) == null)
	{
		var fileref = document.createElement('link');
		fileref.setAttribute("id", id);
		fileref.setAttribute("type", "text/css");
		fileref.setAttribute("href", url); 
		fileref.setAttribute("rel", "stylesheet");
		var head = document.getElementsByTagName("HEAD")[0];
		head.appendChild(fileref);
	}
},
loaded:true
};
String.prototype.trim = function()
{
	return this.replace(/^\s*(\S*(\s+\S+)*)\s*$/, "$1");
};
framework.browser = {};
framework.browser.MSIE = "MSIE";
framework.browser.FIREFOX = "Firefox";
framework.browser.FLOCK = "Flock";
framework.browser.GOOGLE = "Google Inc.";
framework.browser.CHROME = "Chrome";
framework.browser.WINDOWS95 = "Windows 95";
framework.browser.WINDOWS98 = "Windows 98";
framework.browser.WINDOWS = "Windows";
framework.browser.MAC = "Mac";
framework.browser.TRIDENT = "Trident";
framework.browser.GECKO = "Gecko";
framework.browser.WEBCORE = "Webcore";
framework.browser.SAFARI = "Safari";
framework.browser.OPERA = "Opera";
framework.browser.WIN32 = "Win32";
framework.browser.IE = "Microsoft Internet Explorer";
framework.browser.NETSCAPE = "Netscape";
framework.browser.MACVERSION = 10.4;
framework.browser.APPLE = "Apple";
function BrowserType() {
	var that = {};
	that.initOS=function(){
		that.OS="";
        if(navigator.platform.indexOf(framework.browser.WIN32) != -1){
              if(navigator.platform.indexOf(framework.browser.WINDOWS95) != -1){
                    that.OS=framework.browser.WINDOWS95;
              }
              else if(navigator.platform.indexOf(framework.browser.WINDOWS98) != -1){
                    that.OS=framework.browser.WINDOWS98;
              }
              else{
                    that.OS=framework.browser.WINDOWS;
              }
        }
        if(navigator.platform.indexOf(framework.browser.MAC) != -1){      
        	 if(/Mac([a-zA-Z\/\s]*)(\d+)[\_\.](\d+)/.test(navigator.userAgent)){
					var version = RegExp.$2 + "." + RegExp.$3;
					var oprversion=parseFloat(version);
					that.OS=framework.browser.MAC + RegExp.$1 + oprversion;
			  }
              else{
                    that.OS=framework.browser.MAC;
              }
        }
  };
	that.initBrowserFamily=function(){
		var trident = (document.getElementById && typeof(document.getElementById)=='object' && (document.fireEvent));
		var gecko = (String.prototype.__defineGetter__ && !!window.crypto);
		var webCore = (!!document.implementation && 
							   !!document.implementation.createHTMLDocument && 
							   !window.fileCreatedDate && 
							   !!window.XMLHttpRequest &&
							   !window.opera);
		if(trident){
			that.browserFamily =framework.browser.TRIDENT;
		}else {
			if(gecko)
			that.browserFamily =framework.browser.GECKO;
			if(webCore)
			that.browserFamily =framework.browser.WEBCORE;
		}
	};
	that.initBrowser=function(){
		if(navigator.appName==framework.browser.IE){
			that.browser =framework.browser.MSIE;
		} else if(navigator.userAgent.indexOf(framework.browser.FIREFOX) != -1 && 
		navigator.userAgent.indexOf(framework.browser.FLOCK) == -1){
			that.browser =framework.browser.FIREFOX;
		} else if(navigator.vendor==framework.browser.GOOGLE && navigator.userAgent.indexOf(framework.browser.CHROME)!=-1){
			that.browser =framework.browser.CHROME;
		} else if(navigator.vendor.indexOf(framework.browser.APPLE)!=-1){
			that.browser =framework.browser.SAFARI;
		} else if(window.opera){
			that.browser =framework.browser.OPERA;
		} else if(navigator.userAgent.indexOf(framework.browser.NETSCAPE) != -1){
			that.browser =framework.browser.NETSCAPE;
		}
	};
	that.initBrowserVersion=function(){
		var versionString = "Version";
		if(that.browser != framework.browser.SAFARI){
		versionString = that.browser;
		}
		var regExStr = ".*" + versionString + "[\\\/\\s](\\d+\\.\\d+).*";
		var regEx = new RegExp(regExStr);
		if(regEx.test(navigator.userAgent)){ 
			var ver=RegExp.$1;
			that.version=ver;
		}
	};
	that.init = function(){
		that.initOS();
		that.initBrowserFamily();
		that.initBrowser();
		that.initBrowserVersion();
	};
	that.isIE7 = function(){ 
		if(that.browser==framework.browser.MSIE && that.version==7.0){
			return true;
		}
		return false;
	};
	that.isSafari = function(){ 
		if(that.browser==framework.browser.SAFARI){
			return true;
		}
		return false;
	};
	that.isInternetExplorer = function(){ 
		if(that.browser==framework.browser.MSIE){
			return true;
		}
		return false;
	};
	that.isFirefox = function(){
		if(that.browser==framework.browser.FIREFOX){
			return true;
		}
		return false;
	};
	that.isNetscape = function(){
		if(that.browser==framework.browser.NETSCAPE){
			return true;
		}
		return false;
	};
	that.isChrome = function(){
        if(that.browser==framework.browser.CHROME){
              return true;
        }
        return false;
  };
	that.init();
	return that;
};
framework.util = {
isSupportedBrowser:function()
{
	try {
		var browserType = BrowserType();
		var key = browserType.OS;
		if(browserType.OS.indexOf(framework.browser.MAC)>=-1){
			if(/[a-zA-Z\/\s]*(\d+\.\d+)/.test(browserType.OS)){
				var opversion=parseFloat(RegExp.$1);
				if(opversion<framework.browser.MACVERSION){
					return false;
				}
				else{
					key="MacOS";
				}
			}
			if(browserType.browser== framework.browser.OPERA){
				key="MacOS";
			}
		}
		var osToBrowserMap = {"Windows":{"Chrome":"4.0","MSIE":"6.0","Firefox":"3.0","Opera":"9.0","Safari":"4.0"},
							  "MacOS":{"Firefox":"3.0","Opera":"9.0","Safari":"4.0"}};
		var elem = osToBrowserMap[key];
		if( elem && elem[browserType.browser] && parseFloat(browserType.version)>=parseFloat(elem[browserType.browser])){
			return true;
		}
	}
	catch (err){}
	return false;  
},
setDebugEnabled:function(enabled)
{
	if ((typeof enabled != _fcd2) || (_fu14(enabled)))
	{
		return _fcst14;
	}
	_fu28 = enabled;
},
getDebugEnabled:function()
{
	return _fu28;
},
debug:function(message)
{
	if (_fu28)
	{
		if (window.console && console.log) console.log( message );
		else if (window.opera && opera.postError) opera.postError( message );
	}
},
getTime:function()
{
	var today = new Date();
	return today.getTime();
},
isEmpty:function(element)
{
    if (_fu35(element))
    {
    	if (element.match(/^\s*$/))
    	{
    		return true;
    	}
    }
    else if (_fu33(element))
	{
		for (index in element) 
        {
        	return false;
        }
        return true;
    }
    else if (_fu25(element))
    {
    	if (element.length === 0)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    return false;
},
isUndefinedOrNull:function(element)
{
	return !!(element == null);
},
isType:function(element, type)
{
	switch (type)
	{
		case _fcd1:
			return _fu25(element);
		case _fcd10:
			return _fu32(element);
		case _fcd9:
			return _fu31(element);
		case _fcd8:
			return (_fu32(element) && isNaN(element));
		case _fcd5:
			return (_fu32(element) && isFinite(element));
		case _fcd13:
			return _fu35(element);
		case _fcd11:
			return _fu33(element);
		case _fcd14:
			return _fu36(element);
		case _fcd2:
			return _fu26(element);
		case _fcd6:
			return _fu30(element);
		case _fcd3:
			return _fu27(element);
		case _fcd12:
			return _fu34(element);
		case _fcd4:
			return _fu29(element);
		default:
			return null;
	}
},
setInnerHTML:function(elementIdArr, htmlText)
{
	if (_fu13(elementIdArr, _fcd13)) 
	{
		elementIdArr = [elementIdArr];
	}
	if (elementIdArr.length) {
		for (var i=0;i<elementIdArr.length;i++)
		{
			var element = document.getElementById(elementIdArr[i]);
			if (element) element.innerHTML = htmlText;
		}
	}
	return _fcst13;
},
showElement:function(elementId, visible)
{
	if (visible === true)
	{
		_fu23(elementId);
	}
	else
	{
		_fu7(elementId);
	}
	return _fcst13;
},
showElement:function(elementIdArr)
{
	if (!_fe11(elementIdArr))
	{
		if (_fu13(elementIdArr, _fcd13)) 
		{
			elementIdArr = [elementIdArr];
		}
		if (elementIdArr.length) {
			for (var i=0;i<elementIdArr.length;i++)
			{
				var element = document.getElementById(elementIdArr[i]);
				if (element) {
						element.style.display = "block";		 
				}
			}
		}
	}
	return _fcst13;
},
hideElement:function(elementIdArr)
{
	if (!_fe11(elementIdArr))
	{
		if (_fu13(elementIdArr, _fcd13)) 
		{
			elementIdArr = [elementIdArr];
		}
		if (elementIdArr.length) {
			for (var i=0;i<elementIdArr.length;i++)
			{
				var element = document.getElementById(elementIdArr[i]);
				if (element) {
						element.style.display = "none";
				}
			}
		}
	}
	return _fcst13;	
},
_isSafariOnMAC:function()
{
	var browserType = BrowserType();
	if(browserType.OS.indexOf(framework.browser.MAC)>-1 && browserType.isSafari())
		return true;
	return false;
},
setElementVisible:function(elementIdArr, visible)
{
	if (_fu13(elementIdArr, _fcd13)) 
	{
		elementIdArr = [elementIdArr];
	}
	if (elementIdArr.length) {
		for (var i=0;i<elementIdArr.length;i++)
		{
			var element = document.getElementById(elementIdArr[i]);
			if (element)
			{
				if (visible === true)
				{
					element.style.visibility = "";
				}
				else
				{
					element.style.visibility = "hidden";
				}
			}
		}
	}
	return _fcst13;
},
setClassName:function(elementIdArr, className)
{
	if (_fu13(elementIdArr, _fcd13)) 
	{
		elementIdArr = [elementIdArr];
	}
	if (elementIdArr.length) {
		for (var i=0;i<elementIdArr.length;i++)
		{
			var element = document.getElementById(elementIdArr[i]);
			if (element) element.className = className;
		}
	}
	return _fcst13;
},
getElementPosition:function(elementId)
{
	var element = document.getElementById(elementId);
	var elementLeft = 0;
	var elementTop = 0;
	if (element && element.offsetParent)
	{
		elementLeft = element.offsetLeft;
		elementTop = element.offsetTop;
		element = element.offsetParent;
		while (element && !(element.nodeName == "DIV" && element.id=="container"))
		{
			elementLeft = elementLeft + element.offsetLeft;
			elementTop = elementTop + element.offsetTop;
			if (!element.clientLeft)
			{
				elementLeft = elementLeft + element.clientLeft;
				elementLeft = elementLeft + parseFloat(element.style.marginLeft || 0);
			}
			if (!element.clientTop)
			{
				elementTop = elementTop + element.clientTop;
				elementTop = elementTop + parseFloat(element.style.marginTop || 0);
			}
			element = element.offsetParent;
		}
	}
	return [elementLeft, elementTop];
},
clone:function(object)
{
	if (_fu14(object))
	{
		return null;
	}
	else if (_fu13(object, _fcd1))
	{
		var clonedArray = [];
		for (var element = 0; element<object.length; element += 1)
		{
			clonedArray[element] = _fu2(object[element]);
		}
		return clonedArray;
	}
	else if (_fu13(object, _fcd2))
	{
		return new Boolean(object.toString());
	}
	else if (_fu13(object, _fcd3))
	{
		return new Date(object.getTime());
	}
	else if (_fu13(object, _fcd10))
	{
		return new Number(object.toString());	
	}
	else if (_fu13(object, _fcd11))
	{
		var clonedObject = {};
		for (var property in object)
		{
			clonedObject[property] = _fu2(object[property]);
		}
		return clonedObject;
	}
	else if (_fu13(object, _fcd13))
	{
		return "".concat(object.toString());
	}
	else
	{
		return null;
	}
},
setZIndex:function(elementIdArr, zIndex)
{
	if (_fu13(elementIdArr, _fcd13)) 
	{
		elementIdArr = [elementIdArr];
	}
	if (elementIdArr.length) {
		for (var i=0;i<elementIdArr.length;i++)
		{
			var element = document.getElementById(elementIdArr[i]);
			if (element && element.style) 
			{
				element.style.zIndex = zIndex;
			}
		}
	} 
},
makeTextUnbreakable:function(text)
{
	var unbreakableText = "<nobr>";
	var tempChar = null;
	var currentCharacter = null;
	for (var index = 0; index < text.length; index += 1)
	{
		currentCharacter = text.charAt(index);
		tempChar = _fu1(currentCharacter);
		if (_fu14(tempChar))
		{
			return null;
		}	
		unbreakableText += tempChar;
	}
	return unbreakableText + "</nobr>";
},
characterToEntity:function(character)
{
	if (character && character.replace)
	{
		character = character.replace(/</g, "&lt;");
		character = character.replace(/>/g, "&gt;");
	}
	return character;
},
isInternetExplorer:function()
{
	return (!!window.navigate && !!(typeof(document.getElementById) == 'object'));
},
isIE7:function()
{
	if (!!window.navigate && !!(typeof(document.getElementById) == 'object'))
	{
		return !!(typeof document.body.style.maxHeight != "undefined");
	}
	else
	{
		return false;
	}
},
mouseInsideElement:function(elementId, event)
{
	try
	{
		var element = document.getElementById(elementId);
		if (element)
		{
			var movedToTarget = (event.relatedTarget) ? event.relatedTarget : event.toElement;
			while (movedToTarget != element && movedToTarget.nodeName != 'BODY')
			{
				movedToTarget = movedToTarget.parentNode;
			}
			if (movedToTarget.nodeName == 'BODY' ||_fu9(movedToTarget.id) || !movedToTarget == element)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
	catch (ex) 
	{
		return false;
	}
},
purgeElement:function(element)
{
	if (element && element.attributes)
	{
	    var attributes = element.attributes;
	    if (!attributes)
	    {
		    var attributeName = "";
		    var stop = attributes.length;
	        for (var attributeIndex = 0; attributeIndex < stop; attributeIndex += 1)
	        {
	            attributeName = attributes[attributeIndex].name;
	            if (_fu13(element[attributeName], _fcd6))
	            {
	                element[attributeName] = null;
	            }
	        }
	    }
	    var childNodes = element.childNodes;
	    if (!childNodes)
	    {
	    	stop = childNodes.length;
	        for (var childNodeIndex = 0; childNodeIndex < stop; childNodeIndex += 1)
	        {
	            _fu17(childNodes[childNodeIndex]);
	            stop -= 1;
	        }
	    }
	}
	return _fcst13;
},
hideSelects:function(elementId, rect)
{
	_fu37[elementId] = [];
	var elementTop = rect[0];
	var elementBottom = rect[2];
	var elementLeft = rect[3];
	var elementRight = rect[1];
	var selects = document.getElementsByTagName("SELECT");
	for (var index = selects.length - 1; index >= 0; index -= 1)
	{
		var select = selects[index];
		if (select && select.style && (select.style.display == "none" || select.style.visibility == "hidden"))
		{
			continue;
		}
		if (!_fu14(select.id))
		{
			var selectPosition = _fu5(select.id);
			var selectTop = selectPosition[1];
			var selectBottom = selectTop + select.offsetHeight;
			var selectLeft = selectPosition[0];
			var selectRight = selectLeft + select.offsetWidth;
			if ((selectTop >= elementTop && selectTop <= elementBottom) ||
				(selectBottom >= elementTop && selectBottom <= elementBottom))
			{
				if ((selectLeft >= elementLeft && selectLeft <= elementRight) ||
					(selectRight >= elementLeft && selectRight <= elementRight))
				{
					_fu20(select.id, false);
					_fu37[elementId].push(select);
				}
			}
		}
	}
	return _fcst13;
},
showSelects:function(elementId)
{
	if (_fu14(_fu37[elementId]))
	{
		return _fcst13;
	}
	var selects = _fu37[elementId];
	for (var i = 0; i < selects.length; i = i + 1)
	{
		var selectElement = selects[i];
		if (!_fu14(selectElement) && !_fu14(selectElement.id))
		{
			_fu20(selectElement.id, true);
		}
	}
	selects = [];
	_fu37[elementId] = null;
	return _fcst13;
},
extend : function(dest, src) 
{
	for (var prop in src)
	{
		target = dest[prop];
		copy = src[prop];
		if (target === copy)
			continue;
		else
			dest[prop] = copy;
	}
   return dest;
},
setMetaTagName:function (mnameTitle, mname, mtext, country, language, path)
{
	var metatag = document.getElementsByTagName("meta");
	for (var index=0;index<metatag.length;index++){
		if (metatag[index].name==mname){
			metatag[index].content = "/" + country + "/" + language + path + mtext;
			hbx.mlc = metatag[index].content;
			_mlc = metatag[index].content;
		}
		if (metatag[index].name==mnameTitle){
			hbx.pn = metatag[index].content;
			_pn = metatag[index].content;
		}
	}
},
_isArray:function(element)
{
	return Object.prototype.toString.call(element) === '[object Array]';
},
_isNumber:function(element)
{
	return typeof(element) === _fcd10;
},
_isNull:function(element)
{
	return (element === null);
},
_isObject:function(element)
{
	if ((element === null) || 
		(_fu25(element)) ||
		(_fu30(element)) ||
		(_fu29(element)) ||
		(_fu34(element)) ||		
		(_fu27(element)))
	{
		return false;
	}
	return ((typeof(element) === _fcd11));
},
_isString:function(element)
{
	return (typeof(element) === _fcd13);
},
_isUndefined:function(element)
{
	return (typeof(element) === _fcd14);
},
_isBoolean:function(element)
{
	return (typeof(element) === _fcd2);
},
_isFunction:function(element)
{
	if (typeof(element) === _fcd6)
	{
		if ((!_fu14(element.constructor)) && 
		    (element.constructor.toString().match(/RegExp/i) == "RegExp"))
		{
			return false;
		}
		return true;
	}
	return false;
},
_isDate:function(element) 
{
	if ((typeof(element) === _fcd11) && 
		!(element === null) && 
		(!_fu14(element.constructor)) && 
		(element.constructor == Date)) 
	{
		return true;
 	}
 	return false;
},
_isRegExp:function(element) 
{
	if (!(typeof(element) === _fcd14) && 
		!(element === null) &&
		(!_fu14(element.constructor))) 
	{
		return (element.constructor == RegExp);
 	}
 	return false;
},
_isError:function(element) 
{
	if ((typeof(element) === _fcd11) && !(element === null) && (!_fu14(element.constructor)))
	{
 		return (element.constructor == Error);
 	}
 	return false;
},
getScrollX:function() 
{
    var scrollX = 0;
    if (!window.pageXOffset)
	{
	    scrollX = document.documentElement.scrollLeft;
    }
    else
	{
        scrollX = window.pageXOffset;
    }
    return scrollX;
},
getScrollY:function() 
{
    var scrollY = 0;
    if (!window.pageYOffset)
	{
	    scrollY = document.documentElement.scrollTop;
    }
	else
	{
        scrollY = window.pageYOffset;
    }
    return scrollY;
},
_splitArray:function(stringArray)
{
	var allowedCommaArray = _fu51;
	var delimiter = ",";
	for (var index = 0; index < allowedCommaArray.length; index += 1)
	{
		if (stringArray.indexOf(allowedCommaArray[index]) > -1)
		{
			delimiter = allowedCommaArray[index];
			break;
		}
	}
	return stringArray.split(delimiter);
},
setLocalizedMonthNames:function(monthsNameString)
{
	var monthsNameArray = _fu62(monthsNameString);
	_fu59 = monthsNameArray;
},
setLocalizedMonthNamesAbr:function(abreviatedmonthsNameString)
{
	var abreviatedmonthsNameArray = _fu62(abreviatedmonthsNameString);
	_fu58 = abreviatedmonthsNameArray;
},
setLocalizedDayOfWeekNames:function(dayOfWeekNameString)
{
	var dayOfWeekNameArray = _fu62(dayOfWeekNameString);
	_fu54 = dayOfWeekNameArray;
},
setLocalizedDayOfWeekNamesAbr:function(dayOfWeekNameAbbreviatedString)
{
	var dayOfWeekNameAbbreviatedArray = _fu62(dayOfWeekNameAbbreviatedString);
	_fu53 = dayOfWeekNameAbbreviatedArray;
},
setLocalizedAntePostMeridiem:function(antePostMeridiemNameString)
{
	var antePostMeridiemNameArray = _fu62(antePostMeridiemNameString);
	_fu52 = antePostMeridiemNameArray;
},
setLocalizedHourSuffix:function(hourSuffixString)
{
	_fu56 = hourSuffixString;
},
setLocalizedMinuteSuffix:function(minuteSuffixString)
{
	_fu57 = minuteSuffixString;	
},
setMilitaryTime:function(militaryTimeFlag)
{
	if (_fu13(militaryTimeFlag, _fcd13))
	{
		if (militaryTimeFlag=="true")
		{
			_fu61 = true;
		}
		else
		{
			_fu61 = false;
		}
	} else if (_fu13(militaryTimeFlag, _fcd2))
	{
		_fu61 = militaryTimeFlag;
	} else
	{
		_fu61 = false;
	}
},
setLocalizedYearSuffix:function(yearSuffixString)
{
	_fu60 = yearSuffixString;
},
setLocalizedDaySuffix:function(daySuffixString)
{
	_fu55 = daySuffixString;
},
setLocalizedWindowAriaLabel:function(windowAriaLabelString)
{
	framework.util._windowAriaLabel=windowAriaLabelString;
},
setLocalizedNextMonthButtonAriaLabel:function(nextMonthButtonAriaLabelString)
{
	framework.util._nextMonthButtonAriaLabel=nextMonthButtonAriaLabelString;
},
setLocalizedPreviousMonthButtonAriaLabel:function(previousMonthButtonAriaLabelString)
{
	framework.util._previousMonthButtonAriaLabel=previousMonthButtonAriaLabelString;
},
setLocalizedNextYearButtonAriaLabel:function(nextYearButtonAriaLabelString)
{
	framework.util._nextYearButtonAriaLabel=nextYearButtonAriaLabelString;
},
setLocalizedPreviousYearButtonAriaLabel:function(previousYearButtonAriaLabelString)
{
	framework.util._previousYearButtonAriaLabel=previousYearButtonAriaLabelString;
},
setLocalizedDateClickableAriaLabel:function(dateClickableAriaLabelString)
{
	framework.util._dateClickableAriaLabel=dateClickableAriaLabelString;
},
setDateFormat:function(dateFormat, dateObject)
{
	if (!_fu14(dateFormat) && !_fu14(dateObject)) {
		if (_fu13(dateFormat, _fcd13) ||
			_fu13(dateObject, _fcd3))
		{
			dateFormat = dateFormat.replace("%sm", _fu59[dateObject.getMonth()]);
			dateFormat = dateFormat.replace("%sn", _fu58[dateObject.getMonth()]);
			dateFormat = dateFormat.replace("%sy", _fu60);
			dateFormat = dateFormat.replace("%sd", _fu55);
			dateFormat = dateFormat.replace("%sw", _fu54[dateObject.getDay()]);
			dateFormat = dateFormat.replace("%so", _fu53[dateObject.getDay()]);
			var tempMeridien;
			if (dateObject.getHours() < 12)
			{
				tempMeridien = 0;
			}
			else 
			{
				tempMeridien = 1;
			}
			dateFormat = dateFormat.replace("%sa", _fu52[tempMeridien]);
			dateFormat = dateFormat.replace("%si", _fu57);
			dateFormat = dateFormat.replace("%sh", _fu56);
			var tempMinute;
			if (dateObject.getMinutes() < 10)
			{
				tempMinute = "0" + (dateObject.getMinutes());
			}
			else 
			{
				tempMinute = (dateObject.getMinutes());
			}
			dateFormat = dateFormat.replace("%ii", tempMinute);
			dateFormat = dateFormat.replace("%i", dateObject.getMinutes());
			var tempHours;
			var singleTempHours;
			if (_fu61)
			{
				if (dateObject.getHours() < 10)
				{
					tempHours = "0" + (dateObject.getHours());
				}
				else 
				{
					tempHours = (dateObject.getHours());
				}
				singleTempHours = (dateObject.getHours());
			}
			else
			{
				if (dateObject.getHours() === 0)
				{
					tempHours = 12;
				}
				if (dateObject.getHours() > 12)
				{
					tempHours = dateObject.getHours() - 12;
				}
				else
				{
					tempHours = dateObject.getHours();
				}
				singleTempHours = tempHours;
				if (tempHours < 10)
				{
					tempHours = "0" + tempHours;
				}
			}
			dateFormat = dateFormat.replace("%hh", tempHours);
			dateFormat = dateFormat.replace("%h", singleTempHours);
			var tempMonth;
			if (dateObject.getMonth() + 1 < 10)
			{
				tempMonth = "0" + (dateObject.getMonth() + 1);
			}
			else 
			{
				tempMonth = (dateObject.getMonth() + 1);
			}
			dateFormat = dateFormat.replace("%mm", tempMonth);
			dateFormat = dateFormat.replace("%m", dateObject.getMonth() + 1);
			var tempDate;
			if (dateObject.getDate() < 10)
			{
				tempDate = "0" + dateObject.getDate();
			}
			else 
			{
				tempDate = dateObject.getDate();
			}
			dateFormat = dateFormat.replace("%dd", tempDate);
			dateFormat = dateFormat.replace("%d", dateObject.getDate());
			dateFormat = dateFormat.replace("%yyyy", dateObject.getFullYear());
			dateFormat = dateFormat.replace("%yy", dateObject.getFullYear().toString().slice(2,4));	
			return dateFormat.toString();
		}
	} else {
		return null;
	}
},
_allowedComma:['\u002c', '\uff0c', '\u060c', '\u201a', '\u3001'],
_localizedMonthNames:[],
_localizedDaySuffix:"",
_localizedYearSuffix:"",
_localizedMinuteSuffix:"",
_MilitaryTime:false,
_localizedMonthNamesAbr:[],
_localizedDayOfWeekNames:[],
_localizedDayOfWeekNamesAbr:[],
_localizedAntePostMeridiem:[],
_localizedHourSuffix:"",
_isDebugEnabled:false,
_selectElements:[],
_windowAriaLabel:"",
_nextMonthButtonAriaLabel:"",
_previousMonthButtonAriaLabel:"",
_nextYearButtonAriaLabel:"",
_previousYearButtonAriaLabel:"",
_dateClickableAriaLabel:"",
loaded:true
};
framework.widget.busy = {
start:function(elementId, message)
{
	var pos = _fu5(elementId);
	if (!_fu14(pos))
	{
		var element = document.getElementById(elementId + ".busy");
		if (!_fu14(element))
		{
			_fwb2(elementId);
		}
		element = document.getElementById(elementId);
		if (!_fu14(element) && element.nodeName === "DIV")
		{
			var elementHeight = element.clientHeight > 0? element.clientHeight:element.offsetHeight;
			var elementWidth = element.clientWidth > 0? element.clientWidth:element.offsetWidth;
			var width = 270,	
				height = 85,	
				shadowOffset = 10,	
				parentDivWidth = width + shadowOffset,
				parentDivHeight = height + shadowOffset,
				top = pos[1] + ((elementHeight - parentDivHeight) / 2),
				left = pos[0] + ((elementWidth - parentDivWidth) / 2),
				busyElement = document.createElement("DIV"),
				html = [];
			busyElement.id = elementId + ".busy";
			busyElement.className = "outerDiv";
		 	busyElement.style.top = top + "px";
			busyElement.style.left = left + "px";
			if (_fu11() && !_fu10())
			{
				_fu8(elementId + ".busy", [ top, (left + width), (top + height), left ]);
			}
		 	element.appendChild(busyElement);
			html.push('<div class="busyDiv">');
			html.push('<div class="indicator"></div>');
			html.push('<div class="busyMessage">');
			html.push(message);
			html.push('</div>');
			html.push('</div>');
			html.push('<div class="shadowDiv"></div>');
			busyElement.innerHTML = html.join("");
		}
	}
},
stop:function(elementId)
{
	var element = document.getElementById(elementId),
		busyElement = document.getElementById(elementId + ".busy");
	if (!_fu14(element) &&
		!_fu14(busyElement))
	{
		element.removeChild(busyElement);
		if (_fu11() && !_fu10())
		{
			_fu24(elementId + ".busy");
		}
	}
},
loaded:true
};
framework.widget.calendar = {
init:function(calendarId, allowableDates, dateFormat, headerTextFormat, startingDate, range, dateChangeHandler, beforeCalendarShownHandler, afterCalendarCloseHandler)
{
	if (!_fu13(calendarId, _fcd13) ||
		!_fu13(allowableDates, _fcd1) ||
		!_fu13(dateFormat, _fcd13) ||
		!_fu13(headerTextFormat, _fcd13) || 
		!_fu13(startingDate, _fcd10) ||
		!_fu13(range, _fcd2) ||
		!_fu13(dateChangeHandler, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId) ||
		_fu9(allowableDates) ||
		_fu9(dateFormat) ||
		_fu9(headerTextFormat) ||
		!_fu13(startingDate, _fcd5) ||
		(!_fu14(beforeCalendarShownHandler) && !_fu13(beforeCalendarShownHandler, _fcd6)) || 
		(!_fu14(afterCalendarCloseHandler) && !_fu13(afterCalendarCloseHandler, _fcd6)))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	_fwc31(calendar);
	_fwc24(calendar);
	calendar._isPopupWindowVisible = false;
	document.getElementById(calendarId+"._icon").tabIndex=0;
	document.getElementById(calendarId+"._window").setAttribute("aria-label",framework.util._windowAriaLabel);
	var statusCode = _fwc27(calendarId);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	_fe1(calendarId+"._icon", _fce4, _fwc33);
	_fe1(calendarId+"._text", _fce7, _fwc43);		
	_fe1(calendarId+"._body", _fce4, _fwc28);
	_fe1(calendarId+"._body", _fce24, _fwc28);
	_fe1(calendarId+"._body", _fce10, framework.widget.calendar._dateOnEnterKeyEventHandler);
	_fe1(calendarId+"._body", _fce15, _fwc30);
	_fe1(calendarId+"._body", _fce14, _fwc29);			
	_fe1(calendarId+"._window", _fce14, _fwc45);	
	_fe1(calendarId+"._window", "focusout", framework.widget.calendar._windowOnFocusOutEventHandler);
	_fe1(calendarId+"._nextMonth", _fce4, _fwc34);	
	_fe1(calendarId+"._nextMonth", _fce10, framework.widget.calendar._nextOnEnterEventHandler);
	_fe1(calendarId+"._previousMonth", _fce4, _fwc36);	
	_fe1(calendarId+"._previousMonth", _fce10, framework.widget.calendar._previousOnEnterEventHandler);
	if (calendar._showYearButtons)
	{
		_fe1(calendarId+"._nextYear", _fce4, _fwc35);
		_fe1(calendarId+"._nextYear", _fce10, framework.widget.calendar._nextYearOnEnterEventHandler);
		_fe1(calendarId+"._previousYear", _fce4, _fwc37);			
		_fe1(calendarId+"._previousYear", _fce10, framework.widget.calendar._previousYearOnEnterEventHandler);
	}
	var localizedDayOfWeekNames = _fu54;
	var dayOfTheWeekOne = _fwc25(_fcw11, startingDate);
	if (_fu14(dayOfTheWeekOne))
	{
		
		return _fcst6;
	}
	var dayOfTheWeekTwo = _fwc25(_fcw5, startingDate);
	if (_fu14(dayOfTheWeekTwo))
	{
			
		return _fcst6;
	}
	var dayOfTheWeekThree = _fwc25(_fcw23, startingDate);
	if (_fu14(dayOfTheWeekThree))
	{
			
		return _fcst6;
	}
	var dayOfTheWeekFour = _fwc25(_fcw24, startingDate);
	if (_fu14(dayOfTheWeekFour))
	{
			
		return _fcst6;
	}
	var dayOfTheWeekFive = _fwc25(_fcw22, startingDate);
	if (_fu14(dayOfTheWeekFive))
	{
		
		return _fcst6;
	}
	var dayOfTheWeekSix = _fwc25(_fcw4, startingDate);
	if (_fu14(dayOfTheWeekSix))
	{
		
		return _fcst6;
	}
	var dayOfTheWeekSeven = _fwc25(_fcw10, startingDate);
	if (_fu14(dayOfTheWeekSeven))
	{
		
		return _fcst6;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek1"), localizedDayOfWeekNames[dayOfTheWeekOne].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek2"), localizedDayOfWeekNames[dayOfTheWeekTwo].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek3"), localizedDayOfWeekNames[dayOfTheWeekThree].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek4"), localizedDayOfWeekNames[dayOfTheWeekFour].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek5"), localizedDayOfWeekNames[dayOfTheWeekFive].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek6"), localizedDayOfWeekNames[dayOfTheWeekSix].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	statusCode = _fu21((calendarId + "._daysoftheweek7"), localizedDayOfWeekNames[dayOfTheWeekSeven].toString());
	if (statusCode != _fcst13)	
	{
		return statusCode;
	}
	calendar = document.getElementById(calendarId);
	if (_fu14(calendar))	
	{
		
		return _fcst3;
	}
	calendar._allowableDates = allowableDates;
	calendar._dateFormat = dateFormat;  
	calendar._headerTextFormat = headerTextFormat;
	calendar._dateChangeHandler = dateChangeHandler;
	calendar._currentCalendarDateOnWidget = null;
	calendar._startingDate = startingDate;	
	calendar._insideWindow = false;
	calendar._range = range;
	if (_fu14(beforeCalendarShownHandler))
	{
		calendar._beforeOpenHandler = null;
	}
	else
	{
		calendar._beforeOpenHandler = beforeCalendarShownHandler;
	}
	if (_fu14(afterCalendarCloseHandler))
	{
		calendar._afterCloseHandler = null;
	}
	else
	{
		calendar._afterCloseHandler = afterCalendarCloseHandler;
	}
	return _fcst13;
},
setSelectableDates:function(calendarId, allowableDates, range)
{
	if (!_fu13(calendarId, _fcd13) ||
		!_fu13(allowableDates, _fcd1) ||
		!_fu13(range, _fcd2))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId) ||
		_fu9(allowableDates))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))	
	{
		
		return _fcst3;
	}
	calendar._allowableDates = allowableDates;
	calendar._range = range;
	return _fcst13;
},
getSelectedDateObject:function(calendarId)
{
	if (!_fu13(calendarId, _fcd13))
	{
		
		return null;
	}
	if (_fu9(calendarId))
	{
		
		return null;
	}
	var selectedDateStr = document.getElementById(calendarId+"._date");
	if (_fu14(selectedDateStr))
	{
		
		return null;
	}
  	var reggie = /\d\d\/\d\d\/\d\d\d\d/;	
	if (reggie.test(selectedDateStr.value))
	{
		var month = selectedDateStr.value.slice(0,2);
		var day = selectedDateStr.value.slice(3,5);
		var year = selectedDateStr.value.slice(6,10);	
		var aDate = new Date();	
		aDate.setFullYear(year, month - 1, day);
		return aDate;
	}
	else
	{
		
		return null;
	}
},
setSelectedDateObject:function(calendarId, newDate)
{
	if ((!_fu13(calendarId, _fcd13) && _fu14(calendarId)) ||
		(!_fu13(newDate, _fcd3) && _fu14(newDate)))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{
				
		return _fcst3;
	}
	if (_fwc44(newDate, calendarId))
	{	
		if (newDate != _fwc5(calendarId)) 
		{
			var calendarIdTexteElement = document.getElementById(calendarId+"._text");
			if (_fu14(calendarIdTexteElement))
			{	
						
				return _fcst3;
			}
			calendarIdTexteElement.value = _fu50(calendar._dateFormat, newDate);
			var calendarIdDateElement = document.getElementById(calendarId+"._date");
			if (_fu14(calendarIdDateElement))
			{	
						
				return _fcst3;
			}
			calendarIdDateElement.value = _fu50("%mm/%dd/%yyyy", newDate);
			if (_fu14(calendarIdDateElement.value))
			{
						
				return _fcst6;
			}
		}
		else
		{
					
			return _fcst6;
		}
	}
	else
	{
				
		return _fcst7;
	}
	return _fcst13;
},
setFirstAvailableDate:function(calendarId, newDate)
{
	if (!_fu13(calendarId, _fcd13) ||
		!_fu13(newDate, _fcd3))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{
				
		return _fcst3;
	}
	calendar._allowableDates.sort(_fwc41);
	var firstAvailableDate = new Date();
	if (_fwc2(newDate, calendar._allowableDates[0], true, true)) 
	{
		firstAvailableDate = _fu2(calendar._allowableDates[0]);
	}
	if (_fwc2(newDate, calendar._allowableDates[calendar._allowableDates.length - 1], true, true)) 
	{
		if(calendar._range)
		{
			firstAvailableDate = _fu2(newDate);
		}
		else
		{
			for (var index = 0; index < calendar._allowableDates.length; index += 1)
			{
				if ((calendar._allowableDates[index].getFullYear() == newDate.getFullYear()) &&
					(calendar._allowableDates[index].getMonth() == newDate.getMonth()) &&
					(calendar._allowableDates[index].getDate() == newDate.getDate()))
				{
					firstAvailableDate = _fu2(newDate);
					break;
				}
				else if (_fwc1(calendar._allowableDates[index], newDate, true, false)) 
				{
					firstAvailableDate = _fu2(calendar._allowableDates[index]);
					break;
				}
			}
		}
	}
	else
	{
				
		return _fcst7;
	}	
	if (firstAvailableDate != _fwc5(calendarId)) 
	{
		var calendarIdTextElement = document.getElementById(calendarId+"._text");
		if (_fu14(calendarIdTextElement))
		{	
					
			return _fcst3;
		}
		calendarIdTextElement.value = _fu50(calendar._dateFormat, firstAvailableDate);
		var calendarIdDateElement = document.getElementById(calendarId+"._date");
		if (_fu14(calendarIdDateElement))
		{	
					
			return _fcst3;
		}
		calendarIdDateElement.value = _fu50("%mm/%dd/%yyyy", firstAvailableDate);
		if (_fu14(calendarIdDateElement.value))
		{
					
			return _fcst6;
		}
	}
	return _fcst13;
},
resetSelectedDateObject:function(calendarId)
{
	if (!_fu13(calendarId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{	
		
		return _fcst3;
	}
	var calendarIdTexteElement = document.getElementById(calendarId+"._text");
	if (_fu14(calendarIdTexteElement))
	{	
		
		return _fcst3;
	}
	calendarIdTexteElement.value = "";
	var calendarIdDateElement = document.getElementById(calendarId+"._date");
	if (_fu14(calendarIdDateElement))
	{	
		
		return _fcst3;
	}
	calendarIdDateElement.value = "";
	return _fcst13;
},
clearTime:function(dateObject)
{
	if (!_fu13(dateObject, _fcd3))
	{
		return null;
	}
	dateObject.setHours(0);
	dateObject.setMinutes(0);
	dateObject.setSeconds(0);
	dateObject.setMilliseconds(0);
	return dateObject;
},
beforeDate:function(dateObjectA, dateObjectB, clearTime, equals)
{
	if (!_fu13(dateObjectA, _fcd3) &&
		!_fu13(dateObjectB, _fcd3) &&
		!_fu13(equals, _fcd2) &&
		!_fu13(clearTime, _fcd2))
	{
		return null;
	}
	if (clearTime)
	{
		_fwc3(dateObjectA);
		_fwc3(dateObjectB);
	}
	if (equals)
	{
		return dateObjectA.getTime() <= dateObjectB;
	}
	else
	{
		return dateObjectA.getTime() < dateObjectB.getTime();
	}
	return null;
},
afterDate:function(dateObjectA, dateObjectB, clearTime, equals)
{
	if (!_fu13(dateObjectA, _fcd3) &&
		!_fu13(dateObjectB, _fcd3) &&
		!_fu13(equals, _fcd2) &&
		!_fu13(clearTime, _fcd2))
	{
		return null;
	}
	if (clearTime)
	{
		_fwc3(dateObjectA);
		_fwc3(dateObjectB);
	}
	if (equals)
	{
		return dateObjectA.getTime() >= dateObjectB;
	}
	else
	{
		return dateObjectA.getTime() > dateObjectB.getTime();
	}
	return null;
},
setLocalizedMonthNames:function(monthsNameString)
{
	_fu47(monthsNameString);
},
setLocalizedMonthNamesAbr:function(abreviatedmonthsNameString)
{
	_fu46(abreviatedmonthsNameString);
},
setLocalizedDayOfWeekNames:function(dayOfWeekNameString)
{
	_fu42(dayOfWeekNameString);
},
setLocalizedDayOfWeekNamesAbr:function(dayOfWeekNameAbbreviatedString)
{
	_fu41(dayOfWeekNameAbbreviatedString);
},
setLocalizedAntePostMeridiem:function(antePostMeridiemNameString)
{
	_fu40(antePostMeridiemNameString);
},
setLocalizedHourSuffix:function(hourSuffixString)
{
	_fu44(hourSuffixString);
},
setLocalizedMinuteSuffix:function(minuteSuffixString)
{
	_fu45(minuteSuffixString);
},
setMilitaryTime:function(militaryTimeFlag)
{
	_fu49(militaryTimeFlag);
},
setLocalizedYearSuffix:function(yearSuffixString)
{
	_fu48(yearSuffixString);
},
setLocalizedDaySuffix:function(daySuffixString)
{
	_fu43(daySuffixString);
},
setLocalizedWindowAriaLabel:function(windowAriaLabelString)
{
	framework.util.setLocalizedWindowAriaLabel(windowAriaLabelString);
},
setLocalizedNextMonthButtonAriaLabel:function(nextMonthButtonAriaLabelString)
{
	framework.util.setLocalizedNextMonthButtonAriaLabel(nextMonthButtonAriaLabelString);
},
setLocalizedPreviousMonthButtonAriaLabel:function(previousMonthButtonAriaLabelString)
{
	framework.util.setLocalizedPreviousMonthButtonAriaLabel(previousMonthButtonAriaLabelString);
},
setLocalizedNextYearButtonAriaLabel:function(nextYearButtonAriaLabelString)
{
	framework.util.setLocalizedNextYearButtonAriaLabel(nextYearButtonAriaLabelString);
},
setLocalizedPreviousYearButtonAriaLabel:function(previousYearButtonAriaLabelString)
{
	framework.util.setLocalizedPreviousYearButtonAriaLabel(previousYearButtonAriaLabelString);
},
setLocalizedDateClickableAriaLabel:function(dateClickableAriaLabelString)
{
	framework.util.setLocalizedDateClickableAriaLabel(dateClickableAriaLabelString);
},
setDateFormat:function(dateFormat, dateObject)
{
	return _fu50(dateFormat, dateObject);
},
isPopupWindowVisible:function(calendarId)
{
	if (_fu14(calendarId))
	{
		
		return null;
	}
	if (!_fu13(calendarId, _fcd13))
	{
		
		return null;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{
		
		return null;
	}
	return calendar._isPopupWindowVisible;
},
closePopupWindow:function(calendarId)
{
	var retVal = _fwc27(calendarId);
	if (retVal == _fcst13)
	{
		var calendar = document.getElementById(calendarId);
		if (!_fu14(calendar))
		{
			if (!_fu14(calendar._afterCloseHandler))
			{
				calendar._afterCloseHandler(calendar._position, calendarId);
			}
		}
	}
	return retVal;
},
_closePopupWindow:function(calendarId)
{
	if (_fu14(calendarId))
	{
		
		return _fcst6;
	}
	if (!_fu13(calendarId, _fcd13))
	{
		
		return _fcst14;
	}
	var retVal = _fwc7(calendarId);
	if (_fu14(retVal))
	{
		
		return _fcst3;
	}
	if (retVal === true)
	{
		var calendar = document.getElementById(calendarId);
		retVal = _fu24(calendarId);
		if (retVal != _fcst13)
		{
			return retVal;
		}
		_fu7(calendarId + "._window");
		calendar._isPopupWindowVisible = false;
	}
	return _fcst13;
},
_windowOnMouseOutEventHandler:function(event)
{
	var calendarId = _fwc40(this.id);
	var calendar = document.getElementById(calendarId);
   	if (_fu16(calendarId + "._window", event))
   	{
		calendar._insideWindow = true;
	}
	else
	{
		calendar._insideWindow = false;
		var textElement = document.getElementById(calendarId + "._text");
		if (!_fu14(textElement))
		{
			calendar._blurred = false;
			textElement.blur();
		}
		if (calendar._blurred === false)
		{
			return _fwc4(calendarId);
		}
	}
	return _fcst13;
},
_windowOnFocusOutEventHandler:function(event)
{
	var calendarId = _fwc40(this.id);
	var calendar = document.getElementById(calendarId);
   	if (_fu16(calendarId + "._window", event))
   	{
		calendar._insideWindow = true;
	}
	else
	{
		calendar._insideWindow = false;
		var textElement = document.getElementById(calendarId + "._text");
		if (!_fu14(textElement))
		{
			calendar._blurred = false;
			textElement.blur();
		}
		if (calendar._blurred === false)
		{
			return _fwc4(calendarId);
		}
	}
	return _fcst13;
},
_textOnBlurEventHandler:function(event)
{
    var calendarId = _fwc40(this.id);
    var calendar = document.getElementById(calendarId);
    if (!calendar._insideWindow)
	{
		var retVal = _fwc4(calendarId);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	calendar._blurred = true;
	return _fcst13;
},
_iconOnClickEventHandler:function(event)
{
	event.stopPropagation();  
	var calendarId = _fwc40(this.id);
	var textElement = document.getElementById(calendarId + "._text");
	if (!_fu14(textElement))
	{
		textElement.focus();
	}
},
_textOnClickEventHandler:function(event)
{
	var calendarId = _fwc40(this.id);
	var calendar = document.getElementById(calendarId);	
	_fwc38(calendarId);
	if (!_fu14(calendar._beforeOpenHandler))
	{
		calendar._beforeOpenHandler(calendar._position, calendarId);
	}
	event.stopPropagation();  
},
_dateOnEnterKeyEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	var eventTarget = _fe3(event);
    	if (!_fu9(eventTarget.innerHTML) && eventTarget.calendarDateEnabled === true)
    	{
    		var calendarId = _fwc40(this.id);
    		var calendar = document.getElementById(calendarId);
    		var retVal = _fwc27(calendarId);
    		if (retVal != _fcst13)
    		{
    			return retVal;
    		}
    		setTimeout(function(){
    			document.getElementById(calendarId+"._icon").focus();
    		},300)
    		var currentCalendarDateOnWidgetClone = _fu2(calendar._currentCalendarDateOnWidget);
    		currentCalendarDateOnWidgetClone.setDate(eventTarget.innerHTML);
    		_fwc22(calendarId, currentCalendarDateOnWidgetClone);  
    		if (!_fu14(calendar._dateChangeHandler))
    		{
    			var dateChangeHandler = calendar._dateChangeHandler + "('" + calendarId +  "')";
    			eval(dateChangeHandler);
    		}
    		if (!_fu14(calendar._afterCloseHandler))
    		{
    			calendar._afterCloseHandler(calendar._position, calendarId);
    		}
    	}
    	event.stopPropagation();  
    }
    return _fcst13;
},
_dateOnClickEventHandler:function(event)
{
	var eventTarget = _fe3(event);
	if (!_fu9(eventTarget.innerHTML) && eventTarget.calendarDateEnabled === true)
	{
		var calendarId = _fwc40(this.id);
		var calendar = document.getElementById(calendarId);
		var retVal = _fwc27(calendarId);
		if (retVal != _fcst13)
		{
			return retVal;
		}
		var currentCalendarDateOnWidgetClone = _fu2(calendar._currentCalendarDateOnWidget);
		currentCalendarDateOnWidgetClone.setDate(eventTarget.innerHTML);
		_fwc22(calendarId, currentCalendarDateOnWidgetClone);  
		if (!_fu14(calendar._dateChangeHandler))
		{
			var dateChangeHandler = calendar._dateChangeHandler + "('" + calendarId +  "')";
			eval(dateChangeHandler);
		}
		if (!_fu14(calendar._afterCloseHandler))
		{
			calendar._afterCloseHandler(calendar._position, calendarId);
		}
	}
	event.stopPropagation();  
	return _fcst13;
},
_nextOnClickEventHandler:function(event)
{
	if (this.enabled === true)
	{
		var calendarId = _fwc40(this.id);
		var calendar = document.getElementById(calendarId);
		document.getElementById(calendarId+"._window").focus();
		var nextCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
		nextCalendarDate.setMonth(nextCalendarDate.getMonth() + 1);  
		_fu23(calendarId + "._week6");
		_fwc39(calendarId, nextCalendarDate.getMonth(), nextCalendarDate.getFullYear());
	}
	event.stopPropagation();
},
_nextOnEnterEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	if (this.enabled === true)
    	{
    		var calendarId = _fwc40(this.id);
    		var calendar = document.getElementById(calendarId);
    		document.getElementById(calendarId+"._window").focus();
    		var nextCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
    		nextCalendarDate.setMonth(nextCalendarDate.getMonth() + 1);  
    		_fu23(calendarId + "._week6");
    		_fwc39(calendarId, nextCalendarDate.getMonth(), nextCalendarDate.getFullYear());
    	}
    	event.stopPropagation();
    }
},
_previousOnClickEventHandler:function(event)
{
	if (this.enabled === true)
	{
		var calendarId = _fwc40(this.id);
		var calendar = document.getElementById(calendarId);
		document.getElementById(calendarId+"._window").focus();
		var previousCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
		previousCalendarDate = new Date(previousCalendarDate.setMonth(previousCalendarDate.getMonth() - 1));  
		_fu23(calendarId + "._week6");
		_fwc39(calendarId, previousCalendarDate.getMonth(), previousCalendarDate.getFullYear());
	}
	event.stopPropagation();
},
_previousOnEnterEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	if (this.enabled === true)
    	{
    		var calendarId = _fwc40(this.id);
    		var calendar = document.getElementById(calendarId);
    		document.getElementById(calendarId+"._window").focus();
    		var previousCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
    		previousCalendarDate = new Date(previousCalendarDate.setMonth(previousCalendarDate.getMonth() - 1));  
    		_fu23(calendarId + "._week6");
    		_fwc39(calendarId, previousCalendarDate.getMonth(), previousCalendarDate.getFullYear());
    	}
    	event.stopPropagation();
    }
},
_nextYearOnClickEventHandler:function(event)
{
	if (this.enabled === true)
	{
		var calendarId = _fwc40(this.id);
		var calendar = document.getElementById(calendarId);
		document.getElementById(calendarId+"._window").focus();
		var nextCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
		nextCalendarDate.setFullYear(nextCalendarDate.getFullYear() + 1);  
		_fu23(calendarId + "._week6");
		_fwc39(calendarId, nextCalendarDate.getMonth(), nextCalendarDate.getFullYear());
	}
	event.stopPropagation();
},
_nextYearOnEnterEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	if (this.enabled === true)
    	{
    		var calendarId = _fwc40(this.id);
    		var calendar = document.getElementById(calendarId);
    		document.getElementById(calendarId+"._window").focus();
    		var nextCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
    		nextCalendarDate.setFullYear(nextCalendarDate.getFullYear() + 1);  
    		_fu23(calendarId + "._week6");
    		_fwc39(calendarId, nextCalendarDate.getMonth(), nextCalendarDate.getFullYear());
    	}
    	event.stopPropagation();
    }
},
_previousYearOnClickEventHandler:function(event)
{
	if (this.enabled === true)
	{
		var calendarId = _fwc40(this.id);
		var calendar = document.getElementById(calendarId);
		document.getElementById(calendarId+"._window").focus();
		var previousCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
		previousCalendarDate.setFullYear(previousCalendarDate.getFullYear() - 1);  
		_fu23(calendarId + "._week6");
		_fwc39(calendarId, previousCalendarDate.getMonth(), previousCalendarDate.getFullYear());
	}
	event.stopPropagation();
},
_previousYearOnEnterEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	if (this.enabled === true)
    	{
    		var calendarId = _fwc40(this.id);
    		var calendar = document.getElementById(calendarId);
    		document.getElementById(calendarId+"._window").focus();
    		var previousCalendarDate = _fu2(calendar._currentCalendarDateOnWidget);
    		previousCalendarDate.setFullYear(previousCalendarDate.getFullYear() - 1);  
    		_fu23(calendarId + "._week6");
    		_fwc39(calendarId, previousCalendarDate.getMonth(), previousCalendarDate.getFullYear());
    	}
    	event.stopPropagation();
    }
},
_dateOnMouseOverEventHandler:function(event)
{
	var eventTarget = _fe3(event);
	if (!_fu9(eventTarget.innerHTML) && eventTarget.calendarDateEnabled === true)
	{
		_fu18(eventTarget.id, "mouseOverDateStyle");
	}
},
_dateOnMouseOutEventHandler:function(event)
{
	var eventTarget = _fe3(event);
	if (eventTarget.innerHTML !== "" && eventTarget.calendarDateEnabled === true)
	{
		var calendarId = _fwc40(eventTarget.id);
		var calendar = document.getElementById(calendarId);
		var currentTargetDate = _fu2(calendar._currentCalendarDateOnWidget);
		currentTargetDate.setDate(eventTarget.innerHTML);
		currentTargetDate = _fwc3(currentTargetDate); 
		var selectedDateObject = _fwc5(calendarId);
		var selectedDate = null;
		if (!_fu14(selectedDateObject))
		{
			selectedDate = _fu2(selectedDateObject);
			selectedDate = _fwc3(selectedDate); 
		}
		if (!_fu14(selectedDate) && selectedDate.getTime() == currentTargetDate.getTime())
		{
			_fu18(eventTarget.id, "selectedDateStyle");
		}
		else
		{
			_fu18(eventTarget.id, "enabledDateStyle");
		}
	}
},
_validateAllowableDate:function(dateObject, calendarId)
{
	if (!_fu13(dateObject, _fcd3) || 
		!_fu13(calendarId, _fcd13))
	{
		
		return null;
	}
	if (_fu9(calendarId))
	{
		
		return null;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{	
		
		return null;
	}
	if (calendar._range === false)
	{
		for (var index = 0; index < calendar._allowableDates.length; index += 1)
		{
			if ((calendar._allowableDates[index].getFullYear() == dateObject.getFullYear()) &&
				(calendar._allowableDates[index].getMonth() == dateObject.getMonth()) &&
				(calendar._allowableDates[index].getDate() == dateObject.getDate()))
			{
				return true;
			}
		}
	}
	else 
	{
		var startingDate = _fu2(calendar._allowableDates[0]);
		var endDate = _fu2(calendar._allowableDates[1]);
		if (_fwc2(startingDate, dateObject, true, true) &&
		    _fwc1(endDate, dateObject, true, true))
		{
			return true;
		}
	}
	return false;
},
_sliceOutMainId:function(childId)
{
	if (!_fu13(childId, _fcd13))
	{
		
		return null;
	}
	if (_fu9(childId))
	{
		
		return null;
	}
	return childId.substring(0, childId.lastIndexOf("."));
},
_calculateAppropriateDay:function(dayOfTheWeek, startingDay)
{
	if (!_fu13(dayOfTheWeek, _fcd10) ||
		!_fu13(startingDay, _fcd10))
	{
		
		return null;
	}
	var appropriateDay = dayOfTheWeek + startingDay;
	if (appropriateDay < 0)
	{
		appropriateDay = appropriateDay + 7;
	}
	if (appropriateDay > 6)
	{
		appropriateDay = appropriateDay - 7;
	}
	return appropriateDay;
},
_showCalendar:function(calendarId)
{
	if (!_fu13(calendarId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var statusCode;
	var selectedDate = _fwc5(calendarId);
	var todaysDate = new Date();
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{
		
		return _fcst3;
	}
	if (_fu14(selectedDate) && (_fwc44(todaysDate, calendarId)))
	{
		selectedDate = todaysDate;
	}
	else if (_fu14(selectedDate) && (!_fwc44(todaysDate, calendarId)))
	{
		calendar._allowableDates.sort(_fwc41);
		selectedDate = calendar._allowableDates[0];
	}
	_fu23(calendarId + "._week6"); 
	statusCode = _fwc39(calendarId, selectedDate.getMonth(), selectedDate.getFullYear());
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	statusCode = _fwc26(calendarId);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	_fu23(calendarId + "._window"); 
	setTimeout(function (){
		document.getElementById(calendarId + "._window").focus();
	},300);
	calendar._isPopupWindowVisible = true;
	return _fcst13;
},
_sortDateArray:function(first, second)
{
	return first.getTime() - second.getTime();
},
_getCalendarAttributes:function(calendar)
{
	if (calendar.getAttribute("includeYearButtons") == "true")
	{
		calendar._showYearButtons = true;
	}
	else
	{
		calendar._showYearButtons = false;	
	}
	return _fcst13;
},
_showMonth:function(calendarId, month, year)
{
	if (!_fu13(calendarId, _fcd13) ||
		!_fu13(month, _fcd10) ||
		!_fu13(year, _fcd10))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId) ||
		!_fu13(month, _fcd5) ||
		!_fu13(year, _fcd5))
	{
		
		return _fcst6;
	}
	var currentCalendarDate = new Date();
	currentCalendarDate.setDate(1); 
	currentCalendarDate.setMonth(month);  
	currentCalendarDate.setFullYear(year);
	currentCalendarDate = _fwc3(currentCalendarDate);
	if (_fu14(currentCalendarDate))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	if (_fu14(calendar))
	{
		
		return _fcst3;
	}
	calendar._currentCalendarDateOnWidget = currentCalendarDate;
	var currentmonthYear = _fu50(calendar._headerTextFormat, currentCalendarDate);
	var statusCode = _fu21(calendarId+ "._title", currentmonthYear);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	var lastDayForFebInLeapYear;
	if (((year % 4 === 0) && 
	     (year % 100 !== 0)) || 
    	 (year % 400 === 0)) 
	{
	     lastDayForFebInLeapYear = 29;
	}
	else
	{
		lastDayForFebInLeapYear = 28;
	}
	var lastDayinMonth = [31, lastDayForFebInLeapYear, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	var currentWeekDay = currentCalendarDate.getDay();
	currentWeekDay = currentWeekDay - calendar._startingDate;  
	if (currentWeekDay < 0)
	{
		currentWeekDay = currentWeekDay + 7;
	}
	if (currentWeekDay > 6)
	{
		currentWeekDay = currentWeekDay - 7;
	}
	var monthDayArray = 
	[document.getElementById(calendarId+"._week1day1"),document.getElementById(calendarId+"._week1day2"),document.getElementById(calendarId+"._week1day3"),document.getElementById(calendarId+"._week1day4"),document.getElementById(calendarId+"._week1day5"),document.getElementById(calendarId+"._week1day6"), document.getElementById(calendarId+"._week1day7"),
	document.getElementById(calendarId+"._week2day1"),document.getElementById(calendarId+"._week2day2"),document.getElementById(calendarId+"._week2day3"),document.getElementById(calendarId+"._week2day4"),document.getElementById(calendarId+"._week2day5"),document.getElementById(calendarId+"._week2day6"), document.getElementById(calendarId+"._week2day7"),
	document.getElementById(calendarId+"._week3day1"),document.getElementById(calendarId+"._week3day2"),document.getElementById(calendarId+"._week3day3"),document.getElementById(calendarId+"._week3day4"),document.getElementById(calendarId+"._week3day5"),document.getElementById(calendarId+"._week3day6"), document.getElementById(calendarId+"._week3day7"),
	document.getElementById(calendarId+"._week4day1"),document.getElementById(calendarId+"._week4day2"),document.getElementById(calendarId+"._week4day3"),document.getElementById(calendarId+"._week4day4"),document.getElementById(calendarId+"._week4day5"),document.getElementById(calendarId+"._week4day6"), document.getElementById(calendarId+"._week4day7"),
	document.getElementById(calendarId+"._week5day1"),document.getElementById(calendarId+"._week5day2"),document.getElementById(calendarId+"._week5day3"),document.getElementById(calendarId+"._week5day4"),document.getElementById(calendarId+"._week5day5"),document.getElementById(calendarId+"._week5day6"), document.getElementById(calendarId+"._week5day7"),
	document.getElementById(calendarId+"._week6day1"),document.getElementById(calendarId+"._week6day2"),document.getElementById(calendarId+"._week6day3"),document.getElementById(calendarId+"._week6day4"),document.getElementById(calendarId+"._week6day5"),document.getElementById(calendarId+"._week6day6"), document.getElementById(calendarId+"._week6day7")];
	var calendarPreviousMonthElement = document.getElementById(calendarId + "._previousMonth");	
	if (_fu14(calendarPreviousMonthElement))
	{
		
		return _fcst3;
	}
	var calendarNextMonthElement = document.getElementById(calendarId + "._nextMonth");
	if (_fu14(calendarNextMonthElement))
	{
		
		return _fcst3;
	}
	if (calendar._showYearButtons)
	{
		var calendarPreviousYearElement = document.getElementById(calendarId + "._previousYear");	
		if (_fu14(calendarPreviousYearElement))
		{
			
			return _fcst3;
		}
		var calendarNextYearElement = document.getElementById(calendarId + "._nextYear");
		if (_fu14(calendarNextYearElement))
		{
			
			return _fcst3;
		}
	}
	statusCode = _fu18((calendarId + "._previousMonth"), "calendarDisablePreviousMonthButton");	
	document.getElementById(calendarId + "._previousMonth").removeAttribute("tabindex");
	document.getElementById(calendarId + "._previousMonth").removeAttribute("aria-label");
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	statusCode = _fu18((calendarId + "._nextMonth"), "calendarDisableNextMonthButton");
	document.getElementById(calendarId + "._nextMonth").removeAttribute("tabindex");
	document.getElementById(calendarId + "._nextMonth").removeAttribute("aria-label");
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	if (calendar._showYearButtons)
	{
		statusCode = _fu18((calendarId + "._previousYear"), "calendarDisablePreviousYearButton");	
		document.getElementById(calendarId + "._previousYear").removeAttribute("tabindex");
		document.getElementById(calendarId + "._previousYear").removeAttribute("aria-label");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
		statusCode = _fu18((calendarId + "._nextYear"), "calendarDisableNextYearButton");		
		document.getElementById(calendarId + "._nextYear").removeAttribute("tabindex");
		document.getElementById(calendarId + "._nextYear").removeAttribute("aria-label");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
		calendarPreviousYearElement.enabled = false;
		calendarNextYearElement.enabled = false;
	}
	calendarPreviousMonthElement.enabled = false;
	calendarNextMonthElement.enabled = false;
	var allowabledates = [];
	if (calendar._range === false)
	{
		for (var index = 0; index < calendar._allowableDates.length; index += 1)
		{
			var iteratedAllowableDate = _fwc3(calendar._allowableDates[index]);
			if (_fu14(iteratedAllowableDate))
			{
				
				return _fcst6;
			}
			if (currentCalendarDate.getFullYear() == iteratedAllowableDate.getFullYear() &&
				currentCalendarDate.getMonth() == iteratedAllowableDate.getMonth())
			{
				allowabledates.push(calendar._allowableDates[index].getDate());
			}	
			else
			{
				if (currentCalendarDate.getTime() > iteratedAllowableDate.getTime())
				{
					calendarPreviousMonthElement.enabled = true;
					statusCode = _fu18((calendarId + "._previousMonth"), "calendarEnablePreviousMonthButton");
					document.getElementById(calendarId + "._previousMonth").tabIndex = 0;
					document.getElementById(calendarId + "._previousMonth").setAttribute("aria-label",framework.util._previousMonthButtonAriaLabel);
					if (statusCode != _fcst13)
					{
						return statusCode;
					}
				}
				if (currentCalendarDate.getTime() < iteratedAllowableDate.getTime())
				{
					calendarNextMonthElement.enabled = true;
					statusCode = _fu18((calendarId + "._nextMonth"), "calendarEnableNextMonthButton");
					document.getElementById(calendarId + "._nextMonth").tabIndex = 0;
					document.getElementById(calendarId + "._nextMonth").setAttribute("aria-label",framework.util._nextMonthButtonAriaLabel);
					if (statusCode != _fcst13)
					{
						return statusCode;
					}
				}
				if (calendar._showYearButtons)
				{
					if (currentCalendarDate.getFullYear() > iteratedAllowableDate.getFullYear())
					{
						calendarPreviousYearElement.enabled = true;
						statusCode = _fu18((calendarId + "._previousYear"), "calendarEnablePreviousYearButton");
						document.getElementById(calendarId + "._previousYear").tabIndex = 0;
						document.getElementById(calendarId + "._previousYear").setAttribute("aria-label",framework.util._previousYearButtonAriaLabel);
						if (statusCode != _fcst13)
						{
							return statusCode;
						}
					}
					if (currentCalendarDate.getFullYear() < iteratedAllowableDate.getFullYear())
					{
						calendarNextYearElement.enabled = true;
						statusCode = _fu18((calendarId + "._nextYear"), "calendarEnableNextYearButton");
						document.getElementById(calendarId + "._nextYear").tabIndex = 0;
						document.getElementById(calendarId + "._nextYear").setAttribute("aria-label",framework.util._nextYearButtonAriaLabel);
						if (statusCode != _fcst13)
						{
							return statusCode;
						}
					}
				}
			}
		}	
	}
	else 
	{
		var dateToStart = 1;
		var dateToEnd = 31;	
		if (currentCalendarDate.getFullYear() == calendar._allowableDates[0].getFullYear() &&
			currentCalendarDate.getMonth() == calendar._allowableDates[0].getMonth())	
		{
			dateToStart = calendar._allowableDates[0].getDate();
		}
		if (currentCalendarDate.getFullYear() == calendar._allowableDates[1].getFullYear() &&
				currentCalendarDate.getMonth() == calendar._allowableDates[1].getMonth())
		{
			dateToEnd = calendar._allowableDates[1].getDate();
		}
		var lastEndDate = lastDayinMonth[currentCalendarDate.getMonth()] < dateToEnd ? lastDayinMonth[currentCalendarDate.getMonth()] : dateToEnd;
		for (var allowedDates = dateToStart; allowedDates <= lastEndDate; allowedDates += 1)
		{
			allowabledates.push(allowedDates);
		}
		var prevLastMonthDate = _fu2(currentCalendarDate);
		prevLastMonthDate.setDate(1);
		prevLastMonthDate.setDate(prevLastMonthDate.getDate() - 1);
		var nextFirstMonthDate = _fu2(currentCalendarDate);
		nextFirstMonthDate.setDate(lastDayinMonth[nextFirstMonthDate.getMonth()]);
		nextFirstMonthDate.setDate(nextFirstMonthDate.getDate() + 1);
		if (_fwc2(calendar._allowableDates[0], prevLastMonthDate, true, true))
		{
			calendarPreviousMonthElement.enabled = true;
			statusCode = _fu18((calendarId + "._previousMonth"), "calendarEnablePreviousMonthButton");
			document.getElementById(calendarId + "._previousMonth").tabIndex = 0;
			document.getElementById(calendarId + "._previousMonth").setAttribute("aria-label",framework.util._previousMonthButtonAriaLabel);
			if (statusCode != _fcst13)
			{
				return statusCode;
			}
		}
		if (_fwc2(nextFirstMonthDate, calendar._allowableDates[1], true, true))
		{
			calendarNextMonthElement.enabled = true;
			statusCode = _fu18((calendarId + "._nextMonth"), "calendarEnableNextMonthButton");
			document.getElementById(calendarId + "._nextMonth").tabIndex = 0;
			document.getElementById(calendarId + "._nextMonth").setAttribute("aria-label",framework.util._nextMonthButtonAriaLabel);
			if (statusCode != _fcst13)
			{
				return statusCode;
			}
		}
		if (calendar._showYearButtons)
		{
			var prevLastYearDate = _fu2(currentCalendarDate);
			prevLastYearDate.setDate(1);  
			prevLastYearDate.setFullYear(prevLastYearDate.getFullYear() - 1);
			if (prevLastYearDate.getFullYear() == calendar._allowableDates[0].getFullYear() &&
				prevLastYearDate.getMonth() == calendar._allowableDates[0].getMonth())	
			{
				prevLastYearDate.setDate(calendar._allowableDates[0].getDate());
			}
			if (_fwc2(calendar._allowableDates[0], prevLastYearDate, true, true))
			{
				calendarPreviousYearElement.enabled = true;
				statusCode = _fu18((calendarId + "._previousYear"), "calendarEnablePreviousYearButton");
				document.getElementById(calendarId + "._previousYear").tabIndex = 0;
				document.getElementById(calendarId + "._previousYear").setAttribute("aria-label",framework.util._previousYearButtonAriaLabel);
				if (statusCode != _fcst13)
				{
					return statusCode;
				}
			}
			var nextLastYearDate = _fu2(currentCalendarDate);
			nextLastYearDate.setDate(1);
			nextLastYearDate.setFullYear(nextLastYearDate.getFullYear() + 1);
			if (_fwc2(nextLastYearDate, calendar._allowableDates[1], true, true))
			{
				calendarNextYearElement.enabled = true;
				statusCode = _fu18((calendarId + "._nextYear"), "calendarEnableNextYearButton");
				document.getElementById(calendarId + "._nextYear").tabIndex = 0;
				document.getElementById(calendarId + "._nextYear").setAttribute("aria-label",framework.util._nextYearButtonAriaLabel);
				if (statusCode != _fcst13)
				{
					return statusCode;
				}
			}
		}
	}
	var day = 1;  
	for (index = 0; index < currentWeekDay; index += 1) 
	{
		statusCode = _fu21(monthDayArray[index].id, " ");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
		monthDayArray[index].calendarDateEnabled = false;
		statusCode = _fu18(monthDayArray[index].id, "disabledDateStyle");
		document.getElementById(monthDayArray[index].id).removeAttribute("tabindex");
		document.getElementById(monthDayArray[index].id).removeAttribute("aria-label");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	for (var startDate = currentWeekDay; startDate < (lastDayinMonth[month] + currentWeekDay); startDate += 1)
	{
		statusCode = _fu21(monthDayArray[startDate].id, day.toString());
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
		var searchAllowableDatesString = "," + allowabledates.toString() + ",";
		if (searchAllowableDatesString.indexOf(","+day+",") > -1)
		{
			statusCode = _fu18(monthDayArray[startDate].id, "enabledDateStyle");
			document.getElementById(monthDayArray[startDate].id).tabIndex = 0;
			var dayRead =document.getElementById(monthDayArray[startDate].id).innerHTML;
			document.getElementById(monthDayArray[startDate].id).setAttribute("aria-label",framework.util._dateClickableAriaLabel + " " + dayRead + " " + currentmonthYear);
			if (statusCode != _fcst13)
			{
				return statusCode;
			}
			monthDayArray[startDate].calendarDateEnabled = true;
		}
		else 
		{
			statusCode = _fu18(monthDayArray[startDate].id, "disabledDateStyle");
			document.getElementById(monthDayArray[startDate].id).removeAttribute("tabindex");
			document.getElementById(monthDayArray[startDate].id).removeAttribute("aria-label");
			if (statusCode != _fcst13)
			{
				return statusCode;
			}
			monthDayArray[startDate].calendarDateEnabled = false;
		}
		var selected = _fwc5(calendarId);
		if ((!_fu14(selected)) && (selected.getFullYear() == year) && (selected.getMonth() == month) && (selected.getDate() == day))
		{
			if (searchAllowableDatesString.indexOf(selected.getDate()+",") > -1 )
			{
				monthDayArray[startDate].calendarDateEnabled = true;
				statusCode = _fu18(monthDayArray[startDate].id, "selectedDateStyle");
				if (statusCode != _fcst13)
				{
					return statusCode;
				}
			}
			else
			{
			}
		}
		day += 1;
	}
	for (var postindex = lastDayinMonth[month] + currentWeekDay; postindex < 42; postindex += 1)
	{
		statusCode = _fu21(monthDayArray[postindex].id, "");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
		monthDayArray[postindex].calendarDateEnabled = false;
		statusCode = _fu18(monthDayArray[postindex].id, "disabledDateStyle");
		document.getElementById(monthDayArray[postindex].id).removeAttribute("tabindex");
		document.getElementById(monthDayArray[postindex].id).removeAttribute("aria-label");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	if ((42 - (lastDayinMonth[month] + currentWeekDay)) >= 7) 
	{
		_fu7(calendarId + "._week6");
	}
	return _fcst13;
},
_calculatePosition:function(calendarId)
{
	if (!_fu13(calendarId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var calendar = document.getElementById(calendarId);
	var calendarIdWindowElement = document.getElementById(calendarId + "._window");
	var calendarIdTextElement = document.getElementById(calendarId + "._text");
	var textboxPositionArray = _fu5(calendarId+"._text");
	if (_fu14(textboxPositionArray))
	{
		
		return _fcst6;
	}
	var calendarIdWindowElementTop = textboxPositionArray[1];
	var calendarIdWindowElementLeft = textboxPositionArray[0];
	var calendarIdBottomPositionTop = calendarIdWindowElementTop + calendarIdTextElement.offsetHeight + _fcw2;
	var browserViewPort; 
	if (_fu14(window.pageYOffset))
	{
		browserViewPort = document.documentElement.scrollTop + document.documentElement.clientHeight;
	}
	else
	{
		browserViewPort = window.pageYOffset + self.innerHeight;
	}
	var position;
	if (calendarIdBottomPositionTop < browserViewPort)
	{
		calendarIdWindowElementTop = calendarIdWindowElementTop + calendarIdTextElement.offsetHeight;
		position = _fcw7;
		calendar._position = _fcw7;
	}
	else
	{
		calendarIdWindowElementTop = textboxPositionArray[1] - _fcw2;
		position = _fcw6;
		calendar._position = _fcw6;
	}
	calendarIdWindowElement.style.top = calendarIdWindowElementTop + "px";
	calendarIdWindowElement.style.left = calendarIdWindowElementLeft + "px";
	if (_fu11() && !_fu10())
	{
		statusCode = _fwc32(calendarId, position);
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	return _fcst13;
},
_hideDropDowns:function(calendarId, position)
{
	if (!_fu13(calendarId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(calendarId))
	{
		
		return _fcst6;
	}
	var calendarIdWindowElement = document.getElementById(calendarId + "._window");
	var topRange = parseInt(calendarIdWindowElement.style.top);
	if (_fu13(topRange, _fcd8))
	{
		
		return _fcst14;
	}
	var bottomRange = 0;
	if (position == _fcw6)
	{
		var textboxPositionArray = _fu5(calendarId+"._text");
		bottomRange = textboxPositionArray[1]; 
	}
	else
	{
		bottomRange = topRange + _fcw2;	
	}
	var leftRange = parseInt(calendarIdWindowElement.style.left);
	if (_fu13(leftRange, _fcd8))
	{
		
		return _fcst14;
	}
	var rect = [
		topRange,
		leftRange + _fcw3,
		bottomRange,
		leftRange
	];
	return _fu8(calendarId, rect);
},
_buildDIVs:function(element)
{
	var divs = new Array(),
		idPrefix = element.id,
		divId = "",
		divId2 = "",
		i = 0,
		j = 0;
	divs.push('<div id="' + idPrefix + '._window" class="calendarWindow" role="application" tabindex="0">');
	divs.push('<div id="' + idPrefix + '._header" class="calendarHeader">');
	if (element._showYearButtons === true)
	{
		divs.push('<div id="' + idPrefix + '._previousYear" class="calendarDisablePreviousYearButton"></div>');
		divs.push('<div id="' + idPrefix + '._previousMonth" class="calendarDisablePreviousMonthButton"></div>');
		divs.push('<div id="' + idPrefix + '._title" class="calendarTitleWithYearButtons"></div>');
		divs.push('<div id="' + idPrefix + '._nextMonth" class="calendarDisableNextMonthButton"></div>');
		divs.push('<div id="' + idPrefix + '._nextYear" class="calendarDisableNextYearButton"></div>');
	}
	else
	{
		divs.push('<div id="' + idPrefix + '._previousMonth" class="calendarDisablePreviousMonthButton"></div>');
		divs.push('<div id="' + idPrefix + '._title" class="calendarTitle"></div>');
		divs.push('<div id="' + idPrefix + '._nextMonth" class="calendarDisableNextMonthButton"></div>');
	}
	divs.push('</div>');
	divId = '<div id="' + idPrefix + '._daysoftheweek';
	divs.push(divId + '" class="calendarDaysOfTheWeek">');
	for (i = 1; i <= 7; i += 1)
	{
		divs.push(divId + i + '" class="calendarWeekDay"></div>');
	}
	divs.push('</div>');
	divs.push('<div id="' + idPrefix + '._body" class="calendarBody">');
	divId = '<div id="' + idPrefix + '._week';
	for (i = 1; i <= 6; i += 1)
	{
		divs.push(divId + i + '" class="calendarWeek">');
		divId2 = divId + i + 'day';
		for (j = 1; j <= 7; j += 1)
		{
		divs.push(divId2 + j + '" class="enabledDateStyle"></div>');		
		}
		divs.push('</div>');
	}
	divs.push('</div></div>');
	element.innerHTML += divs.join("");
},
loaded:true
};
framework.widget.draganddrop = {
_dragObject:new Object(),
_zIndex:0,
dragStart:function(event) 
{
  var x, y;
  var id = this.id;
  var index = this.id.indexOf("._header");
	if (index > -1)
	{
		id = this.id.substr(0, index);
	}
  framework.widget.draganddrop._dragObject.element = document.getElementById(id);
	x = event.clientX + framework.util.getScrollX();
	y = event.clientY + framework.util.getScrollY();
  framework.widget.draganddrop._dragObject.cursorStartX = x;
  framework.widget.draganddrop._dragObject.cursorStartY = y;
  framework.widget.draganddrop._dragObject.elementStartLeft  = parseInt(framework.widget.draganddrop._dragObject.element.style.left, 10);
  framework.widget.draganddrop._dragObject.elementStartTop   = parseInt(framework.widget.draganddrop._dragObject.element.style.top,  10);
  if (_fu13(framework.widget.draganddrop._dragObject.elementStartLeft, _fcd8))
  {
  	framework.widget.draganddrop._dragObject.elStartLeft = 0;
	framework.widget.draganddrop._dragObject.elementStartLeft = 10;
  }
  if (_fu13(framework.widget.draganddrop._dragObject.elementStartTop, _fcd8))
  {
  	framework.widget.draganddrop._dragObject.elStartTop  = 0;
	framework.widget.draganddrop._dragObject.elementStartTop = 10;
  }  
  framework.widget.draganddrop._dragObject.element.style.zIndex = ++framework.widget.draganddrop._zIndex;
	_fe1(id,_fce13,framework.widget.draganddrop._dragGo);
	_fe1(id,_fce16,framework.widget.draganddrop._dragStop);
    event.preventDefault();
	return _fcst13;
},
_dragGo:function (event) 
{
  var x, y;
	x = event.clientX + framework.util.getScrollX();
	y = event.clientY + framework.util.getScrollY();
  framework.widget.draganddrop._dragObject.element.style.left = (framework.widget.draganddrop._dragObject.elementStartLeft + x - framework.widget.draganddrop._dragObject.cursorStartX) + "px";
  framework.widget.draganddrop._dragObject.element.style.top  = (framework.widget.draganddrop._dragObject.elementStartTop  + y - framework.widget.draganddrop._dragObject.cursorStartY) + "px";
  event.preventDefault();
  return _fcst13;
},
_dragStop:function (event) 
{
 	_fe4(this.id,_fce13,framework.widget.draganddrop._dragGo);
	_fe4(this.id,_fce16,framework.widget.draganddrop._dragStop);
	return _fcst13;
},
listEntry:function(key, name, checked, columnOrder,dontRemove) 
{
	if (!_fu13(key, _fcd13) ||
		!_fu13(name, _fcd13) ||
		!_fu13(checked, _fcd2) ||
		!_fu13(columnOrder, _fcd10) ||
		!_fu13(dontRemove, _fcd2))
	{
		return _fcst14;
	}
    this.key = key;
	this.name = name;
	this.checked = checked;
	this.columnOrder = columnOrder;
	this.dontRemove = dontRemove;
	return _fcst13;
},
initChooseMove:function (masterid,allcolumns,minNbrColumns,maxNbrColumns,saveColumns,populateTable,rightToLeft,onCloseOfWindow)
{
	if (!_fu13(masterid, _fcd13) ||
		!_fu13(allcolumns, _fcd1) ||
		!_fu13(minNbrColumns, _fcd10) ||
		!_fu13(maxNbrColumns, _fcd10) ||
		!_fu13(rightToLeft, _fcd2) ||
		_fu14(saveColumns) ||
		_fu14(populateTable))
	{
		return _fcst6;
	}
	if (framework.widget.draganddrop._dragElem.length>0)
	{					
		var dragdropId = masterid+"._dragdrop";
		var dragdropinnerdiv = document.getElementById(dragdropId);
		dragdropinnerdiv.style.top="";
		dragdropinnerdiv.style.left=""; 
		dragdropinnerdiv.style.width=""; 
		dragdropinnerdiv.style.height="";
		framework.widget.draganddrop._holdSaveColumns = "";
		framework.widget.draganddrop._holdPopulateTable = "";
		framework.widget.draganddrop._holdAllColumns = "";
		framework.widget.draganddrop._holdMinNbrColumns = "";
		framework.widget.draganddrop._holdMaxNbrColumns = "";
		framework.widget.draganddrop._dragElem=[];
		framework.widget.draganddrop._labelwidth="";	
		document.getElementById(masterid+"._availableHeader").style.width="";
		document.getElementById(masterid+"._displayedHeader").style.width="";
		framework.widget.draganddrop._holdOriginalAllColumns=[];
	}
	if (!_fu14(onCloseOfWindow))
	{
		framework.widget.draganddrop._holdOnCloseOfWindow = onCloseOfWindow;
	}
	framework.widget.draganddrop._holdMasterId = masterid;
	framework.widget.draganddrop._checkBoxId = masterid + "._checkBox";
	framework.widget.draganddrop._maxAlertId = masterid + "._maxAlert";
	framework.widget.draganddrop._minAlertId = masterid + "._minAlert";
	for (var i=0;i<allcolumns.length;i++)
	{
		framework.widget.draganddrop._holdOriginalAllColumns[i]=allcolumns[i];
	}
	framework.widget.draganddrop._holdAllColumns = allcolumns;
	framework.widget.draganddrop._holdMinNbrColumns = minNbrColumns;
	framework.widget.draganddrop._holdMaxNbrColumns = maxNbrColumns;
	framework.widget.draganddrop._holdSaveColumns = saveColumns;
	framework.widget.draganddrop._holdPopulateTable = populateTable;
	_fe1(masterid+'._cancelButton', _fce4, framework.widget.draganddrop._clickCancelButton);
	_fe1(masterid+'._saveButton',_fce4,framework.widget.draganddrop._clickSaveButton);
	if (!_fu11() || _fu10())
	{
		document.getElementById(framework.widget.draganddrop._maxAlertId).style.marginRight = "12px";
		document.getElementById(framework.widget.draganddrop._minAlertId).style.marginRight = "12px";
	}
	_fu7(framework.widget.draganddrop._maxAlertId);
	_fu7(framework.widget.draganddrop._minAlertId);
	_fu23(masterid+"._label");
	framework.widget.draganddrop._availableHeader = document.getElementById(masterid+"._availableHeader");
	framework.widget.draganddrop._displayedHeader = document.getElementById(masterid+"._displayedHeader");
	var label ="";
	for (var i=0;i<allcolumns.length;i++)
	{
		label = document.getElementById(masterid+"._label");
		label.innerHTML = allcolumns[i].name;
		if (label.offsetWidth > framework.widget.draganddrop._labelwidth)
		{
			framework.widget.draganddrop._labelwidth = label.offsetWidth;
		}		
	}
	framework.widget.draganddrop._labelwidth+=25;
	_fu7(masterid+"._label");
	framework.widget.draganddrop._initDragDrop(masterid,allcolumns,false);
	return _fcst13;
},
_initDragDrop:function (masterid,allcolumns,skipCheck)
{
	if (!_fu13(masterid, _fcd13) ||
		!_fu13(allcolumns, _fcd1) ||
		!_fu13(skipCheck, _fcd2))
	{
		return _fcst6;
	}
	var initialTop = framework.widget.draganddrop._displayedHeader.offsetTop + framework.widget.draganddrop._displayedHeader.offsetHeight;
	framework.widget.draganddrop._positionYdrop = initialTop;
	var checklistId = masterid+"._checkboxList";
	var innerdiv = document.getElementById(checklistId);
	var htmlCheckboxList = new Array;
	var htmlstring = "";
	var icount = 0;
	var dragdropId = masterid+"._dragdrop";
	var dragdropinnerdiv = document.getElementById(dragdropId);
	var htmlDiv = new Array;
	var htmldivstring = "";
	if (_fu14(allcolumns)) {
		allcolumns = framework.widget.draganddrop._holdAllColumns;
	}
	framework.widget.draganddrop._holdAllColumns = allcolumns;
	if (!skipCheck)
	{
		var addPosition = 15;
		if (_fu11() && !_fu10())
		{
			addPosition = 5;
		}
		else
		{
			document.getElementById(masterid+"._saveButton").style.marginRight = "11px";
		}
		var master = document.getElementById(masterid);
		var originalMasterWidth = parseInt(master.style.width);
		var masterwidth = (framework.widget.draganddrop._labelwidth * 2) + addPosition;
		if (masterwidth<250)
		{
			master.style.width = 250 + "px";
			if (framework.widget.draganddrop._availableHeader.offsetWidth>framework.widget.draganddrop._labelwidth)
			{
				if (_fu11() && !_fu10())
				{
					framework.widget.draganddrop._labelwidth = framework.widget.draganddrop._availableHeader.offsetWidth - 7;
				}
				else
				{
					framework.widget.draganddrop._labelwidth = framework.widget.draganddrop._availableHeader.offsetWidth - 12;
				}
			}
		}
		else
		{
			master.style.width = (framework.widget.draganddrop._labelwidth * 2) + addPosition  + "px";
		}
	}
	innerdiv.style.width = framework.widget.draganddrop._labelwidth + "px";
	framework.widget.draganddrop._availableHeader.style.width = framework.widget.draganddrop._labelwidth-5 + "px";
	framework.widget.draganddrop._availableHeader.style.borderBottom = "none";
	dragdropinnerdiv.style.width = framework.widget.draganddrop._labelwidth + "px";
	dragdropinnerdiv.style.borderLeft = "none";
	framework.widget.draganddrop._displayedHeader.style.width = framework.widget.draganddrop._labelwidth-5 + "px";
	framework.widget.draganddrop._displayedHeader.style.borderLeft = "none";
	framework.widget.draganddrop._displayedHeader.style.borderBottom = "none";
	for (var i=0;i<allcolumns.length;i++)
	{
		htmlCheckboxList.push("<div class=\"floatingWindowChooseMoveAvailable\" ");
		htmlCheckboxList.push("style=\"width: ");
		htmlCheckboxList.push(framework.widget.draganddrop._labelwidth-2);
		htmlCheckboxList.push("px;\" id=\"");
		htmlCheckboxList.push(framework.widget.draganddrop._checkBoxId);
		htmlCheckboxList.push(allcolumns[i].key);
		htmlCheckboxList.push("div\" ");
		htmlCheckboxList.push(">");
		htmlCheckboxList.push("<input type=\"checkbox\" id=\"");
		htmlCheckboxList.push(framework.widget.draganddrop._checkBoxId);
		htmlCheckboxList.push(allcolumns[i].key);
		htmlCheckboxList.push("\" ");
		htmlCheckboxList.push("class=\"floatingWindowCheckbox\"");
		if (allcolumns[i].checked)
		{
			htmlCheckboxList.push("checked=\"true\" ");
		}
		if (allcolumns[i].dontRemove)
		{
			htmlCheckboxList.push("disabled=\"true\"");
		}
		htmlCheckboxList.push("aria-label=\"");
		htmlCheckboxList.push(allcolumns[i].name);
		htmlCheckboxList.push("\" ");
		htmlCheckboxList.push(">");
	    htmlCheckboxList.push(allcolumns[i].name);
		htmlCheckboxList.push("</div>");
	}
	htmlstring = htmlCheckboxList.join("");
	innerdiv.innerHTML = htmlstring;
	var checkedHeight = 0;
	for (var i=0;i<allcolumns.length;i++)
	{
		if (i == 0)
		{
			checkedHeight = document.getElementById(framework.widget.draganddrop._checkBoxId+allcolumns[i].key+"div").offsetHeight;
		}
		if (allcolumns[i].checked)
		{
			document.getElementById(framework.widget.draganddrop._checkBoxId+allcolumns[i].key+"div").style.color="#999999";
		}
	}
	allcolumns.sort(framework.widget.draganddrop._sortInitialDraggableElements);
	for (var i=0;i<allcolumns.length;i++)
	{
		_fe1(framework.widget.draganddrop._checkBoxId+allcolumns[i].key,_fce4,framework.widget.draganddrop._checkedColumn);
		if (allcolumns[i].columnOrder != 0)
		{
			var id='drop'+allcolumns[i].key;
		   	framework.widget.draganddrop._dragElem[icount]= new framework.widget.draganddrop._initDraggableItem(id,allcolumns[i].name,-1,-1,icount,framework.widget.draganddrop._positionYdrop);
		   	framework.widget.draganddrop._dragHashElem[id]=framework.widget.draganddrop._dragElem[icount];
			icount++;
			htmlDiv.push("<div id=\"");
			htmlDiv.push(id);
			htmlDiv.push("\" ");
			htmlDiv.push("class=\"floatingWindowChooseMoveDraggableItem\" ");
			htmlDiv.push("style=\"width: ");
			htmlDiv.push(framework.widget.draganddrop._labelwidth-7);
			htmlDiv.push("px;\"");
			htmlDiv.push(">");
			htmlDiv.push(allcolumns[i].name);
			htmlDiv.push("</div><br>");
		}
	}
	htmldivstring = htmlDiv.join("");
	dragdropinnerdiv.innerHTML = htmldivstring;
	if (!dragdropinnerdiv.style.top) 
		dragdropinnerdiv.style.top=innerdiv.offsetTop + "px";
	if (!dragdropinnerdiv.style.left) 
		dragdropinnerdiv.style.left=innerdiv.offsetLeft + "px";
	if (!dragdropinnerdiv.style.width) 
		dragdropinnerdiv.style.width=innerdiv.offsetWidth+2 + "px";
	if (!dragdropinnerdiv.style.height) 
		dragdropinnerdiv.style.height=innerdiv.offsetHeight-2 + "px";
	framework.widget.draganddrop._positionYdrop=framework.widget.draganddrop._findDivPositionY(checklistId);
	framework.widget.draganddrop._positionYdrop+=1;
	var addPositionX = 7;
	if (_fu11() && !_fu10())
	{
		addPositionX = 12;
	}
	framework.widget.draganddrop._positionXdrop=parseInt(dragdropinnerdiv.style.width)+addPositionX;
	framework.widget.draganddrop._initDraggableItems(framework.widget.draganddrop._dragElem);
	framework.widget.draganddrop._orderDisplayedColumn(false,false,"");
	_fe1(masterid+'._dragdrop',_fce13,framework.widget.draganddrop._moveDraggableColumn);
	_fe1(masterid+'._dragdrop',_fce16,framework.widget.draganddrop._realignDraggableItems);
	if (!skipCheck)
	{
		var windowPos = _fu5(masterid);
		var windowLeft = windowPos[0];
		var windowTop = windowPos[1];
		var widthoffset = parseInt(master.style.width) - parseInt(master.style.left);
		var calcWidth = 0;
		if (originalMasterWidth > master.offsetWidth)
		{
			calcWidth = originalMasterWidth - master.offsetWidth;
			windowLeft = windowLeft + calcWidth;
		} 
		else
		{
			calcWidth = master.offsetWidth - originalMasterWidth;
			windowLeft = windowLeft - calcWidth;
		}
		master.style.left = windowLeft + "px";
	}
	return _fcst13;
},
_initDraggableItems:function (draggableElement)
{
	if (!_fu13(draggableElement, _fcd1))
	{
		return _fcst6;
	}
	for (var i=0;i<draggableElement.length;i++) 
	{
		_fe1(draggableElement[i].id,_fce12,framework.widget.draganddrop._captureDraggableItemCursor);
	}
	return _fcst13;
},
_initDraggableItem:function (id,value,x,y,nitem,nheight)
{
	if (!_fu13(id, _fcd13) ||
		!_fu13(value, _fcd13) ||
		!_fu13(x, _fcd10) ||
		!_fu13(y, _fcd10) ||
		!_fu13(nitem, _fcd10) ||
		!_fu13(nheight, _fcd10))
	{
		return _fcst6;
	}
	this.id = id;
	this.nitem = nitem;
	this.nheight = nheight
	this.value = value;
	this.x = x;
	this.y = y;
	return _fcst13;
},
_orderDisplayedColumn:function (sortItems,skipSet,elementId)
{
	if (!_fu13(sortItems, _fcd2) ||
		!_fu13(skipSet, _fcd2) ||
		!_fu13(elementId, _fcd13))
	{
		return _fcst6;
	}
	var draggableArray=framework.widget.draganddrop._dragElem;
	if (sortItems)
	{
		draggableArray=framework.widget.draganddrop._dragElem.sort(framework.widget.draganddrop._sortDraggableElements);
	}
	var x,y,i,div;
	y=framework.widget.draganddrop._positionYdrop;
	x=framework.widget.draganddrop._positionXdrop;
	for (i=0;i<draggableArray.length;i++) 
	{
       div=document.getElementById(draggableArray[i].id);
       if (skipSet && draggableArray[i].id==elementId)
	   {
	   		y=y+parseInt(div.offsetHeight);
			continue;
	   }
	   div.style.left=x + "px";
       div.style.top=y + "px";
	   div.cursorStartX = x;
	   div.cursorStartY = y;
  	   div.elementStartLeft  = parseInt(div.style.left, 10);
   		   div.elementStartTop   = parseInt(div.style.top,  10);
       framework.widget.draganddrop._dragHashElem[draggableArray[i].id].x=x;
       framework.widget.draganddrop._dragHashElem[draggableArray[i].id].y=y;
       y=y+parseInt(div.offsetHeight);
	}
	return _fcst13;
},
_realignDraggableItems:function (event)
{
	if (!framework.widget.draganddrop._lastId) 
	{
	   return;
	}
	var id=framework.widget.draganddrop._lastId;
	var drag=document.getElementById(id);
	drag.style.opacity=1;
	drag.style.filter='alpha(opacity=100)';
	framework.widget.draganddrop._orderDisplayedColumn(true,false,"");
	_fu22(id,0);
	framework.widget.draganddrop._lastId=0;
	framework.widget.draganddrop._populateTable(event);
	return _fcst13;
},
_captureDraggableItemCursor:function (event)
{
	framework.widget.draganddrop._lastId = this.id;
	var elementId=document.getElementById(framework.widget.draganddrop._lastId);
	var cursorx = event.clientX + framework.util.getScrollX();
	var cursory = event.clientY + framework.util.getScrollY();
	_fu7(framework.widget.draganddrop._maxAlertId);
	_fu7(framework.widget.draganddrop._minAlertId);
	elementId.style.zIndex=1;
	elementId.cursorStartX = cursorx;
	elementId.cursorStartY = cursory;
	return _fcst13;  	   	
},
_moveDraggableColumn:function (event)
{
	var id;
	if (framework.widget.draganddrop._lastId == 0) 
	{
	   return;
	}
	id=framework.widget.draganddrop._lastId;
	var elementId=document.getElementById(framework.widget.draganddrop._holdMasterId+'._dragdrop');
	var drag=document.getElementById(id);
	drag.style.opacity=0.75;
	drag.style.filter='alpha(opacity=75)';
  	var x, y;
	var gapX=parseInt(elementId.offsetLeft);
	var gapY=parseInt(elementId.offsetTop);
	var sizeX=parseInt(elementId.style.width);
	var sizeY=parseInt(elementId.style.height);
	x = event.clientX + framework.util.getScrollX();
	y = event.clientY + framework.util.getScrollY();
	var checkX = (drag.elementStartLeft + x - drag.cursorStartX);
	var checkY = (drag.elementStartTop  + y - drag.cursorStartY);
	x=checkX;
	y=checkY;
	drag.style.top=y + "px";
	drag.style.left=x + "px";
	framework.widget.draganddrop._dragHashElem[id].x=x;
	framework.widget.draganddrop._dragHashElem[id].y=y;
	framework.widget.draganddrop._orderDisplayedColumn(true,true,id);
	return _fcst13;
},
_checkedColumn:function (event)
{
	var checkElement = document.getElementById(this.id);
	var icount = framework.widget.draganddrop._dragElem.length;
	var dragdropId = framework.widget.draganddrop._holdMasterId+"._dragdrop";
	var dragdropinnerdiv = document.getElementById(dragdropId);
	var checkboxdiv = document.getElementById(this.id+"div");
	var htmlDiv = new Array;
	var htmldivstring = "";
	if (checkElement.checked)
	{
		checkboxdiv.style.color = "#999999";
		_fu7(framework.widget.draganddrop._minAlertId);
		var saveElement = document.getElementById(framework.widget.draganddrop._holdMasterId+"._saveButton");
		saveElement.style.background = "#660099 repeat-x";
		saveElement.style.color = "#fff";
		if (framework.widget.draganddrop._dragElem.length+1>framework.widget.draganddrop._holdMaxNbrColumns)
		{
			_fu23(framework.widget.draganddrop._maxAlertId);
			checkboxdiv.style.color = "#202020";
			checkElement.checked = false;
			return;
		}
		for (var i=0;i<framework.widget.draganddrop._holdAllColumns.length;i++)
		{
			if (framework.widget.draganddrop._checkBoxId+framework.widget.draganddrop._holdAllColumns[i].key == this.id)
			{
				var id='drop'+framework.widget.draganddrop._holdAllColumns[i].key;
			   	framework.widget.draganddrop._dragElem[icount]= new framework.widget.draganddrop._initDraggableItem(id,framework.widget.draganddrop._holdAllColumns[i].name,-1,-1,icount,framework.widget.draganddrop._positionYdrop);
			   	framework.widget.draganddrop._dragHashElem[id]=framework.widget.draganddrop._dragElem[icount];
				htmlDiv.push(dragdropinnerdiv.innerHTML);
				htmlDiv.push("<div id=\"");
				htmlDiv.push(id);
				htmlDiv.push("\" ");
				htmlDiv.push("class=\"floatingWindowChooseMoveDraggableItem\" ");
				htmlDiv.push("style=\"width: ");
				htmlDiv.push(framework.widget.draganddrop._labelwidth-7);
				htmlDiv.push("px;\"");
				htmlDiv.push(">");
				htmlDiv.push(framework.widget.draganddrop._holdAllColumns[i].name);
				htmlDiv.push("</div><br>");
				htmldivstring = htmlDiv.join("");
				dragdropinnerdiv.innerHTML = htmldivstring;
				break;
			}
		}
	}
	else
	{
		if (framework.widget.draganddrop._dragElem.length-1 < framework.widget.draganddrop._holdMinNbrColumns)
		{
			var alertMsg = document.getElementById(framework.widget.draganddrop._holdMasterId+"._alertMinMessage");
			if (alertMsg.innerHTML=="\n" || alertMsg.innerHTML=="")
			{
				checkElement.checked = true;
				return;
			}
		}
		checkboxdiv.style.color = "#202020";
		_fu7(framework.widget.draganddrop._maxAlertId);
		for (var i=0;i<framework.widget.draganddrop._dragElem.length;i++)
		{
			var checkId = this.id;
			checkId = checkId.replace(framework.widget.draganddrop._checkBoxId,'drop');
			if (checkId == framework.widget.draganddrop._dragElem[i].id)
			{
				var v;
			    v=document.getElementById(framework.widget.draganddrop._dragElem[i].id);
			    document.getElementById(framework.widget.draganddrop._holdMasterId+'._dragdrop').removeChild(v);
				framework.widget.draganddrop._dragElem.splice(i,1);
				dragdropinnerdiv.innerHTML = "";
				for (var j=0;j<framework.widget.draganddrop._dragElem.length;j++)
				{
					var dragElement = framework.widget.draganddrop._dragElem[j];
					htmlDiv.push("<div id=\"");
					htmlDiv.push(dragElement.id);
					htmlDiv.push("\" ");
					htmlDiv.push("class=\"floatingWindowChooseMoveDraggableItem\" ");
					htmlDiv.push("style=\"width: ");
					htmlDiv.push(framework.widget.draganddrop._labelwidth-7);
					htmlDiv.push("px;\"");
					htmlDiv.push(">");
					htmlDiv.push(dragElement.value);
					htmlDiv.push("</div><br>");					
				}
				htmldivstring = htmlDiv.join("");
				dragdropinnerdiv.innerHTML = htmldivstring;
				break;
			}
		}
		if (framework.widget.draganddrop._dragElem.length < framework.widget.draganddrop._holdMinNbrColumns)
		{
			_fu23(framework.widget.draganddrop._minAlertId);
			var saveElement = document.getElementById(framework.widget.draganddrop._holdMasterId+"._saveButton");
			saveElement.style.background = "#666 repeat-x";
			saveElement.style.color="#e6e6e6";
		}
		else if (framework.widget.draganddrop._dragElem.length == 0)
		{
			var saveElement = document.getElementById(framework.widget.draganddrop._holdMasterId+"._saveButton");
			saveElement.style.background = "#666 repeat-x";
			saveElement.style.color="#e6e6e6";
		}
	}
	framework.widget.draganddrop._initDraggableItems(framework.widget.draganddrop._dragElem);
	framework.widget.draganddrop._orderDisplayedColumn(false,false,"");
	framework.widget.draganddrop._populateTable(event);
	return _fcst13;
},
_clickSaveButton:function (event)
{
	if (framework.widget.draganddrop._dragElem.length==0 || framework.widget.draganddrop._dragElem.length < framework.widget.draganddrop._holdMinNbrColumns)
	{
		event.preventDefault();
		return _fcst12;
	}
	var checkId = "";
	for (var j=0;j<framework.widget.draganddrop._holdOriginalAllColumns.length;j++)
	{
		for (var i=0;i<framework.widget.draganddrop._dragElem.length;i++)
		{
			checkId = framework.widget.draganddrop._dragElem[i].id;
			checkId = checkId.replace('drop','');
			if (checkId==framework.widget.draganddrop._holdOriginalAllColumns[j].key)
			{
				framework.widget.draganddrop._holdOriginalAllColumns[j].checked = true;
				framework.widget.draganddrop._holdOriginalAllColumns[j].columnOrder = i+1;
				break;				
			}
			else
			{
				framework.widget.draganddrop._holdOriginalAllColumns[j].checked = false;
				framework.widget.draganddrop._holdOriginalAllColumns[j].columnOrder = 0;
			}
		}
	}
	var replyArray = framework.widget.draganddrop._getDisplayedColumns(event);
	var myFunction = framework.widget.draganddrop._holdSaveColumns.toString().match(/^\s*function\s+([^\s\(]+)/);
	try
	{
		eval(myFunction[1] + "(\""+replyArray+"\")");
	}
	catch (e)
	{
	}
	_fu7(framework.widget.draganddrop._maxAlertId);
	_fu7(framework.widget.draganddrop._minAlertId);
	_fu7(framework.widget.draganddrop._holdMasterId);
	if (framework.widget.draganddrop._holdOnCloseOfWindow != "")
	{
		myFunction = framework.widget.draganddrop._holdOnCloseOfWindow.toString().match(/^\s*function\s+([^\s\(]+)/);
		try
		{
			eval(myFunction[1] + "()");
		}
		catch (e)
		{
		}
	}
	return _fcst13;
},
_clickCancelButton:function (event)
{
	var saveElement = document.getElementById(framework.widget.draganddrop._holdMasterId+"._saveButton");
	saveElement.style.background = "#660099 repeat-x";
	saveElement.style.color = "#fff";
	for (var i=0;i<framework.widget.draganddrop._dragElem.length;i++)
	{
		framework.widget.draganddrop._dragElem.splice(0,1);
		framework.widget.draganddrop._holdAllColumns.splice(0,1);
	}
	var checkboxlistid = document.getElementById(framework.widget.draganddrop._holdMasterId+"._checkboxList");
	checkboxlistid.innerHTML = "";
	var dragdroplistid = document.getElementById(framework.widget.draganddrop._holdMasterId+"._dragdrop");
	dragdroplistid.innerHTML = "";
	for (var i=0;i<framework.widget.draganddrop._holdOriginalAllColumns.length;i++)
	{
		framework.widget.draganddrop._holdAllColumns[i]=framework.widget.draganddrop._holdOriginalAllColumns[i];
	}
	framework.widget.draganddrop._initDragDrop(framework.widget.draganddrop._holdMasterId,framework.widget.draganddrop._holdAllColumns,true);
	framework.widget.draganddrop._populateTable(event);
	_fu7(framework.widget.draganddrop._maxAlertId);
	_fu7(framework.widget.draganddrop._minAlertId);
	_fu7(framework.widget.draganddrop._holdMasterId);
	if (framework.widget.draganddrop._holdOnCloseOfWindow != "")
	{
		myFunction = framework.widget.draganddrop._holdOnCloseOfWindow.toString().match(/^\s*function\s+([^\s\(]+)/);
		try
		{
			eval(myFunction[1] + "()");
		}
		catch (e)
		{
		}
	}
	return _fcst13;
},
_populateTable:function (event)
{
	var replyArray = framework.widget.draganddrop._getDisplayedColumns(event);
	var myFunction = framework.widget.draganddrop._holdPopulateTable.toString().match(/^\s*function\s+([^\s\(]+)/);
	try
	{
		eval(myFunction[1] + "(\""+replyArray+"\")");
	}
	catch (e)
	{
	}
	return _fcst13;
},
_getDisplayedColumns:function (event)
{
	var replyArray = new Array;
	var checkId = "";
	for (var i=0;i<framework.widget.draganddrop._dragElem.length;i++)
	{
		checkId = framework.widget.draganddrop._dragElem[i].id;
		checkId = checkId.replace('drop','');
		for (var j=0;j<framework.widget.draganddrop._holdAllColumns.length;j++)
		{
			if (checkId==framework.widget.draganddrop._holdAllColumns[j].key)
			{
				replyArray[i]=framework.widget.draganddrop._holdAllColumns[j].key;
				break;
			}
		}
	}
	return replyArray;
},
_findDivPositionY:function (elementId)
{
	if (!_fu13(elementId, _fcd13))
	{
		return _fcst6;
	}
	var element = document.getElementById(elementId);
	var curtop = 0;
	var lasttop = 0;
	if (element.offsetParent)
	{
		while (element.offsetParent)
		{
			if (element.offsetTop!=0)  
			{
				lasttop = element.offsetTop;
				curtop += lasttop;
			}
			element = element.offsetParent;
		}
		curtop -= lasttop;
	}
	else if (element.y)
		curtop += element.y;
	return curtop;
},
_sortInitialDraggableElements:function (a,b)
{
	return((a.columnOrder)-(b.columnOrder));
},
_sortDraggableElements:function (a,b)
{
	return((a.y*500-a.x/10)-(b.y*500-b.x/10));
},
_positionXdrop:-1,
_positionYdrop:-1,
_dragElem:new Array,
_dragHashElem:new Array,
_holdMasterId:"",
_holdAllColumns:new Array,
_holdOriginalAllColumns:new Array,
_holdMinNbrColumns:0,
_holdMaxNbrColumns:0,
_holdSaveColumns:"",
_holdPopulateTable:"",
_lastId:0,
_checkBoxId:"",
_minAlertId:"",
_maxAlertId:"",
_labelwidth:0,
_availableHeader:"",
_displayedHeader:"",
_holdOnCloseOfWindow:"",
loaded:true
};
framework.widget.floatingWindow = {
show:function(windowElementId, htmlElementId, windowPosition, windowWidth, windowHeight, hasClose, noBorder)
{
	var floatingWindowElement = document.getElementById(windowElementId);
	var htmlElement = document.getElementById(htmlElementId);
	var windowPos = _fu5(htmlElementId);
	var windowLeft = windowPos[0];
	var windowTop = windowPos[1];
	if (windowPosition == _fcw7)
	{
		windowTop = windowTop + htmlElement.offsetHeight; 
	}
	else if (windowPosition == _fcw6)
	{
		if (windowHeight != _fcw1)
		{
			windowTop = windowTop - htmlElement.offsetHeight - windowHeight; 
		}
	}
	else if (windowPosition == _fcw8)
	{
		windowLeft = windowLeft - windowWidth; 
	}
	else if (windowPosition == _fcw9)
	{
		windowLeft = windowLeft + htmlElement.offsetWidth + 5; 
	}
	else if (windowPosition == _fcw9RU)
	{
		windowLeft = windowLeft + htmlElement.offsetWidth + 5; 
	}
	else if (windowPosition == _fcw7RJ)
	{
		windowTop = windowTop + htmlElement.offsetHeight;
		windowLeft = windowLeft + htmlElement.offsetWidth - windowWidth;
	}
	floatingWindowElement.style.top = windowTop + "px";
	floatingWindowElement.style.left = windowLeft + "px";
	floatingWindowElement.style.width = windowWidth + "px";
	if (windowHeight != _fcw1)
	{
		floatingWindowElement.style.height = windowHeight + "px";
	}
	var windowCloseElementId = windowElementId + "._headerClose" ;
	if (hasClose)
	{
		_fu23(windowCloseElementId);
		var closeElementId = windowElementId + "._headerClose";
		_fe1(closeElementId, _fce4, _fwf6);
	}
	else
	{
		_fu7(windowCloseElementId);
	}
	_fu23(windowElementId);
	if (windowPosition == _fcw6)
	{
		if (windowHeight == _fcw1)
		{
			windowTop = windowTop - floatingWindowElement.offsetHeight; 
			floatingWindowElement.style.top = windowTop + "px";
		}
	}
	if (windowPosition == _fcw9RU)
	{
		if (windowHeight == _fcw1)
		{
			windowTop = windowTop - floatingWindowElement.offsetHeight; 
			windowTop = windowTop + htmlElement.offsetHeight;
			floatingWindowElement.style.top = windowTop + "px";
		}
	}
	if (_fu13(noBorder, _fcd2) && noBorder)
	{
		floatingWindowElement.style.border = "none";
	}
	return _fcst13;
},
showAt:function(windowElementId, windowLeft, windowTop, windowWidth, windowHeight, hasClose)
{
	var windowElement = document.getElementById(windowElementId);
	windowElement.style.top = windowTop + "px";
	windowElement.style.left = windowLeft + "px";
	windowElement.style.width = windowWidth + "px";
	if (windowHeight != _fcw1)
	{
		windowElement.style.height = windowHeight + "px";
	}
	var windowCloseElementId = windowElementId + "._headerClose" ;
	if (hasClose)
	{
		_fu23(windowCloseElementId);
		var closeElementId = windowElementId + "._headerClose";
		_fe1(closeElementId, _fce4, _fwf6);
	}
	else
	{
		_fu7(windowCloseElementId);
	}
	_fu23(windowElementId);
	return _fcst13;
},
hide:function(windowElementId)
{
	_fu7(windowElementId);
	_fu24(windowElementId);
},
setHTML:function(windowElementId, titleText, innerHTMLText)
{
	var windowHeaderTitleElementId = windowElementId + "._headerTitle";
	document.getElementById(windowHeaderTitleElementId).innerHTML = titleText;
	var windowContentElementId = windowElementId + "._content";
	document.getElementById(windowContentElementId).innerHTML = innerHTMLText;
},
setHTMLContent:function(windowElementId, innerHTMLText)
{
	var windowContentElementId = windowElementId + "._content";
	document.getElementById(windowContentElementId).innerHTML = innerHTMLText;
},
hideSelects:function(floatingWindowId)
{
	var rect = {};
	var element = document.getElementById(floatingWindowId);
	var elementPosition = _fu5(floatingWindowId);
	rect[0] = elementPosition[1];
	rect[2] = rect[0] + element.offsetHeight;
	rect[3] = elementPosition[0];
	rect[1] = rect[2] + element.offsetWidth;
	return _fu8(floatingWindowId, rect);
},
_closeEventHandler:function(event)
{
	var windowElementId = this.id.split("._headerClose")[0];
	_fu7(windowElementId);
	event.stopPropagation();
	_fu24(windowElementId);
},
createSimpleJSFloatingWindow:function(putModuleId, moduleId, headerText, closeText, hasTitle)
{
	var divElement = document.createElement('div');
	divElement.id = moduleId;
	divElement.className = "floatingWindow";
	divElement.type = "floatingWindow";
	if (hasTitle){
		var divHeader = document.createElement('div');
		divHeader.id = moduleId+"._header";
		divHeader.className = "floatingWindowHeader";
		var divHeaderTitle = document.createElement('div');
		divHeaderTitle.id = moduleId+"._headerTitle";
		divHeaderTitle.className = "floatingWindowHeaderTitle";
		divHeaderTitle.innerHTML = headerText;
		divHeader.appendChild(divHeaderTitle);
		var divHeaderClose = document.createElement('div');
		divHeaderClose.id = moduleId+"._headerClose";
		divHeaderClose.className = "floatingWindowHeaderClose";
		divHeaderClose.innerHTML = closeText;
		divHeader.appendChild(divHeaderClose);
		divElement.appendChild(divHeader);
	}
	var divContent = document.createElement('div');
	divContent.id = moduleId+"._content";
	divContent.className = "floatingWindowContent";
	divElement.appendChild(divContent);
	var element = document.getElementById(putModuleId);
	element.appendChild(divElement);
	document.getElementById(moduleId).tabIndex="0";
},
loaded:true
};
framework.widget.helpmenu = {
init:function(helpMenuId) 
{	
	if (!_fu13(helpMenuId, _fcd13))
    {
		return _fcst8;
    }
    var helpMenuDiv = document.getElementById(helpMenuId);   
	var helpMenu = document.getElementById(helpMenuId + "_ul");
	var helpMenuIcon;
   	if (_fu14(helpMenu))
	{
		return _fcst3;
	}
	for (var index = 0; index < helpMenu.childNodes.length; index += 1)
	{
		 var menuItems = false;
		 var elementNode = helpMenu.childNodes[index];
		 if (elementNode.nodeName == 'LI' && elementNode.getAttribute('iconNode') == 'true')
		 {
		 	_fe1(elementNode.id, _fce4, _fwh4 );
		 	helpMenuIcon = elementNode;
		 }
		 else if(elementNode.nodeName == 'LI')
		 {
			for (var index2 = 0; index2 < elementNode.childNodes.length; index2 += 1)
			{   
				var node2 = elementNode.childNodes[index2];
				if (node2.nodeName == 'DIV')
				{
				    elementNode.divIndicatorId = node2.id; 
				    helpMenuIcon.divIndicatorId = node2.id; 
				}
				else if (node2.nodeName == 'UL')
				{   
				    elementNode.helpMenuItemsId = node2.id;
				    var itemCount = 0;
				    for (var index3 = 0; index3 < node2.childNodes.length; index3 += 1)
					{		
						var node3 = node2.childNodes[index3];		       		   		
						if (node3.nodeName == 'LI')
						{
						    itemCount += 1;
						    if (itemCount == 1)
						    {
						    	node3.first = true;
						    }
							_fe1(node3.id, _fce15, _fwh6); 
							_fe1(node3.id, _fce14, _fwh5);
							menuItems = true;
							node3.itemsMenuWidth = elementNode.getAttribute('itemsMenuWidth'); 
							node3.style.width = node3.itemsMenuWidth + "px";  
						}	
					}
				}
			}
			if (menuItems)
			{
		   		_fe1(elementNode.id, _fce4, _fwh7);
		   		elementNode.visible = false;
			}
			elementNode.helpWidth = elementNode.getAttribute('helpWidth'); 
			elementNode.style.width = elementNode.helpWidth + "px";
			var newWidth =  helpMenuIcon.offsetWidth  + parseInt(elementNode.helpWidth);
			helpMenuDiv.style.width = newWidth + "px";
			helpMenuIcon.helpMenuId = elementNode.id; 
			var helpMenuOffsetWidth = helpMenu.offsetWidth;
		    var windowPos = _fu5(helpMenu.id);
			var windowLeft; 
			var menuListContainer = document.getElementById(elementNode.helpMenuItemsId);
			var itemsPaddingAndBorder = 10;
			var itemsMenuWidth = parseInt(elementNode.getAttribute('itemsMenuWidth')) + itemsPaddingAndBorder;
			if (helpMenuOffsetWidth < itemsMenuWidth)
			{
				windowLeft = windowPos[0] - (itemsMenuWidth - helpMenuOffsetWidth);
			}
			else
			{
				windowLeft = windowPos[0] + (helpMenuOffsetWidth - itemsMenuWidth);
			}
			menuListContainer.style.left = windowLeft  + "px";
		}
	}
	return _fcst13;
},
closeMenuItemList:function(helpMenuId)
{ 
    var generatedHelpMenuId = helpMenuId + '_li';
    if (!_fu13(generatedHelpMenuId, _fcd13 ))
    {
		return _fcst8;
    }
    var element = document.getElementById(generatedHelpMenuId);
    if (_fu14(element))
	{
		return _fcst3;
	}
	if (_fu14(element.helpMenuItemsId))
	{
		return _fcst11;
	}
	if ('down' == element.getAttribute('upDown'))
	{
	   return _fcst10;
	}  
	element.visible = false;
	_fu7(element.helpMenuItemsId); 
	_fwh3(element);
	return _fcst13;			
},
_menuItemMouseOverEventHandler:function(event)
{
    var helpMenuItemElement = document.getElementById(this.id);
    if(helpMenuItemElement.first)
    {
    	helpMenuItemElement.className = 'helpfirstMenuItemHighlighted';
    }
    else
    {
		helpMenuItemElement.className = 'helpmenuItemHighlighted';
	}
},
_menuItemMouseOutEventHandler:function(event)
{
	var helpMenuItemElement = document.getElementById(this.id);
	if (helpMenuItemElement.first === true)
	{
		helpMenuItemElement.className = 'firstHelpMenuItem';  
	}
	else
	{
		helpMenuItemElement.className = 'helpMenuItem';
	}
	helpMenuItemElement.style.width = helpMenuItemElement.itemsMenuWidth + "px"; 
},
_helpMenuIconOnClickEventHandler:function(event)
{ 
    var iconElement = document.getElementById(this.id);
    var helpMenuElement = document.getElementById(iconElement.helpMenuId);
	if (helpMenuElement.visible === false)
	{
	    helpMenuElement.visible = true;
		_fu23(helpMenuElement.helpMenuItemsId);
	}
	else
	{
	    helpMenuElement.visible = false;
		_fu7(helpMenuElement.helpMenuItemsId);
	}
	_fwh3(helpMenuElement);	
},
_menuOnClickEventHandler:function(event)
{ 
    var element = document.getElementById(this.id);
	if (element.visible === false)
	{
	    element.visible = true;
		_fu23(element.helpMenuItemsId);
	}
	else
	{
	    element.visible = false;
		_fu7(element.helpMenuItemsId);
	}  
	_fwh3(element);
},
_changeArrow:function(element)
{
    var upDown = element.getAttribute('upDown');
    var elementDivIndicator = document.getElementById(element.getAttribute('divIndicatorId'));
    if (upDown == 'up')
    {
		elementDivIndicator.className = 'helpMenuDivArrowDown';
		element.setAttribute('upDown', 'down');
    }
    else if(upDown == 'down')
    {   
		elementDivIndicator.className = 'helpMenuDivArrowUp';
		element.setAttribute('upDown', 'up');
    }  
},
loaded:true
};
framework.widget.menu = {
init:function(menuBarId) 
{	
	if (!_fu13(menuBarId, _fcd13 ))
    {
		return _fcst8;
    }
	var menuBar = document.getElementById(menuBarId + "_ul");
	if(menuBar){	
	  menuBar.setAttribute("role","tablist");
	}
   	if (_fu14(menuBar))
	{
		return _fcst3;
	}
	for (var index=0; index < menuBar.childNodes.length; index += 1)
	{
		 var menuItems = false;
		 var elementNode = menuBar.childNodes[index];
		 if (elementNode.nodeName == 'LI')
		 {
			for (var index2=0; index2 < elementNode.childNodes.length; index2 += 1)
			{   
				var node2 = elementNode.childNodes[index2];
				if (node2.nodeName == 'DIV')
				{
				    elementNode.divIndicatorId = node2.id;  
				}
				else if( node2.nodeName == 'UL')
				{    
				    elementNode.menuItemsId = node2.id;
				    var itemCount = 0;
				    for (var index3=0; index3 < node2.childNodes.length; index3 += 1)
					{		
						var node3 = node2.childNodes[index3];		       		   		
						if (node3.nodeName == 'LI')
						{
						    itemCount += 1;
						    if (itemCount == 1 )
						    {
						      node3.first = true;
						    }
							_fe1(node3.id, _fce15, _fwme6 ); 
							_fe1(node3.id, _fce14, _fwme5 );
							menuItems = true;
							node3.itemsMenuWidth = elementNode.getAttribute('itemsMenuWidth'); 
							node3.style.width = node3.itemsMenuWidth + "px";  
						}	
					}
				}
			}
			if (menuItems)
			{
		   		_fe1(elementNode.id, _fce4, _fwme9 );
		   		elementNode.visible = false;
			}
			else if (elementNode.getAttribute('selectedMenuTab') == 'false' )
			{
				_fe1(elementNode.id, _fce15, _fwme8 ); 
				_fe1(elementNode.id, _fce14, _fwme7 );
			}
			elementNode.tabWidth = elementNode.getAttribute('tabWidth'); 
			elementNode.style.width = elementNode.tabWidth + "px";  	
		}
	}
	_fwme4(menuBar)
	return _fcst13;
},
closeMenuItemList:function(menuTabElementId)
{ 
    if (!_fu13(menuTabElementId, _fcd13 ))
    {
		return _fcst8;
    }
    var element = document.getElementById(menuTabElementId);
    if (_fu14(element))
	{
		return _fcst3;
	}
	if (_fu14(element.menuItemsId))
	{
		return _fcst11;
	}
	if ('down' == element.getAttribute('upDown'))
	{
	   return _fcst10;
	}  
	element.visible = false;
	_fu7(element.menuItemsId); 
	_fwme3(element);
	return _fcst13;			
},
menuTabShowSelected:function(menuTabElementId)
{
    if (!_fu13(menuTabElementId, _fcd13 ))
    {
		return _fcst8;
    }
    var inputMenuTabElementId = menuTabElementId + ".menu";
    var element = document.getElementById(inputMenuTabElementId);
    if (_fu14(element))
	{
		return _fcst3;
	}   
	var menuBar = document.getElementById(inputMenuTabElementId).parentNode.id;
	var menuBarId = document.getElementById(menuBar);
	if (_fu14(menuBar))
	{
		return _fcst3;
	}
		for (var index=0; index < menuBarId.childNodes.length; index += 1)
		{
			var elementNode = menuBarId.childNodes[index];
			 if (elementNode.nodeName == 'LI')
			 {									 
				 var elementDivIndicator = document.getElementById(elementNode.getAttribute('divIndicatorId'));
				 var menuBarTabClassName = elementNode.className;
				 var elementDivIndicatorClassName = elementDivIndicator.className;
				 if (elementNode.id == inputMenuTabElementId)
				 {					 				 
					 elementNode.className='mainMenuBarCurrentItem';
					 elementNode.setAttribute('selectedMenuTab','true');
					 if (elementDivIndicatorClassName.search("No") == -1)
					 {	 
						 elementDivIndicator.className="menuCurrentItemDivWithItemsDown"
					 } else {
						 elementDivIndicator.className="menuCurrentItemDivNoItems"
						 _fe4(elementNode.id, _fce15, _fwme8 ); 
						 _fe4(elementNode.id, _fce14, _fwme7 );
					 }
				 } else if (menuBarTabClassName.search("Current") != -1){
					 elementNode.setAttribute('selectedMenuTab','false');
					 if (elementDivIndicatorClassName.search("No") == -1)
					 {
						 elementNode.className='mainMenuBarItem';
						 elementDivIndicator.className="menuItemDivWithItemsDown"						
					 } else {						
						 elementNode.className='mainMenuBarItemNoItems';
						 elementDivIndicator.className="menuItemDivNoItems"
						 _fe1(elementNode.id, _fce15, _fwme8 ); 
						 _fe1(elementNode.id, _fce14, _fwme7 );
					 }
				 }		 
			 }
		}	
		return _fcst13;	
},
_menuItemMouseOverEventHandler:function(event)
{
    var element = document.getElementById(this.id);
    if(element.first)
    {
    	element.className = 'firstMenuItemHighlighted';
    }
    else
    {
		element.className = 'menuItemHighlighted';
	}
},
_menuItemMouseOutEventHandler:function(event)
{
	var element = document.getElementById(this.id);
	if (element.first === true)
	{
		element.className = 'firstMenuItem';  
	}
	else
	{
		element.className = 'menuItem';
	}
	element.style.width = element.itemsMenuWidth + "px";  
},
_menuOnClickEventHandler:function(event)
{ 
    var element = document.getElementById(this.id);
	if (element.visible === false)
	{
	    element.visible = true;
	    _fu23(element.menuItemsId);
	}
	else
	{
	    element.visible = false;
		_fu7(element.menuItemsId);
	} 
	_fwme3(element);			
},
_changeArrow:function(element)
{
 	var selectedMenuTab = element.getAttribute('selectedMenuTab');
    var upDown = element.getAttribute('upDown');
    var elementDivIndicator = document.getElementById(element.getAttribute('divIndicatorId'));
    if (upDown == 'up')
    {
       if(selectedMenuTab == 'true')
       {
			elementDivIndicator.className = 'menuCurrentItemDivWithItemsDown';
       }
       else
       {
			elementDivIndicator.className = 'menuItemDivWithItemsDown';
       }
       element.setAttribute('upDown', 'down');
    }
    else if(upDown == 'down')
    {
       if(selectedMenuTab == 'true')
       {
			elementDivIndicator.className = 'menuCurrentItemDivWithItemsUp';
       }
       else
       {
			elementDivIndicator.className = 'menuItemDivWithItemsUp';
       }
       element.setAttribute('upDown', 'up');
    }
},
_menuMouseOverEventHandler:function(event)
{
	 var element = document.getElementById(this.id);
	 element.className = 'mainMenuBarItemHighlighted';
},
_menuMouseOutEventHandler:function(event)
{
	var element = document.getElementById(this.id);
	element.className = 'mainMenuBarItemNoItems';
},
_matchCellHeightsForRow:function(menuBarElement)
{
	var childNodes = new Array();
	var childNode = null;
	var maxCellHeightForRow = 0;
	for (var nodeIndex = 0; nodeIndex < menuBarElement.childNodes.length; nodeIndex += 1)
	{
		childNode = menuBarElement.childNodes[nodeIndex];
		if (childNode.id && childNode.id.indexOf(".menu") != -1)
		{
			childNodes.push(childNode);
			var childNodeHeight = childNode.clientHeight > 0? childNode.clientHeight:childNode.offsetHeight;
			if (childNodeHeight > maxCellHeightForRow)
			{
				maxCellHeightForRow = childNodeHeight;
			}
		}
	}
	var maxCellHeightForRowString = maxCellHeightForRow + "px";
	childNode = childNodes.pop();
	while (!_fu14(childNode))
	{
		childNode.style.height = maxCellHeightForRowString;
		if (childNode.divIndicatorId)
		{
			textNode = document.getElementById(childNode.divIndicatorId);
			textNode.style.height = maxCellHeightForRowString;
		}
		childNode = childNodes.pop();
	}
	return _fcst13;
},
loaded:true
};
framework.widget.module = {
init:function(moduleElementId, helpEventHandler, beforeToggleHandler, afterToggleHandler)
{
	if (!_fu13(moduleElementId, _fcd13) ||
		!_fu13(beforeToggleHandler, _fcd13) ||
		!_fu13(afterToggleHandler, _fcd13))
	{
		
		return _fcst14;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return _fcst3;
	}
	moduleElement._isExpandedMode = true;
	moduleElement._beforeToggleHandler = beforeToggleHandler;
	moduleElement._afterToggleHandler = afterToggleHandler;
	moduleElement._hasHelp = (moduleElement.getAttribute("hasHelp") == "true");
	if (moduleElement._hasHelp)
	{
		if (!_fu13(helpEventHandler, _fcd6))
		{
			
			return _fcst14;
		}
		var idHelp = moduleElementId + "._headerHelp";
		var idHelpElement = document.getElementById(idHelp);
		if(idHelpElement){
			idHelpElement.tabIndex=0;
			idHelpElement.setAttribute("role","link");
			idHelpElement.setAttribute("aria-haspopup","true");
		}
		_fe1(idHelp, _fce4, helpEventHandler);
	}
	var idHeader = moduleElementId + "._header";
	if (moduleElement.getAttribute("collapsable") == "true")
	{
		_fe1(idHeader, _fce4, _fwmo8);
	}
	if (moduleElement.getAttribute("defaultMode") == "collapsed")
	{
		_fwmo1(moduleElementId);
		moduleElement._isExpandedMode = false;
	}
	return _fcst13;
},
collapse:function(moduleElementId)
{
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return _fcst14;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return _fcst3;
	}
	if (moduleElement._isExpandedMode)
	{
		_fwmo7(moduleElementId, false);
	}
	return _fcst13;
},
expand:function(moduleElementId)
{
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return _fcst14;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return _fcst3;
	}
	if (!moduleElement._isExpandedMode)
	{
		_fwmo7(moduleElementId, true);
	}
	return _fcst13;
},
toggleModuleAttributes:function(moduleElementId,moduleAttributes)
{	
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return _fcst14;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return _fcst3;
	}	
	if (!_fu13(moduleAttributes, _fcd11))
	{
		
		return _fcst14;
	}
	var moduleCollapsedId = moduleElementId + "._collapsed";
	var moduleExpandedId = moduleElementId + "._expanded";
	var moduleEditId = moduleElementId + "._headerEdit";
	var moduleHideId = moduleElementId + "._headerHide";
	var moduleHelpId = moduleElementId + "._headerHelp";
	var idHeader = moduleElementId + "._header";
	var idHeaderTitle = moduleElementId + "._headerTitle";
	var moduleHeaderHideid = moduleElementId + "._headerHide";
	var moduleHeaderEditid = moduleElementId + "._headerEdit";
	var moduleElementHeader = document.getElementById(idHeader);
	if (_fu14(moduleElementHeader))
	{
		
		return _fcst3;
	}
	var moduleElementHeaderTitle = document.getElementById(idHeaderTitle);
	if (_fu14(moduleElementHeaderTitle))
	{
		
		return _fcst3;
	}
	if (moduleAttributes.title)
	{
		moduleElementHeaderTitle.innerHTML = moduleAttributes.title;
	}
	if (moduleAttributes.type)
	{
		if ((moduleAttributes.type != "optional") && 
				(moduleAttributes.type != "required") &&
				(moduleAttributes.type != "preference"))
			{
			
			return _fcst6;
			}
		if ( moduleAttributes.type == "preference" || moduleAttributes.type == "required")
		{
			moduleElement.className="module";
			if (moduleElement.getAttribute("collapsable") == "true")
			{
				moduleElementHeader.className="moduleHeader";
			}				
			else
			{
				moduleElementHeader.className="moduleHeaderNonCollapsable";
			}
			moduleElementHeaderTitle.className="moduleHeaderTitle";
			moduleElement.setAttribute("type","required");
			if (moduleAttributes.type == "preference")
				{
					moduleElement.className="modulePreference";
					moduleElement.setAttribute("type","preference");
				}
		} else if (moduleAttributes.type == "optional")
		{
			moduleElement.className="moduleOptional";
			if (moduleElement.getAttribute("collapsable") == "true")
			{
				moduleElementHeader.className="moduleOptionalHeader";
			}				
			else
			{
				moduleElementHeader.className="moduleOptionalHeaderNonCollapsable";
			}			
			moduleElementHeaderTitle.className="moduleOptionalHeaderTitle";	
			moduleElement.setAttribute("type","optional");
		}
	}
	if (moduleAttributes.defaultMode)
	{
		if ((moduleAttributes.defaultMode != "collapsed") && 
				(moduleAttributes.defaultMode != "expanded"))
			{
			
			return _fcst6;
			}
		moduleElement.setAttribute("defaultMode",moduleAttributes.defaultMode);
		if (moduleAttributes.defaultMode == "collapsed")
		{
			_fu7(moduleExpandedId);
			_fu23(moduleCollapsedId);
			if (moduleElement.getAttribute("collapsable") == "true")
			{			
				_fu7(moduleHideId);
				_fu23(moduleEditId);
			}
			moduleElement._isExpandedMode = false;
		}
		else
		{
			_fu23(moduleExpandedId);
			_fu7(moduleCollapsedId);
			if (moduleElement.getAttribute("collapsable") == "true")
			{	
				_fu23(moduleHideId);
				_fu7(moduleEditId);
			}
			moduleElement._isExpandedMode = true
		}
	}	
	if (_fu13(moduleAttributes.hasHelp, _fcd2))
	{				
		if (moduleAttributes.hasHelp)
		{
			moduleElement.setAttribute("hasHelp",moduleAttributes.hasHelp);
			var moduleHelpIdValue = document.getElementById(moduleHelpId)
			if (_fu14(moduleHelpIdValue))
			{
				
				return _fcst3;
			}
			if (moduleAttributes.helpText != undefined)
			{
				moduleHelpIdValue.innerHTML = moduleAttributes.helpText;
			}			
			_fu23(moduleHelpId);
		} 
		else
		{
			moduleElement.setAttribute("hasHelp",moduleAttributes.hasHelp);
			_fu7(moduleHelpId);
			var moduleHelpIdValue = document.getElementById(moduleHelpId)
			if (_fu14(moduleHelpIdValue))
			{
				
				return _fcst3;
			}
				moduleHelpIdValue.innerHTML = "";
		}
	}
	if (_fu13(moduleAttributes.collapsable, _fcd2))
	{		
		if (moduleAttributes.collapsable)
		{	  
			if (moduleElement.getAttribute("type") == "optional")
			{
				moduleElementHeader.className="moduleOptionalHeader";
			} 
			else {
				moduleElementHeader.className="moduleHeader";
			}
			moduleElement.setAttribute("collapsable",true);
			if (moduleElement.getAttribute("defaultMode") == "collapsed")
			{
				_fu7(moduleExpandedId);
				_fu23(moduleCollapsedId);
				_fu7(moduleHideId);
				_fu23(moduleEditId);	
				moduleElement._isExpandedMode = false;
			}
			else 
			{
				_fu23(moduleExpandedId);
				_fu7(moduleCollapsedId);
				_fu23(moduleHideId);
				_fu7(moduleEditId);
				moduleElement._isExpandedMode = true
			}
			_fe1(idHeader, _fce4, _fwmo8);
		}	
		else
		{
			if (moduleElement.getAttribute("type") == "optional")
			{
				moduleElementHeader.className="moduleOptionalHeaderNonCollapsable";
			} 
			else 
			{
				moduleElementHeader.className="moduleHeaderNonCollapsable";
			}
			moduleElement.setAttribute("collapsable",false);
			_fu7(moduleExpandedId);
			_fu23(moduleCollapsedId);
			_fu7(moduleHideId);
			_fu7(moduleEditId);
			moduleElement._isExpandedMode = false;
			_fe4(idHeader, _fce4, _fwmo8);
		}
	}
	return _fcst13;
},
isCollapsable:function(moduleElementId)
{
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return null;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return null;
	}
	if (moduleElement.getAttribute("collapsable") == "true")
	{
		return true;
	}
	else
	{
		return false;
	}
},
isExpanded:function(moduleElementId)
{
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return null;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return null;
	}
	return moduleElement._isExpandedMode;
},
isCollapsed:function(moduleElementId)
{
	if (!_fu13(moduleElementId, _fcd13))
	{
		
		return null;
	}
	var moduleElement = document.getElementById(moduleElementId);
	if (_fu14(moduleElement))
	{
		
		return null;
	}
	return !moduleElement._isExpandedMode;
},
_toggleEventHandler:function(event)
{
	var targetEvent = _fe3(event);
	if (targetEvent.id.indexOf("._headerHelp") > -1)
	{
		event.stopPropagation();
		return;
	}
	var moduleElementId = this.id.split("._header")[0];
	var moduleElement = document.getElementById(moduleElementId);
	var beforeToggleHandlerReturnValue = true;
	if (!_fu9(moduleElement._beforeToggleHandler))
	{
		var beforeToggleHandler = moduleElement._beforeToggleHandler + "('" + moduleElementId + "')";
		beforeToggleHandlerReturnValue = eval(beforeToggleHandler);
		if (_fu14(beforeToggleHandlerReturnValue))
		{
			beforeToggleHandlerReturnValue = false;
		}
	}
	if (beforeToggleHandlerReturnValue)
	{
		moduleElement._isExpandedMode = !moduleElement._isExpandedMode;
		_fwmo7(moduleElementId, moduleElement._isExpandedMode);
		if (!_fu9(moduleElement._afterToggleHandler))
		{
			var afterToggleHandler = moduleElement._afterToggleHandler + "('" + moduleElementId + "')";
			eval(afterToggleHandler);
		}
	}
	event.stopPropagation();
},
_setModuleMode:function(moduleElementId, isExpandedMode)
{
	var moduleElement = document.getElementById(moduleElementId);
	var moduleCollapsedId = moduleElementId + "._collapsed";
	var moduleExpandedId = moduleElementId + "._expanded";
	var moduleEditId = moduleElementId + "._headerEdit";
	var moduleHideId = moduleElementId + "._headerHide";
	if (isExpandedMode)
	{
		_fu7(moduleCollapsedId);
		_fu23(moduleExpandedId);
		_fu7(moduleEditId);
		_fu23(moduleHideId);
		moduleElement._isExpandedMode = true;
	}
	else
	{
		_fu7(moduleExpandedId);
		_fu23(moduleCollapsedId);
		_fu7(moduleHideId);
		_fu23(moduleEditId);
		moduleElement._isExpandedMode = false;
	}
},
loaded:true
};
framework.widget.suggest = {
init:function(elementId, listArray, functionName, defaultText)
{
	if (!_fu13(elementId, _fcd13) ||
	    !_fu13(defaultText, _fcd13) ||
		!_fu13(listArray, _fcd1) ||
		!_fu13(functionName, _fcd6))
	{
		
		return _fcst14;
	}
	var element = document.getElementById(elementId);
	if (_fu14(element))
	{
		return _fcst3;
	}
	element._suggestAlways = element.getAttribute("suggestAlways") == "true" ? true : false;
	if (listArray.length>0 || element._suggestAlways === true){	
		_fe1(elementId, _fce8, _fws18);
		_fe1(elementId, _fce10, _fws15);
		_fe1(elementId, _fce4, _fws21);
		_fe1(elementId, _fce7, _fws16);
		_fe1(elementId, _fce2, _fws20);
	}
	var lookupButtonId = elementId + "._LookupButton";	
	if(document.getElementById(lookupButtonId)){
		document.getElementById(lookupButtonId).tabIndex=0;
		document.getElementById(lookupButtonId).setAttribute("alt",framework.widget.suggest._dropDownButtonAriaLabel);
		document.getElementById(lookupButtonId).setAttribute("aria-label",framework.widget.suggest._dropDownButtonAriaLabel);
		document.getElementById(lookupButtonId).setAttribute("role","application");
	}
	if (listArray.length>0 || element._suggestAlways === true){
		_fe1(lookupButtonId, _fce4, _fws15);
		_fe1(lookupButtonId, _fce7, _fws17);
		_fe1(lookupButtonId, _fce2, _fws16);
		_fe1(lookupButtonId, _fce10, framework.widget.suggest._iconBoxOnClickEventHandler);
		_fws11[elementId] = listArray;
		element.value = defaultText;
		_fu20(lookupButtonId, true);
	} else {
		element.value = "";
		_fu20(lookupButtonId, false);
	}
	_fws6[elementId] = functionName;
	_fws5[elementId] = defaultText;
	return _fcst13;
},
updateListArray:function(elementId, listArray)
{
	if (!_fu13(elementId, _fcd13) ||
		!_fu13(listArray, _fcd1))
	{
		
		return _fcst14;
	}
	_fws11[elementId] = listArray;
	var lookupButtonId = elementId + "._LookupButton";		
	var element = document.getElementById(elementId);
	if (listArray.length>0 || element._suggestAlways === true){	
		_fe1(elementId, _fce8, _fws18);
		_fe1(elementId, _fce10, _fws15);
		_fe1(elementId, _fce7, _fws16);
		_fe1(elementId, _fce2, _fws20);
		_fe1(elementId, _fce4, _fws21);
		if (element.value === "" && !_fu14(_fws5[elementId]))
		{
			element.value = _fws5[elementId];
		}
		_fu20(lookupButtonId, true);
		_fe1(lookupButtonId, _fce4, _fws15);
		_fe1(lookupButtonId, _fce7, _fws17);
		_fe1(lookupButtonId, _fce2, _fws16);
	}
	else
	{
		_fe4(elementId, _fce8, _fws18);
		_fe4(elementId, _fce10, _fws15);
		_fe4(elementId, _fce7, _fws16);
		_fe4(elementId, _fce2, _fws20);
		_fe4(elementId, _fce4, _fws21);
		if (element.value == _fws5[elementId])
		{
			element.value = "";
		}
		_fu20(lookupButtonId, false);
	}
	return _fcst13;
},
listEntry:function(key, name) 
{
	if (!_fu13(key, _fcd13) ||
		!_fu13(name, _fcd13))
	{
		return _fcst14;
	}
    this.key = key;
	this.name = name;
	return _fcst13;
},
listEntryFF:function(key, name) 
{
	this.key = key;
	this.name = name;
	return _fcst13;
},
createJSSuggest:function (putId, id, name, size, defaultText, always, listSize, maxLength)
{
	var divElem = document.createElement('div');
	divElem.id = id + ".div";
	var inElem = document.createElement('input');
	inElem.setAttribute("id", id);
	inElem.setAttribute("name", name);
	inElem.setAttribute("type","text");
	inElem.setAttribute("size", size);
	inElem.setAttribute("maxLength", maxLength);
	inElem.setAttribute("suggestAlways", always);
	inElem.setAttribute("listSize", listSize);
	inElem.setAttribute("value", defaultText);
	divElem.appendChild(inElem);
	var space=document.createTextNode(' ');
	divElem.appendChild(space);
	var imgElem = document.createElement('img');
	imgElem.id = id + "._LookupButton";
	imgElem.src = "/framework/image/icon_combo_box_arrow.gif";
	imgElem.align = "top";
	divElem.appendChild(imgElem);
	var popElem = document.createElement('div');
	popElem.className = "suggestPopup";
	divElem.appendChild(popElem);
	var searchElem = document.createElement('div');
	searchElem.id = id + "._Dropdown";
	searchElem.className = "suggestSearchable";
	popElem.appendChild(searchElem);
	var element = document.getElementById(putId);
	element.appendChild(divElem);
	return _fcst13;
}, 
_clickedopen:false,
_holdTextElementId:"",
_holdFunctionName:"",
_holdFocusId:"",
_dropDownButtonAriaLabel:"",
_listArray:new Array(),
_functionName:new Array(),
_defaultText:new Array(),
setLocalizedDropDownButtonAriaLabel:function(dropDownButtonAriaLabelString)
{
	framework.widget.suggest._dropDownButtonAriaLabel=dropDownButtonAriaLabelString;
},
_setFocusIdOff:function()
{
	_fws8 = "";
	return _fcst13;
},
_setFocusIdOn:function()
{
	_fws8 = "on";
	return _fcst13;
},
_textBoxOnClickEventHandler:function()
{
	var element = document.getElementById(this.id);
	if (element.value == _fws5[this.id])
	{
		element.value = "";
	}
	_fws4 = false;
	return _fcst13;
},
_suggestOnKeyDownEventHandler:function(event)
{
	if (_fu14(event.keyCode))
	{
		return _fcst3;
	}
	else
	{
		if (event.keyCode == _fck5)
		{
			_fu7(this.id + "._Dropdown");
		}
		else if (event.keyCode == _fck1 || event.keyCode == _fck6)
		{
			_fws17();
		}
	}
	return _fcst13;
},
_suggestTextBoxOnBlurEventHandler:function(event)
{
	var element = document.getElementById(this.id);
	if (_fu9(element.value))
	{
		element.value = _fws5[this.id];
	}
	if (_fu9(_fws8))
	{
		_fu7(this.id + "._Dropdown");
	}
	return _fcst13;
},
_suggestSelectOnBlurEventHandler:function()
{
	var innerid = this.id;
	var index = this.id.indexOf("._InputSelect");
	if (index > -1)
	{ 
		innerid = this.id.substr(0, index);
	}
	if (_fu9(_fws8))
	{
		_fu7(innerid + "._Dropdown");
	}
	var element = document.getElementById(innerid);
	if (_fu9(element.value))
	{
		element.value = _fws5[innerid];
	}
	return _fcst13;
},
_search:function(event)
{
	var fromclick = false;
	if (_fws7(event) == _fck4)
	{
		fromclick = true;
	}
	var innerid = this.id;
	var index = this.id.indexOf("._LookupButton");
	if (index > -1)
	{
		innerid = this.id.substr(0, index);
	}
	_fws14(event, fromclick, innerid, _fws11[innerid], _fws6[innerid]);
	return _fcst13;
},
_iconBoxOnClickEventHandler:function(event)
{
	event.preventDefault();
    if (event.keyCode === 13) 
    {
    	var innerid = this.id;
    	var index = this.id.indexOf("._LookupButton");
    	if (index > -1)
    	{
    		innerid = this.id.substr(0, index);
    	}
	    document.getElementById(innerid+"._LookupButton").click();
	    _fu23(innerid+"._Dropdown");	    	
	    _fu23(innerid+"._InputSelect");
	 }
	    return _fcst13;
},
_searchText:function(event,fromClick, textElementId, listArray, functionName) 
{
	if (!_fu13(fromClick, _fcd2) ||
		!_fu13(textElementId, _fcd13) ||
		!_fu13(listArray, _fcd1) ||
		!_fu13(functionName, _fcd6))
	{
		
		return _fcst14;
	}
	var dropdownId = textElementId + "._Dropdown";
	var keyCode = _fws7(event);
	if (keyCode == _fck3 || keyCode == _fck5)
	{
    	_fu7(dropdownId);
		_fws4 = false;
		return true;
  	}
	_fws10 = textElementId;
	_fws9 = functionName;
	if (_fws4 && fromClick) 
	{
		_fu7(dropdownId);
		_fws4 = false;
	}
	else
	{
		var textElement = document.getElementById(textElementId);
		var capturedtext = textElement.value;
		textElement._listSize = parseInt(textElement.getAttribute("listSize"));
		if (_fu14(capturedtext))
		{
			
			return _fcst3;
		}
		var capturedTextLowerCase = capturedtext.toLowerCase();
		var innerdiv = document.getElementById(dropdownId);
		if (_fu14(innerdiv))
		{
			
			return _fcst3;
		}
		var html = new Array;
		var results = 0;
		var listsize = 0;
		var first = true;
		var item = "";
		var capturedTextIndex = -1;
		var htmlString = "";
		_fws4 = true;
		for (var i = 0; i < listArray.length; i += 1) 
		{
			item = listArray[i].name.toLowerCase();
			capturedTextIndex = item.indexOf(capturedTextLowerCase);
			if (capturedTextIndex === 0 ||
				item.indexOf(" " + capturedTextLowerCase) > -1 ||
				fromClick ||
				(keyCode == _fck1 && capturedTextIndex === 0))
			{
				if (first)
				{
					html.push("<option value=\"");
					html.push(listArray[i].key);
					html.push("\" selected>");
					html.push(listArray[i].name);
					html.push("</option>");
					first = false;
				}
				else
				{
					html.push("<option value=\"");
					html.push(listArray[i].key);
					html.push("\">");
					html.push(listArray[i].name);
					html.push("</option>");
				}
				results += 1;
			}			
		}
		htmlString = html.join("");
		listsize = results;
		if (listsize > textElement._listSize)
		{
			listsize = textElement._listSize;
		}
		var inputSelectId = textElementId + "._InputSelect";
		var elementWidth = textElement.offsetWidth > textElement.clientWidth? textElement.offsetWidth:textElement.clientWidth;
		var multiple = (listsize == 1) ? true : false; 
		if (multiple)
		{
		var innerHTML = "<select id=\"" + inputSelectId + "\"" +
			" name=\"" + inputSelectId + "\"" +
			" size=\"" + listsize + "\"" +
			" multiple=\"" + multiple + "\"" +
			" style=\"width:" +
			(elementWidth) + 
			"px\">" +
			htmlString + "</select>";
		} else {
			var innerHTML = "<select id=\"" + inputSelectId + "\"" +
			" name=\"" + inputSelectId + "\"" +
			" size=\"" + listsize + "\"" +
			" style=\"width:" +
			(elementWidth) + 
			"px\">" +
			htmlString + "</select>";
		}
		innerdiv.innerHTML = innerHTML;
		_fu23(dropdownId);
		element = textElement;
		while (element && !(element.nodeName == "DIV" && element.id=="container"))
		{
			if (element.className.indexOf("tableContents") > -1) {
				var textElementLeft = _fu5(textElementId)[0];
				var textElementTop = _fu5(textElementId)[1];
				innerdiv.parentElement.style.left = (textElementLeft + 2) + "px";
				var extraSpace = (_fu11()) ? 11 : 0;
				innerdiv.parentElement.style.top = (textElementTop + textElement.offsetHeight + extraSpace) + "px";
				innerdiv.parentElement.style.position="absolute";
				break;
			}
			element = element.parentElement;
		}
		var e
		if (results === 0) 
		{
			_fu7(inputSelectId);
			_fws4 = false;
		}
		else
		{
			if (keyCode == _fck1 || keyCode == _fck6 || keyCode == _fck4) 
			{  
			    _fu23(dropdownId);  
			    document.getElementById(inputSelectId).focus();				
	    	}
			if (keyCode == _fck2) 
			{
				try
				{
					eval("_fws12()");
				}
				catch (e)
				{
				}
	  		}
		}
		_fe1(inputSelectId, _fce8, _fws13);
		_fe1(inputSelectId, _fce4, _fws12);
		_fe1(inputSelectId, _fce3, _fws12);
		_fe1(inputSelectId, _fce2, _fws16);
		_fe1(inputSelectId, _fce2, _fws19);
		_fe1(inputSelectId, _fce7, _fws17);
		_fe1(inputSelectId, _fce15, _fws17);
		_fe1(inputSelectId, _fce14, _fws16);
	}
	return _fcst13;
},
_populateElement:function(event)
{ 
	if ((_fu14(event)) ||(event.type !==_fce3) || ((event.type ===_fce3) && BrowserType().OS==""))
	{
		var inputSelectElement = document.getElementById(_fws10 + "._InputSelect");
		var selectedOption = inputSelectElement.options[inputSelectElement.selectedIndex];
		var selectText = selectedOption.text;
		var selectValue = selectedOption.value;
		_fws4 = false; 
		document.getElementById(_fws10).focus();
		_fu7(_fws10 + "._Dropdown");
		var myFunction = _fws9.toString().match(/^\s*function\s+([^\s\(]+)/);
		try
		{
			eval(myFunction[1] + "(\"" + selectValue + "\",\"" + selectText + "\",\"" + _fws10 + "\")");
		}
		catch (e)
		{
		}
	}
	return _fcst13;
},
_populateNameKeyPress:function(event)
{
	var keyCode = _fws7(event);
	if (keyCode == _fck3 || keyCode == _fck5)
	{
		_fu7(_fws10 + "._Dropdown");
		_fws4 = false;
		return _fcst13;
	}
	else if (keyCode == _fck2) 
	{
		_fws12(event);
	}
	event.stopPropagation();
	return _fcst13;
},
_getKeyCodeFromEvent:function(event)
{
	var keyCode = _fck4;
	try
	{
		if (!_fu14(event.keyCode))
		{
			keyCode = event.keyCode;
		}
	}
	catch (e)
	{
	}
	return keyCode;
},
loaded:true
};
framework.widget.table = {
init:function(tableId, sortHandler, afterSortHandler)
{
	if (_fu14(tableId))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) &&
	    (!_fu14(sortHandler) && !_fu13(sortHandler, _fcd6)) &&
	    (!_fu14(afterSortHandler) && !_fu13(afterSortHandler, _fcd6)))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (table._initialized)
	{
		return _fcst13;
	}
	table._sortHandler = _fwt22;
	table._afterSortHandler = _fwt21;
	if (!_fu14(sortHandler))
	{
		table._sortHandler = sortHandler;
	}
	if (!_fu14(afterSortHandler))
	{
		table._afterSortHandler = afterSortHandler;
	}
	table._rowCount = 0;
	table._characterWidths = new Array;
	if (_fu14(table._cellContents))
	{
		table._cellContents = null;
	}
	if (_fu14(table._needsSorting))
	{
		table._needsSorting = false;
	}
	var retVal = _fwt28(table);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	retVal = _fwt26(table);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	retVal = _fwt33(table, 0);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	table._initialized = true;
	retVal = _fwt31(table);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	retVal = _fwt38(table, table._initialSortColumnIndex, table._initialSortOrder);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	if (table._cellContents)
	{
		return _fwt15(table.id, table._cellContents, table._needsSorting);
	}
	return _fwt4(table.id);
},
clearTableContents:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	table._cellContents = null;
	var childNode = null;
	var retVal = _fcst13;
	for (var nodeIndex = 0; nodeIndex < table._rowsElement.childNodes.length; nodeIndex += 1)
	{
		childNode = table._rowsElement.childNodes[nodeIndex];
		if (childNode.id && childNode.id.indexOf(table._rowIdPrefix) != -1)
		{
			childNode = table._rowsElement.removeChild(childNode);
			_fu17(childNode);
			nodeIndex = nodeIndex - 1;
		}
	}
	table._rowCount = 0;
	retVal = _fwt38(table, table._initialSortColumnIndex, table._initialSortOrder);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	table._currentSortOrder = table._initialSortOrder;
	table._currentSortColumnIndex = table._initialSortColumnIndex;
	retVal = _fwt37(table);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	return _fwt40(table, false);
},
getTableContentsArray:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	if (!_fu14(table._cellContents))
	{
		return table._cellContents.slice();
	}
	return null;
},
getFirstVisibleRow:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	var totalRowCount = table._rowCount + 1; 
	var prepetualRowHeight = 0;
	var currentViewableTopRow = 0;
	for (var index = 1; index < totalRowCount; index += 1)
	{
		var tableContentCurrentRow = document.getElementById(table._rowIdPrefix + index);
		if (_fu14(tableContentCurrentRow))
		{
			
			return null;
		}
		var currentRowHeight = tableContentCurrentRow.clientHeight > tableContentCurrentRow.innerHeight? tableContentCurrentRow.clientHeight:tableContentCurrentRow.innerHeight;	
		prepetualRowHeight += currentRowHeight;
		if (prepetualRowHeight >= table._rowsElement.scrollTop)
		{
				currentViewableTopRow = index - 1;
				break;
		}
	}
	var tableContents = _fwt11(tableId);
	if (!_fu14(tableContents))
	{
		return tableContents[currentViewableTopRow].slice(); 
	}
	return new Array;
},
setTableContentsString:function(tableId, cellContentsString, needsSorting)
{
	if (_fu14(tableId) ||
		_fu14(cellContentsString) ||
		_fu14(needsSorting))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(cellContentsString, _fcd13) ||
		!_fu13(needsSorting, _fcd2))
	{
		
		return _fcst14;
	}
	var cellContentsArray = null;
	if (!_fu9(cellContentsString))
	{
		cellContentsArray = eval(cellContentsString);
	}
	return _fwt15(tableId, cellContentsArray, needsSorting);
},
setTableContentsArray:function(tableId, cellContentsArray, needsSorting)
{
	if (_fu14(tableId) ||
		_fu14(cellContentsArray) ||
		_fu14(needsSorting))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(cellContentsArray, _fcd1) ||
		!_fu13(needsSorting, _fcd2))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	table._cellContents = cellContentsArray.slice();
	table._needsSorting = needsSorting;
	if (!table._initialized || table._initialized === false)
	{
		return _fcst13;
	}
	var retVal = _fcst13;
	if (table._needsSorting && !_fu14(table._cellContents))
	{
		retVal = _fwt45(table, table._currentSortColumnIndex, table._currentSortOrder);
		if (_fu14(retVal))
		{
			return _fcst3;
		}
		table._needsSorting = false;
		table._cellContents = retVal.slice();
		table._replace = false;
	}
	for (var rowIndex = 0; rowIndex < table._cellContents.length; rowIndex += 1)
	{
		var rowArray = table._cellContents[rowIndex];
		if (!_fu13(rowArray, _fcd1))
		{
			
			return _fcst14;
		}
		if (_fu14(rowArray._rowIndex))
		{
			rowArray._rowIndex = rowIndex + 1;
		}
		if (rowArray.length != table._columnCount)
		{
			
			return _fcst6;
		}
		for (var columnIndex = 0; columnIndex < rowArray.length; columnIndex += 1)
		{
			if (!_fu13(rowArray[columnIndex], _fcd13))
			{
				
				return _fcst14;
			}
		}
	}
	retVal = _fwt40(table, true);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	var childNode = null;
	var rowElement = null;
	for (var nodeIndex = 0; nodeIndex < table._rowsElement.childNodes.length; nodeIndex += 1)
	{
		childNode = table._rowsElement.childNodes[nodeIndex];
		if (childNode.id && childNode.id.indexOf(table._rowIdPrefix) != -1)
		{
			rowElement = table._rowsElement.removeChild(childNode);
			_fu17(rowElement);
			nodeIndex = nodeIndex - 1;
		}
	}
	var oddRow = true;
	rowElement = null;
	var cellElement = null;
	var cellData = null;
	for (rowIndex = 1; rowIndex <= table._cellContents.length; rowIndex += 1)
	{
		table._rowCount = rowIndex;
		rowElement = document.createElement("div");
		table._cellContents[rowIndex - 1]._rowIndex = rowIndex;
		rowElement.id = table._rowIdPrefix + rowIndex;
		rowElement._row = rowIndex;
		rowElement.className = (oddRow === true) ? "tableRowOdd" : "tableRowEven";
		for (columnIndex = 1; columnIndex <= table._cellContents[0].length; columnIndex += 1)
		{
			cellElement = document.createElement("div");
			cellElement.id = rowElement.id + "._col" + columnIndex;
			cellElement.className = (columnIndex != table._columnCount) ? "tableNotLastCell" : "tableLastCell";
			cellElement.style.width = table._columnWidths[columnIndex - 1] + "px";
			cellElement.style.textAlign = table._columnAlignments[columnIndex - 1];
			cellData = _fwt25(table, rowIndex, columnIndex);
			if (_fu14(cellData))
			{
				return _fcst3;
			}
			cellElement.innerHTML = cellData;
			rowElement.appendChild(cellElement);
		}
		table._rowsElement.appendChild(rowElement);
		retVal = _fwt33(table, rowIndex);
		if (retVal != _fcst13)
		{
			return retVal;
		}
		oddRow = !oddRow;
	}
	if (table._headerVisible === false)
	{
		_fu7(table._headerId);
	}
	return _fwt35(table, 0);
},
sortColumn:function(tableId, sortColumnIndex, sortOrder)
{
	if (_fu14(tableId) ||
		_fu14(sortColumnIndex) ||
		_fu14(sortOrder))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(sortColumnIndex, _fcd10) ||
		!_fu13(sortOrder, _fcd13))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if ((sortColumnIndex < 1 || sortColumnIndex > table._columnCount) ||
		(sortOrder != _fcw19 && sortOrder != _fcw20) ||
		(table._sortFlags[sortColumnIndex - 1] === false))
	{
		
		return _fcst6;
	}
	var retVal = _fwt38(table, sortColumnIndex, sortOrder);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	var sortedArray = _fwt45(table, sortColumnIndex, sortOrder);
	return _fwt43(table, sortedArray, sortColumnIndex, sortOrder);
},
getCurrentSortColumnIndex:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	return table._currentSortColumnIndex;
},
getCurrentSortOrder:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	return table._currentSortOrder;
},
addColumn:function(tableId, newColumnIndex, columnHeading, sortFlag, dataAlign, dataFormat, maxLines, columnArray, columnWidths,headerAlign)
{
	if (_fu14(tableId) ||
		_fu14(newColumnIndex) ||
		_fu14(columnHeading) ||
		_fu14(sortFlag) ||
		_fu14(dataAlign) ||
		_fu14(dataFormat) ||
		_fu14(maxLines) ||
		_fu14(columnArray) ||
		_fu14(columnWidths))
	{
		
		return _fcst6;
	}
	if (_fu14(headerAlign))
		headerAlign=_fcw13;
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(newColumnIndex, _fcd10) ||
		!_fu13(columnHeading, _fcd13) ||
		!_fu13(sortFlag, _fcd2) ||
		!_fu13(dataAlign, _fcd13) ||
		!_fu13(dataFormat, _fcd13) ||
		!_fu13(maxLines, _fcd10) ||
		!_fu13(columnArray, _fcd1) ||
		!_fu13(columnWidths, _fcd1))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (table._columnCount < 1)
	{
		
		return _fcst6;
	}
	if (newColumnIndex < 1 || newColumnIndex > table._columnCount + 1 || isNaN(newColumnIndex))
	{
		
		return _fcst6;
	}
	if (dataAlign != _fcw13 &&
		dataAlign != _fcw12 &&
		dataAlign != _fcw14)
	{
		
		return _fcst6;
	}
	if (dataFormat != _fcw16 &&
		dataFormat != _fcw17 &&
		dataFormat != _fcw15)
	{
		
		return _fcst6;
	}
	if (maxLines < 1)
	{
		
		return _fcst6;
	}
	if (columnArray.length != table._rowCount)
	{
		
		return _fcst6;
	}
	for (var rowIndex = 0; rowIndex < columnArray.length; rowIndex += 1)
	{
		if (!_fu13(columnArray[rowIndex], _fcd13))
		{
			
			return _fcst14;
		}
	}
	if (columnWidths.length != table._columnCount + 1)
	{
		
		return _fcst6;
	}
	for (var columnIndex = 0; columnIndex < columnWidths.length; columnIndex += 1)
	{
		if (!_fu13(columnWidths[columnIndex], _fcd10))
		{
			
			return _fcst14;
		}
		if (columnWidths[columnIndex] <= 0)
		{
			
			return _fcst6;
		}
	}
	if (headerAlign != _fcw13 &&
			headerAlign != _fcw12 &&
			headerAlign != _fcw14)
			{
				
				return _fcst6;
			}
	return _fwt19(table, newColumnIndex, columnHeading, sortFlag, dataAlign, dataFormat, maxLines, columnArray, columnWidths,headerAlign);
},
deleteColumn:function(tableId, deleteColumnIndex, columnWidths)
{
	if (_fu14(tableId) ||
		_fu14(deleteColumnIndex) ||
		_fu14(columnWidths))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(deleteColumnIndex, _fcd10) ||
		!_fu13(columnWidths, _fcd1))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (table._columnCount == 1)
	{
		
		return _fcst6;
	}
	if (deleteColumnIndex < 1 || deleteColumnIndex > table._columnCount || isNaN(deleteColumnIndex))
	{
		
		return _fcst6;
	}
	if (columnWidths.length != table._columnCount - 1)
	{
		
		return _fcst6;
	}
	for (var columnIndex = 0; columnIndex < columnWidths.length; columnIndex += 1)
	{
		if (!_fu13(columnWidths[columnIndex], _fcd10))
		{
			
			return _fcst14;
		}
		if (columnWidths[columnIndex] <= 0)
		{
			
			return _fcst6;
		}
	}
	return _fwt23(table, deleteColumnIndex, columnWidths);
},
getColumnWidths:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	if (!_fu14(table._columnWidths))
	{
		return table._columnWidths.slice();
	}
	return null;
},
getColumnCount:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	if (!_fu14(table._columnCount))
	{
		return table._columnCount;
	}
	return null;
},
getTableWidth:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	if (!_fu14(table._widthWithoutScrollBar))
	{
		return table._widthWithoutScrollBar;
	}
	return null;
},
addRow:function(tableId, newRowIndex, rowArray, sortAfterAdd)
{
	if (_fu14(tableId) ||
		_fu14(newRowIndex) ||
		_fu14(rowArray) ||
		_fu14(sortAfterAdd))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(newRowIndex, _fcd10) ||
		!_fu13(rowArray, _fcd1) ||
		!_fu13(sortAfterAdd, _fcd2))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (newRowIndex < 1 || newRowIndex > table._rowCount + 1 || isNaN(newRowIndex))
	{
		
		return _fcst6;
	}
	if (rowArray.length != table._columnCount)
	{
		
		return _fcst6;
	}
	for (var columnIndex = 0; columnIndex < rowArray.length; columnIndex += 1)
	{
		if (_fu14(rowArray[columnIndex]))
		{
			
			return _fcst14;
		}
		if (!_fu13(rowArray[columnIndex], _fcd13))
		{
			
			return _fcst14;
		}
	}
	return _fwt20(table, newRowIndex, rowArray, sortAfterAdd);
},
deleteRow:function(tableId, deleteRowIndex)
{
	if (_fu14(tableId) ||
		_fu14(deleteRowIndex))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(deleteRowIndex, _fcd10))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (deleteRowIndex < 1 || deleteRowIndex > table._rowCount || isNaN(deleteRowIndex))
	{
		
		return _fcst6;
	}
	return _fwt24(table, deleteRowIndex, false);
},
updateRow:function(tableId, updateRowIndex, rowArray, sortAfterUpdate)
{
	if (_fu14(tableId) ||
		_fu14(updateRowIndex) ||
		_fu14(rowArray) ||
		_fu14(sortAfterUpdate))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(updateRowIndex, _fcd10) ||
		!_fu13(rowArray, _fcd1) ||
		!_fu13(sortAfterUpdate, _fcd2))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (updateRowIndex < 1 || updateRowIndex > table._rowCount || isNaN(updateRowIndex))
	{
		
		return _fcst6;
	}
	if (rowArray.length != table._columnCount)
	{
		
		return _fcst6;
	}
	for (var columnIndex = 0; columnIndex < rowArray.length; columnIndex += 1)
	{
		if (_fu14(rowArray[columnIndex]))
		{
			
			return _fcst14;
		}
		if (!_fu13(rowArray[columnIndex], _fcd13))
		{
			
			return _fcst14;
		}
	}
	return _fwt47(table, updateRowIndex, rowArray, sortAfterUpdate);
},
isScrollBarVisible:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return null;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return null;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return null;
	}
	return table.style.width == (table._widthWithScrollBar + "px");
},
setMaxRows:function(tableId, maxRows)
{
	if (_fu14(tableId) ||
		_fu14(maxRows))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13) ||
		!_fu13(maxRows, _fcd10))
	{
		
		return _fcst14;
	}
	if (maxRows < -1 || maxRows === 0 || isNaN(maxRows))
	{
		
		return _fcst6;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (!(_fu14(table._locked)) && table._locked === true)
	{
		
		return _fcst12;
	}
	if (table._scrollable == "false")
	{
		
		return _fcst6;
	}
	if (table._maxRows == maxRows)
	{
		return _fcst13;
	}
	table._maxRows = maxRows;
	return _fwt39(table);
},
clearSorting:function(tableId)
{
	if (_fu14(tableId))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	if (table._currentSortColumnIndex < 1)
	{
		return _fcst13;
	}
	var headerCellElement = document.getElementById(table._colIdPrefix + table._currentSortColumnIndex);
	if (_fu14(headerCellElement))
	{
		
		return _fcst3;
	}
	headerCellElement.style.backgroundImage = "";
	table._sortOrder[table._currentSortColumnIndex - 1] = _fcw21;
	table._currentSortOrder = _fcw21;
	table._currentSortColumnIndex = 0;
	return _fcst13;
},
_addColumn:function(table, newColumnIndex, columnHeading, sortFlag, dataAlign, dataFormat, maxLines, columnArray, columnWidths,headerAlign)
{
	table._sortFlags.splice(newColumnIndex - 1, 0, sortFlag);
	table._sortOrder.splice(newColumnIndex - 1, 0, _fcw21);
	table._columnAlignments.splice(newColumnIndex - 1, 0, dataAlign);
	table._columnFormats.splice(newColumnIndex - 1, 0, dataFormat);
	table._columnMaxLines.splice(newColumnIndex - 1, 0, maxLines);
	table._columnWidths = columnWidths.slice();
	table._columnCount += 1;
	var cell = null;
	for (var columnIndex = table._columnCount - 1; columnIndex >= newColumnIndex; columnIndex -= 1)
	{
		cell = document.getElementById(table._colIdPrefix + columnIndex);
		if (_fu14(cell))
		{
			
			return _fcst3;
		}
		cell.id = table._colIdPrefix + (columnIndex + 1);
		cell._columnIndex += 1;
	}
	for (columnIndex = 0; columnIndex < table._columnCount; columnIndex += 1)
	{
		if ((columnIndex + 1) != newColumnIndex)
		{
			cell = document.getElementById(table._colIdPrefix + (columnIndex + 1));
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.style.width = columnWidths[columnIndex] + "px";
			cell.style.height = "";
		}
	}
	cell = document.createElement("div");
	cell.id = table._headerId + "._col" + newColumnIndex;
	cell.innerHTML = columnHeading;
	cell._columnIndex = newColumnIndex;
	cell.style.width = columnWidths[newColumnIndex - 1] + "px";
	cell.style.textAlign=headerAlign;
	if (newColumnIndex == table._columnCount)
	{
		cell.className = "tableLastHeaderCell";
		table._headerElement.appendChild(cell);
		var previousCell = document.getElementById(table._colIdPrefix + (newColumnIndex - 1));
		if (_fu14(previousCell))
		{
			
			return _fcst3;
		}
		previousCell.className = "tableNotLastHeaderCell";
	}
	else
	{
		cell.className = "tableNotLastHeaderCell";
		var nextCell = document.getElementById(table._colIdPrefix + (newColumnIndex + 1));
		if (_fu14(nextCell))
		{
			
			return _fcst3;
		}
		table._headerElement.insertBefore(cell, nextCell);
	}
	var retVal = _fcst13;
	if (sortFlag === true)
	{
		retVal = _fwt32(table, cell, newColumnIndex);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	retVal = _fwt33(table, 0);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	var tableContents = table._cellContents;
	for (var rowIndex = 0; rowIndex < table._rowCount; rowIndex += 1)
	{
		tableContents[rowIndex].splice(newColumnIndex - 1, 0, columnArray[rowIndex]);
	}
	var rowDiv = null;
	var cellData = null;
	var format = "";
	for (rowIndex = 1; rowIndex <= table._rowCount; rowIndex += 1)
	{
		for (columnIndex = table._columnCount - 1; columnIndex >= newColumnIndex; columnIndex -= 1)
		{
			cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.id = table._rowIdPrefix + rowIndex + "._col" + (columnIndex + 1);
		}
		for (columnIndex = 0; columnIndex < table._columnCount; columnIndex += 1)
		{
			if ((columnIndex + 1) != newColumnIndex)
			{
				cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + (columnIndex + 1));
				if (_fu14(cell))
				{
					
					return _fcst3;
				}
				cell.style.width = columnWidths[columnIndex] + "px";
				cell.style.height = "";
				format = table._columnFormats[columnIndex];
				if (format == _fcw17)
				{
					cellData = _fwt25(table, rowIndex, columnIndex + 1);
					if (_fu14(cellData))
					{
						return _fcst3;
					}
					cell.innerHTML = cellData;
				}
			}
		}
		rowDiv = document.getElementById(table._rowIdPrefix + rowIndex);
		if (_fu14(rowDiv))
		{
			
			return _fcst3;
		}
		cell = document.createElement("div");
		cell.id = table._rowIdPrefix + rowIndex + "._col" + newColumnIndex;
		cell.style.textAlign = dataAlign;
		cell.style.width = columnWidths[newColumnIndex - 1] + "px";
		cellData = _fwt25(table, rowIndex, newColumnIndex);
		if (_fu14(cellData))
		{
			return _fcst3;
		}
		cell.innerHTML = cellData;
		if (newColumnIndex == table._columnCount)
		{
			cell.className = "tableLastCell";
			rowDiv.appendChild(cell);
			previousCell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + (newColumnIndex - 1));
			if (_fu14(previousCell))
			{
				
				return _fcst3;
			}
			previousCell.className = "tableNotLastCell";
		}
		else
		{
			cell.className = "tableNotLastCell";
			nextCell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + (newColumnIndex + 1));
			if (_fu14(nextCell))
			{
				
				return _fcst3;
			}
			rowDiv.insertBefore(cell, nextCell);
		}
		retVal = _fwt33(table, rowIndex);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	if (table._scrollable == "false")
	{
		retVal = _fwt37(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	else
	{
		retVal = _fwt39(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	if (newColumnIndex <= table._currentSortColumnIndex)
	{
		table._currentSortColumnIndex += 1;
	}
	return _fcst13;
},
_deleteColumn:function(table, deleteColumnIndex, columnWidths)
{
	var cell = document.getElementById(table._colIdPrefix + deleteColumnIndex);
	if (_fu14(cell))
	{
		
		return _fcst3;
	}
	table._headerElement.removeChild(cell);
	var retVal = _fe5(cell, _fce4, _fwt44);
	if (retVal != _fcst13 && retVal != _fcst5)
	{
		return retVal;
	}
	_fu17(cell);
	for (var columnIndex = deleteColumnIndex + 1; columnIndex <= table._columnCount; columnIndex += 1)
	{
		cell = document.getElementById(table._colIdPrefix + columnIndex);
		if (_fu14(cell))
		{
			
			return _fcst3;
		}
		cell.id = table._colIdPrefix + (columnIndex - 1);
		cell._columnIndex -= 1;
	}
	if (deleteColumnIndex == table._columnCount)
	{
		cell = document.getElementById(table._colIdPrefix + (deleteColumnIndex - 1));
		if (_fu14(cell))
		{
			
			return _fcst3;
		}
		cell.className = "tableLastHeaderCell";
	}
	var rowDiv = null;
	for (var rowIndex = 1; rowIndex <= table._rowCount; rowIndex += 1)
	{
		rowDiv = document.getElementById(table._rowIdPrefix + rowIndex);
		if (_fu14(rowDiv))
		{
			
			return _fcst3;
		}
		cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + deleteColumnIndex);
		if (_fu14(cell))
		{
			
			return _fcst3;
		}
		rowDiv.removeChild(cell);
		_fu17(cell);
		for (columnIndex = deleteColumnIndex + 1; columnIndex <= table._columnCount; columnIndex += 1)
		{
			cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.id = table._rowIdPrefix + rowIndex + "._col" + (columnIndex - 1);
		}
		if (deleteColumnIndex == table._columnCount)
		{
			cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + (deleteColumnIndex - 1));
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.className = "tableLastCell";
		}
	}
	var tableContents = table._cellContents;
	for (rowIndex = 0; rowIndex < table._rowCount; rowIndex += 1)
	{
		tableContents[rowIndex].splice(deleteColumnIndex - 1, 1);
	}
	table._sortFlags.splice(deleteColumnIndex - 1, 1);
	table._sortOrder.splice(deleteColumnIndex - 1, 1);
	table._columnAlignments.splice(deleteColumnIndex - 1, 1);
	table._columnFormats.splice(deleteColumnIndex - 1, 1);
	table._columnMaxLines.splice(deleteColumnIndex - 1, 1);
	table._columnWidths = columnWidths.slice();
	table._columnCount -= 1;
	var cellData = null;
	var format = null;
	for (rowIndex = 1; rowIndex <= table._rowCount; rowIndex += 1)
	{
		for (columnIndex = 0; columnIndex < table._columnCount; columnIndex += 1)
		{
			cell = document.getElementById(table._colIdPrefix + (columnIndex + 1));
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.style.width = columnWidths[columnIndex] + "px";
			cell.style.height = "";
			cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + (columnIndex + 1));
			if (_fu14(cell))
			{
				
				return _fcst3;
			}
			cell.style.width = columnWidths[columnIndex] + "px";
			cell.style.height = "";
			format = table._columnFormats[columnIndex];
			if (format == _fcw17)
			{
				cellData = _fwt25(table, rowIndex, columnIndex + 1);
				if (_fu14(cellData))
				{
					return _fcst3;
				}
				cell.innerHTML = cellData;
			}
		}
		retVal = _fwt33(table, rowIndex);
		if (retVal != _fcst13)
		{
			return retVal;
		}
		if (table._scrollable == "false")
		{
			retVal = _fwt37(table);
			if (retVal != _fcst13)
			{
				return retVal;
			}
		}
	}
	retVal = _fwt33(table, 0);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	if (table._scrollable == "false")
	{
		retVal = _fwt37(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	else
	{
		retVal = _fwt39(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	if (deleteColumnIndex == table._currentSortColumnIndex)
	{
		table._currentSortColumnIndex = 0;
		table._currentSortOrder = _fcw21;
	}
	else if (deleteColumnIndex < table._currentSortColumnIndex)
	{
		table._currentSortColumnIndex -= 1;
	}
	return _fcst13;
},
_getTableAttributes:function(table)
{
	table._rowCount = 0;
	table._columnCount = parseInt(table.getAttribute("columnCount"));
	table.style.width = table.getAttribute("tableWidth") + "px";
	table.style.height = table.getAttribute("tableHeight") + "px";
	table._heightMinimum = parseInt(table.style.height.split("px")[0]);
	table._widthWithoutScrollBar = parseInt(table.style.width.split("px")[0]);
	table._widthWithScrollBar = table._widthWithoutScrollBar + 17;
	table._initialSortColumnIndex = parseInt(table.getAttribute("initialSortColumn"));
	table._currentSortColumnIndex = table._initialSortColumnIndex;
	table._initialSortOrder = table.getAttribute("initialSortOrder");
	table._currentSortOrder = table._initialSortOrder;
	table._headerVisible = table.getAttribute("headerVisible") == "true" ? true : false;
	table._showImageForAllSortColumns = table.getAttribute("showImageForAllSortColumns") == "true" ? true : false;
	table._rulerId = table.id + "._ruler";
	table._emptyId = table.id + "._empty";
	table._contentsId = table.id + "._contents";
	table._rowsId = table.id + "._contents._rows";
	table._headerId = table.id + "._contents._header";
	table._colIdPrefix = table.id + "._contents._header._col";
	table._rowIdPrefix = table.id + "._contents._row";
	table._rulerElement = document.getElementById(table._rulerId);
	if (_fu14(table._rulerElement))
	{
		
		return _fcst3;
	}
	table._contentsElement = document.getElementById(table._contentsId);
	if (_fu14(table._contentsElement))
	{
		
		return _fcst3;
	}
	table._rowsElement = document.getElementById(table._rowsId);
	if (_fu14(table._rowsElement))
	{
		
		return _fcst3;
	}
	table._headerElement = document.getElementById(table._headerId);
	if (_fu14(table._headerElement))
	{
		
		return _fcst3;
	}
	table._scrollable = table.getAttribute("scrollable");
	if (table._scrollable == "false")
	{
		table._rowsElement.style.overflow = "visible";
		table._maxRows = -1;
	}
	else
	{
		table._maxRows = parseInt(table.getAttribute("maxRows"));
	}
	return _fcst13;
},
_getColumnAttributes:function(table)
{
	var headerCell = null;
	var width = "";
	table._sortFlags = new Array;
	table._columnAlignments = new Array;
	table._columnFormats = new Array;
	table._columnMaxLines = new Array;
	table._columnWidths = new Array;
	table._defaultSortOrders = new Array;
	for (var columnIndex = 1; columnIndex <= table._columnCount; columnIndex += 1)
	{
		headerCell = document.getElementById(table._colIdPrefix + columnIndex);
		if (_fu14(headerCell))
		{
			
			return _fcst3;
		}
		headerCell._columnIndex = columnIndex;
		table._sortFlags.push(headerCell.getAttribute("sortFlag") == "true");
		width = parseInt(headerCell.getAttribute("columnWidth"));
		table._columnWidths.push(width);
		headerCell.style.width = width + "px";
		table._columnAlignments.push(headerCell.getAttribute("dataAlign"));
		table._columnFormats.push(headerCell.getAttribute("dataFormat"));
		table._columnMaxLines.push(parseInt(headerCell.getAttribute("maxLines")));
		table._defaultSortOrders.push(headerCell.getAttribute("defaultSortOrder"));
	}
	return _fcst13;
},
_initSorting:function(table)
{
	var headerCellElement = null;
	table._sortOrder = new Array;
	table._sortColumnIndex = 0;
	var retVal = _fcst13;
	for (var columnIndex = 1; columnIndex <= table._columnCount; columnIndex += 1)
	{
		table._sortOrder.push(_fcw21);
		if (table._sortFlags[columnIndex - 1] === true)
		{
			headerCellElement = document.getElementById(table._colIdPrefix + columnIndex);
			if (_fu14(headerCellElement))
			{
				
				return _fcst3;
			}
			retVal = _fwt32(table, headerCellElement, columnIndex);
			if (retVal != _fcst13)
			{
				return retVal;
			}
		}
	}
	return _fcst13;
},
_makeCellSortable:function(table, headerCellElement, columnIndex)
{
	headerCellElement.style.textDecoration = "underline";
	try 
	{
		headerCellElement.style.cursor = "pointer";
	} catch (e) 
	{
		headerCellElement.style.cursor = "hand";
	}	
	return _fe1(
		table._colIdPrefix + columnIndex,
		_fce4,
		_fwt44);
},
_setSortIndicator:function(table, sortColumnIndex, sortOrder)
{
	if (table._headerVisible === false)
	{
		return _fcst13;
	}
	var headerCellElement = null;
	if (table._currentSortColumnIndex !== 0)
	{
		headerCellElement = document.getElementById(table._colIdPrefix + table._currentSortColumnIndex);
		if (_fu14(headerCellElement))
		{
			
			return _fcst3;
		}
		headerCellElement.style.backgroundImage = "url(/framework/image/sort_none.gif)";
		table._sortOrder[table._currentSortColumnIndex - 1] = _fcw21;
	}
	if (sortColumnIndex !== 0)
	{
		headerCellElement = document.getElementById(table._colIdPrefix + sortColumnIndex);
		if (_fu14(headerCellElement))
		{
			
			return _fcst3;
		}
		headerCellElement.style.backgroundImage =
			(sortOrder == _fcw19) ? "url(/framework/image/sort_ascending.gif)" : "url(/framework/image/sort_descending.gif)";
		table._sortOrder[sortColumnIndex - 1] = sortOrder;
	}
	if (table._showImageForAllSortColumns)
	{
		for (var index=1;index<table._columnCount+1;index +=1)
		{
			if (index != sortColumnIndex && table._sortFlags[index-1] === true)
			{
				headerCellElement = document.getElementById(table._colIdPrefix + index);
				if (_fu14(headerCellElement))
				{
					
					return _fcst3;
				}
				headerCellElement.style.backgroundImage = "url(/framework/image/default_descending.gif)";
			}
		}
	}		
	table._currentSortOrder = sortOrder;
	table._currentSortColumnIndex = sortColumnIndex;
	return _fcst13;
},
_sortEventHandler:function(event)
{
	var target = _fe3(event);
	if (_fu14(target))
	{
		
		return _fcst3;
	}
	while (target.id.indexOf("._contents") == -1)
	{
		target = target.parentNode;
	}
	var tableId = this.id.split("._contents")[0];
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	var retVal = _fcst13;
	var sortedArray = null;
	var sortOrder = "";
	if (table._sortOrder[target._columnIndex - 1] == _fcw19)
	{
		sortOrder = _fcw20;
	}
	else if (table._sortOrder[target._columnIndex - 1] == _fcw20)
	{
		sortOrder = _fcw19;
	}
	else
	{
		sortOrder = table._defaultSortOrders[target._columnIndex - 1];
	}
	retVal = _fwt38(table, target._columnIndex, sortOrder);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	sortedArray = _fwt45(table, target._columnIndex, sortOrder);
	return _fwt43(table, sortedArray, target._columnIndex, sortOrder);
},
_sortEventHandlerPostProcessing:function(table, sortedArray, sortColumnIndex, sortOrder)
{
	if (_fu14(sortedArray))
	{
		return _fcst3;
	}
	var retVal = _fcst13;
	var replace = (!_fu14(sortedArray._replace) &&
	               sortedArray._replace === true);
	if (replace === true)
	{
		sortedArray._replace = false;
		retVal = _fwt15(table.id, sortedArray, false);
	}
	else
	{
		table._needsSorting = false;
		retVal = _fwt34(table, sortedArray);
	}
	table._afterSortHandler(table.id, sortColumnIndex, sortOrder);
	return retVal;
},
_sortColumnIndex:0,
_sortOrder:"",
_sortHandlerWrapper:function(table, sortColumnIndex, sortOrder)
{
	table._locked = true;
	var retVal = table._sortHandler(table.id, sortColumnIndex, sortOrder);
	table._locked = false;
	return retVal;
},
_defaultSortHandler:function(tableId, sortColumnIndex, sortOrder)
{
	_fwt41 = sortColumnIndex;
	_fwt46 = sortOrder;
	var contentsArray = _fwt11(tableId);
	if (_fu14(contentsArray))
	{
		return null;
	}
	contentsArray.sort(_fwt42);
	return contentsArray;
},
_sortComparator:function(item1, item2)
{
	var index = _fwt41 - 1;
	var sortItem1 = item1[index];
	var sortItem2 = item2[index];
	if (sortItem1 < sortItem2)
	{
		return (_fwt46 == _fcw19) ? -1 : 1;
	}
	else if (sortItem1 > sortItem2)
	{
		return (_fwt46 == _fcw19) ? 1 : -1;
	}
	return 0;
},
_defaultAfterSortHandler:function(tableId, sortColumnIndex, sortOrder)
{
},
_matchCellHeightsForRow:function(table, rowIndex)
{
	var rowElement = null;
	var calculateHeight = true;
	if (rowIndex === 0)
	{
		rowElement = table._headerElement;
		if (table._headerVisible === false)
		{
			calculateHeight = false;
		}
	}
	else
	{
		rowElement = document.getElementById(table._rowIdPrefix + rowIndex);
	}
	if (_fu14(rowElement))
	{
		
		return _fcst3;
	}
	var childNodes = new Array();
	var childNode = null;
	var maxCellHeightForRow = 0;
	for (var nodeIndex = 0; nodeIndex < rowElement.childNodes.length; nodeIndex += 1)
	{
		childNode = rowElement.childNodes[nodeIndex];
		if (childNode.id && childNode.id.indexOf("._col") != -1)
		{
			childNodes.push(childNode);
			var childNodeHeight = childNode.clientHeight > 0? childNode.clientHeight:childNode.offsetHeight;
			if (calculateHeight === true && childNodeHeight > maxCellHeightForRow)
			{
				maxCellHeightForRow = childNodeHeight;
			}
		}
	}
	var maxCellHeightForRowString = maxCellHeightForRow + "px";
	childNode = childNodes.pop();
	while (!_fu14(childNode))
	{
		childNode.style.height = maxCellHeightForRowString;
		childNode = childNodes.pop();
	}
	return _fcst13;
},
_getTextWidth:function(table, text)
{
	var tempText = "";
	var currentChar = null;
	var tempChar = null;
	for (var index = 0; index < text.length; index += 1)
	{
		currentChar = text.charAt(index);
		if (currentChar == " ")
		{
			tempText += "&nbsp;";
		}
		else
		{
			tempChar = _fu1(currentChar);
			if (_fu14(tempChar))
			{
				return null;
			}
			tempText += tempChar;
		}
	}
	table._rulerElement.innerHTML = tempText;
	return table._rulerElement.offsetWidth;
},
_wrapCellText:function(table, columnIndex, text)
{
	var textLine = "";
	var currentCharacter = "";
	var lineCount = 1;
	var lines = new Array;
	var textWidth = 0;
	for (var index = 0; index < text.length; index += 1)
	{
		currentCharacter = text.charAt(index);
		if (_fu14(table._characterWidths[currentCharacter]))
		{
			table._characterWidths[currentCharacter] = _fwt29(table, currentCharacter);
		}
		textWidth += table._characterWidths[currentCharacter];
		if (textWidth >= table._columnWidths[columnIndex - 1])
		{
			lineCount += 1;
			if (lineCount > table._columnMaxLines[columnIndex - 1])
			{
				textLine = textLine.substr(0, textLine.length - 3) + "...";
				break;
			}
			else
			{
				lines.push(textLine);
				textLine = currentCharacter;
				textWidth = 0;
			}
		}
		else
		{
			textLine += currentCharacter;
		}
	}
	lines.push(textLine);
	var wrappedText = "";
	var tempText = "";
	for (index = 0; index < lines.length; index += 1)
	{
		tempText = _fu15(lines[index]);
		if (_fu14(tempText))
		{
			return null;
		}
		wrappedText += tempText;
		if (index < (lines.length - 1))
		{
			wrappedText += "<br/>";
		}
	}
	return wrappedText;
},
_formatCellData:function(table, rowIndex, columnIndex)
{
	var cellData = table._cellContents[rowIndex - 1][columnIndex - 1];
	var format = table._columnFormats[columnIndex - 1];
	if (format == _fcw15)
	{
		return cellData;
	}
	if (format == _fcw17)
	{
		return _fwt48(table, columnIndex, cellData);
	}
	return _fu15(cellData);
},
_setupScrolling:function(table)
{
	var allRowHeights = _fwt30(table);
	if (_fu14(allRowHeights))
	{
		return _fcst3;
	}
	var contentsElementClientHeight = table._contentsElement.clientHeight > 0? table._contentsElement.clientHeight:table._contentsElement.offsetHeight;
	var headerElementClientHeight = 0;
	var rowsElementClientHeight = table._rowsElement.clientHeight > 0? table._rowsElement.clientHeight:table._rowsElement.offsetHeight;
	if (table._headerVisible === true)
	{
		headerElementClientHeight = table._headerElement.clientHeight > 0? table._headerElement.clientHeight:table._headerElement.offsetHeight;
	}
	var tableRowsDivHeight = contentsElementClientHeight - headerElementClientHeight;
	table._rowsElement.style.height = tableRowsDivHeight;
	table.style.width = ((allRowHeights >= tableRowsDivHeight) ? table._widthWithScrollBar : table._widthWithoutScrollBar) + "px";
	var numRows = table._maxRows;
	var maxRows = numRows;
	var rowCount = table._rowCount;
	if (maxRows > rowCount)
	{
		numRows = rowCount;
	}
	var rowHeights = 0;
	if (maxRows == -1)
	{
		rowHeights = table._heightMinimum - headerElementClientHeight;
	}
	else
	{	
		rowHeights = _fwt27(table, 1, numRows);
		if (_fu14(rowHeights))
		{
			return _fcst3;
		}
	}
	_fwt36(table, rowHeights);
	var removeScrollBar =
		(rowCount <= maxRows && rowsElementClientHeight >= rowHeights) ||
		(rowCount > maxRows && allRowHeights < rowsElementClientHeight && rowsElementClientHeight < contentsElementClientHeight);
	table.style.width = ((removeScrollBar === true) ? table._widthWithoutScrollBar : table._widthWithScrollBar) + "px";
	return _fcst13;
},
_setHeightByValue:function(table, rowHeights)
{
	var headerElementHeight = 0;
	if (table._headerVisible === true)
	{
		headerElementHeight = table._headerElement.clientHeight > 0? table._headerElement.clientHeight:table._headerElement.offsetHeight;
	}
	var headerAndRowHeights = headerElementHeight + rowHeights;
	if (headerAndRowHeights > table._heightMinimum)
	{
		table.style.height = headerAndRowHeights + "px";
		table._rowsElement.style.height = rowHeights + "px";
	}
	else
	{
		table.style.height = table._heightMinimum + "px";
		table._rowsElement.style.height = table._heightMinimum - headerElementHeight + "px";
	}
	table._contentsElement.style.height = table.style.height;
	return _fcst13;
},
_setHeight:function(table)
{
	var rowHeights = _fwt30(table);
	if (_fu14(rowHeights))
	{
		return _fcst3;
	}
	_fwt36(table, rowHeights);
	return _fcst13;
},
_getTotalRowHeight:function(table)
{
	return _fwt27(table, 1, table._rowCount);
},
_getRowHeights:function(table, startRow, endRow)
{
	var rowDiv = null;
	var totalRowHeight = 0;
	for (var rowIndex = startRow; rowIndex <= endRow; rowIndex += 1)
	{
		rowDiv = document.getElementById(table._rowIdPrefix + rowIndex);
		if (_fu14(rowDiv))
		{
			
			return null;
		}
		var rowDivHeight = rowDiv.clientHeight > 0? rowDiv.clientHeight:rowDiv.offsetHeight;
		totalRowHeight += rowDivHeight;
	}
	return totalRowHeight;
},
_showDataGrid:function(table, showDataGrid)
{
	var retVal = _fcst13;
	if (showDataGrid === false)
	{
		_fu7(table._contentsId);
		_fu23(table._emptyId);
		if (table.style.width.split("px")[0] != table._widthWithoutScrollBar)
		{
			table.style.width = table._widthWithoutScrollBar + "px";
			table.style.height = table._heightMinimum + "px";
		}
	}
	else
	{
		_fu7(table._emptyId);
		_fu23(table._contentsId);
	}
	return _fcst13;
},
_reorderTableRows:function(table, tableContents)
{
	table._cellContents = tableContents.slice();
	var childNode = null;
	var rowElement = null;
	var rowElements = new Array();
	var stop = table._rowsElement.childNodes.length;
	for (var nodeIndex = 0; nodeIndex < stop; nodeIndex += 1)
	{
		childNode = table._rowsElement.childNodes[nodeIndex];
		if (childNode.id && childNode.id.indexOf(table._rowIdPrefix) != -1)
		{
			rowElement = table._rowsElement.removeChild(childNode);
			stop -= 1;
			rowElements.push(rowElement);
			nodeIndex -= 1;
		}
	}
	var oddRow = true;
	var originalRowIndex = 0;
	stop = table._cellContents.length;
	for (var rowIndex = 1; rowIndex <= stop; rowIndex += 1)
	{
		table._rowCount = rowIndex;
		rowElement = rowElements[table._cellContents[rowIndex - 1]._rowIndex - 1];
		originalRowIndex = table._row;
		table._cellContents[rowIndex - 1]._rowIndex = rowIndex;
		rowElement.id = table._rowIdPrefix + rowIndex;
		rowElement._row = rowIndex;
		rowElement.className = (oddRow === true) ? "tableRowOdd" : "tableRowEven";
		table._rowsElement.appendChild(rowElement);
		oddRow = !oddRow;
		var columnPrefix = rowElement.id + "._col";
		if (rowIndex != originalRowIndex)
		{
			childNode = null;
			var columnIndex = 0;
			for (nodeIndex = 0; nodeIndex < rowElement.childNodes.length; nodeIndex += 1)
			{
				childNode = rowElement.childNodes[nodeIndex];
				if (childNode.id && childNode.id.indexOf("._col") != -1)
				{
					columnIndex += 1;
					childNode.id = columnPrefix + columnIndex;
				}
			}
		}
	}
	return _fcst13;
},
_addRow:function(table, newRowIndex, rowArray, sortAfterAdd)
{
	var tableContents = _fwt11(table.id);
	if (_fu14(tableContents))
	{
		tableContents = new Array;
		tableContents.push(rowArray);
		table._rowCount = 1;
	}
	else
	{
		if (sortAfterAdd === false && newRowIndex != (table._rowCount + 1))
		{
			var tempRowArray = null;
			for (var rowIndex = newRowIndex - 1; rowIndex < table._rowCount; rowIndex += 1)
			{
				tempRowArray = tableContents[rowIndex];
				if (_fu14(tempRowArray))
				{
					return _fcst3;
				}
				tempRowArray._rowIndex += 1;
			}
			tableContents.splice(newRowIndex - 1, 0, rowArray);
		}
		else
		{
			tableContents.push(rowArray);
		}
		table._rowCount += 1;
	}
	var retVal = _fwt40(table, true);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	var newRowElement = document.createElement("div");
	newRowElement.className = (newRowIndex % 2) ? "tableRowOdd" : "tableRowEven";
	if (sortAfterAdd === false && newRowIndex != table._rowCount)
	{
		newRowElement.id = table._rowIdPrefix + newRowIndex;
		newRowElement._row = newRowIndex;
		rowArray._rowIndex = newRowIndex;
	}
	else
	{
		newRowElement.id = table._rowIdPrefix + table._rowCount;
		newRowElement._row = table._rowCount;
		rowArray._rowIndex = table._rowCount;
	}	
	table._cellContents = tableContents.slice();
	table._needsSorting = sortAfterAdd;
	var cellElement = null;
	var cellData = null;
	var tempNewRowIndex = newRowIndex;
	if (table._needsSorting === true)
	{
		tempNewRowIndex = table._rowCount;
	}
	for (var columnIndex = 1; columnIndex <= rowArray.length; columnIndex += 1)
	{
		cellElement = document.createElement("div");
		cellElement.id = newRowElement.id + "._col" + columnIndex;
		cellElement.className = (columnIndex != table._columnCount) ? "tableNotLastCell" : "tableLastCell";
		cellElement.style.width = table._columnWidths[columnIndex - 1] + "px";
		cellElement.style.textAlign = table._columnAlignments[columnIndex - 1];
		cellData = _fwt25(table, tempNewRowIndex, columnIndex);
		if (_fu14(cellData))
		{
			return _fcst3;
		}
		cellElement.innerHTML = cellData;
		newRowElement.appendChild(cellElement);
	}
	if (table._needsSorting === false && newRowIndex != table._rowCount)
	{
		var rowElement = null;
		for (rowIndex = table._rowCount - 1; rowIndex >= newRowIndex; rowIndex -= 1)
		{
			rowElement = document.getElementById(table._rowIdPrefix + rowIndex);
			if (_fu14(rowElement))
			{
				return _fcst3;
			}
			rowElement.id = table._rowIdPrefix + (rowIndex + 1);
			rowElement._row += 1;
			rowElement.className = ((rowIndex + 1) % 2) ? "tableRowOdd" : "tableRowEven";
			for (columnIndex = 1; columnIndex <= table._columnCount; columnIndex += 1)
			{
				cellElement = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
				if (_fu14(cellElement))
				{
					return _fcst3;
				}
				cellElement.id = table._rowIdPrefix + (rowIndex + 1) + "._col" + columnIndex;
			}
		}
		table._rowsElement.insertBefore(newRowElement, rowElement);
	}
	else
	{
		table._rowsElement.appendChild(newRowElement);
	}
	return _fwt35(table, tempNewRowIndex);
},
_rowOperationPostProcessing:function(table, rowIndex)
{
	var retVal = _fcst13;
	if (rowIndex > 0)
	{	
		retVal = _fwt33(table, rowIndex);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	if (table._scrollable == "false")
	{
		retVal = _fwt37(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	else
	{
		retVal = _fwt39(table);
		if (retVal != _fcst13)
		{
			return retVal;
		}
	}
	if (table._needsSorting === true)
	{
		var sortedArray = _fwt45(table, table._currentSortColumnIndex, table._currentSortOrder);
		return _fwt43(table, sortedArray, table._currentSortColumnIndex, table._currentSortOrder);
	}
	return _fcst13;
},
_deleteRow:function(table, deleteRowIndex)
{
	var tableContents = _fwt11(table.id);
	if (_fu14(tableContents) || tableContents.length == 1)
	{
		table._rowCount = 0;
		return _fwt4(table.id);
	}
	var tempRowArray = null;
	for (var rowIndex = deleteRowIndex; rowIndex < table._rowCount; rowIndex += 1)
	{
		tempRowArray = tableContents[rowIndex];
		if (_fu14(tempRowArray))
		{
			return _fcst3;
		}
		tempRowArray._rowIndex -= 1;
	}
	tableContents.splice(deleteRowIndex - 1, 1);
	table._rowCount -= 1;
	var retVal = _fwt40(table, true);
	if (retVal != _fcst13)
	{
		return retVal;
	}
	table._cellContents = tableContents.slice();
	var rowElement = document.getElementById(table._rowIdPrefix + deleteRowIndex);
	if (_fu14(rowElement))
	{
		return _fcst3;
	}
	table._rowsElement.removeChild(rowElement);
	_fu17(rowElement);
	for (rowIndex = deleteRowIndex + 1; rowIndex <= (table._rowCount + 1); rowIndex += 1)
	{
		rowElement = document.getElementById(table._rowIdPrefix + rowIndex);
		if (_fu14(rowElement))
		{
			return _fcst3;
		}
		rowElement.id = table._rowIdPrefix + (rowIndex - 1);
		rowElement._row -= 1;
		rowElement.className = ((rowIndex + 1) % 2) ? "tableRowOdd" : "tableRowEven";
		for (var columnIndex = 1; columnIndex <= table._columnCount; columnIndex += 1)
		{
			var cellElement = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
			if (_fu14(cellElement))
			{
				return _fcst3;
			}
			cellElement.id = table._rowIdPrefix + (rowIndex - 1) + "._col" + columnIndex;
		}
	}
	return _fwt35(table, 0);
},
_updateRow:function(table, updateRowIndex, rowArray, sortAfterUpdate)
{
	var tableContents = _fwt11(table.id);
	tableContents[updateRowIndex - 1] = rowArray;
	rowArray._rowIndex = updateRowIndex;
	table._cellContents = tableContents.slice();
	table._needsSorting = sortAfterUpdate;
	var rowElement = document.getElementById(table._rowIdPrefix + updateRowIndex);
	if (_fu14(rowElement))
	{
		return _fcst3;
	}
	var cellElement = null;
	var cellData = null;
	for (var columnIndex = 1; columnIndex <= rowArray.length; columnIndex += 1)
	{
		cellElement = document.getElementById(table._rowIdPrefix + updateRowIndex + "._col" + columnIndex);
		if (_fu14(cellElement))
		{
			return _fcst3;
		}
		cellData = _fwt25(table, updateRowIndex, columnIndex);
		if (_fu14(cellData))
		{
			return _fcst3;
		}
		cellElement.style.height = "";
		cellElement.innerHTML = cellData;
	}
	return _fwt35(table, updateRowIndex);
},
cellBorderHighlight:function(tableId, rowIndex, columnIndex, inColor)
{
	if (_fu14(tableId))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	var cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
	if (_fu14(cell))
	{
		
		return _fcst3;
	}
	if (!_fu14(inColor))
	{
		cell.style.border="1px solid " + inColor;
	}
	else
	{
		cell.style.border="1px solid #660099";
	}
	cell.style.width=parseInt(cell.style.width)-1 + "px";
	cell.style.height=parseInt(cell.style.height)-2 + "px";
	return _fcst13;
},
removeCellBorderHighlight:function(tableId, rowIndex, columnIndex)
{
	if (_fu14(tableId))
	{
		
		return _fcst6;
	}
	if (!_fu13(tableId, _fcd13))
	{
		
		return _fcst14;
	}
	var table = document.getElementById(tableId);
	if (_fu14(table))
	{
		
		return _fcst3;
	}
	var cell = document.getElementById(table._rowIdPrefix + rowIndex + "._col" + columnIndex);
	if (_fu14(cell))
	{
		
		return _fcst3;
	}
	cell.style.border="0px";
	cell.style.width=parseInt(cell.style.width)+1 + "px";
	cell.style.height=parseInt(cell.style.height)+2 + "px";
	cell.style.borderLeft="1px solid #CCCCCC";
	return _fcst13;
},
loaded:true
};
framework.widget.viewlinks = {
init:function(viewLinksId, clickHandler)
{
	if (!_fu13(viewLinksId, _fcd13) ||
		!_fu13(clickHandler, _fcd6))
	{
		
		return _fcst14;
	}
	if (_fu9(viewLinksId))
	{
		
		return _fcst6;
	}
	var statusCode = _fwv4(viewLinksId, clickHandler);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	_fe1(viewLinksId, _fce4, _fwv6);
	return _fcst13;
},
setAlphaNumericChars:function(viewLinksId, chars, defaultChar)
{
	if (!_fu13(viewLinksId, _fcd13) ||
		!_fu13(chars, _fcd13) ||
		!_fu13(defaultChar, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(viewLinksId))
	{
		
		return _fcst6;
	}
	var viewLinksElement = document.getElementById(viewLinksId);
	if (_fu14(viewLinksElement))
	{
		
		return _fcst3;
	}
	viewLinksElement._alphaNumericChars = chars;
	viewLinksElement._defaultChar = defaultChar;
	var statusCode = _fwv5(viewLinksId);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	return _fcst13;
},
clearAlphaNumericChars:function(viewLinksId)
{
	if (!_fu13(viewLinksId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(viewLinksId))
	{
		
		return _fcst6;
	}
	var viewLinksElement = document.getElementById(viewLinksId);
	if (_fu14(viewLinksElement))
	{
		
		return _fcst3;
	}
	viewLinksElement._alphaNumericChars = "";
	viewLinksElement._defaultChar = "";
	var statusCode = _fwv5(viewLinksId);
	if (statusCode != _fcst13)
	{
		return statusCode;
	}
	return _fcst13;
},
_getViewLinksAttributes:function(viewLinksId, clickHandler)
{
	if (!_fu13(viewLinksId, _fcd13) ||
		!_fu13(clickHandler, _fcd6))
	{
		
		return _fcst14;
	}
	if (_fu9(viewLinksId))
	{
		
		return _fcst6;
	}
	var viewLinksElement = document.getElementById(viewLinksId);
	if (_fu14(viewLinksElement))
	{
		
		return _fcst3;
	}
	viewLinksElement._alphaNumericChars = viewLinksElement.getAttribute("alphaNumericChars");
	viewLinksElement._defaultChar = viewLinksElement.getAttribute("defaultChar");
	viewLinksElement._includeNumbers = viewLinksElement.getAttribute("includeNumbers") == "true" ? true : false;
	viewLinksElement._clickHandler = clickHandler;
	return _fcst13;
},
_viewLinksClickEventHandler:function(event)
{
	var eventTarget = _fe3(event);
	var eventTargetId = eventTarget.id;
	var chars = eventTargetId.slice((this.id+".").length, eventTargetId.length); 
	var viewLinksElement = document.getElementById(this.id);
	if (!_fu9(this._alphaNumericChars) &&
		chars == "all")
	{
		this._defaultChar = "ALL";
		_fwv5(this.id);		
		return viewLinksElement._clickHandler("ALL");
	}
	else if (!_fu9(chars) && 
			 this._alphaNumericChars.indexOf(chars.toUpperCase()) > -1)
	{
		this._defaultChar = chars.toUpperCase();
		_fwv5(this.id);
		return viewLinksElement._clickHandler(chars.toUpperCase());
	}
	return null;
},
_resetViewLinks:function(viewLinksId)
{
	if (!_fu13(viewLinksId, _fcd13))
	{
		
		return _fcst14;
	}
	if (_fu9(viewLinksId))
	{
		
		return _fcst6;
	}
	var viewLinksElement = document.getElementById(viewLinksId);
	if (_fu14(viewLinksElement))
	{
		
		return _fcst3;
	}
	var statusCode;
	var alphaNumericCharsArray = [];
	var alphaReggie = /[a-z]/;
	var charElementObject = {'all': (viewLinksId+".all"), 'a': (viewLinksId+".a"), 'b': (viewLinksId+".b"), 'c': (viewLinksId+".c"),
					'd': (viewLinksId+".d"), 'e': (viewLinksId+".e"), 'f': (viewLinksId+".f"), 'g': (viewLinksId+".g"),
					'h': (viewLinksId+".h"), 'i': (viewLinksId+".i"), 'j': (viewLinksId+".j"), 'k': (viewLinksId+".k"),
					'l': (viewLinksId+".l"), 'm': (viewLinksId+".m"), 'n': (viewLinksId+".n"), 'o': (viewLinksId+".o"),
					'p': (viewLinksId+".p"), 'q': (viewLinksId+".q"), 'r': (viewLinksId+".r"), 's': (viewLinksId+".s"),
					't': (viewLinksId+".t"), 'u': (viewLinksId+".u"), 'v': (viewLinksId+".v"), 'w': (viewLinksId+".w"),
					'x': (viewLinksId+".x"), 'y': (viewLinksId+".y"), 'z': (viewLinksId+".z"), '0': (viewLinksId+".0"), 
					'1': (viewLinksId+".1"), '2': (viewLinksId+".2"), '3': (viewLinksId+".3"), '4': (viewLinksId+".4"), 
					'5': (viewLinksId+".5"), '6': (viewLinksId+".6"), '7': (viewLinksId+".7"), '8': (viewLinksId+".8"),
					'9': (viewLinksId+".9") };
	for (var iteratedElement in charElementObject)
	{
		if (!alphaReggie.test(iteratedElement) &&
			!viewLinksElement._includeNumbers && 
			iteratedElement != "all")
		{
			continue; 
		}
		statusCode = _fu18(charElementObject[iteratedElement], "alphaCharDisabled");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	if (viewLinksElement._alphaNumericChars.indexOf(",") > -1)
	{
		alphaNumericCharsArray = viewLinksElement._alphaNumericChars.split(",");
	}
	else
	{
		alphaNumericCharsArray = viewLinksElement._alphaNumericChars.split("");
	}	
	for (var index=0; index < alphaNumericCharsArray.length; index += 1)
	{
		var validId = charElementObject[alphaNumericCharsArray[index].toLowerCase()];
		statusCode = _fu18(validId, "alphaChar");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	if (viewLinksElement._alphaNumericChars.length > 0)
	{
		validId = charElementObject['all'];
		statusCode = _fu18(validId, "alphaChar");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	if (!_fu9(viewLinksElement._defaultChar))
	{
		validId = charElementObject[viewLinksElement._defaultChar.toLowerCase()];
		statusCode = _fu18(validId, "alphaCharSelected");
		if (statusCode != _fcst13)
		{
			return statusCode;
		}
	}
	return _fcst13;
},
loaded:true
};
var _fcst1 = framework.Status.COULD_NOT_CREATE_DATA_OBJECT;
var _fcst2 = framework.Status.DUPLICATE_EVENT_HANDLER;
var _fcst3 = framework.Status.ELEMENT_DOES_NOT_EXIST;
var _fcst4 = framework.Status.EVENT_HANDLER_NOT_A_FUNCTION;
var _fcst5 = framework.Status.EVENT_HANDLER_NOT_FOUND;
var _fcst6 = framework.Status.INVALID_ARGUMENT_VALUE;
var _fcst7 = framework.Status.INVALID_DATE;
var _fcst8 = framework.Status.INVALID_ELEMENT_TYPE;
var _fcst9 = framework.Status.INVALID_FORMAT;
var _fcst10 = framework.Status.MENU_LIST_IS_NOT_OPEN;
var _fcst11 = framework.Status.NO_MENU_LIST_TO_CLOSE;
var _fcst12 = framework.Status.RE_ENTRY_NOT_ALLOWED;
var _fcst13 = framework.Status.SUCCESS;
var _fcst14 = framework.Status.UNDEFINED_ARGUMENT;
var _fcst15 = framework.Status.UNDEFINED_DATA_OBJECT;
var _fcst16 = framework.Status.UNSUPPORTED_EVENT_TYPE;
var _fce1 = framework.EventType.ABORT;
var _fce2 = framework.EventType.BLUR;
var _fce3 = framework.EventType.CHANGE;
var _fce4 = framework.EventType.CLICK;
var _fce5 = framework.EventType.DBLCLICK;
var _fce6 = framework.EventType.ERROR;
var _fce7 = framework.EventType.FOCUS;
var _fce8 = framework.EventType.KEYDOWN;
var _fce9 = framework.EventType.KEYPRESS;
var _fce10 = framework.EventType.KEYUP;
var _fce11 = framework.EventType.LOAD;
var _fce12 = framework.EventType.MOUSEDOWN;
var _fce13 = framework.EventType.MOUSEMOVE;
var _fce14 = framework.EventType.MOUSEOUT;
var _fce15 = framework.EventType.MOUSEOVER;
var _fce16 = framework.EventType.MOUSEUP;
var _fce17 = framework.EventType.MOVE;
var _fce18 = framework.EventType.RESET;
var _fce19 = framework.EventType.RESIZE;
var _fce20 = framework.EventType.SCROLL;
var _fce21 = framework.EventType.SELECT;
var _fce22 = framework.EventType.SUBMIT;
var _fce23 = framework.EventType.UNLOAD;
var _fce24 = framework.EventType.TOUCH;
var _fci1 = framework.InputElementType.CALENDAR;
var _fci2 = framework.InputElementType.CHECKBOX;
var _fci3 = framework.InputElementType.HIDDEN;
var _fci4 = framework.InputElementType.RADIO;
var _fci5 = framework.InputElementType.SELECT_ONE;
var _fci6 = framework.InputElementType.TEXTAREA;
var _fci7 = framework.InputElementType.TEXT;
var _fcd1 = framework.DataType.ARRAY;
var _fcd2 = framework.DataType.BOOLEAN;
var _fcd3 = framework.DataType.DATE;
var _fcd4 = framework.DataType.ERROR;
var _fcd5 = framework.DataType.FINITE;
var _fcd6 = framework.DataType.FUNCTION;
var _fcd7 = framework.DataType.LENGTH;
var _fcd8 = framework.DataType.NAN;
var _fcd9 = framework.DataType.NULL;
var _fcd10 = framework.DataType.NUMBER;
var _fcd11 = framework.DataType.OBJECT;
var _fcd12 = framework.DataType.REGEXP;
var _fcd13 = framework.DataType.STRING;
var _fcd14 = framework.DataType.UNDEFINED;
var _fcse1 = framework.Separator.AMPERSAND;
var _fcse2 = framework.Separator.COLON;
var _fcse3 = framework.Separator.COMMA;
var _fcse4 = framework.Separator.DATA_BIND_ELEMENT;
var _fcse5 = framework.Separator.DOUBLE_QUOTE;
var _fcse6 = framework.Separator.EMPTY_STRING;
var _fcse7 = framework.Separator.EQUALS;
var _fcse8 = framework.Separator.OBJECT_NOTATION_CLOSE;
var _fcse9 = framework.Separator.OBJECT_NOTATION_OPEN;
var _fcse10 = framework.Separator.SPACE;
var _fch1 = framework.HttpConstants.COOKIES;
var _fch2 = framework.HttpConstants.DEFAULT;
var _fch3 = framework.HttpConstants.ERRORTIMEOUT;
var _fch4 = framework.HttpConstants.EXPIRATIONDATE;
var _fch5 = framework.HttpConstants.MICROSOFT_XMLHTTP;
var _fch6 = framework.HttpConstants.MSXML2_XMLHTTP;
var _fch7 = framework.HttpConstants.READY_STATE_FINISHED;
var _fch8 = framework.HttpConstants.RESPONSE_TEXT;
var _fch9 = framework.HttpConstants.STATUS_BAD;
var _fch10 = framework.HttpConstants.STATUS_OK;
var _fch11 = framework.HttpConstants.STATUS;
var _fch12 = framework.HttpConstants.TIMEOUT_ID;
var _fch13 = framework.HttpConstants.TIMEOUT;
var _fch14 = framework.HttpConstants.TIMESTAMP;
var _fch15 = framework.HttpConstants.URL;
var _fcw1 = framework.WidgetConstants.AUTO_HEIGHT;
var _fcw2 = framework.WidgetConstants.CALENDAR_MAX_HEIGHT;
var _fcw3 = framework.WidgetConstants.CALENDAR_MAX_WIDTH;
var _fcw4 = framework.WidgetConstants.FRIDAY;
var _fcw5 = framework.WidgetConstants.MONDAY;
var _fcw6 = framework.WidgetConstants.POSITION_ABOVE;
var _fcw7RJ = framework.WidgetConstants.POSITION_BELOWRIGHTJUSTIFIED;
var _fcw7 = framework.WidgetConstants.POSITION_BELOW;
var _fcw8 = framework.WidgetConstants.POSITION_LEFT;
var _fcw9RU = framework.WidgetConstants.POSITION_RIGHTUPWARD;
var _fcw9 = framework.WidgetConstants.POSITION_RIGHT;
var _fcw10 = framework.WidgetConstants.SATURDAY;
var _fcw11 = framework.WidgetConstants.SUNDAY;
var _fcw12 = framework.WidgetConstants.TABLE_ALIGN_CENTER;
var _fcw13 = framework.WidgetConstants.TABLE_ALIGN_LEFT;
var _fcw14 = framework.WidgetConstants.TABLE_ALIGN_RIGHT;
var _fcw15 = framework.WidgetConstants.TABLE_FORMAT_HTML;
var _fcw16 = framework.WidgetConstants.TABLE_FORMAT_NONE;
var _fcw17 = framework.WidgetConstants.TABLE_FORMAT_WRAP;
var _fcw18 = framework.WidgetConstants.TABLE_NO_WRAP_LIMIT;
var _fcw19 = framework.WidgetConstants.TABLE_SORT_ASCENDING;
var _fcw20 = framework.WidgetConstants.TABLE_SORT_DESCENDING;
var _fcw21 = framework.WidgetConstants.TABLE_SORT_NONE;
var _fcw22 = framework.WidgetConstants.THURSDAY;
var _fcw23 = framework.WidgetConstants.TUESDAY;
var _fcw24 = framework.WidgetConstants.WEDNESDAY;
var _fck1 = framework.KeyCode.KEY_DOWN_ARROW;
var _fck2 = framework.KeyCode.KEY_ENTER;
var _fck3 = framework.KeyCode.KEY_ESCAPE;
var _fck4 = framework.KeyCode.KEY_NONE;
var _fck5 = framework.KeyCode.KEY_TAB;
var _fck6 = framework.KeyCode.KEY_UP_ARROW;
var _fd1 = framework.datamodel.bindData;
var _fd2O = framework.datamodel.clearDataObjectOnly;
var _fd2 = framework.datamodel.clearDataObject;
var _fd3 = framework.datamodel.createDataObject;
var _fd4 = framework.datamodel.getDataMapAsString;
var _fd5 = framework.datamodel.getDataObjectAsString;
var _fd6 = framework.datamodel.populateDataObjectFromElements;
var _fd7 = framework.datamodel.populateElementsFromDataObject;
var _fd8 = framework.datamodel._dataMapper;
var _fe1 = framework.eventmodel.addElementEvent;
var _fe2 = framework.eventmodel.addEvent;
var _fe3 = framework.eventmodel.getEventTarget;
var _fe4 = framework.eventmodel.removeElementEvent;
var _fe5 = framework.eventmodel.removeEvent;
var _fe6 = framework.eventmodel._eventId;
var _fe7 = framework.eventmodel._fixEvent;
var _fe8 = framework.eventmodel._handleEvent;
var _fe9 = framework.eventmodel._isEventHandlerRegistered;
var _fe10 = framework.eventmodel.debug;
var _fe11 = framework.eventmodel.isUndefinedOrNull;
var _fh1 = framework.http.cancelAllHttp;
var _fh2 = framework.http.cancelSingleHttp;
var _fh3 = framework.http.getHttpCallResults;
var _fh4 = framework.http.loadUrl;
var _fh5 = framework.http._executeHttpCall;
var _fh6 = framework.http._getDate;
var _fh7 = framework.http._getHttpObject;
var _fh8 = framework.http._httpObjectsArray;
var _fh9 = framework.http._httpResultsArray;
var _fh10 = framework.http._xmlHttpFactories;
var _fh11 = framework.http.loadJS;
var _fh12 = framework.http.loadScript;
var _fh13 = framework.http.loadCss;
var _fh14 = framework.http.translate;
var _fh15 = framework.http.debug;
var _fu1 = framework.util.characterToEntity;
var _fu2 = framework.util.clone;
var _fu3 = framework.util.debug;
var _fu4 = framework.util.getDebugEnabled;
var _fu5 = framework.util.getElementPosition;
var _fu6 = framework.util.getTime;
var _fu7 = framework.util.hideElement;
var _fu8 = framework.util.hideSelects;
var _fu9 = framework.util.isEmpty;
var _fu10 = framework.util.isIE7;
var _fu11 = framework.util.isInternetExplorer;
var _fu12 = framework.util.isSupportedBrowser;
var _fu13 = framework.util.isType;
var _fu14 = framework.util.isUndefinedOrNull;
var _fu15 = framework.util.makeTextUnbreakable;
var _fu16 = framework.util.mouseInsideElement;
var _fu17 = framework.util.purgeElement;
var _fu18 = framework.util.setClassName;
var _fu19 = framework.util.setDebugEnabled;
var _fu20 = framework.util.setElementVisible;
var _fu21 = framework.util.setInnerHTML;
var _fu22 = framework.util.setZIndex;
var _fu23 = framework.util.showElement;
var _fu24 = framework.util.showSelects;
var _fu25 = framework.util._isArray;
var _fu26 = framework.util._isBoolean;
var _fu27 = framework.util._isDate;
var _fu28 = framework.util._isDebugEnabled;
var _fu29 = framework.util._isError;
var _fu30 = framework.util._isFunction;
var _fu31 = framework.util._isNull;
var _fu32 = framework.util._isNumber;
var _fu33 = framework.util._isObject;
var _fu34 = framework.util._isRegExp;
var _fu35 = framework.util._isString;
var _fu36 = framework.util._isUndefined;
var _fu37 = framework.util._selectElements;
var _fu38 = framework.util.extend;
var _fu39 = framework.util.translate;
var _fu40 = framework.util.setLocalizedAntePostMeridiem;
var _fu41 = framework.util.setLocalizedDayOfWeekNamesAbr;
var _fu42 = framework.util.setLocalizedDayOfWeekNames;
var _fu43 = framework.util.setLocalizedDaySuffix;
var _fu44 = framework.util.setLocalizedHourSuffix;
var _fu45 = framework.util.setLocalizedMinuteSuffix;
var _fu46 = framework.util.setLocalizedMonthNamesAbr;
var _fu47 = framework.util.setLocalizedMonthNames;
var _fu48 = framework.util.setLocalizedYearSuffix;
var _fu49 = framework.util.setMilitaryTime;
var _fu50 = framework.util.setDateFormat;
var _fu51 = framework.util._allowedComma;
var _fu52 = framework.util._localizedAntePostMeridiem;
var _fu53 = framework.util._localizedDayOfWeekNamesAbr;
var _fu54 = framework.util._localizedDayOfWeekNames;
var _fu55 = framework.util._localizedDaySuffix;
var _fu56 = framework.util._localizedHourSuffix;
var _fu57 = framework.util._localizedMinuteSuffix;
var _fu58 = framework.util._localizedMonthNamesAbr;
var _fu59 = framework.util._localizedMonthNames;
var _fu60 = framework.util._localizedYearSuffix;
var _fu61 = framework.util._MilitaryTime;
var _fu62 = framework.util._splitArray;
var _fwb1 = framework.widget.busy.start;
var _fwb2 = framework.widget.busy.stop;
var _fwc1 = framework.widget.calendar.afterDate;
var _fwc2 = framework.widget.calendar.beforeDate;
var _fwc3 = framework.widget.calendar.clearTime;
var _fwc4 = framework.widget.calendar.closePopupWindow;
var _fwc5 = framework.widget.calendar.getSelectedDateObject;
var _fwc6 = framework.widget.calendar.init;
var _fwc7 = framework.widget.calendar.isPopupWindowVisible;
var _fwc8 = framework.widget.calendar.resetSelectedDateObject;
var _fwc9 = framework.widget.calendar.setDateFormat;
var _fwc10 = framework.widget.calendar.setFirstAvailableDate;
var _fwc11 = framework.widget.calendar.setLocalizedAntePostMeridiem;
var _fwc12 = framework.widget.calendar.setLocalizedDayOfWeekNamesAbr;
var _fwc13 = framework.widget.calendar.setLocalizedDayOfWeekNames;
var _fwc14 = framework.widget.calendar.setLocalizedDaySuffix;
var _fwc15 = framework.widget.calendar.setLocalizedHourSuffix;
var _fwc16 = framework.widget.calendar.setLocalizedMinuteSuffix;
var _fwc17 = framework.widget.calendar.setLocalizedMonthNamesAbr;
var _fwc18 = framework.widget.calendar.setLocalizedMonthNames;
var _fwc19 = framework.widget.calendar.setLocalizedYearSuffix;
var _fwc20 = framework.widget.calendar.setMilitaryTime;
var _fwc21 = framework.widget.calendar.setSelectableDates;
var _fwc22 = framework.widget.calendar.setSelectedDateObject;
var _fwc23 = framework.widget.calendar._allowedComma;
var _fwc24 = framework.widget.calendar._buildDIVs;
var _fwc25 = framework.widget.calendar._calculateAppropriateDay;
var _fwc26 = framework.widget.calendar._calculatePosition;
var _fwc27 = framework.widget.calendar._closePopupWindow;
var _fwc28 = framework.widget.calendar._dateOnClickEventHandler;
var _fwc29 = framework.widget.calendar._dateOnMouseOutEventHandler;
var _fwc30 = framework.widget.calendar._dateOnMouseOverEventHandler;
var _fwc31 = framework.widget.calendar._getCalendarAttributes;
var _fwc32 = framework.widget.calendar._hideDropDowns;
var _fwc33 = framework.widget.calendar._iconOnClickEventHandler;
var _fwc34 = framework.widget.calendar._nextOnClickEventHandler;
var _fwc35 = framework.widget.calendar._nextYearOnClickEventHandler;
var _fwc36 = framework.widget.calendar._previousOnClickEventHandler;
var _fwc37 = framework.widget.calendar._previousYearOnClickEventHandler;
var _fwc38 = framework.widget.calendar._showCalendar;
var _fwc39 = framework.widget.calendar._showMonth;
var _fwc40 = framework.widget.calendar._sliceOutMainId;
var _fwc41 = framework.widget.calendar._sortDateArray;
var _fwc42 = framework.widget.calendar._textOnBlurEventHandler;
var _fwc43 = framework.widget.calendar._textOnClickEventHandler;
var _fwc44 = framework.widget.calendar._validateAllowableDate;
var _fwc45 = framework.widget.calendar._windowOnMouseOutEventHandler;
var _fwf1 = framework.widget.floatingWindow.hideSelects;
var _fwf2 = framework.widget.floatingWindow.hide;
var _fwf3C = framework.widget.floatingWindow.setHTMLContent;
var _fwf3 = framework.widget.floatingWindow.setHTML;
var _fwf4 = framework.widget.floatingWindow.showAt;
var _fwf5 = framework.widget.floatingWindow.show;
var _fwf6 = framework.widget.floatingWindow._closeEventHandler;
var _fwf7 = framework.widget.floatingWindow.createSimpleJSFloatingWindow;
var _fwh1 = framework.widget.helpmenu.closeMenuItemList;
var _fwh2 = framework.widget.helpmenu.init;
var _fwh3 = framework.widget.helpmenu._changeArrow;
var _fwh4 = framework.widget.helpmenu._helpMenuIconOnClickEventHandler;
var _fwh5 = framework.widget.helpmenu._menuItemMouseOutEventHandler;
var _fwh6 = framework.widget.helpmenu._menuItemMouseOverEventHandler;
var _fwh7 = framework.widget.helpmenu._menuOnClickEventHandler;
var _fwme1 = framework.widget.menu.closeMenuItemList;
var _fwme2 = framework.widget.menu.init;
var _fwme3 = framework.widget.menu._changeArrow;
var _fwme4 = framework.widget.menu._matchCellHeightsForRow;
var _fwme5 = framework.widget.menu._menuItemMouseOutEventHandler;
var _fwme6 = framework.widget.menu._menuItemMouseOverEventHandler;
var _fwme7 = framework.widget.menu._menuMouseOutEventHandler;
var _fwme8 = framework.widget.menu._menuMouseOverEventHandler;
var _fwme9 = framework.widget.menu._menuOnClickEventHandler;
var _fwmo1 = framework.widget.module.collapse;
var _fwmo2 = framework.widget.module.expand;
var _fwmo3 = framework.widget.module.init;
var _fwmo4 = framework.widget.module.isCollapsable;
var _fwmo5 = framework.widget.module.isCollapsed;
var _fwmo6 = framework.widget.module.isExpanded;
var _fwmo7 = framework.widget.module._setModuleMode;
var _fwmo8 = framework.widget.module._toggleEventHandler;
var _fws1 = framework.widget.suggest.init;
var _fws2FF = framework.widget.suggest.listEntryFF;
var _fws2 = framework.widget.suggest.listEntry;
var _fws3 = framework.widget.suggest.updateListArray;
var _fws4 = framework.widget.suggest._clickedopen;
var _fws5 = framework.widget.suggest._defaultText;
var _fws6 = framework.widget.suggest._functionName;
var _fws7 = framework.widget.suggest._getKeyCodeFromEvent;
var _fws8 = framework.widget.suggest._holdFocusId;
var _fws9 = framework.widget.suggest._holdFunctionName;
var _fws10 = framework.widget.suggest._holdTextElementId;
var _fws11 = framework.widget.suggest._listArray;
var _fws12 = framework.widget.suggest._populateElement;
var _fws13 = framework.widget.suggest._populateNameKeyPress;
var _fws14 = framework.widget.suggest._searchText;
var _fws15 = framework.widget.suggest._search;
var _fws16 = framework.widget.suggest._setFocusIdOff;
var _fws17 = framework.widget.suggest._setFocusIdOn;
var _fws18 = framework.widget.suggest._suggestOnKeyDownEventHandler;
var _fws19 = framework.widget.suggest._suggestSelectOnBlurEventHandler;
var _fws20 = framework.widget.suggest._suggestTextBoxOnBlurEventHandler;
var _fws21 = framework.widget.suggest._textBoxOnClickEventHandler;
var _fws22 = framework.widget.suggest.createJSSuggest;
var _fwt1 = framework.widget.table.addColumn;
var _fwt2 = framework.widget.table.addRow;
var _fwt3 = framework.widget.table.clearSorting;
var _fwt4 = framework.widget.table.clearTableContents;
var _fwt5 = framework.widget.table.deleteColumn;
var _fwt6 = framework.widget.table.deleteRow;
var _fwt7 = framework.widget.table.getColumnWidths;
var _fwt8 = framework.widget.table.getCurrentSortColumnIndex;
var _fwt9 = framework.widget.table.getCurrentSortOrder;
var _fwt10 = framework.widget.table.getFirstVisibleRow;
var _fwt11 = framework.widget.table.getTableContentsArray;
var _fwt12 = framework.widget.table.init;
var _fwt13 = framework.widget.table.isScrollBarVisible;
var _fwt14 = framework.widget.table.setMaxRows;
var _fwt15 = framework.widget.table.setTableContentsArray;
var _fwt16 = framework.widget.table.setTableContentsString;
var _fwt17 = framework.widget.table.sortColumn;
var _fwt18 = framework.widget.table.updateRow;
var _fwt19 = framework.widget.table._addColumn;
var _fwt20 = framework.widget.table._addRow;
var _fwt21 = framework.widget.table._defaultAfterSortHandler;
var _fwt22 = framework.widget.table._defaultSortHandler;
var _fwt23 = framework.widget.table._deleteColumn;
var _fwt24 = framework.widget.table._deleteRow;
var _fwt25 = framework.widget.table._formatCellData;
var _fwt26 = framework.widget.table._getColumnAttributes;
var _fwt27 = framework.widget.table._getRowHeights;
var _fwt28 = framework.widget.table._getTableAttributes;
var _fwt29 = framework.widget.table._getTextWidth;
var _fwt30 = framework.widget.table._getTotalRowHeight;
var _fwt31 = framework.widget.table._initSorting;
var _fwt32 = framework.widget.table._makeCellSortable;
var _fwt33 = framework.widget.table._matchCellHeightsForRow;
var _fwt34 = framework.widget.table._reorderTableRows;
var _fwt35 = framework.widget.table._rowOperationPostProcessing;
var _fwt36 = framework.widget.table._setHeightByValue;
var _fwt37 = framework.widget.table._setHeight;
var _fwt38 = framework.widget.table._setSortIndicator;
var _fwt39 = framework.widget.table._setupScrolling;
var _fwt40 = framework.widget.table._showDataGrid;
var _fwt41 = framework.widget.table._sortColumnIndex;
var _fwt42 = framework.widget.table._sortComparator;
var _fwt43 = framework.widget.table._sortEventHandlerPostProcessing;
var _fwt44 = framework.widget.table._sortEventHandler;
var _fwt45 = framework.widget.table._sortHandlerWrapper;
var _fwt46 = framework.widget.table._sortOrder;
var _fwt47 = framework.widget.table._updateRow;
var _fwt48 = framework.widget.table._wrapCellText;
var _fwt49 = framework.widget.table.getColumnWidth;
var _fwt50 = framework.widget.table.getTableWidth;
var _fwv1 = framework.widget.viewlinks.clearAlphaNumericChars;
var _fwv2 = framework.widget.viewlinks.init;
var _fwv3 = framework.widget.viewlinks.setAlphaNumericChars;
var _fwv4 = framework.widget.viewlinks._getViewLinksAttributes;
var _fwv5 = framework.widget.viewlinks._resetViewLinks;
var _fwv6 = framework.widget.viewlinks._viewLinksClickEventHandler;
framework.loaded = true;
//Version 4.1