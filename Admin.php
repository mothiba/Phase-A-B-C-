<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MASEMOLA - Manager</title>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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
function userbook(divid)
{
	if(httpobj)
	{
 
	var id = document.getElementById(divid); 
	id.innerHTML = "kholo";
	httpobj.open("GET","Product_add.php");		
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

<body>
 

 <table width="744" border="0"  cellspacing="0" cellpadding="0" align="center">
   <tr>
<tr>
    <td colspan="3" ><?php  require('login.php');    ?>    &nbsp; &nbsp; <a href="product_maintenance.php">Product Maintenance</a> &nbsp; &nbsp;  <a  href="product_allocation.php">Product Allocation</a>&nbsp; &nbsp;  <a  href="Addusers.php">Add Users</a>    <br/><br/></td>
</tr>
  <tr>
    <td  valign="top"> 
      <embed src="btnadmin.swf"  width="105" height="33" bgcolor="#FFFFFF"></embed>
      <embed src="pradd.swf" quality="high" width="105" height="33" bgcolor="#FFFFFF"></embed>
      <a href="addcategory.php"><img src="addcategory.jpg" alt="addcategory"width="105" height="33" bgcolor="#0099FF"></a>   
      <a href="AddBranch.php"><img src="add.jpg" alt="" width="105" height="37"></a>
    </td>  
    <td    colspan="3" >
	<br/>
	
	<strong>Registered Customers' History </strong><br/>
	------------------------------------
	<br/><br/>
	<?php
	
	require('connecta.php');


@session_start();

$custid = 0;
		if (isset($_SESSION['custid'])) //Registered customer
		{
		
		$custid = $_SESSION['custid'];

		}
$strquery = "SELECT tblusers.Firstname,stock.Product_Name,tbl_history.Qty,tbl_history.Purchase_date,tbl_history.Total,tblproduct.Product_Category 
			FROM tblproduct inner join tbl_history on tblproduct.Product_id = tbl_history.Product_id 
			INNER JOIN stock ON tblproduct.Product_id =stock.Product_id
			inner join tblusers on tbl_history.Customer_id = tblusers.Customer_id";

$result = mysql_query($strquery)or die(mysql_error());
$rows = mysql_affected_rows();
$qty_counter = 0;
$net_tot = 0;
		if( $rows> 0)
			{
					echo '<table  valign="bottom"   cellpadding="3" cellspacing="3" >';
					echo '<tr>';
					echo "<td align=left><strong>Customer Name</strong></td>";
					echo "<td align=left><strong>Product Name</strong></td>";
					echo "<td align=left><strong>Quantity</strong></td>";
					echo "<td align=left><strong>Purchase Date</strong></td>";
					echo "<td align=left><strong>Total(R)</strong></td>";
					echo '</td>';
					
					for($x = 0 ; $x < $rows; $x++)
							{
								$array_results = mysql_fetch_row($result);
								$prod_id = $array_results[0];
								$customerid = 0;
					
					if (isset($_SESSION['custid']))
						{
						$customerid = $_SESSION['custid'];
						}
					else
						{
						$customerid = 0;
						}
					$net_tot = $net_tot + (int)$array_results[4];
						echo '<tr>';
						echo "<td align=left>$array_results[0] </td>";
						echo "<td align=left>$array_results[1] </td>";
						echo "<td align=left>$array_results[2] </td>";
						echo "<td align=left>$array_results[3] </td>";
						echo "<td align=left>$array_results[4]</td>";
					//	$E = mysql_query("SELECT Cat_Name FROM caregory WHERE Cat_ID='".$array_results[5]."'")or die(mysql_error());
						//$s =mysql_fetch_array($E) or die(mysql_error());
						echo '</tr>';
						
						
						
						echo '<tr>';
						echo '<td colspan=5><hr  color="#6699CC" style="border:dotted"/></td>';
						echo '</tr>';
						
			
			
		}
				echo '<tr>';
				echo "<td align=left ></td>";
				echo "<td align=left ></td>";
				echo "<td align=left ></td>";
				echo "<td align=left ></td>";
				echo "<td align=left ><strong>-----------<br/>Net Total <br/>R$net_tot<br/>-----------</td>";
				echo '</tr>';
		echo '</table>';
}
else
{
echo 'You have no shopping history...';
}
mysql_close($serverconnect);

?>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td width="355" valign="top"></td>
    <td width="209">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php  require('foooter.php'); ?>
</body>
</html>
