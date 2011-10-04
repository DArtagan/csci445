function validateForm() { // This function will check the form on submission.  If the name field is filled in, then it will set the name field as a cookie
  var x=document.contact_form.usersnames.value;
  var y=document.contact_form.category.value;
  var z=document.contact_form.reason.value;
  if ( x == null || x == "") {
    alert("Please enter your whole name")
    return false;
  }
  if ( y == null || y == "") {
    alert("Please provide a category")
    return false;
  }
  if ( z == null || z == "Delete this text and write why you need to see me." || z == "") {
    alert("Please provide a reason")
    return false;
  }
  setNameCookie("usersnames",x,365); 
  return true;
}

function getNameCookie(c_name) { // Checks for cookies related to the website
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

function setCookie(c_name,value,exdays) { // Sets cookies
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function checkNameCookie() // Checks if the usersnames cookie exists, if so the value is displayed, else it creates a field in the form to accept a name
{
var username=getNameCookie("usersnames");
if (username!=null && username!="")
  {
  document.write('Name: ' + username + '<br /><br />');
  }
else
  {
    document.write('<label for="usersnames">Name: </label><input type="text" name="usersnames" id="usersnames" /><br /><br />');
  }
}