<?php
@session_start();
require('connecta.php');
$category = $_GET['ctg'];
$table = $_GET['branch'];
if(isset($_SESSION['brnch']))
 {
	unset($_SESSION['brnch']); 
	$_SESSION['brnch'] =$table;
 }
 else
 {
	$_SESSION['brnch'] = $table;  
 }
 	$select = "SELECT DISTINCT Cat_ID FROM category WHERE Cat_Name ='".$category."'";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	$prod_category=mysql_fetch_array($query);
	$strquery="SELECT tblproduct.Product_id,stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,tblproduct.Product_qty 
            	 FROM tblproduct  INNER JOIN stock on  tblproduct.Product_id =stock.Product_id 
				 WHERE tblproduct.Product_Category='".$prod_category[0]."' AND tblproduct.Branch_ID=(SELECT ID FROM branches WHERE Branch_Name='".$table."')";
  //" SELECT stock.Product_id,stock.Product_Name,tblproduct.Product_price,tblproduct.Discount,stock.Product_qty,stock.Product_CostP 
			//FROM tblproduct INNER JOIN stock ON  stock.Product_id=tblproduct.Product_id
 			//WHERE tblproduct.Product_Category='".$prod_category[0]." AND tblproduct.Branch_ID=(SELECT ID FROM branches WHERE Branch_Name='".$table."')'";
$result = mysql_query($strquery);
$rows = mysql_affected_rows();
$qty_counter = 0;
if( $rows > 0)
      {
			echo '<br/>';
			echo '<br/>';
			echo '<table    align="center"  width="900">';
			echo '<tr>';
			//echo "<td></td>";
			echo "<td>Product Name:</td>";
			echo "<td>Quantity</td>";
			echo "<td>Unit Price</td>";
			echo "<td>Discount</td>";
			echo '</tr>';
			echo '<td colspan="6"><hr  color="#6699CC" style="border:dotted"/></td>';
					for($x = 0 ; $x < $rows; $x++)
						{
					    	$array_results8 = mysql_fetch_row($result);
							$prod_id = $array_results8[0];
									echo '<tr>';
									//echo "<td><img src='$array_results8[4]'  width='80' height='80'/></td>";
									echo '<td width="200">'.$array_results8[1].'</td>';
									echo '<td width="200">'.$array_results8[4].' <input type="text" size="2"  id="'.$prod_id.'" /><input type="button" value="Update Qty" onclick=updt("dvresult","'.$prod_id.'","cat")  /> </td>';                 
									echo '<td >'.$array_results8[2].' <input type="text" size="2"  id="'.$prod_id.'p" /><input type="button"value="Update Price" onclick=upun("dvresult","'.$prod_id.'p","cat")  />  </td>';                                   
									 echo '<td >'.$array_results8[3].' <input type="text" size="2"  id="'.$prod_id.'z" /><input type="button" value="Update Discount" onclick=dscup("dvresult","'.$prod_id.'z","cat")  /></td>';                                    
									 echo '</tr>';
									 echo '<td colspan="4"><hr  color="#6699CC" style="border:dotted"/></td>';	
						}	
											
									echo '</table>';
}
else
	{
		echo '<strong><center><h1>Category does not have any Items</h1></center></strong>';	
	}
mysql_close($serverconnect);

?>