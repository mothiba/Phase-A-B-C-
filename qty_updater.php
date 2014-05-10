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
		$prod_id = $_GET['prod_id'];
		$newquantity = $_GET['newquantity'];
		$continue = true;
		$update_cart = true;
	if(!$newquantity)
		{
			echo "<strong><br/>Quantity is required!<br/></strong>";
			$update_cart = false;
		}
	else if (!is_numeric($newquantity))
		{
			echo "<strong><br/>Quantity must be numeric!<br/></strong>";
			$update_cart = false;
		}
	else if ((int)$newquantity <= 0)
		{
			echo "<strong><br/>Quantity must be greater than 0!<br/></strong>";
			$update_cart = false;
		}
if(isset($_SESSION['branch']))	  
	{
		$table = $_SESSION['branch'];
	}
require('connecta.php');
$qtyleft = 0;
$str2 = "SELECT Product_price,Product_qty,Discount from $table WHERE Product_id='".$prod_id."'";
$results2 = mysql_query($str2)or die(mysql_error());
$Uprice = mysql_fetch_row($results2);
$tempsum = ((int)$Uprice[0] * (int)$newquantity);
$newtot = $tempsum - ((int)$Uprice[2] * (int)$newquantity);
$qtyleft = (int)$Uprice[1] - (int)$newquantity;
	if($qtyleft < 0)
		{
			 echo '<strong>Insufficient Item Stock.</strong>.<br/>';
			echo "<strong> $Uprice[1] items remaining</strong>";
			$update_cart = false;
		}
	if ($update_cart == true)
		{
			$str = "UPDATE tbl_cart SET Qty='".$newquantity."', Total='".$newtot."'  WHERE Customer_id='".$cust_id."' AND Product_id='".$prod_id."'";
			$results = mysql_query($str)or die(mysql_error());
			$rows = mysql_affected_rows();
	if ($rows > 0)
		{
			echo '<br/><strong>Quantity Updated.</strong>';
			$str2 = "UPDATE $table SET Product_qty='".$qtyleft."' WHERE Product_id='".$prod_id."'";
		    $results2 = mysql_query($str2)or die(mysql_error());		
		}
	else
		{
	        echo 'Not updated.';
		}
}
require('view_cart.php');
//mysql_close($serverconnect);
?>
