<?php
@session_start();
unset($_SESSION['name']);
//session_destroy();
echo 'Successfully logged out.'.' '.'<a href=category.php>Continue</a>';
echo '<br/>';
?>