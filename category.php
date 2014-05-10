<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php		@session_start();
$_SESSION['timee'] = date('Y-m-j h:i:s');	
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>GYM|Home</title>
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
<body>
<table width="744"  border="0" align="center" cellpadding="0"  cellspacing="0">
  <tr>
    <td align="center"><br/>
      <?php  include('buttons.php'); 
	          include_once('connecta.php');
	
	
	  ?>
      <span class="style4"><br/><?php   if(isset($_SESSION['usertype']))
{  include('login1.php');  ?>
      </span>
    
      <br/>
    <br/></td>
  </tr>
  <tr>
    <td width="136" align="center" valign="top"><img src="imagesss/categories.gif" alt="Categories" width="103" height="23" /><br/><?php require('links.php');?>
    </td>
    </tr> 
     </td>
    <td colspan="2" valign="top"><marquee direction="left">
    <img src="41AlhsZRCuL.jpg" width="100" height="100" alt="shoes" />
    <img src="651991_adidas_F30-8_indoor_white_gold_zm.jpg" width="100" height="100" /> <br/></marquee>
	<marquee direction="right">
	<img src="adia_2007_04_26_DSC_1120_transparent_glinter_soft_drink_can_with_metal_top_cambodia_siem_reap_cringel.com.jpg" width="100" height="100" /> 
    <img src="download.jpg" width="80" height="80" />
    <img src="huge.66.333508.JPG" width="100" height="100" />
    <img src="images (1).jpg" width="100" height="100" /><br/>
	 </marquee>	 
	 <marquee direction="left">
	  <img src="Alpha-SL-Jacket-Gold-Medal.png" width="100" height="100" />
      <img src="SCOTTEVEST.JPG" width="100" height="100" />
	<br/>
	</marquee>	
    <marquee direction="right">
	 <img src="New_AD_athletic_clothing_sport_clothing_size_M_-3XL.jpg" width="100" height="100" /> 
     <img src="fremont-running-shirt.jpg" width="100" height="100" />
     <img src="Visio-Short-Black.png" width="100" height="100" />
     <img src="sidi_tn-300x300.jpg" width="100" height="100" /><br/>
	 </marquee>	 
	 <marquee direction="left">
	 <img src="cocaine_softdrink.jpg" width="100" height="100" />
     <img src="images.jpg" width="100" height="100" /> <br/>
	</marquee>
	
	<marquee direction="right">
	  <img src="images (2).jpg" width="100" height="100" />
      <img src="nike-air-zoom-control-indoor-shoes.jpg" width="100" height="100" />
      <img src="soft_drink.jpg" width="100" height="100" />
      <img src="G04357_adidas_adicore_indoor_shoes_black_zm.jpg" width="100" height="100" />
    </marquee>	 </td>
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
