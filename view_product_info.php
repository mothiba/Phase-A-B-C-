<?php
require('connecta.php');
   $category = $_GET['ctg'];
   $select = "SELECT DISTINCT Cat_ID FROM category WHERE Cat_Name ='".$category."'";
   $query = mysql_query($select) or die(mysql_error());
   $rows = mysql_affected_rows();
   $prod_category=mysql_fetch_array($query);

   $table = $_GET['branch'];
  $strquery = "SELECT stock.Product_id,stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,stock.Product_qty,stock.Product_CostP FROM stock INNER JOIN tblproduct ON tblproduct.Product_id =stock.Product_id WHERE tblproduct.Product_Category='".$prod_category[0]."'";  
 $result = mysql_query($strquery);
//echo  $result;
$rows = mysql_affected_rows();
$qty_counter = 0;
if( $rows> 0)
      {
				echo '<br/>';
				echo '<br/>';
				echo '<table    align="center"  width="900">';
				echo '<tr>';
				echo "<td>Product Name:</td>";
				echo "<td>Quantity</td>";
				echo "<td>Unit Price</td>";
			    //echo "<td>Cost Price</td>";
				echo "<td>Discount</td>";
				echo '</tr>';
				echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';
						for($x = 0 ; $x < $rows; $x++)
							{
								$array_results8 = mysql_fetch_row($result);
								$prod_id = $array_results8[0];
										echo '<tr>';
										echo '<td width="200">'.$array_results8[1].'</td>';
										echo '<td width="200">'.$array_results8[4].'<input type="text" size="8"  id="'.$prod_id.'"/><input type="button" value="Update Qty" onclick=updt("dvresult","'.$prod_id.'","cat") /></td>';                 
										echo '<td>'.$array_results8[2].'</td>'; 
										echo '<td>'.$array_results8[3].'</td>';                                   
										echo '</tr>';	
							           echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';
							}	
															
										echo '</table>';
	}
else
	{
		echo '<strong><center><h1>Category does not have any Items</h1></center></strong>';	
	}
mysql_close($serverconnect);

?>