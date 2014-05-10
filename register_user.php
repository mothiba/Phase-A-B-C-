<?php
 
$First_Name = $_GET['First_Name'];
$Last_Name = $_GET['Last_Name'];
$ID_Number = $_GET['ID_Number'];
$E_mail = $_GET['E_mail'];
$Contact_Number = $_GET['Contact_Number'];
$User_Name = $_GET['User_name'];
$User_Password = $_GET['User_Password'];
$gender = $_GET['gender'];
$continue = true;
	echo '<strong>';
	echo 'Summary:'.'<br/>'.'<br/>';
		 
		if(!$First_Name)
			{
				echo 'First Name is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
		if(!$Last_Name)
			{
				echo 'Last Name is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
        if(!$ID_Number)
			{
				echo 'ID Number is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
		else if(!is_numeric($ID_Number) || strlen($ID_Number) != 13)
			{
				echo 'ID Number MUST BE 13 numbers.'.'<br/>'.'<br/>';
				$continue = false;
			}
		else if(substr($ID_Number,6,1) == "5" && $gender != "Male")
			{
				echo 'Please select correct gender.'.'<br/>'.'<br/>';
				$continue = false;
			}
		else if(substr($ID_Number,6,1) == "4" && $gender != "Female")
			{
				echo 'Please select correct gender.'.'<br/>'.'<br/>';
				$continue = false;
			}
		if(!$E_mail)
			{
				echo 'E mail is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
			 
		if(!$User_Name)
			{
				echo 'User Name is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
		if(!$User_Password)
			{
				echo 'Password is required.'.'<br/>'.'<br/>';
				$continue = false;
			}
		if(!$Contact_Number)
			{
				echo 'Contact Number is required'.'<br/>'.'<br/>';
				$continue = false;
			}
		else if(!is_numeric($Contact_Number) || strlen($Contact_Number) != 10)
			{
				echo 'Contact Number MUST BE 10 numbers.'.'<br/>'.'<br/>';
				$continue = false;
			}
		else if (substr($Contact_Number,0,3) != "072" && substr($Contact_Number,0,3) != "082" && substr($Contact_Number,0,3) != "071"  && substr($Contact_Number,0,3) != "073" && substr($Contact_Number,0,3) != "074" && substr($Contact_Number,0,3) != "084" && substr($Contact_Number,0,2)                 != "01"   && substr($Contact_Number,0,3) != "078")
			{			
				echo "Network code '".substr($Contact_Number,0,3)."' is not regonized.";
			}
		if ($continue == false)
			{
				exit;
			}
require('connecta.php');
$strquery2 = "INSERT INTO tbl_login(Username,Userpassword,Idnumber,Usertype) values('".$User_Name."','".$User_Password."','".$ID_Number."','Customer')";
$results2 = mysql_query($strquery2)or die(mysql_error());
$rows2 = mysql_affected_rows();
     if($rows2 <= 0)
		{
			echo 'User Name is already registered.';
			exit;
		}
$strquery1 = "INSERT INTO tblusers(Idnumber,Usertitle,Firstname,Lastname,User_email,Contactnumber, Gender) values('".$ID_Number."','".$user_title."','".$First_Name."','".$Last_Name."','".$E_mail."','".$Contact_Number."','".$gender ."')";
$results1 = mysql_query($strquery1)or die(mysql_error());
$rows1 = mysql_affected_rows();
  		if($rows1 > 0 && $rows2 > 0)
			{
				echo 'Registration Successful.<br/>';
				echo 'Login.'.'<a href=category.php>Continue</a>';
			}
		else
			{
				echo 'Could not register user';
			}
echo '</strong>';
mysql_close($serverconnect);
?>