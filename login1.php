
<?php
@session_start();

    if (isset($_SESSION['name']))

         echo 'Hello,'.' your current client is '.$_SESSION['name'].' '. '<a href=prompt1.php>[Logout]</a>';
    else 
	//if(isset($_SESSION['User']))
		{
			echo 'Hi Guest... '.'<a href=userlogin.php>[Login]</a>'.' OR ' . '<a href=register.php>[Register]</a>'.'.';
		}
?>

