// Code based on: http://www.alistapart.com/articles/alternate/
var style_cookie_name = "style" ;
var style_cookie_duration = 30 ;

function selectStyleSheet() {
    // Get the selected option from the whichCSS select box
   	var selObj = document.getElementById('whichCSS');
	var selIndex = selObj.selectedIndex;
	var title = selObj.options[selIndex].value;
	// Create a cookie so that when the page refreshes the selected style
	// will be used (see setStyleFromCookie, called when loading)
	createCookie(style_cookie_name, title, style_cookie_duration);
}

function setActiveStyleSheet(title) {
   var i, a, main;
   for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
     if(a.getAttribute("rel").indexOf("style") != -1
        && a.getAttribute("title")) {
       a.disabled = true;
       if(a.getAttribute("title") == title) a.disabled = false;
     }
   }
}

/* Sets stylesheet in case there is no cookie */
function getPreferredStyleSheet() {
  var i, a;
  for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
    if(a.getAttribute("rel").indexOf("style") != -1
       && a.getAttribute("rel").indexOf("alt") == -1
       && a.getAttribute("title")
       ) return a.getAttribute("title");
  }
  return null;
}

function setStyleFromCookie() {
  // See if there's a style cookie
  var cookie = readCookie(style_cookie_name);
  // Set title based on cookie OR the preferred style
  var title = cookie ? cookie : getPreferredStyleSheet();
  setActiveStyleSheet(title);
}

function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  }
  else expires = "";
  document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}
