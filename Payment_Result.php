<?php

$pmth = $_POST['pmethod'];
require('connecta.php');
@session_start();
if(isset($_SESSION['branch']))	  
		{
			$table = $_SESSION['branch'];
		}
$rows5  = 0;
$cust_id = $_SESSION['custid'];

		if (isset($_SESSION['name']))  
				{
					$cust_id = $_SESSION['custid'];
					$strquery ="select Customer_id,Product_id,Qty,Purchase_date,Total from tbl_cart where Customer_id='".$cust_id."'";
					$result = mysql_query($strquery);
					$rows = mysql_affected_rows();
						
						if( $rows> 0)
							{
								for($x = 0 ; $x < $rows; $x++)
								   {
								      $array_results = mysql_fetch_row($result);
								      $strquery5 ="INSERT INTO tbl_history(Customer_id,Product_id,Qty,Purchase_date,Total,pmethod,Branch_ID) VALUES('".$array_results[0]."','".$array_results[1]."','".$array_results[2]."','".$array_results[3]."','".$array_results[4]."','".$pmth."','".$table."')";
					        		  $result5 = mysql_query($strquery5);
								      $rows5 = mysql_affected_rows();																	
								   }												
							}
						
									if($rows5 > 0)
										{
											$strquery9 ="delete from tbl_cart where Customer_id='".$cust_id."'";
											$result9 = mysql_query($strquery9);
										}
					
				}
					
								
						$strquery9 ="delete from tbl_cart where Customer_id='0'";
						$result9 = mysql_query($strquery9);
mysql_close($serverconnect);
?>

