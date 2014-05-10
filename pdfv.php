<?php
$str_prodname = "";
$str_qty = "";
$str_unitprice = "";
$str_subtotal = "";
$str_net_t = "";
$pmth = $_POST['pmethod'];
require('connecta.php');
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
	 
			$total2 = 0;	
			$qty2 = 0;
			$strquery8 ="SELECT p.Picture_path, p.Product_Name, p.Product_price, p.Discount, ct.Qty, ct.Total FROM tblproduct p inner join  tbl_cart ct on  p.Product_id = ct.Product_id where ct.Customer_id='1'";
			$result8 = mysql_query($strquery8)or die(mysql_error());
			$rows8 = mysql_affected_rows();
				for($x = 0 ; $x < $rows8; $x++)
					{
						$array_results8 = mysql_fetch_row($result8);
						$qty2 = (int)$array_results8[4];
						$_SESSION['p_name'] = $array_results8[1];
						$str_prodname = $str_prodname . "$array_results8[1]<br/>";
						$str_qty = str_qty . $array_results8[1] .$array_results8[4]. '<br/>';
						$str_unitprice = $str_unitprice . $array_results8[2] . '<br/>';
						$str_subtotal = $str_subtotal . $array_results8[5] . '<br/>';
						$total2 = $total2 +(int)$array_results8[2] * $qty2;
					}	
			     		$net_tot = 	$total2 + ($total2 * 0.14);
						$str_net_t = $net_tot;  
						$total2 = 0;	
						$qty2 = 0;
						$strquery8 ="SELECT p.Picture_path, p.Product_Name, p.Product_price, p.Discount, ct.Qty, ct.Total FROM tblproduct p inner join tbl_cart ct on p.Product_id = ct.Product_id where ct.Purchase_date='".$_SESSION['timee']."'";
				     	$result8 = mysql_query($strquery8)or die(mysql_error());
						$rows8 = mysql_affected_rows();
						if( $rows8 > 0)
						    {
								for($x = 0 ; $x < $rows8; $x++)
									{
										$array_results8 = mysql_fetch_row($result8);
										$qty2 = (int)$array_results8[4];	
										$str_prodname = $str_prodname . "$array_results8[1]<br/>";
										$str_qty = str_qty . $array_results8[1] .$array_results8[4]. '<br/>';
										$str_unitprice = $str_unitprice . $array_results8[2] . '<br/>';
										$str_subtotal = $str_subtotal . $array_results8[5] . '<br/>';
										$total2 = $total2 +(int)$array_results8[2] * $qty2;
								     }	
								
										$net_tot = 	$total2 + ($total2 * 0.14);
										$str_net_t = $net_tot;	
						    }
mysql_close($serverconnect);
?>