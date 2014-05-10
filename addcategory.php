 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GYM|Product Add</title>
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
function product_add(divid,txtprod_name,txtprod_desc)
{
 if(httpobj)
	{
  var product_name = document.getElementById(txtname);
	var id = document.getElementById(divid); 
	var user_category = document.getElementById(txtuser_category); 
	var product_price = document.getElementById(txtprice);
	var prod_discount = document.getElementById(txtdiscount); 
  	httpobj.open("GET",  "InitiateProductadd.php?prod_name="+product_name.value+"&product_discount="+prod_discount.value);
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
function clearer(txtprod_name,txtprod_desc)
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
<form enctype="multipart/form-data" action="addcategory.php" method="post"> <br/>
   <tr>
    <td colspan="3" ><?php  require('login.php');    ?>    &nbsp; &nbsp; <a href="product_maintenance.php">Product Maintenance</a> &nbsp; &nbsp;  <a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;  <a  href="Addusers.php">Add Users</a> </td>
  </tr>
  <tr>
    <td><strong>MENU</strong><br/>    
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high"    width="105" height="33" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37"></a>  
    </td><<tr><td><br/><strong> <center> Enter product details below: </center></strong><br/></td></tr><tr>
    <td > Category Name:</td>
    <td>
      <input type="text" name="prod_name" />    </td>
       </tr><tr><td >Description:</td>
       <td> <input type="text" name="prod_desc" /> </td>
    </tr> 
  <tr>
  <td colspan="3" ><input type="submit" name="Submit" value="Store Category" />
 
<input type="reset" name="Submit" value="Clear" />  
  <tr>
<td></td>
    <td colspan="3" >
<?php
require('connecta.php');
 echo $prod_name = $_POST['prod_name'];
//$prod_quantity = $_POST['prod_quantity'];
$prod_desc = $_POST['prod_desc'];
 
	
		if(!$prod_name||!$prod_desc)
	{
		 echo 'provide info for the above fields';
		 exit;
	}
	/*$select = "SELECT* FROM branches";
	$queery = mysql_query($select) or die(mysql_error());
	$num = mysql_affected_rows();
 
	if($num>0)
	{
		for($i=0; $i <$num;$i++)
		{
			$show= mysql_fetch_array($queery);
			$table='';
			//$token =strtok($show[0]," ");
			//	while($token)
					//{
						//  = str_ireplace('','',$show[0]);
					//}	
			$table =strtolower($show[1]);
			//Product_category	Product_Name	Product_qty	Product_Price	Discount
		   $strqry = "INSERT INTO $table(Product_category ) values('".$prod_name."')";
			// echo $show[1];
			$results = mysql_query($strqry)or die(mysql_error());
			$rows = mysql_affected_rows();
		}	
		
	}
	 //exit ;

//exit;
$strquery1 = "INSERT INTO tblproduct(Product_category) values('".$prod_name."')";
$results1 = mysql_query($strquery1)or die(mysql_error());

$rows1 = mysql_affected_rows();
if($rows1 > 0&& $rows>0 )
	{
		echo 'Category Stored Successfully.';
		echo '<a href="addcategory.php">Next Product</a>';
	}
else
	{
		echo 'Product could not be stored.';
	}
echo '</strong>';*/

$category = "INSERT INTO category(Cat_Name) VALUES('".$prod_name."')";
$results  = mysql_query($category)or die(mysql_error());

$rows = mysql_affected_rows();
if($rows > 0)
	{
		echo 'Category Stored Successfully.';
		echo '<a href="addcategory.php">Next Product</a>';
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