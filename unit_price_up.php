<?php
@session_start();
require('connecta.php');
$prod_id1 = $_GET['prod_id'];
$newquantity = $_GET['newquantity'];
$prod_id = substr($prod_id1,0,2);
$category = $_GET['ctg'];
$update_cart = true;
if(!$newquantity)
		{
			echo "<strong><br/>Price is required!<br/></strong>";
			$update_cart = false;
		}
	else if (!is_numeric($newquantity))
		{
			echo "<strong><br/>Price must be numeric!<br/></strong>";
			$update_cart = false;
		}
	else if ((int)$newquantity <= 0)
		{
			echo "<strong><br/>Price must be greater than 0!<br/></strong>";
			$update_cart = false;
		}

 if(isset($_SESSION['brnch']))
 {
	  if($update_cart == true)
		{
	 		$table  = $_SESSION['brnch'] ;
	  		$str = "UPDATE tblproduct SET Product_price='".$newquantity."'WHERE Product_id='".$prod_id."'";
	       $update= mysql_query($str) or die(mysql_error());
		    $rows = mysql_affected_rows();
	    	if ($rows > 0)
				{
					echo '<br/><strong>Price Updated.</strong>';
				}
			else
				{
					echo 'Not updated.';
				}
		}
		unset($_SESSION['brnch']);
	//	require('view_product_info1.php');
	
 }
else
{

    if($update_cart == true)
		{
			$table  = $_SESSION['brnch'] ;
	  		$str = "UPDATE tblproduct SET Product_price='".$newquantity."'WHERE Product_id='".$prod_id."'";
	       $update= mysql_query($str) or die(mysql_error());
		    $rows = mysql_affected_rows();
	    	if ($rows > 0)
				{
					echo '<br/><strong>Price Updated.</strong>';
				}
			else
				{
					echo 'Not updated.';
				}
		}
require('view_product_info.php');
}
?>