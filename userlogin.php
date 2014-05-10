<html>
<head>
<title>MOTHIBALogin</title>
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
function userlogin(divid,txtusername)
	{
	  if(httpobj)
		{
		  var username = document.getElementById(txtusername); 
		  var id = document.getElementById(divid); 
		
		   httpobj.open("GET",  "ajaxuserlogin.php?username=" + username.value  );
		   httpobj.onreadystatechange = function()
			 {
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
		username.value = "";
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
<body>
<br/>
<table width="744" cellpadding="2" cellspacing="2" border="0" align="center">
 <tr>
  <td align="center"><br/><?php  require('buttons.php');  ?></td>
  </tr>
<tr>
  <td align="center"><H2>SEARCH FOR CUSTOMER USING:</H2>
    <table  border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td>Contact Number:</td>
        <td><input name="text" type="text" id="username"/></td>
      </tr>
     
      <tr>
        <td colspan="2"><input name="button" type="button" onClick="userlogin('divlogin','username')" value="Login"/>
          <input name="button2"  type="button" onClick="clearer('username','password1')" value="Clear"/><br/>  </td>
		    
        </tr>
          </table>
	 <br/><br/>
      <div id="divlogin">Username  is required to login...</div>  <hr/>
 </td>
 </tr></table>
<?php  require('foooter.php'); ?>
</body>
</html>
