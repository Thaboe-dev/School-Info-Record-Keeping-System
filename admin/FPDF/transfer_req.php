<?php
require_once 'fpdf.php';
require_once 'C:\xampp\htdocs\student_enrollment\admin\db_con.php';


$id = $_GET['id'];

$sql = "SELECT * FROM fees_records WHERE `id`=$id";
$data = mysqli_query($db_con, $sql);




$pdf = new FPDF('p', 'mm', 'a4');
$pdf->SetFont('arial', 'b', '14');



while ($row = mysqli_fetch_assoc($data)) {


    $pdf->AddPage();
    $pdf->Cell('40', '10', '1. Name of Student:', '0', '0', 'C');
    $pdf->SetFont('arial', '', '12');
    $pdf->Cell('40', '10', $row['name'], '0', '1', 'C');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->Cell('35', '10', '2. Class:', '0', '0', 'C');
    $pdf->SetFont('arial', '', '12');
    $pdf->Cell('35', '10', $row['class'], '0', '1', 'C');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->Cell('38', '10', '4. Fees Status:', '0', '0', 'C');
    $pdf->SetFont('arial', '', '12');
    $pdf->Cell('35', '10', $row['status'], '0', '1', 'C');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->Cell('38', '10', '5. Amount Owing($):', '0', '0', 'C');
    $pdf->SetFont('arial', '', '12');
    $pdf->Cell('35', '10', $row['amount paid($)'], '0', '1', 'C');
    $pdf->SetFont('arial', 'b', '14');
    $pdf->Cell('38', '10', '6. Additional comments, if any:', '0', '0', 'C');
}

$pdf->Output();
?>

<a href="admin\all-student.php">Go back</a>