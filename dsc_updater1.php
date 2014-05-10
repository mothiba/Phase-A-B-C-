 <?php
$prod_id1 = $_GET['prod_id'];
$newquantity = $_GET['newquantity'];
$prod_id = substr($prod_id1,0,2);
echo $table = $_GET['ctg'];
 exit('im here');
$update_cart = true;
if(!$newquantity)
	{
		echo "<strong><br/>Discount is required!<br/></strong>";
		$update_cart = false;
	}
else if (!is_numeric($newquantity))
	{
		echo "<strong><br/>Discount must be numeric!<br/></strong>";
		$update_cart = false;
	}
else if ((int)$newquantity <= 0)
	{
		echo "<strong><br/>Discount must be greater than 0!<br/></strong>";
		$update_cart = false;
	}
require('connecta.php');
if($update_cart == true)
	{
		$str = "UPDATE   SET Discount='".$newquantity."'WHERE Product_id='".$prod_id."'";
		$results = mysql_query($str)or die(mysql_error());
		$rows = mysql_affected_rows();
	  if ($rows > 0)
			{
				echo '<br/><strong>Discount Updated.</strong>';
			}
	  else
			{
				echo 'Not updated.';
			}

	}
require('view_product_info.php');
?>