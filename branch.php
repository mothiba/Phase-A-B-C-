<?php 
 require('connecta.php');
       $branchname = $_GET['branchname']; 
       $Address  = $_GET['Address']; 
       $tel  = $_GET['tel'] ;
       $fax = $_GET['fax'] ;
       $email  = $_GET['email'];
	if(!$branchname||!$Address||!$tel||!$fax||! $email )
	{
		exit('<strong>Provide info for the above fields</strong>');
	}
	
		 
		if(!$branchname) 
	{
		 echo 'Branch name required' ;
		 exit;
	}
		if(!$Address) 
	{
		 echo' Physical Address required'  ;
		 exit;
	}
		if(!$tel &&!is_numeric($tel)||$tel<10 && !$tel>10) 
	{
		 echo 'Invalid Telephone number' ;
		 exit(' Telephone Number must be 10 digits');
	}
		if(!$fax &&!is_numeric($fax)||$fax<10 && !$fax>10 ) 
	{
		 echo 'Fax Number must be numeric  .<br/>' ;
		 exit('Fax number must be 10 digits');
	}
		if(!$email) 
	{
		 echo 'email required' ;
		 exit;
	}
	$token =strtok($branchname,"  ");
			 	while($token)
					 {
						$branchnames= $token ;
						break;	 
					 }	
					// echo 'here.<br/>';
					// exit($branchnames);
	$select = "INSERT INTO branches(Branch_Name,Address,Tel,Fax,Email) VALUES('".trim($branchnames)."','".trim($Address)."','".trim($tel)."','".trim($fax)."','".trim($email)."')";
	$queery = mysql_query($select);
	$rows = mysql_affected_rows();
/*echo $Branch ="CREATE TABLE $branchnames (Product_id int(11) NOT NULL AUTO_INCREMENT,
														Product_category varchar(100) NOT NULL,
														Product_Name varchar(100) NOT NULL,
														Product_qty varchar(100) NOT NULL,
														Product_Price varchar(100) NOT NULL,
														Product_CostP varchar(100) NOT NULL,
														Discount varchar(100) NOT NULL,PRIMARY KEY (Product_id))";
$results = mysql_query($Branch) or die (mysql_error());
$rows1= mysql_affected_rows();*/
if($rows>0 )
	{
		echo 'Branch Stored Successfully.';
		echo '<a href="AddBranch.php">Next </a>';
	}
else
	{
		echo 'Branch could not be stored.';
	}
echo '</strong>';
mysql_close($serverconnect); 
?>