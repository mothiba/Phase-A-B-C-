  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MASEMOLA - Product Add</title>
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
function viewdata(divid,txtRole_ID,idd)
{
	if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var btn = document.getElementById(idd);
	var temprole = document.getElementById(txtRole_ID); 
	 
	// alert('hello world!'+temprole);
	httpobj.open("GET",  "add.php?Role_ID="+temprole.value+"&btn="+btn.value);
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
}function add(divid,idd)
{
	if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var btn = document.getElementById(idd);
	//var temprole = document.getElementById(txtRole_ID); 
	 
	// alert(btn);
	httpobj.open("GET",  "add.php?btn="+btn.value);
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
function addm(divid,txtuser,txtpass,txtrole,txtbranch)
{
	if(httpobj)
	{
		var id = document.getElementById(divid); 
 	    var user= document.getElementById(txtuser); 
	    var pass = document.getElementById(txtpass);
	    var role = document.getElementById(txtrole);
	    var branch = document.getElementById(txtbranch);
		httpobj.open("GET", "Addm.php?user="+user.value+ "&pass="+pass.value+"&role="+role.value+"&branch="+branch.value);
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

<table  border="0" align="center"   >
  <br/>
   <tr>
    <td colspan="3" ><?php  require('login.php');    ?>&nbsp; &nbsp;<a href="product_maintenance.php">Product Maintenance</a>&nbsp; &nbsp;<a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;<a  href="Addusers.php">Add Users</a>    </td>
  </tr>
   <tr><td> 
      <embed src="btnadmin.swf"  width="105" height="40" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high"    width="105" height="40" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37">  </a><br/>
    </td></tr>
     <?php  require('connecta.php');
	    
		$se=mysql_query("SELECT* FROM roles");
		$rows = mysql_affected_rows();
		if($rows>0)
		{	?> <table align="center" width="550"><tr>
                <td  colspan="4" align="center" > <strong>USER's </strong> </td> 
                </tr><tr>               
				<td  width="250"> <strong>Branch Name</strong> </td>				 
				<td width="250"> <strong>Name</strong></td>		   
				<td width="250"><strong>Role</strong></td>
                <td colspan="2" width="250"> <strong>Option</strong> </td>
                <tr>
                <td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>
                  </tr>
				</tr><?php
			for($rs=0;$rs<$rows;$rs++)
			{
				$roles= mysql_fetch_array($se);
	?>
			   <tr>
               
                 <td width="250"> <?php echo $roles[4] ?> </td>			   
				 <td width="250"><?php echo $roles [1] ?></td>				
				 <td width="250"><?php echo $roles [3] ?> </td>
                 <td><a href="edit.php?id=<?php echo $roles[0] ?>">Edit</a></td> <tr> 
				 <td colspan="4"><hr  color="#6699CC" style="border:dotted"/></td>
                 </tr><?php
				 
 		   }
  
		}?>
    </tr>
    <td colspan="3" align="center">
    <tr>
 <td colspan="3" align="center"><div id="dvresult" class="style4"> <strong></strong> </div></td></tr>

<tr>
    <td colspan="3" align="center"><input name="AddUser" type="submit" value="Add User"  id="AddUser"onclick="add('dvresult','AddUser')"/> 
                                    </td>
   </tr></table>
 

</table>
<?php  require('foooter.php'); 
 
?>
</body>
</html>