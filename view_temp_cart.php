<?php
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
$table =  $_SESSION['branch'];
require('connecta.php');

		if (isset($_SESSION['name'])) //Registered customer
		{
		
			$total2 = 0;	
					$qty2 = 0;
				//	$strquery8 ="SELECT p.Product_Name, p.Product_price, p.Discount, ct.Qty, ct.Total FROM tblproduct p inner join  tbl_cart ct on p.Product_id = ct.Product_id where ct.Customer_id='".$cust_id."'";         
					$strquery8 ="SELECT stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,ct.Qty, ct.Total,tblproduct.Product_id 
            	 FROM tblproduct   INNER JOIN  tbl_cart ct on tblproduct.Product_id = ct.Product_id INNER JOIN stock on  tblproduct.Product_id =stock.Product_id
				 WHERE ct.Customer_id='".$cust_id."'";
					$result8 = mysql_query($strquery8);
					$rows8 = mysql_affected_rows();
						if( $rows8 > 0)
						 {						
							echo '<table  align="right" hspace="-100">';
							echo '<tr>';
							echo '<td colspan=4 align="center"><strong>Your Shopping Cart Items:</strong></td>';
							echo '</tr>';
							echo '<tr>';
							echo "<td>Name</td>";
							echo "<td>Price(R)</td>";
							echo "<td>Quantity</td>";
							echo '<td></td><td></td>';
							echo '</tr>';
					        echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';
								for($x = 0 ; $x < $rows8; $x++)
									{
										$array_results8 = mysql_fetch_row($result8);
										$qty2 = (int)$array_results8[3];	
										$prod_id=$array_results8[5];
											echo '<tr>';
											echo "<td width='200'>$array_results8[0]</td>";
											echo "<td width='150'>$array_results8[1]</td>";
											echo "<td width='50'>$qty2</td>";
											echo '</tr>';											
											$total2 = $total2 +(int)$array_results8[4];
											echo '<td align="center"><input type="button" value="Update qty" onclick=addtocart1("'.divid.'","'.$prod_id.'","'.$prod_id.'")  /></td>';   
											echo '<td	<input type="button" value="Remove" onclick=remove_frm("'.divid.'","'.$prod_id.'")  /> </td>';                                                           
											echo '</tr>';
											echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';
									}			
											echo '<tr>';
											echo "<td colspan=4 align=center>Total R$total2 <br/><form action='Payment.php' method=post><input type=submit value=Pay /></form>	</td>";                                   
											echo '</tr>';	
											echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';	
											 echo '<tr>';
																		
											echo '</table>';
								
						   }
						else
						   {
								echo '<br/> <br/> <strong>You have no items in cart. </strong>';
							}
						exit;
			}
					//non-reg customer
					$total2 = 0;	
					$qty2 = 0;
					$strquery8 ="SELECT stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,ct.Qty, ct.Total 
            					 FROM tblproduct   INNER JOIN  tbl_cart ct on tblproduct.Product_id = ct.Product_id INNER JOIN stock on  tblproduct.Product_id =stock.Product_id
								 WHERE ct.Customer_id='".$cust_id."'";                       
					$result8 = mysql_query($strquery8);
						
						$rows8 = mysql_affected_rows();
						if( $rows8 > 0)
						{
						
						echo '<table  border="1"  align="left" >';
						echo '<tr>';
						echo "<td colspan=4><strong>Your Shopping Cart Items:</strong></td>";
						echo '</tr>';
						echo '<tr>';
						echo "<td>Name</td>";
						echo "<td>Price(R)</td>";
						echo "<td>Quantity</td>";
						echo '</tr>';
				
								for($x = 0 ; $x < $rows8; $x++)
								{
								$array_results8 = mysql_fetch_row($result8);
								$qty2 = (int)$array_results8[3];	

											echo '<tr>';
											//echo "<td><img src='$array_results8[0]'  width='40' height='40'/></td>";
											echo "<td width='200'>$array_results8[0]</td>";
											echo "<td width='150'>$array_results8[1]</td>";
											echo "<td width='50'>$qty2</td>";
											echo '</tr>';
											
											$total2 = $total2 +(int)$array_results8[4];
								}			
											echo '<tr>';
											echo "<td colspan=4 align=center>Total R$total2 <br/><form action='Payment.php' method=post><input type=submit value=Pay /></form>	</td>"; 
											echo '</tr>';
										    echo '<tr>';
											echo '<td colspan="4" align="center"><input type="button" value="Update qty" onclick=addtocart1("'.divid.'","'.$prod_id.'","'.$prod_id.'")  />   
													<input type="button" value="Remove" onclick=remove_frm("'.divid.'","'.$prod_id.'")  /> </td>';                                                           
											echo '</tr>';								
								
						                    echo '</table>';		
						}
						else
						   {
						     echo '<br/> <br/> <strong>You have no items in cart. </strong>';
						   }
						




?>