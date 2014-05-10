 !DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>MOTHIBA-Manager</title>
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
function viewdata(divid,txtcat)
{
	if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempcat = document.getElementById(txtcat); 
	httpobj.open("GET",  "view_product_info.php?ctg="+tempcat.value);
	httpobj.onreadystatechange = function()
		{
	   	 if (httpobj.readyState == 4 && httpobj.status == 200)
			{
			   id.innerHTML = httpobj.responseText;
			}
			else
			{
			id.innerHTML = "";
			}
		}
		httpobj.send(null);
	}
}

function updt(divid,txtprodid,txtcat)
{
  if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	httpobj.open("GET",  "prod_qty_up.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
	httpobj.onreadystatechange = function()
		{
	       if (httpobj.readyState == 4 && httpobj.status == 200)
			{
			   id.innerHTML = httpobj.responseText;
			}
			else
			{
			id.innerHTML = "";
			}
			
		}
		httpobj.send(null);
	}
}
function upun(divid,txtprodid,txtcat)
{
	if(httpobj)
	{
    var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	httpobj.open("GET",  "unit_price_up.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
	httpobj.onreadystatechange = function()
		{
		  if (httpobj.readyState == 4 && httpobj.status == 200)
			{
			  id.innerHTML = httpobj.responseText;
			}
			else
			{
			    id.innerHTML = "";
			}
		   }
		httpobj.send(null);
	}
}
function dscup(divid,txtprodid,txtcat)
{
  if(httpobj)
	{
 	var id = document.getElementById(divid); 
	var tempqty = document.getElementById(txtprodid); 
	var tempcat = document.getElementById(txtcat); 
	httpobj.open("GET",  "dsc_updater.php?newquantity="+tempqty.value+"&prod_id="+txtprodid+"&ctg="+tempcat.value);
	httpobj.onreadystatechange = function()
		{
		 if (httpobj.readyState == 4 && httpobj.status == 200)
			{
			   id.innerHTML = httpobj.responseText;
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
 
</head>
<body>
<table width="744" border="0"  cellspacing="0" cellpadding="0" align="center">
  
	<br/>
	
	<strong>Registered Customers' History </strong><br/>
	------------------------------------
	<br/>

	View by Category:
	 <select name="select" id="cat">
	 <?php
	  require('connecta.php');
    $select = "SELECT DISTINCT  Cat_Name FROM category";
    $query = mysql_query($select) or die(mysql_error());
	$rows = mysql_affected_rows();
	
	if($rows>0)
	{
		for($i= 0; $i<$rows;$i++)
		{
			$Branch = mysql_fetch_array($query);
			 ?> <option value="<?php echo  $Branch[0];?>"><?php echo $Branch[0];?></option><?php
		}
	}
	    mysql_close($serverconnect);?>
	  </select>
    <input type="submit" name="Submit" value="GO"  onclick="viewdata('dvresult','cat')"/>

	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div id="dvresult">Select a category to view. </div></td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php  require('foooter.php'); ?>
</body>
</html>
