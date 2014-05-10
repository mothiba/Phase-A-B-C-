<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOTHIBA</title>
</head>

<body>


<table width="871" height="135"  border="1" align="center" cellpadding="5" cellspacing="5">
			 <tr>
			 <td><img src='$array_results[4]'  width='80' height='80'/></td>"
			<td>Product Name: $array_results[1]</td>
			<td>Price:R$array_results[2]</td>
			<td>Discount:R$array_results[3]</td>
			<td>Quantity:  <input type="text" size="2"  id="'.$prod_id.'" /></td>';
			<td><input type="button" value="Add to cart" onclick=addtocart("'.divid.'","'.$prod_id.'","'.$prod_id.'","'.$customerid.'")  /></td>
			</tr>
		<tr>
			<td colspan="6"><hr/></td>
  </tr>
</table>


</body>
</html>
