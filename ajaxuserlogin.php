<?php
@session_start();
  $username = $_GET['username'];
 
 
		if (!$username)
			{
				echo 'Contact Number  is required to login...';
				exit;
			}
require('connecta.php');
$strquery = "SELECT* FROM tblusers WHERE Contactnumber='".$username."'";
$result = mysql_query($strquery)or die(mysql_error());
$rows = mysql_affected_rows();
			if($rows > 0)
				{

					$array_results = mysql_fetch_array($result);
					$_SESSION['name'] = $array_results[3];
					$_SESSION['custid'] = $array_results[0];
					//$_SESSION['number'] = $array_results[1];
					echo 'Hello, '.$_SESSION['name'].'.'.'<br/>';
					echo 'Login successful.'.'<a href=category.php>Continue</a>';
				}
			else
				{
					echo 'Could not log in.Please try again OR ' . '<a href=register.php>Register</a>'.'.';
					exit;
				}
mysql_close($serverconnect);
?>