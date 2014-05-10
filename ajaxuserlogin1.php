<?php
@session_start();
$username = $_GET['username'];
$userpassword = $_GET['phonenumber'];
		if (!$username || !$userpassword)
			{
				echo 'Username AND Password is required to login...';
				exit;
			}

$username = $_GET['username'];
$userpassword = $_GET['phonenumber'];
		if (!$username || !$userpassword)
			{
				echo 'PLEASE ENTER Username AND Password...';
				exit;
			}


 
//$strquery(
require('connecta.php');
$strquery ="SELECT* FROM roles WHERE Pasword='".trim($userpassword)."' AND Username='".trim($username)."'";
$result = mysql_query($strquery) or die(mysql_error());
$rows =mysql_affected_rows();
     if($rows > 0)
{

				$array_results = mysql_fetch_row($result);
				 $_SESSION['name']=$username;
		
				if($array_results[3] =="Manager")
					{		
						 
						$_SESSION['usertype'] = $array_results[3];
					    $_SESSION['branch'] = $array_results[4];
						
						echo 'Hello, '.$_SESSION['name'].'.  from  '.'  '.$_SESSION['branch'].'<br/>';
						echo 'Login successful.'.'<a href=Admin.php>Continue</a>';
						mysql_close($serverconnect);
						exit;
		           }
				   else 
				   
				     if($array_results[3] =="Sales")
						 {
							$array_results = mysql_fetch_row($result);
							$_SESSION['usertype'] = $array_results[3];
							$_SESSION['branch'] = $array_results[4];
							echo 'Hello, '.$_SESSION['name'].'.  from  '.'  '.$_SESSION['branch'].'<br/>';
							echo 'Login successful.'.'<a href=category.php>Continue</a>';
		
						}
					else
						{
							echo 'Could not log in.Please try again '.'.'.'<br/>';
						 
						}
						}else{
							echo 'Could not log in.Please try again '.'.'.'<br/>';
						 
						}

						
			
?>