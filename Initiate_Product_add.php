 <?php
$prod_name = $_POST['prod_name'];
$prod_quantity = $_POST['prod_quantity'];
$prod_category = $_POST['prod_category'];
$prod_price = $_POST['prod_price'];
$product_discount = $_POST['product_discount'];
$continue = true;
	 
		 
if(!$prod_name)
	{
		echo 'Product name is required.'.'<br/>'.'<br/>';
		$continue = false;
	}
if(!$prod_quantity)
	{
		echo 'Product quantity is required.'.'<br/>'.'<br/>';
		$continue = false;
	}
if(!$prod_price)
	{
		echo 'Product price is required.'.'<br/>'.'<br/>';
		$continue = false;
	}
if(!$product_discount)
	{
		echo 'Product discount is required.'.'<br/>'.'<br/>';
		$continue = false;
	}
if ($continue == false)
	{
		exit;
	}
require('connecta.php');
$strquery1 = "INSERT INTO tblproduct(Product_Name,Product_qty,Product_Category,Product_price,Discount) values('".$prod_name."','".$prod_quantity."','".$prod_category."','".$prod_price."','".$product_discount."')";
$results1 = mysql_query($strquery1)or die(mysql_error());
$rows1 = mysql_affected_rows();
if($rows1 > 0)
	{
		echo 'Product Stored Successfully.';
		echo '<a href="Product_add.php">Next Product</a>';
	}
else
	{
		echo 'Product could not be stored.';
	}
echo '</strong>';
mysql_close($serverconnect);
?>