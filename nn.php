<?php
@$serverconnect = mysql_connect('localhost','marcs','marcs') or die (mysql_error());
@$dbconnect = mysql_select_db('a782041',$serverconnect) or die (mysql_error());
 
$handle = @fopen('a7820414_shop.sql',"r");
	if ($handle)
	 {
		while (!feof($handle))
		 {
			$query.= fgets($handle,filesize($handle));
			if (substr(rtrim( filesize($query),-1) == ';')) 
			{
			  $add = mysql_query($query) or  die(mysql_error());
			  $query = '';
			}
		}
	 }
 
fclose($handle);
 
mysql_close($serverconnect);
?>