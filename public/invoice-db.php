<?php
require('fpdf181/fpdf.php');

//db connection
require_once("../resources/config.php"); 



//get invoices data
$query = mysqli_query($connection,"select * from list
	where
	invoiceID = '".$_GET['id']."'");
$invoice = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Invoice',0,0);
//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(25	,5,'Invoice ID',0,0);
$pdf->Cell(34	,5,$invoice['invoiceID'],0,1);//end of line

$pdf->Cell(25	,5,'Quantity #',0,0);
$pdf->Cell(34	,5,$invoice['item_qty'],0,1);
$pdf->Cell(25	,5,'Sub Total #',0,0);
$pdf->Cell(34	,5,$invoice['item_total'],0,1);
//end of line

//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Invoice ID',1,0);

$pdf->Cell(25	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);
$query = mysqli_query($connection,"select * from list where invoiceID = '".$invoice['invoiceID']."'");
$tax = 0; //total tax
$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['invoiceID'],1,0);
	//add thousand separator using number_format function
	

	$pdf->Cell(25	,5,number_format($item['item_total']),1,1,'R');//end of line
	//accumulate tax and amount

}





//summary


























$pdf->Output();
?>