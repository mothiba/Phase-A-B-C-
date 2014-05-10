<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MASEMOLA - Hisotory</title>

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

<body  background="images/bgrd_main.jpg">
<table width="auto"  border="0" align="center">
  <tr>
    <td bgcolor="#FFFFFF"><?php   //require('Logo.php')  ?> </td>
  </tr>
  <tr>
    <td align="center" ><br/><?php  require('buttons.php');  ?>&nbsp; <span class="style4"><br/><?php  require('login.php');    ?></span></td>
  </tr>
  <tr>
    <td valign="top">
	<br/>
	<hr/>
	<p><strong>Customer History </strong></p>
	<?php
	require('connecta.php');
@session_start();
$custid = 0;
		if (isset($_SESSION['custid'])) //Registered customer
			{	
				$custid = $_SESSION['custid'];

			}

$strquery = "SELECT tblusers.Firstname,tblproduct.Product_Name,tbl_history.Qty,tbl_history.Purchase_date,tbl_history.Total 
             FROM tblproduct inner join tbl_history on tblproduct.Product_id = tbl_history.Product_id 
			 inner join tblusers on tbl_history.Customer_id = tblusers.Customer_id 
			 WHERE tblusers.Customer_id=$custid";

$result = mysql_query($strquery);
$rows = mysql_affected_rows();
$qty_counter = 0;
$total = 0;
if( $rows> 0)
{
		echo '<table  border="0" cellpadding="3" cellspacing="3" >';
		echo '<tr>';
		echo "<td align=left><strong>Customer Name</strong></td>";
		echo "<td align=left><strong>Product Name</strong></td>";
		echo "<td align=left><strong>Quantity</strong></td>";
		echo "<td align=left><strong>Purchase Date & Time</strong></td>";
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
			echo '<tr>';
			echo "<td align=left>$array_results[0] </td>";
			echo "<td align=left>$array_results[1] </td>";
			echo "<td align=left>$array_results[2] </td>";
			echo "<td align=left>$array_results[3] </td>";
			echo "<td align=left>$array_results[4]</td>";
			echo '</tr>';
			
			$total = $total + (int)$array_results[4];
			echo '<tr>';
			echo "<td colspan=5><hr/></td>";
			echo '</tr>';
		}
			echo "<tr> <td colspan=5 align=right><strong> Total <br/>----------- <br/>R$total  <br/>-----------</strong></td> <tr>";
			echo '</table>';
	}
else
	{
		echo 'You have no shopping history...';
	}
mysql_close($serverconnect);
?>  
</td>
  </tr>
</table>
<?php  require('foooter.php'); ?>
</body>
</html>