
var caps = -1;
var shift = -1;
var keyset = [
              [  ['`','~'],
                 ['1','!'],
                 ['2','@'],
                 ['3','#'],
                 ['4','$'],
                 ['5','%'],
                 ['6','^'],
                 ['7','&amp;',,'7','&'],
                 ['8','*'],
                 ['9','('],
                 ['0',')'],
                 ['-','_'],
                 ['=','+'],
                 ['Bsp','Bsp',32],
              ],
              [
                 ['&nbsp;','&nbsp;',29],
                 ['q','Q'],
                 ['w','W'],
                 ['e','E'],
                 ['r','R'],
                 ['t','T'],
                 ['y','Y'],
                 ['u','U'],
                 ['i','I'],
                 ['o','O'],
                 ['p','P'],
                 ['[','{'],
                 [']','}'],
                 ['\\','|',22]
              ],
              [
                 ['Caps','Caps',35],
                 ['a','A'],
                 ['s','S'],
                 ['d','D'],
                 ['f','F'],
                 ['g','G'],
                 ['h','H'],
                 ['j','J'],
                 ['k','K'],
                 ['l','L'],
                 [';',':'],
                 ['\'','"'],
                 ['Enter','Enter',39]
              ],

              [
                 ['Shift','Shift',48],
                 ['z','Z'],
                 ['x','X'],
                 ['c','C'],
                 ['v','V'],
                 ['b','B'],
                 ['n','N'],
                 ['m','M'],
		 [',','&lt;',,',','<'],
		 ['.','&gt;',,'.','>'],
                 ['/','?'],
                 ['Shift','Shift',49]
              ],

              [
                 ['&nbsp;','&nbsp;',60],
                 ['&nbsp;&nbsp;','',203,' ',' '],
                 ['Clear','Clear',60]
              ]

];


var arVersion = navigator.appVersion.split("MSIE")
var version = parseFloat(arVersion[1])

function fixPNG(id) 
{
   
    var myImage = document.getElementById(id);   
    
    if ( myImage && (version >= 5.5) && (version < 7) && (document.body.filters)) 
    {
       var imgID = (myImage.id) ? "id='" + myImage.id + "' " : ""
	   var imgClass = (myImage.className) ? "class='" + myImage.className + "' " : ""
	   var imgTitle = (myImage.title) ? 
		             "title='" + myImage.title  + "' " : "title='" + myImage.alt + "' "
	   var imgStyle = "display:inline-block;" + myImage.style.cssText
	   var strNewHTML = "<span " + imgID + imgClass + imgTitle
                  + " style=\"" + "width:" + myImage.width 
                  + "px; height:" + myImage.height 
                  + "px;" + imgStyle + ";"
                  + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
                  + "(src=\'" + myImage.src + "\', sizingMethod='scale');\"></span>"
        	   myImage.outerHTML = strNewHTML
          
    }
}
function csco_kbdo(td) {
td.style.backgroundColor="#DDDCDC";
}

function csco_kbdx(td) {
td.style.backgroundColor="#FFFFFF";
}

function keyboardContent(){
 
   var c='<table  border=0 cellpadding="0" bgcolor="#ffffff" cellspacing="0" >';
   c += '<tr><td align=right><table cellpadding=0 cellspacing=0 border=0><tr><td aligh=right valign="top" style="font-family: Verdana,Helvetica,sans-serif; font-weight: bold;font-size: 8pt; color: #cc0000; border:0px solid #555555;cursor: pointer;" onclick="hideKeyboard()">x</td></tr></table></td></tr>';
    for(var row in keyset){
        c+='<tr><td align="middle" ><table  border=0 cellpadding="0" cellspacing="0"><tr>';
        var n = 0;
        for(var key in keyset[row]){
            size=19;
            
            if(keyset[row][key][2]){
               size = keyset[row][key][2];
            }
            text = keyset[row][key][0];

            c+='<td><img id=CSCO_GHOST src="/+CSCOU+/clear.gif" width=2 height=2 style="visibility: hidden;"></td>';
            c+='<td onmouseover="csco_kbdo(this)" onmouseout="csco_kbdx(this)"  id="'+text+'" name="okey" onclick="keyPressed('+row+','+key+');" valign="top" style="font-family: Verdana,Helvetica,sans-serif; font-size: 8pt; color: #000000; border:1px solid #555555;cursor: pointer;" width="'+size+'" height="19" ><center>'+text+'</center></td>';
            n++;
           
        }
        c+='</tr><tr>';
         
        for(i=0;i<n;i++){
            c+='<td><img src="/+CSCOU+/clear.gif" width=2 height=2 style="visibility: hidden;"></td>';
        }
        
        c+='</table></td></tr>';
    }
    c+='</table>';
        
    return c;
}


var border_window={ 
        "border-nw":"/+CSCOU+/b-t-l.gif",
        "border-n":"/+CSCOU+/b-t.gif",
        "border-no":"/+CSCOU+/b-t-r.gif",
        "border-w":"/+CSCOU+/b-l.gif",
        "border-o":"/+CSCOU+/b-r.gif",
        "border-sw":"/+CSCOU+/b-b-l.gif",
        "border-s":"/+CSCOU+/b-b.gif",
        "border-so":"/+CSCOU+/b-b-r.gif",
        "bgcolor":"#f5f5f5",
        "size":6,
        "opacity":100
};


var shadow_window={ 
        "border-nw":"/+CSCOU+/s-t-l.png",
        "border-n":"/+CSCOU+/s-t.png",
        "border-no":"/+CSCOU+/s-t-r.png",
        "border-w":"/+CSCOU+/s-l.png",
        "border-o":"/+CSCOU+/s-r.png",
        "border-sw":"/+CSCOU+/s-b-l.png",
        "border-s":"/+CSCOU+/s-b.png",
        "border-so":"/+CSCOU+/s-b-r.png",
        "bgcolor":"#000000",
        "size":32,
        "opacity":60,
        "is_shadow":1
};



function createWindow(top,left,width,height,border,id){
  
 var obj=document.getElementById(id);
 if(obj){return obj};

                    
 if("undefined" != typeof document["csco_createElement"] && document.createElement != document["csco_createElement"]){
        var oDiv=document.csco_createElement("DIV");
 }else{
        var oDiv=document.createElement("DIV");
 }


 document.body.appendChild(oDiv);


 oDiv.style.visibility="hidden";       
 oDiv.style.position="absolute";
 oDiv.style.top=top+"px";
 oDiv.style.left=left+"px";
 oDiv.style.filter="progid:DXImageTransform.Microsoft.Alpha( style=0,opacity="+border['opacity']+")";
 oDiv.style.opacity=border['opacity'];
 oDiv.style.zIndex=5000;

 oDiv.setAttribute("id", id);


if(navigator.userAgent.indexOf("MSIE") > 0) {
 var oShim=document.createElement("IFRAME");   

 oShim.src="javascript:false";       
 document.body.appendChild(oShim);    
 oShim.style.visibility="hidden";       
 oShim.style.position="absolute";
 oShim.style.top=top+"px";
 oShim.style.left=left+"px";
 oShim.style.filter="progid:DXImageTransform.Microsoft.Alpha( style=0,opacity="+border['opacity']+")";
 oShim.style.opacity=0;
 oShim.style.zIndex=4999;
 oShim.setAttribute("id", id+"_shim");
}

var c='<table  cellpadding="0" cellspacing=0 border=0 cellspacing="0" >\n\
<tr>\n\
<td><img id="'+id+'_border-nw" src="'+border['border-nw']+'" width="'+border['size']+'" height="'+border['size']+'"></td>\n\
<td><img id="'+id+'_border-n" src="'+border['border-n']+'" width="'+(width-border['size']*2)+'" height="'+border['size']+'"></td>\n\
<td><img id="'+id+'_border-no" src="'+border['border-no']+'" width="'+border['size']+'" height="'+border['size']+'"></td>\n\
</tr>\n\
<tr>\n\
<td><img id="'+id+'_border-w" src="'+border['border-w']+'" width="'+border['size']+'" height="'+(height-border['size']*2)+'"></td>\n\
<td align="top" valign="top" id="'+id+'_content" bgcolor="'+border['bgcolor']+'"></td>\n\
<td><img id="'+id+'_border-o" src="'+border['border-o']+'" width="'+border['size']+'" height="'+(height-border['size']*2)+'"></td>\n\
</tr>\n\
<tr>\n\
<td><img id="'+id+'_border-sw" src="'+border['border-sw']+'" width="'+border['size']+'" height="'+border['size']+'"></td>\n\
<td><img id="'+id+'_border-s" src="'+border['border-s']+'" width="'+(width-border['size']*2)+'" height="'+border['size']+'"></td>\n\
<td><img id="'+id+'_border-so" src="'+border['border-so']+'" width="'+border['size']+'" height="'+border['size']+'"></td>\n\
</tr>\n\
</table>';

    oDiv.innerHTML=c;
        
    if(border["is_shadow"]){ 
        
        fixPNG(id+'_border-nw');   
        fixPNG(id+'_border-n');
        fixPNG(id+'_border-no');
        fixPNG(id+'_border-o');
        fixPNG(id+'_border-so');   
        fixPNG(id+'_border-s');
        fixPNG(id+'_border-sw');
        fixPNG(id+'_border-w');
    }     


    return oDiv;

}


function switchCase(kcase){
    
                for(var row in keyset){
                    for(var col in keyset[row]){
                        if(keyset[row][col][0].length == 1){
                            var obj = document.getElementById(keyset[row][col][0]);
                            if(obj){
                                obj.innerHTML="<center>"+keyset[row][col][kcase]+"</center>";
                            }
                        }
                    }
                }

}

function keyPressed(row,col){
    
    

    var pass = top.WEBVPN_password; 
    
    var key = keyset[row][col][0];

    if(pass){
        if(key.length > 1 && key!='&nbsp;&nbsp;'){
            if(key == 'Bsp'){
                if(pass.value.length > 0){
                    pass.value = pass.value.substr(0,pass.value.length-1);
                }
            }
        
            if(key == 'Caps'){
                switchCase(caps == 1?0:1);
                caps = -caps;
                shift = -1;
            }

            if(key == 'Shift'){
                switchCase(shift ==1?(caps == 1?1:0):(caps == 1?0:1));
                    shift = -shift;
            }

            if(key == 'Clear'){
                pass.value = '';
            }

            if(key == 'Enter'){
                hideKeyboard();
            }

           
	      return;
        }

        var kcase = 0;

        if((caps == 1 && shift==-1) || (caps == -1 && shift==1) ){
            kcase = 1;
        }

        

        if(key = keyset[row][col][3]){
            key = keyset[row][col][3+kcase];
        }else{
            key = keyset[row][col][0+kcase];
        }

        pass.value += key;
        if(shift){
            switchCase(caps==1?1:0);
            shift=-1;
        }
    }
}

function setFocus(){
    var obj = document.getElementById("username"); 

    if(obj){
        obj.focus();
    }

}

function onSubmit(){
    return true;
}

var WEBVPN_old_onfocus;


function calculateTopPosition(field,offset){
        
        if(!field.offsetParent) return offset;
        return offset+calculateTopPosition(field.offsetParent,field.offsetTop);

}

function calculateLeftPosition(field,offset){
        
        if(!field.offsetParent) return offset;
        return offset+calculateLeftPosition(field.offsetParent,field.offsetLeft);

}

function popupKeyboard(field){
       

        if(top.WEBVPN_password){
                top.WEBVPN_password.readOnly=true;
        }

        top.WEBVPN_password = field;
        var obj=document.getElementById('WEBVPN_keyboard');
        var obj_s=document.getElementById('WEBVPN_keyboard_shadow');
        var obj_ds=document.getElementById('WEBVPN_keyboard_shim');

        if(obj){
                
                obj.style.visibility="visible";

                field.disabled=true;
                field.readOnly=true;
                field.disabled=false;
                
                obj.style.visibility="visible";
                var w_top=10+calculateTopPosition(field,0) + field.offsetHeight;
                var w_left=calculateLeftPosition(field,0);

                obj.style.top=w_top;
                obj.style.left=w_left;

                if(obj_s){
                        obj_s.style.visibility="visible";
                        obj_s.style.top=w_top+16;
                        obj_s.style.left=w_left+16;
                }
        }

        if(obj_ds){
                obj_ds.style.visibility="visible";
                obj_ds.style.top=w_top;
                obj_ds.style.left=w_left;

                obj_ds.width=document.keyboardWidth;
                obj_ds.height=document.keyboardHeight;
                obj_ds.frameBorder=0;
                obj_ds.style.filter="progid:DXImageTransform.Microsoft.Alpha( style=0,opacity=0 )";
       }


}

function hideKeyboard(){

        var obj=document.getElementById('WEBVPN_keyboard');
        if(obj){
                obj.style.visibility="hidden";
                top.WEBVPN_password.readOnly=true;

        }
        var obj_s=document.getElementById('WEBVPN_keyboard_shadow');
        if(obj_s){
                obj_s.style.visibility="hidden";

        }
        var obj_s=document.getElementById('WEBVPN_keyboard_shim');
        if(obj_s){
                obj_s.style.visibility="hidden";

        }


}


function hookupKeyboard(){
 var obj=document.getElementsByTagName('input');
 for(var i=0;i<obj.length;i++){
        if(obj[i].type=='password'){
                if(obj[i].onfocus){
                        WEBVPN_old_onfocus = obj[i].onfocus;
                }else{
                        WEBVPN_old_onfocus=null;
                }
                obj[i].onfocus = new Function('if(WEBVPN_old_onfocus)WEBVPN_old_onfocus();injectKeyboard();popupKeyboard(this)');
        }
 }





}


function injectKeyboard(){

        document.keyboardWidth=360;
        document.keyboardHeight=170;
        createWindow(0,0,360,150,shadow_window,"WEBVPN_keyboard_shadow");
        createWindow(0,0,350,150,border_window,"WEBVPN_keyboard");
        
        

        var obj=document.getElementById('WEBVPN_keyboard_content');
        
        
        if(obj){
                
                obj.innerHTML = keyboardContent();          
        }

}


function createBlankWindow(id,top,left,width,height){

        var obj=createWindow(top+10,left+10,width+10,height+10,shadow_window,id+"_shadow");
        var obj=createWindow(top,left,width,height,border_window,id);
}

function injectForm(win_id,form){

        var obj= document.getElementById(win_id+'_content');
        if(obj && form){
                var c='<div style="-moz-user-focus: normal;"><table border=0><tr height='+form.title_height+'><td colspan=2 style=" text-indent :10px;"><b>'+form["title"]+'<b></td></tr>';
                for(var i=0;i<form.rows.length;i++){
                        switch(form.rows[i]["type"]){


                                case "link":
                                        c+='<tr valign="middle"><td colspan=2 style=" text-indent :10px;">\n\
                                        <a href="#" onclick="'+form.rows[i]["onclick"]+'">'+form.rows[i]["name"]+'</a></td><td></tr>';
                                        break;

                                case "subtitle":
                                        c+='<tr height=40 valign="middle"><td colspan=2 style=" text-indent :10px;">'+form.rows[i]["name"]+':</td><td></tr>';
                                        break;

                                case "table":
                                        c+='<tr><td colspan="2"';
                                        if(form.rows[i]["align"]){
                                                c+=' align="'+form.rows[i]["align"]+'"';
                                        }        
                                        c+='><table>';
                                        break;
                                case "table_end":
                                        c+='</td></tr></table>';
                                        break;
                                case "table_row":
                                        c+='<tr>';
                                        for(var k=0;k<form.rows[i].columns.length;k++){
                                        switch(form.rows[i].columns[k].type){
                                                case "input":
                                                        c+='<td style=" text-indent :10px;"><input id="'+form.rows[i].columns[k].id+'"></td>';
                                                        break;
                                                case "caption":
                                                        c+='<td style=" text-indent :10px;">'+form.rows[i].columns[k].value+'</td>';
                                                        break;
                                                case "clear":
                                                        c+='<td><input type="reset" value="'+form.rows[i].columns[k].value+'"></td>';
                                                        break;
                                                case "submit":
                                                        c+='<td><input type="submit" value="'+form.rows[i].columns[k].value+'" onclick="'+form.rows[i].columns[k].onclick+'"></td>';
                                                        break;
                                        }
                                        }       
                                        c+='</tr>';
                                        break;
                                case "input":;
                                        c+='<tr><td style=" text-indent :10px;">'+form.rows[i]["name"]+'</td><td><input onclick="this.focus()" id="'+form.rows[i]["id"]+'"></td></tr>';
                                        break;
                                case "textarea":
                                        c+='<tr><td style=" text-indent :10px;">'+form.rows[i]["name"]+'</td><td><textarea id="'+form.rows[i]["id"]+'"  cols="'+form.rows[i]["cols"]+'" rows="'+form.rows[i]["rows"]+'"></textarea></td></tr>';
                                        break;
                                case "combobox":
                                        
                                        c+='<tr><td style=" text-indent :10px;">'+form.rows[i].name+'</td><td><select id="'+form.rows[i].id+'">';
                                        for(var j=0;j<form.rows[i].options.length;j++){
                                                c+='<option value="'+form.rows[i].options[j][0]+'">'+form.rows[i].options[j][1]+'</option>';
                                        }
                                        c+='</select></td></tr>';
                                        break;
                        }


                       
                }
                c+='</table></div>';
                obj.innerHTML=c;

                for(var i=0;i<form.rows.length;i++){
                        switch(form.rows[i]["type"]){
                                case "subtitle":
                                        break;
                                case "table_row":
                                        
                                        for(var k=0;k<form.rows[i].columns.length;k++){
                                        switch(form.rows[i].columns[k].type){
                                                case "textarea":
                                                case "input":
                                                        if(form.rows[i].columns[k].id){
                                                                var obj=document.getElementById(form.rows[i].columns[k].id);
                                                                if(obj){        
                                                                        obj.value = custom_object[form.rows[i].columns[k].id];
                                                                }
                                                        }
                                                        break;
                                                case "caption":
                                                        break;
                                                case "clear":
                                                        break;
                                                case "submit":
                                                        break;
                                        }
                                        }       
                                        break;
                                case "textarea":
                                case "input":
                                case "combobox":
                                        
                                        if(form.rows[i].id){
                                                var obj=document.getElementById(form.rows[i].id);
                                                if(obj){        
                                                        obj.value = custom_object[form.rows[i].id];
                                                }else alert(0);
                                        }
                                        break;
                        }
                }

}
}


function assignFormValues(form){

        if(form){
                for(var i=0;i<form.rows.length;i++){
                        switch(form.rows[i]["type"]){
                                case "subtitle":
                                        break;
                                case "table_row":
                                        
                                        for(var k=0;k<form.rows[i].columns.length;k++){
                                                switch(form.rows[i].columns[k].type){
                                                case "input":
                                                case "combobox":
                                                        
                                                        if(form.rows[i].columns[k].id){
                                                                var obj=document.getElementById(form.rows[i].columns[k].id);
                                                                if(obj){
                                                                        custom_object[form.rows[i].columns[k].id]=obj.value;
                                                                }
                                                        }
                                                        break;

                                                }
                                        }       
                                        break;
                                case "input":
                                case "combobox":
                                case "textarea":
                                        if(form.rows[i].id){
                                                var obj=document.getElementById(form.rows[i].id);
                                                if(obj){
                                                        custom_object[form.rows[i].id]=obj.value;
                                                }
                                        }
                                        break;
                        }
                }

}
}



function showWindow(win_id){

        var obj= document.getElementById(win_id);
        if(obj){
                 obj.style.visibility = 'visible';
        }
        var obj= document.getElementById(win_id+'_shadow');
        if(obj){
                 obj.style.visibility = 'visible';
        }
}

function hideWindow(win_id){

        var obj= document.getElementById(win_id);
        if(obj){
                 obj.style.visibility = 'hidden';
        }
        var obj= document.getElementById(win_id+'_shadow');
        if(obj){
                 obj.style.visibility = 'hidden';
        }
}


function stickHotspot(hotspot,top,left){

        var hs=document.getElementById(hotspot);
        
        if(hs){
                hs.style.top=top;
                hs.style.left=left;
        }


}


function AsyncRequest(path,fun){

        if (window.XMLHttpRequest) { // Mozilla, Safari,...
            http_request = new XMLHttpRequest();
            if (http_request.overrideMimeType) {
                http_request.overrideMimeType('text/xml');
            }
        } else if (window.ActiveXObject) { // IE
            try {
                http_request = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }
        

        if (!http_request) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        http_request.onreadystatechange = function() { fun(); };
        http_request.open('GET', path, true);
        http_request.send(null);
}    

if("undefined" != typeof CSCO_WebVPN){
        CSCO_seppuku(); 
}
