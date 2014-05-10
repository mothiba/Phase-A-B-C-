 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>GYM|Clothing</title>
<style type="text/css">
<!--
.style4 {color: #FF9900}
-->
a:link 
{
	color: #FF0000;
}
a:visited {
	color: #CC9966;
}
a:hover {
	color: #FF6600;
}
a:active {
	color: #FF0000;
}

</style>

<script type="text/javascript">

var httpobj = false;

if (window.XMLHttpRequest) 
	{
		httpobj = new XMLHttpRequest();
	}
else if (window.ActiveXObject)
	{
		httpobj = new ActiveXObject("Microsoft.XMLHTTP");
	}
function addtocart(txtdiv,txtprodid,txtqty,txtcustid)
{
  if(httpobj)
	{
 
		var temp_prod_id = document.getElementById(txtprodid); 
		var tempqty = document.getElementById(txtqty); 	
		var tempdv = document.getElementById(txtdiv); 	
		httpobj.open("GET",  "temp_cart.php?quantity=" + tempqty.value+"&cust_id="+txtcustid+"&prod_id="+txtprodid); 		
		httpobj.onreadystatechange = function()
			{
			  if (httpobj.readyState == 4 && httpobj.status == 200)
				{
					tempdv.innerHTML = httpobj.responseText;			
				}
			  else
				{
					id.innerHTML = "";
				}			
			}
		httpobj.send(null);
	}
}
function clearer(txtusername,txtpassword)
	{	
		var username = document.getElementById(txtusername); 
		var password = document.getElementById(txtpassword); 
		username.value = "";
		password.value = "";
	}
</script>
</head>
<body>
<table  width="744" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><?php  require('buttons.php');   ?><br/><span class="style4">
      <?php  require('login1.php');    ?>
    </span></td></tr>
    <tr>
     <td width="600" align="center"  valign="top"><img src="imagesss/categories.gif" alt="Categories" width="103" height="23" /><br/>
    <a href="clothing.php" target="_top"><img src="clothing.jpg" width="142" height="47" alt="clothing" longdesc="clothing.jpg" /></a> 
    <a href="bags.php" target="_top"><img src="bags.swf.jpg" width="147" height="48" alt="bags" /></a> 
     <a href="refreshment.php" target="_top"><img src="refreshment.jpg" width="147" height="48" alt="refreshment" /></a> 
     <a href="shoes.php" target="_top"><img src="shoes.jpg" alt="shoes" width="147" height="47" /></a> 
    </td>
  </tr>
  <tr>
    <td valign="top"><h3>- Household - </h3>
      <?php
if(isset($_SESSION['branch']))	  
	{
		$table = $_SESSION['branch'];
	}
	if(isset($_SESSION['usertype']))
	{
		require('connecta.php');
		
		$strquery = "select Product_id,Product_Name,Product_price,Discount  from $table where Product_Category='Refreshment'";
		$result = mysql_query($strquery);
		$rows = mysql_affected_rows();
		$qty_counter = 0;
	
		if( $rows> 0)
		{
			echo '<table  border="0" cellpadding="1" cellspacing="1" align="left" >';
			echo '<tr>';
		//	echo "<td width=80 height=80></td>";
			echo "<td width=200><strong>Product Name:</strong></td>";
			echo "<td width=80><strong>Price:</strong></td>";
			echo "<td width=80><strong>Discount:</strong></td>";
			echo '<td width="70"><strong>Quantity:</strong></td>';
			echo '<td width="80"></td>';
			
			for($x = 0 ; $x < $rows; $x++)
			 {
				$array_results = mysql_fetch_row($result);
				$prod_id = $array_results[0];
				$customerid = 0;		
			
				if (isset($_SESSION['custid']))
					{
						$customerid = $_SESSION['custid'];
					}
				else
					{
						$customerid = 0;
					}		
				
				echo '<tr>';
				//echo "<td><img src='$array_results[4]'  width='80' height='80'/></td>";
				echo "<td width=200>$array_results[1]</td>";
				echo "<td width=80>R$array_results[2]</td>";
				echo "<td width=80>R$array_results[3]</td>";
				echo '<td width="70"><input type="text" size="2"  id="'.$prod_id.'" /></td>';
				echo '<td width="80"><input type="button" value="Add to cart" onclick=addtocart("'.divid.'","'.$prod_id.'","'.$prod_id.'","'.$customerid.'")  /></td>';
				echo '</tr>';
				echo '<tr>';
				echo '<td colspan="6"><hr/></td>';
				echo '</tr>';
				
			}
		echo '</table>';
	}
mysql_close($serverconnect);

?>      </td>
    <td valign="top" align="left" ><br/><div id="divid"><?php  require('view_temp_cart.php');  ?></div></td>
  </tr>
</table>


<?php }
else
	{
		echo '<center>INVALID ENTRY PLEASE LOGIN</center>.<br/>';
		echo 'Hi Guest... '.'<a href=index.php>[Login]</a>';
	} 
require('foooter.php'); ?>
</body>
</html>
