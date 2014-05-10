<?php
require('connecta.php');				  
		 	  $name =$_GET['user'] ;
			  $pass = $_GET['pass'] ;
			  $Role  = $_GET['role'] ;
		      $branch = $_GET['branch'] ;
			// $pass = $_GET['pass'] ;
			if( !$name||! $pass||!$Role||!$branch)
			{
					echo '<center><strong>enter info to all fields</strong></center>';   
			}
			else
				{
						
				         $in = "INSERT INTO roles  VALUES(Null,'".trim($name)."','".trim($pass)."','".trim($Role)."','".trim($branch)."')";
					     $add=mysql_query($in)or die(mysql_error()) ;
					     $rows = mysql_affected_rows();
						if($rows>0)
							{
								echo '<center><strong>user has been added successfully...</strong></center>';	
							}
						else 
							{
								echo '<center><strong>user was not added successfully...</strong></center>';
							}
			 }
				/*  $result = mysql_query("SHOW  COLUMNS FROM roles");
					$i = 0;
					if (mysql_num_rows($result) > 0) 
					{
					  while ($row = mysql_fetch_array($result))
						{
							echo $csv_output .= $row[0].'<br/>';
							$i++;
						}
					exit;	$csv_output .= '</tr>';
					}*/
			 // exit($branch);
			// user="+user.value+"pass="+pass.value+"role="+role.value+"branch"+branch.value 				 
			// echo   $name.'<br/>'.$names.' <br/>'.$pass.' <br/>'.$Role.'<br/> '.$branch; 
				// Role_ID	Username	Pasword	 Roletype	Branch 
?>