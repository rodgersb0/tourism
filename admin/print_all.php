<?php
require('fpdf/fpdf.php');
include('config1.php');

$pdf = new FPDF('P','mm','A4');
///var_dump(get_class_methods($pdf));

$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Reserved Packages',1,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(45,6,'Client name',1);
$pdf->Cell(30,6,'Client number',1);
$pdf->Cell(60,6,'Package Name',1);
$pdf->Cell(30,6,'From Date',1);
$pdf->Cell(30,6,'To Date',1);

$query="SELECT tblusers.FullName as CLIENT_NAME,tblusers.MobileNumber as CLIENT_NUMBER,
tbltourpackages.PackageName as PACKAGE_NAME,tblbooking.FromDate as FROM_DATE,tblbooking.ToDate as TO_DATE,
tblbooking.status as STATUS from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId WHERE status=0";
$result = mysqli_query($mysqli, $query);
//$no=0;
while($row = mysqli_fetch_array($result)){
	//$no=$no+1;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','',12);
	//$pdf->Cell(10,8,$no,1);
	$pdf->Cell(45,10,$row['CLIENT_NAME'],1);
	$pdf->Cell(30,10,$row['CLIENT_NUMBER'],1);
	$pdf->Cell(60,10,$row['PACKAGE_NAME'],1);
	$pdf->Cell(30,10,$row['FROM_DATE'],1);
	$pdf->Cell(30,10,$row['TO_DATE'],1);
}
$pdf->Output();
?>