<?php
$add_to_cart = true;
@session_start();
$regstat = 0; 
 	if (isset($_SESSION['custid']))
	   {
	      $cust_id = $_SESSION['custid'];
	      $regstat = 1;
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
$quantity = $_GET['quantity'];
$purchasedt = $_SESSION['timee'];
$continue = true;
     if(!$quantity)
		{
			echo "<strong>Quantity is required!<br/></strong>";
			$add_to_cart = false;
		}
	else if (!is_numeric($quantity))
		{
			echo "<strong>Quantity must be numeric!<br/></strong>";
			$add_to_cart = false;
		}
    if($continue == false)
       {
           exit;
      }
require('connecta.php');
		if($cust_id == 0) 
			{
				$strquery11 = "select Product_id,Customer_id from tbl_cart where Purchase_date='".$_SESSION['timee']."' AND Product_id='".$prod_id."'";
			}
		else
			{
				$strquery11 = "select Product_id,Customer_id from tbl_cart where Product_id='".$prod_id."' AND Customer_id='".$cust_id."'";
			}
$result11 = mysql_query($strquery11);
$rows11 = mysql_affected_rows();
		if($rows11 > 0)
			{
				echo 'CAUTION - Product already on cart.<br/>';
                $add_to_cart = false;
			}
			 $table = $_SESSION['branch'];
$strquery = "select Product_price,Product_qty,Discount from tblproduct where Product_id='".$prod_id."'";
$result = mysql_query($strquery);
$rows = mysql_affected_rows();
$qtyleft = 0;
$sum = 0;  ///total
          if($rows > 0)
				{
					$array_results = mysql_fetch_row($result);
					$tempsum = ((int)$array_results[0] * (int)$quantity); 
					$sum = $tempsum - ((int)$array_results[2] * (int)$quantity);
					$qtyleft = (int)$array_results[1] - (int)$quantity;
	        	if($qtyleft < 0)
	               {
	                 echo '<strong>Insufficient Item Stock.</strong>.<br/>';
					 echo "<strong> $array_results[1] items remaining</strong>";
	                 $add_to_cart = false;
				   }
	
				}
			if ($add_to_cart == true)
                 {
					$strquery4 = "INSERT INTO tbl_cart(Customer_id,Product_id,Qty,Purchase_date,Total,Reg_Stat) values('".$cust_id."','".$prod_id."','".$quantity."','".$purchasedt."','".$sum."','".$regstat."')";
                    $results4 = mysql_query($strquery4) or die(mysql_error());
                    $rows4 = mysql_affected_rows();
             if($rows4 > 0)
	              {
                     	$str = "UPDATE tblproduct SET Product_qty='".$qtyleft."' WHERE Product_id='".$prod_id."'";
	                    $results = mysql_query($str);
	              }
                }
$tempdate = "";
require('view_temp_cart.php');					
mysql_close($serverconnect);
?>