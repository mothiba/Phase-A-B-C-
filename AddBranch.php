 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GYM|Add Branch</title>
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
function product_add(divid,txtbranchname,txtAddress,txttel,txtfax,txtemail)
{
 if(httpobj)
	{
		  var email = document.getElementById(txtemail);
		  var branchname = document.getElementById(txtbranchname);
		  var Address= document.getElementById(txtAddress);
		  var tel  = document.getElementById(txttel);
		  var fax = document.getElementById(txtfax);
		  var id = document.getElementById(divid); 
	 
httpobj.open("GET",  "branch.php?branchname="+branchname.value+"&Address="+Address.value+"&tel="+tel.value+"&fax="+fax.value+"&email="+email.value);
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
<body >

<table  border="0" align="center" cellpadding="2" cellspacing="2">
 
   <tr>
    <td colspan="3" ><?php  require('login.php');    ?>&nbsp; &nbsp;<a href="product_maintenance.php">Product Maintenance</a>&nbsp; &nbsp;<a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;<a  href="Addusers.php">Add Users</a>    </td>
  </tr>
   <tr><td> 
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high"    width="105" height="33" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37">  </a><br/>
    </td></tr>
    <tr><td><br/><strong> <center> Enter product details below: </center></strong> <br/>  </td></tr>
    <tr>
    <td  >Branch Name:</td>
    <td>
      <input type="text" name="branchname"  id="branchname"/></td>
      </tr>
         <tr>
    <td>Address:</td>
    <td> <input type="text" name="Address" id="Address" /></td></tr>
    <tr>
  </tr>
  <tr>
    <td>TEL:</td>
    <td><input type="text" name="tel"  id="tel"/></td>
  </tr>
  <tr>
    <td>FAX:</td>
    <td><input type="text" name="fax" id="fax" /></td>
  </tr>
 <tr>
    <td>Email:</td>
    <td><input type="text" name="email"  id="email"/></td>
  </tr>
  <tr>
  <td   align="center"><input type="submit" name="Submit" value="Store Branch" onclick=" product_add('dvresult','branchname','Address','tel','fax','email')" />
&nbsp;&nbsp;
<input type="reset" name="Submit" value="Clear" />  
  <tr>
<td></td>
    <td colspan="3" >
<tr>
 <td><div id="dvresult" class="style4"> <strong></strong> </div>    </td>
  <tr>
  <td>  </tr>  
</table>
<?php  require('foooter.php'); ?>
</body>
</html>