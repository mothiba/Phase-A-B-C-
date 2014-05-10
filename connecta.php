<?php
//@$serverconnect = mysql_connect('localhost','a7820414_root','');
@$serverconnect = mysql_connect('localhost','root','') or die (mysql_error());
@$dbconnect = mysql_select_db('a7820414_shop',$serverconnect) or die (mysql_error());
?>