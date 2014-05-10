<html>
<head>
<title>MASEMOLA- Logout Prompt</title>
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
function userlogout(divid,txtusername,txtpassword)
{
	if(httpobj)
	{
	var username = document.getElementById(txtusername); 
	var password = document.getElementById(txtpassword); 
	var id = document.getElementById(divid); 
	httpobj.open("GET",  "logout.php"); //url encoded data
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
</script>
</head>
<body>
<br>
<table  width="744"  cellpadding="2" cellspacing="2" border="0" align="center">
</tr>
<tr>
  <td colspan="2" align="center"><br/><?php  require('buttons.php');  ?></td>
</tr>

<tr>

<td  align="center">

<p><strong>Are you sure you want to logout?</strong></p>

<input  type="button" value="Yes" onClick="userlogout('divlogout')"/>
<form  action="Admin.php" method="post">
<input  type="submit" value="No"/>
</form>
<br/>
<div id="divlogout">---------------</div>
<hr/></td>
</tr>
</table>
<?php  require('foooter.php'); ?>
</body>
</html>
