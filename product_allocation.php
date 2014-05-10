<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GYM|ALLOCATION</title>
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
function viewdata(divid,txtcat,txtbranch)
{
	if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempcat = document.getElementById(txtcat); 
	var tempbranch = document.getElementById(txtbranch);
	//window.alert('hello world!'+tempbranch);
	httpobj.open("GET",  "view_product_info1.php?ctg="+tempcat.value+"&branch="+tempbranch.value);
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

function updt(divid,txtprodid,txtcat)
{
  if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	//var tempbranch = document.getElementById(txtbranch);
	//alert(tempbranch);
	httpobj.open("GET",  "prod_qty_up.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
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
function upun(divid,txtprodid,txtcat)
{
	if(httpobj)
	{
    var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	//var tempbranch = document.getElementById(txtbranch);
	//alert(tempbranch);
	httpobj.open("GET",  "unit_price_up.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
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
function dscup(divid,txtprodid,txtcat )
{
  if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	//var tempbranch = document.getElementById(txtbranch);
	//alert(tempbranch);
	httpobj.open("GET",  "dsc_updater.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
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
<body>
<table width="800" border="0"  cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3" ><?php  require('login.php');    ?>    &nbsp; &nbsp; <a href="product_maintenance.php">Product Maintenance</a> &nbsp; &nbsp;  <a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;  <a  href="Addusers.php">Add Users</a>  </td>
  </tr>    
  <tr>
    <td><strong>MENU</strong><br/>
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed><br/>
      <embed src="pradd.swf" quality="high"    width="105" height="33" bgcolor="#FFFFFF"></embed><br/>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a><br/>  
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37"></a>
       </td>
    <td align="center" valign="top" hspace="-100">
	<br/>
	
	<strong class="style4">Products Allocation </strong><br/>
	<h4 class="style4">-----------------------------------------------------------</h4>
	 

	View by Branch:
	<select name="select" id="branch" >
    <?php
	require('connecta.php');
	$select = "SELECT* FROM branches";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	
	if($rows>0)
	{
		for($i= 0; $i<$rows;$i++)
		{
			$Branch = mysql_fetch_array($query);
			 ?> <option value="<?php echo  $Branch[1];?>"><?php echo $Branch[1];?></option><?php
		}
	}
	    mysql_close($serverconnect);
	?>
    </select> 
      View by category:
	<select name="select" id="cat">
	 <?php
	  require('connecta.php');
    $select = "SELECT DISTINCT Cat_Name FROM category";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	
	if($rows>0)
	{
		for($i= 0; $i<$rows;$i++)
		{
			$Branch = mysql_fetch_array($query);
			?> <option value="<?php echo  $Branch[0];?>"><?php echo $Branch[0];?></option><?php
		}
	}
	    mysql_close($serverconnect);?>
	  </select> 
    <input type="submit" name="Submit" value="GO"  onclick="viewdata('dvresult','cat','branch')"/>
   

	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top" align="center"><div id="dvresult"><center><strong>Select a category  and  branch to view.</strong></center></div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php  require('foooter.php'); ?>
</body>
</html>