<?php
 $id = $_GET['id'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOTHIBA - Product Add</title>
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
 
 function add(divid,idd)
{
	if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var btn = document.getElementById(idd);
	 
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

<table  border="0" align="center">
  <br/>
   <tr>
    <td colspan="3" ><?php  require('login.php');    ?>&nbsp; &nbsp;<a href="product_maintenance.php">Product Maintenance</a>&nbsp; &nbsp;<a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;<a  href="Addusers.php">Add Users</a>    </td>
  </tr>
   <tr><td> 
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high"    width="105" height="33" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37">  </a><br/>
    </td></tr>
     <?php  require('connecta.php');
	 $se=mysql_query("SELECT* FROM roles") or die(mysql_error());
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
                 <td><a href="edit.php?id=<?php echo $roles[0] ?>" onclick="add('dvresult','AddUser')">Edit</a></td>&nbsp;&nbsp;
				 <tr>
                 <td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>
                 </tr><?php
				 
 		   }
		   
  
		}?>
    </tr>
    <td colspan="3" align="center">
    <tr>
 <td colspan="3" align="center"><div id="dvresult" class="style4"> <strong></strong> </div></td></tr>
 
<tr>
    <td colspan="3" align="center"><input name="AddUser" type="submit" value="Add User"  id="AddUser"onclick="add('dvresult','AddUser')"/>&nbsp;
                                    </td>
   </tr> </table><form action="edit.php" method="post">
   <?php  $se=mysql_query("SELECT* FROM roles WHERE RoleID='".$id."'") or die(mysql_error());
   
		$rows = mysql_affected_rows();
		if($rows>0)
		{	?> <table align="center" width="550">  
                <tr><td colspan="4" class="style4" align="center" ><ul><h3> Edit user info below</h3></ul></td></tr>              
				<tr><td  width="250"> <strong>Branch Name</strong> </td>				 
				<td width="250"> <strong>Name</strong></td>		   
				<td width="250"><strong>Role</strong></td> 
                <td width="250"><strong>Password</strong></td>                
                <tr>
                <td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>
                  </tr>
				</tr><?php
			for($rs=0;$rs<$rows;$rs++)
			{
				$role= mysql_fetch_array($se);
	?>
			   <tr>
               <input type="hidden" name='id' value=<?php echo $id?>  />
                 <td width="250"> <input name="branch" type="text" value=" <?php echo $role[4] ?> "/> </td>			   
				 <td width="250"><input name="name" type="text" value=" <?php echo $role [1] ?>"/></td>				
				 <td width="250"><input name="role" type="text" value=" <?php echo $role[3] ?>" /></td>  
                  <td width="250"><input name="pass" type="text" value=" <?php echo $role[2] ?>" /></td>             
				 <tr>
                 <td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>
                 </tr><?php
				 
 		      }
		   ?><td colspan="3" align="center"><input name="Save" type="submit" value="Save"/></td><?php
		       }  
		    ?> 
   
 


<td colspan="3" align="center">
<?php  
   $id =$_POST['id'];
      $branch =  $_POST['branch'];
	  $name   =  $_POST['name'];
	  $role   =  $_POST['role'];
	  $pass = $_POST['pass'];
	  if(empty($branch) ||empty($name))
		  {
			die(); 
		  }
	  else
		  {
			//echo  $update =("UPDATE roles SET Username ='".$name."',Branch = '".$branch."',Role ='".$role."' WHERE RoleID = '".$id."'");
			  $id;
			$update = "UPDATE roles set Username='".$name."',Role= '".$role."',Branch='".$branch."',Pasword='". $pass."'  where RoleID='".$id."' ";
			//echo $update;
			$nn = mysql_query($update) or die(mysql_error());
			$rw=mysql_affected_rows();
			 if($rw>0)
				 {
					echo "<tr><td colspan=5 align=center>update was done</tr>";
					echo '<td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>'; 
				 }
				 else
				 {
					echo '<tr><td colspan="5" align="center">update was not  done</td></tr>';
					echo '<td colspan="5"><hr  color="#6699CC" style="border:dotted"/></td>';  
				 }
		
		  }


?></td></tr></table></form>
<?php 
require('foooter.php'); 
?>