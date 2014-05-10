 <html>
<head>
<title>MASEMOLA- Login</title>
<script type="text/javascript">
var httpobj = false;
if (window.XMLHttpRequest) 
{
httpobj = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
httpobj = new ActiveXObject("Microsoft.XMLHTTP");
}
function userlogin(divid,txtusername,txtpassword)
{
  if(httpobj)
	{
	  var username = document.getElementById(txtusername); 
	  var password = document.getElementById(txtpassword); 
	  var id = document.getElementById(divid); 
	
	   httpobj.open("GET",  "ajaxuserlogin.php?username=" + username.value +"&phonenumber=" + password.value); //url encoded data
	  //httpobj.open("GET",  "ajaxcastcomment.php?txtcomment= fghf&contact= 00");
		httpobj.onreadystatechange = function()
		 {
		  //check downloaded data
			if (httpobj.readyState == 4 && httpobj.status == 200)
			  {
			    id.innerHTML = httpobj.responseText;
			
			  }
			else
			  {
			     id.innerHTML = "";
			  }
			
		}
		httpobj.send(null);
	}
}


function clearer(txtusername,txtpassword)
{


	var username = document.getElementById(txtusername); 
	var password = document.getElementById(txtpassword); 
	
	username.value = "";
	password.value = "";
}
</script>

<style type="text/css">
<!--
.style4 {color: #FF9900}
-->

a:link {
	color: #FF0000;
}
a:visited {
	color: #CC9966;
}
a:hover {
	color: #FF6600;
}
a:active {
	color: #FF0000;
}

</style>

</head>

<body background="images/bgrd_main.jpg">


<br/>

<table width="744" cellpadding="2" cellspacing="2" border="0" align="center">

<tr>
  <td bgcolor="#FFFFFF"  valign="top"><?php
////require('Logo.php')
?></td>
  </tr>
<tr>
  <td align="center"><br/><?php // require('buttons.php');  ?></td>
  </tr>
<tr>
  <td align="center"><h2>Login</h2>
    <table  border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td>Username:</td>
        <td><input name="text" type="text" id="username"/></td>
      </tr>
      <tr>
        <td>Password: </td>
        <td><input name="password" type="password" id="password1"></td>
      </tr>
      <tr>
        <td colspan="2"><input name="button" type="button" onClick="userlogin('divlogin','username','password1')" value="Login"/>
            
        </tr>
    </table>
	 <br/>
		  <br/>
      <div id="divlogin">Username AND Password is required to login...</div>  <hr/>
 </td>
 </tr>

</table>
<?php  require('foooter.php'); ?>

</body>
</html>
