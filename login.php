<?php
@session_start();
$mm='    ';
    if (isset($_SESSION['name']))

         echo 'Hello,'.$mm.'   '.$_SESSION['name'].' from '.$mm.'   '.$_SESSION['branch'] .$mm.'Branch<a href=prompt.php>[Logout]</a>';
    else 
	//if(isset($_SESSION['User']))
		{
			echo 'Hi Guest... '.'<a href=index.php>[Login]</a>'.' OR ' . '<a href=register.php>[Register]</a>'.'.';
		}
?>

