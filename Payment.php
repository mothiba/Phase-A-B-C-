<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOTHIBA- Payment</title>
<script type="text/javascript">
var httpobj = false;
if (window.XMLHttpRequest) 
{
httpobj = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
httpobj = new ActiveXObject("Microsoft.XMLHTTP");
}
function addtocart(txtdiv,txtprodid,txtqty)
{
if(httpobj)
	{
      var tempqty = document.getElementById(txtqty); 
	  var tempdv = document.getElementById(txtdiv); 
	  httpobj.open("GET",  "qty_updater.php?prod_id="+txtprodid+"&newquantity="+tempqty.value); 
	  httpobj.onreadystatechange = function()
		{
		  if (httpobj.readyState == 4 && httpobj.status == 200)
			{
    			tempdv.innerHTML = httpobj.responseText;
			}
			else
			{
			id.innerHTML = "";
			}
		  }
		httpobj.send(null);
	}
}
function remove_frm(txtdiv,txtprodid)
{
 if(httpobj)
	{
 	var tempdv = document.getElementById(txtdiv); 
	httpobj.open("GET",  "delete_from_cart.php?prod_id="+txtprodid); 
	httpobj.onreadystatechange = function()
		{
		if (httpobj.readyState == 4 && httpobj.status == 200)
			{
				tempdv.innerHTML = httpobj.responseText;
			}
			else
			{
			id.innerHTML = "";
			}
			
		}
		httpobj.send(null);
	}
}
</script>
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
	color: #FF6600;
}
a:active {
	color: #FF0000;
}

</style>
</head>
<body background="images/bgrd_main.jpg">
<table   border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center"><br/><?php  require('buttons.php');   ?><br/>
      &nbsp;<span class="style4"> <br/>
      <?php  require('login1.php');  
	  
	  if(isset($_SESSION['usertype']))
{  ?>
    </span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><div id="divid"><?php
require('view_cart.php');
?> </div></td>
  </tr>
  
</table>
<?php }
else
{
    echo 	'<center>INVALID ENTRY PLEASE LOGIN</center>.<br/>';
	echo 'Hi Guest... '.'<a href=index.php>[Login]</a>';
} require('foooter.php'); ?>
</body>
</html>
