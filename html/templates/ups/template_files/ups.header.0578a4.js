/* Fri Mar 30 2018 10:19:25 GMT-0400 (EDT) */
/**
Global Variables
**/
var popWin; 
var popWinType;
var ie;
ie = (document.all) ? true : false; // document. all is default function for accessing DOM elements 

/**
* helpModLvl function - Create a module level pop up window
* hrefTarget - url that has to be opened
* name - name of popup window
* width - width of the pop up window
* height - height of the pop up window
*/
function helpModLvl(hrefTarget) { 
    //Set local  Variables
    var name, width, height;
    name = "helpModLvl"; 
    width = "463";
    height = "500";
    // Pop up the window
    popWindow(hrefTarget, name, width, height, resizable = "yes");
}


/**
* helpFieldLvl function -  Create a field level pop up window
* hrefTarget - url that has to be opened
*/
function helpFieldLvl(hrefTarget) {
    //Set Variables
    var name, width, height;
    name = "helpFieldLvl";
    width = "323";
    height = "500";
    popWindow(hrefTarget, name, width, height, resizable = "yes");
}

/**
* printerFriend function - Create a printer friendly pop up window
* hrefTarget - url that has to be opened
*/
function printerFriend(hrefTarget) {
    //Set Variables
    var name, width, height;
    name = "printerVersion";
    width = "603";
    height = "500";
    popWindow(hrefTarget, name, width, height, resizable = "yes");
}

/**
* newWindow - Create a new browser window
* hrefTarget - url that has to be opened
*/
function newWindow(hrefTarget) {
    //open the given url in a new browser window
    window.open(hrefTarget)
}

/**
* popWindow - Opens a window and positions it on the screen
* hrefTarget - url that has to be opened
* name - name of popup window
* width - width of the pop up window
* height - height of the pop up window
-------------------------------------------------*/
function popWindow(hrefTarget, name, width, height) {
    // Create offset
    if (document.all) { // returns true
        xMax = screen.width, yMax = screen.height; // returns height of the screen
    } else {
        if (document.layers) { 
            xMax = window.outerWidth, yMax = window.outerHeight; //returns the widgth and height of the whole browser window
        } else {
            xMax = 640, yMax = 480;
        }
    }
    var xOffset = (xMax - 586) / 2,
        yOffset = (yMax - 700) / 2;
        //Check if pop up window exists or no
    if (!popWin || popWin.closed) {
        popWinType = name;
        // open pop up window and assigns target vaues
        popWin = window.open(hrefTarget, name, 'width=' + width + ',height=' + height + ',screenX=' + xOffset + ',screenY=' + yOffset + ', top=' + yOffset + ',left=' + xOffset + ',scrollbars=yes,menubar=yes,resizable=yes');
    } else {
        // Check if the pop up is the same type
        if (popWinType != name) {
            // it is not the same type so close the current pop up
            popWin.close();
            popWinType = name;
            // open pop up window assigns target vaues
            popWin = window.open(hrefTarget, name, 'width=' + width + ',height=' + height + ',screenX=' + xOffset + ',screenY=' + yOffset + ', top=' + yOffset + ',left=' + xOffset + ',scrollbars=yes,menubar=yes,resizable=yes');
            return;
        }
        // Bring pop up to the foreground
        popWin.focus();
        // Change the location of the pop up to the location being requested
        popWin.location = hrefTarget;
    }
}

/**
* poplanguage function - Create a module level pop up window
* formName - url that has to be opened
* sel - name of the select element from which to
        get the value.
* check - checkbox to remember location
*/
function popLanguage(formName, sel, check) {
    //Set Variables
    var fieldValue, localeValue, hrefTarget, objTest, bolTestResult;
    objTest = /_none/;
    fieldValue = sel.options[sel.selectedIndex].value; // assigns the index value of selected option
    bolTestResult = objTest.test(fieldValue);
    cookieValue = "";
    if (check.checked) {
        cookieValue = check.value;
    }
    if (fieldValue == "") {
        alert('Please select a location')
    } else if (bolTestResult || cookieValue == "yes") {
        formName.submit();
    } else {
        location.href = "/content/" + fieldValue.substring(0, 2) + "/" + fieldValue.substring(3, 5) + "/index.jsx";
    }
    return false;
}

/**
* setPreferences - calls the url to change the language / homepage
        preferences and then closes the window.
* strRedirectorKey - url
* strPermanentFlag - flag that says whether or not
                       the use wants to save these settings.
                       ("yes"/"no")
*/
function setPreferences(strRedirectorKey, strPermanentFlag) {
    if (opener) {
        opener.location.href = "/?cookie=" + strRedirectorKey + "&setCookie=" + strPermanentFlag;
        // closes the current window
        window.close();
    }
}

/**
* popWrapper - Wrapper function takes in a url and a popup type
* hrefTarget - url to be opened
* poptype - type of popup to use
*/
function popWrapper(hrefTarget, popType) {
    if ((popType == "pop_up_2_col")) {
        helpFieldLvl(hrefTarget);
    } else if ((popType == "pop_up_3_col") || (popType == "pop_up_3_col") || (popType == "pr_fr_3_col")) {
        helpModLvl(hrefTarget);
    } else if ((popType == "pop_up_4_col") || (popType == "pr_fr_4_col")) {
        printerFriend(hrefTarget);
    } else if ((popType == "pop_up_full_page")) {
        newWindow(hrefTarget);
    } else {
        return;
    }
}


/** 
* submitHomepageLinkContent - Submits the page contents/forms
* check if any dropdown lists : if not empty then send the value to url.
* post the form elements 
* submit the form
*/
function submitHomepageLinkContent(formName) {
    docForm = document.forms[formName];
   
    if (docForm.dropdownList.options[docForm.dropdownList.selectedIndex].value != "") {
        docForm.action = docForm.dropdownList.options[docForm.dropdownList.selectedIndex].value;
        docForm.method = "POST";
        docForm.submit();
    }
}