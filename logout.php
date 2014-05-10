<?php
@session_start();
session_unset();
session_destroy();
echo 'Successfully logged out.'.' '.'<a href=index.php>Continue</a>';
echo '<br/>';
?>