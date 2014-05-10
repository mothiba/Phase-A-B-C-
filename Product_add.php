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
function product_add(divid,txtname,txtuser_category,txtprice,txtdiscount)
{
 if(httpobj)
	{
     var product_name = document.getElementById(txtname);
	 var id = document.getElementById(divid); 
	 var user_category = document.getElementById(txtuser_category); 
	 var product_price = document.getElementById(txtprice);
	 var prod_discount = document.getElementById(txtdiscount); 
  
	 httpobj.open("GET",  "Initiate_Product_add.php?prod_name="+product_name.value+"&prod_category="+user_category.value+"&prod_price="+product_price.value+"&product_discount="+prod_discount.value);
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

<table width="744" border="0" align="center" cellpadding="2" cellspacing="2">
<form enctype="multipart/form-data" action="Product_add.php" method="post"> <br/>
   <tr>
    <td colspan="3" ><?php  require('login.php');    ?>    &nbsp; &nbsp; <a href="product_maintenance.php">Product Maintenance</a> &nbsp; &nbsp;  <a  href="product_allocation.php">Product Allocation</a> &nbsp; &nbsp;  <a  href="Addusers.php">Add Users</a>     </td>
  </tr>
   <tr><td> 
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high"    width="105" height="33" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37">  </a><br/>
    </td></tr>
    <tr><td><br/>  <strong> Enter product details below: </strong> </td>
    </tr><tr>
    <td >Name:</td>
    <td>
      <input type="text" name="prod_name" /></td>
      </tr>
         <tr>
    <td>Category:</td>
    <td><label>
      <select  name="prod_category" ><?php
	  require('connecta.php');
    $select = "SELECT DISTINCT Cat_Name FROM category";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	
	if($rows>0)
	{
		for($i= 0; $i<$rows;$i++)
		{
			$Branch = mysql_fetch_array($query);
			 ?> 
             <option value="<?php echo  $Branch[0];?>"><?php echo $Branch[0];?></option><?php
		}
	}
	    mysql_close($serverconnect);?>
        </select>
    </label></td></tr>
   <tr>
    <td align="justify">Selling Price:</td>
    <td><input type="text" name="prod_price" /></td>
  </tr>
  <tr>
    <td>Cost Price:</td>
    <td><input type="text" name="product_discount" /></td>
  </tr>
 
  <tr>
  <td colspan="3" align="center" ><input type="submit" name="Submit" value="Store Product" />
&nbsp;&nbsp;
<input type="reset" name="Submit" value="Clear" />  
  <tr>
<td></td>
    <td colspan="3" >
<?php
require('connecta.php');
 $prod_name = $_POST['prod_name'];
// $name = $_POST['catID'];
// exit($prod_name);
//$prod_quantity = $_POST['prod_quantity'];
$prod_category = $_POST['prod_category'];
$select = "SELECT DISTINCT Cat_ID FROM category WHERE Cat_Name ='".$prod_category."'";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	$prod_category=mysql_fetch_array($query);
$prod_price = $_POST['prod_price'];
$product_discount = $_POST['product_discount'];
$continue = true;
	
		if(!$prod_name||!$prod_price||!$product_discount)
	{
		 echo 'provide info for the above fields';
		 exit;
	}
	
 
 
if ($continue == false)
	{
		exit;
	}
	
$strquery1 = "INSERT INTO stock(Product_Name,Product_category,Product_CostP ) 
values('".$prod_name."' ,'".$prod_category[0]."','".$product_discount."')";
$results1 = mysql_query($strquery1)or die(mysql_error());
$rows1 = mysql_affected_rows();

	$id = mysql_query("SELECT max(Product_id) FROM stock") or die(mysql_error());
	$ids=mysql_fetch_array($id);
	$prod = $ids[0];
$select = "SELECT ID FROM branches";
	$queery = mysql_query($select) or die(mysql_error());
	$num = mysql_affected_rows();	
	if($num>0)
	{
		for($i=0; $i <$num;$i++)
		{
		   $show= mysql_fetch_array($queery);
		  
		   
		    $strqry = "INSERT INTO tblproduct(Product_id,Product_category,Product_Price,branch_ID) 
			 values('".$prod."','".$prod_category[0]."','".$prod_price."','".$show[0]."')";
			$results = mysql_query($strqry)or die(mysql_error());
			$rows = mysql_affected_rows();
		}	
	}
	 
if($rows1 > 0&& $rows>0 )
	{
		echo 'Product Stored Successfully.';
		echo '<a href="Product_add.php">Next Product</a>';
	}
else
	{
		echo 'Product could not be stored.';
	}
echo '</strong>';
mysql_close($serverconnect); 
?>
</form>
<tr>
 <td>    </td>
  <tr>
  <td>  </tr>  
</table>
<?php  require('foooter.php'); ?>
</body>
</html>