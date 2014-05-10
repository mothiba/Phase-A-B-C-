 <?php
@session_start();
	if (isset($_SESSION['custid']))
		{
			$cust_id = $_SESSION['custid'];
		}
	else
		{
			$cust_id = 0;
		}
		if(isset($_SESSION['branch']))	  
{
	$table = $_SESSION['branch'];
}
$prod_id = $_GET['prod_id'];
require('connecta.php');
$up = mysql_query("SELECT Qty FROM tbl_cart WHERE Customer_id='".$cust_id."' AND Product_id='".$prod_id."'") or die(mysql_error());
$updat = mysql_fetch_array($up);
$tbl =mysql_query("SELECT Product_qty FROM tblproduct WHERE Product_id='".$prod_id."'")or die(mysql_error()); 
$qty=  mysql_fetch_array($tbl);
//echo  $updat[0] .'add<br/>';
//echo $qty[0].' remaining<br/>';
  $data= ($qty[0]+$updat[0]);
$str = mysql_query( "UPDATE tblproduct SET Product_qty='".$data."'WHERE Product_id='".$prod_id."'" )or die(mysql_error());
$row  = mysql_affected_rows();
if($row>0)
{
$str = mysql_query("DELETE FROM tbl_cart WHERE Customer_id='".$cust_id."' AND Product_id='".$prod_id."'")or die(mysql_error());
$rows = mysql_affected_rows();
	if ($rows > 0 || $row>0)
		{
			echo '<br/> <strong>Item Removed.</strong>';
		}
	else
		{
			echo 'Not Removed.';
		}
include('view_temp_cart.php');
}
else
	{
				echo 'Not Removed.';
	}
?>