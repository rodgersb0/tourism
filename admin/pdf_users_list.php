<?php
require('fpdf/fpdf.php');
include('includes/config_mysqli.php');

$pdf = new FPDF('P','mm','A4');
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(135,10,'Registered clients',1,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,6,'Client name',1);
$pdf->Cell(30,6,'Client number',1);
$pdf->Cell(60,6,'Client email address',1);

$query="SELECT FullName as CLIENT_NAME, MobileNumber as CLIENT_NUMBER, EmailId as CLIENT_EMAIL_ADDRESS FROM tblusers";
$result = mysqli_query($mysqli, $query);
//$no=0;
while($row = mysqli_fetch_array($result)){
	//$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(10,8,$no,1);
	$pdf->Cell(45,10,$row['CLIENT_NAME'],1);
	$pdf->Cell(30,10,$row['CLIENT_NUMBER'],1);
	$pdf->Cell(60,10,$row['CLIENT_EMAIL_ADDRESS'],1);
	}
$pdf->Output();
?>