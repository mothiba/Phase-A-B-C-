<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style4 {color: #FF9900}
-->

a:link {
	color: #FF0000;
}
a:visited {
	color: #CC9966;
}
a:hover {
	color: #000;
	font-weight:18px;
}
a:active {
	color: #FF0000;
}

</style>
</head>
<body alink="#FFCC99"  vlink="#FF9966">
<table align="center" width="750" valign="top" cellpadding="3" cellspacing="3" span class="style4" border="1"   bordercolor="#6699CC"  style="border:dotted"font:Verdana, Geneva, sans-serif>
<tr>
<?php
require('connecta.php');
$select= "SELECT Cat_ID,Cat_Name FROM category";
$query = mysql_query($select) or die(mysql_error());
$rows= mysql_affected_rows();
if($rows>0)
     {
		 for($i=0;$i<$rows;$i++)
		     {
				 $links = mysql_fetch_array($query) or die(mysql_error());
				 ?>
                 <td align="center" width="50" bordercolor="#999999"><span class="style4"><a href="selector.php?category=<?php echo $links[0]?>&catname=<?php echo $links[1]?>"><?php echo $links[1];?></a></span>                 
			 	<?php
             }
			 
	 }

mysql_close($serverconnect);
?>
</tr>
</table>
</body>
</html> 