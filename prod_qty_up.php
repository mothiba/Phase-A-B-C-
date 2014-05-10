<?php
@session_start();
require('connecta.php');
 $prod_id = $_GET['prod_id'] ;
$newquantity = $_GET['newquantity'];
$update_cart = true;
   $category = $_GET['ctg'];
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
			
  if(isset($_SESSION['brnch']))
	 { 
	 
	 
	 	  $mm = mysql_query("SELECT Product_qty FROM stock WHERE Product_id='".$prod_id."'") or die(mysql_error());
		$curr  = mysql_fetch_array($mm);  
		$table  = $_SESSION['brnch'] ;
		  $sel = mysql_query("SELECT Product_qty FROM tblproduct  WHERE Product_id='".$prod_id."'") or die(mysql_error());
		 
		  $num = mysql_affected_rows();
		    
		  if($num > 0)
		   	{
				$current = mysql_fetch_array($sel);
				
				   $newqty = ($current[0]+$newquantity);
				  
				
				if($curr[0]>$newquantity)
				{
				         $stock= ($curr[0]-$newquantity);				    
				         $strs =mysql_query( "UPDATE stock SET Product_qty='".$stock."'WHERE Product_id='".$prod_id."'" )or die(mysql_error());
				         $str = mysql_query( "UPDATE tblproduct SET Product_qty='".$newqty."'WHERE Product_id='".$prod_id."'" )or die(mysql_error());
						 $numm = mysql_affected_rows();	
				}
				else
				{
				     echo "<strong>Insufficient Item Stock.<br/>   $curr[0] remaining</strong><br/>";
				     unset($_SESSION['brnch']);
		             //require('view_product_info1.php');
				}
			}
			/*else
			{
				 $newqty = ($current[0]+$newquantity);
				$str =mysql_query( "UPDATE $table SET Product_qty='".$qty."'WHERE Product_id='".$prod_id."'")or die(mysql_error());
				$num1 = mysql_affected_rows();				
			}
			if($num1 >0)			 
				{
						echo '<br/><strong>Quantity Updated.</strong>.<br/>';
						echo 'the new Quantity is'.'   '.$qty;
				}	*/	 
		  if ($numm > 0)
					{
						echo '<br/><strong>Quantity Updated.</strong>.<br/>';
						echo 'the new Quantity is'.'   '.$newqty;
					}
				else
					{
						echo 'Not updated.';
					}	
		  
		  unset($_SESSION['brnch']);
		 // require('view_product_info1.php');
	 }
   else
    { 

		
		
		if($update_cart == true)
			{
			    $s = mysql_query("SELECT Product_qty FROM  stock WHERE Product_id='".$prod_id."'") or die(mysql_error());
		        $rows = mysql_affected_rows();
			  if($rows > 0)
				{
					$current = mysql_fetch_array($s);
					$newqty = ($current[0]+$newquantity); 
					$str = mysql_query("UPDATE stock SET Product_qty='".$newqty."'WHERE Product_id='".$prod_id."'" )or die(mysql_error()); 				  
					$rows = mysql_affected_rows();
					if ($rows > 0)
						{
							echo '<br/><strong>Quantity Updated.</strong>';
						}
					else
						{
							echo 'Not updated.';
						}
				}
			}
		require('view_product_info.php');
 }
?>