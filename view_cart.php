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
require('connecta.php');
    if (isset($_SESSION['name'])  && $_SESSION['name'] != "Manager") //Registered customer
		{
			$total2 = 0;	
			$qty2 = 0;
			//$strquery8 ="SELECT  p.Product_Name, p.Product_price, p.Discount, ct.Qty, ct.Total, p. FROM $table p inner join tbl_cart ct on p.Product_id = ct.Product_id where ct.Customer_id='".$cust_id."'";
			$strquery8 ="SELECT stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,ct.Qty, ct.Total,tblproduct.Product_id 
            	 FROM tblproduct   INNER JOIN  tbl_cart ct on tblproduct.Product_id = ct.Product_id INNER JOIN stock on  tblproduct.Product_id =stock.Product_id
				 WHERE ct.Customer_id='".$cust_id."'";
			$result8 = mysql_query($strquery8);						
			$rows8 = mysql_affected_rows();
				if( $rows8 > 0)
					{						
						echo '<br/>';
						echo '<table  border="1"  align="center" width="800">';
						echo '<tr>';
						echo "<td colspan=5 align=center><strong>Your Shopping Cart Items:</strong> <img src='imgpayment/mastercard.gif'/> <img src='imgpayment/eBucks_logo.gif'/>  <img src='imgpayment/Ukash_checkout.jpg'/>  <img src='imgpayment/visa.gif'/> </td>";
						echo '</tr>';
						echo '<tr>';
						//echo "<td></td>";
						echo "<td width=200 >Product Name:</td>";
						echo "<td width=200>Quantity:</td>";
						echo "<td width=200>Unit Price:</td>";
						echo "<td width=200>Sub-Total:</td>";
						echo '</tr>';
				
								for($x = 0 ; $x < $rows8; $x++)
									{
										$array_results8 = mysql_fetch_row($result8);
										$qty2 = (int)$array_results8[3];
										$prod_id = $array_results8[6];
	
											echo '<tr>';
											//echo "<td><img src='$array_results8[0]'  width='80' height='80'/></td>";
											echo "<td width='200'>$array_results8[0]</td>";
											echo '<td width=300>'.$qty2.'  <input type="text" size="2"  id="'.$prod_id.'" />
											<input type="button" value="Update qty" onclick=addtocart("'.divid.'","'.$prod_id.'","'.$prod_id.'")  />   
											<input type="button" value="Remove" onclick=remove_frm("'.divid.'","'.$prod_id.'")  /> </td>';
											echo "<td width=150>$array_results8[1]</td>";
											echo "<td width=150>$array_results8[4]</td>";
											echo '</tr>';
											$total2 = $total2 +(int)$array_results8[4];
								    }	
								
											$net_tot = 	$total2 + ($total2 * 0.14);
											echo '<tr>';
										    echo  "<td colspan=5 align=center>Total(Incl. VAT) -  R$net_tot <br/>  <form action='Maize-Moolar_Receipt.php' method=post>
											      Payment Method: <select name='pmethod'>
        										    <option value=Master Card selected=selected>MasterCard</option>
                                                    <option value=eBucks>eBucks</option>
                                                    <option value=Ukash>Ukash</option>
                                                    <option value=VISA>VISA</option>
     											   </select>    
	  								     		   <input type=submit value=Pay /> </form>  <a href='category.php'>Keep Shopping</a></td>";
											
	                                        echo '</td>';	 
											echo '</tr>';
											echo '</table>';
								
						       }
						else
						        {
					                     	echo "<br/> <br/> <br/> <br/> <strong>You have no items in cart.<br/> <a href='category.php'>Keep Shopping</a></strong>";
						        }
						          exit;
		                	}
					 
					$total2 = 0;	
					$qty2 = 0;
					$strquery8 ="SELECT   p.Product_Name, p.Product_price, p.Discount, ct.Qty, ct.Total, p.Product_id FROM tblproduct p inner join  tbl_cart ct on p.Product_id = ct.Product_id WHERE ct.Purchase_date='".$_SESSION['timee']."'";
					$result8 = mysql_query($strquery8);						
					$rows8 = mysql_affected_rows();
						if( $rows8 > 0)
							{
						
								echo '<br/>';
								echo '<table  border="1"  align="left" >';
								echo '<tr>';
								echo "<td colspan=5><strong>Your Shopping Cart Items:</strong> 
								<img src='imgpayment/mastercard.gif'/> 
								<img src='imgpayment/eBucks_logo.gif'/>  
								<img src='imgpayment/Ukash_checkout.jpg'/>  
								<img src='imgpayment/visa.gif'/> </td>";
								echo '</tr>';
								echo '<tr>';
								//echo "<td></td>";
								echo "<td>Product Name:</td>";
								echo "<td>Quantity:</td>";
								echo "<td>Unit Price:</td>";
								echo "<td>Sub-Total:</td>";
								echo '</tr>';
									
							for($x = 0 ; $x < $rows8; $x++)
								{
									$array_results8 = mysql_fetch_row($result8);
									$qty2 = (int)$array_results8[3];
									$prod_id = $array_results8[5];	

											echo '<tr>';
											//echo "<td><img src='$array_results8[0]'  width='80' height='80'/></td>";
											echo "<td width='200'>$array_results8[0]</td>";
											echo '<td >'.$qty2.'  <input type="text" size="2"  id="'.$prod_id.'" />  <br/>  
											                      <input type="button" value="Update qty" onclick=addtocart("'.divid.'","'.$prod_id.'","'.$prod_id.'")  />  <br/> 
											                      <input type="button"value="Remove" onclick=remove_frm("'.divid.'","'.$prod_id.'")  /> </td>';
											echo "<td >$array_results8[1]</td>";
											echo "<td >$array_results8[4]</td>";
											echo '</tr>';
											
									$total2 = $total2 +(int)$array_results8[4];
								}		
									$net_tot = 	$total2 + ($total2 * 0.14);
											echo '<tr>';
											echo "<td colspan=5>Total (Incl. VAT) R$net_tot  <br/>You must be registered to purchase at Maize-Moolar.<br/> <a href='Clothing.php'>Keep Shopping</a></td>";
											echo '</tr>';							
						                    echo '</table>';		
						}
						else
								{
									echo "<br/> <br/> <br/> <br/> <strong>You have no items in cart.<br/> <a href='Clothing.php'>Keep Shopping</a></strong>";
								}
mysql_close($serverconnect);



?>