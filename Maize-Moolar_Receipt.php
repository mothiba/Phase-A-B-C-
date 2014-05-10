<?php
@header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
@header("Content-Disposition: inline; filename='report.xls'");  
@session_start();
$pmth = $_POST['pmethod'];
@session_start();
$idd = $_SESSION['custid'];
$ddd="";
require('connecta.php');
	$strquery = "SELECT ct.Purchase_date,ct.Qty,stock.Product_Name,p.Product_price,ct.Total,cst.Customer_id,cst.Firstname 
	FROM tbl_cart ct INNER JOIN tblproduct p ON ct.Product_id = p.Product_id INNER JOIN tblproduct ON p.Product_id =stock.Product_id
	INNER JOIN tblusers cst ON ct.Customer_id = cst.Customer_id WHERE ct.Customer_id='".$idd."'";

$result = mysql_query($strquery)or die(mysql_error());
$rows = mysql_affected_rows();
$csv_output = '<table width="1050" border="1" cellpadding="1"   bordercolor= "#999999"   border-style:"groove" style="border-style:dotted">
						<tr>
						<th colspan="5"> SMITH GYM REPORTS</hd></tr>
						 <tr>';

$csv_output .= "<tr colspan=5 align=center >Thank You For Shopping at SMITH GYM.</tr>" ;
$csv_output .= "<tr colspan=5 align=center > SMITH GYM - Payment Details</tr>";
 $csv_output .= "<tr colspan=5 align=center > --------------------------------------------------------</tr>" ;
$dt="";
$custid="";
$custname="";
$tot = 0;
	if( $rows> 0)
		{

			for($x = 0 ; $x < $rows; $x++)
				{
					$array_results = mysql_fetch_row($result);
					$ddd =  $array_results[1]." x ".$array_results[2] . " (Unit R$array_results[3]) "." =R$array_results[4]";
					$tot = $tot + (int)$array_results[4];
					$dt=$array_results[0];
					$custid=$array_results[5];
					$custname=$array_results[6];
					$csv_output .= "<tr colspan=5 colspan=5 align=center > $ddd</tr>"; 
					$csv_output .="<tr></tr>";
		}
		
		$net = $tot + ($tot * 0.14);
		$csv_output .= "<tr colspan=5 colspan=5 align=center > --------------------------------------------------------</tr>" ; 
		$csv_output .=  "Total (Incl. VAT) R$net" ;
		$csv_output .=  "<tr>--------------------------------------------------------</tr>" ;
		$csv_output .=  "" ;
	 
		  $csv_output .=  "<tr>Date & Time: $dt</tr>" ;
		  $csv_output .=  "<tr>Customer ID: $custid</tr>" ;
		 $csv_output .=  "<tr>Customer Name: $custname</tr>" ;
		 $csv_output .=  "<tr>Payment Method: $pmth</tr>" ;
		$csv_output .=  "<tr>--------------------------------------------------------</tr>";
		
		$csv_output .=  "<tr></tr>";
		$csv_output .=  "<tr></tr>";
		$csv_output .=  "<tr>Thank You For Shopping at SMITH GYM.</tr>";
		$csv_output .=  "<tr>--------------------------------------------------------</tr>";
		
	    $csv_output .=  "<tr>--------------------------------------------------------</tr>";

} 
$filename = "SMITH GYM-$custname-$dt";
print $csv_output;
require('Payment_Result.php');	
mysql_close($serverconnect);					


//$p = xls_new();
	//if (xls_begin_document($p, "", "") == 0) 
	//	{   
		//    die("Error: " . xls_get_errmsg($p));  
		//}
/*xls_set_info($p, "Thank You For Shopping at SMITH GYM.");
xls_set_info($p, "Creator", "hello.php");
xls_set_info($p, "Author", "Rainer Schaaf");  
xls_set_info($p, "Title", "Hello world (PHP)!");
//xls_begin_page_ext($p, 800, 842, "");
$font = xls_load_font($p, "Helvetica-Bold", "winansi", "");
xls_setfont($p, $font, 24.0);
xls_set_text_pos($p, 50, 700);
xls_show($p," SMITH GYM - Payment Details");
xls_setfont($p, $font, 12.0);
xls_continue_text($p, " ");
xls_continue_text($p, " ");
xls_continue_text($p, "--------------------------------------------------------");
$dt="";
$custid="";
$custname="";
$tot = 0;
	if( $rows> 0)
		{

			for($x = 0 ; $x < $rows; $x++)
				{
					$array_results = mysql_fetch_row($result);
					$ddd =  $array_results[1]." x ".$array_results[2] . " (Unit R$array_results[3]) "." =R$array_results[4]";
					$tot = $tot + (int)$array_results[4];
					$dt=$array_results[0];
					$custid=$array_results[5];
					$custname=$array_results[6];
					xls_continue_text($p, $ddd	);
		}
		
		$net = $tot + ($tot * 0.14);
		xls_continue_text($p, "--------------------------------------------------------");
		xls_continue_text($p, "Total (Incl. VAT) R$net");
		xls_continue_text($p, "--------------------------------------------------------");
		xls_continue_text($p, "");
		xls_continue_text($p, "");
		xls_continue_text($p, "Date & Time: $dt");
		xls_continue_text($p, "Customer ID: $custid");
		xls_continue_text($p, "Customer Name: $custname");
		xls_continue_text($p, "Payment Method: $pmth");
		xls_continue_text($p, "--------------------------------------------------------");
		
		xls_continue_text($p, "");
		xls_continue_text($p, "");
		xls_continue_text($p, "Thank You For Shopping at SMITH GYM.");
		xls_continue_text($p, "--------------------------------------------------------");
		xls_continue_text($p, "");
	    xls_continue_text($p, "--------------------------------------------------------");

}
xls_end_page_ext($p, "");
xls_end_document($p, "");
$buf = xls_get_buffer($p);
$len = strlen($buf);
$filename1 = "SMITH GYM-$custname-$dt";

print $buf;

mysql_close($serverconnect);					
xls_delete($p);	*/				
								
?>