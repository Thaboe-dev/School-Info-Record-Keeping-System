<?php
require_once 'fpdf.php';
require_once 'C:\xampp\htdocs\student_enrollment\admin\db_con.php';
$sql = "SELECT * FROM fees_records WHERE `status`='owing'";
$data = mysqli_query($db_con, $sql);




$pdf = new FPDF('p', 'mm', 'a4');
$pdf->SetFont('arial', 'b', '14');
$pdf->AddPage();
$pdf->Cell('40', '10', 'Name', '1', '0', 'C');
$pdf->Cell('35', '10', 'Class', '1', '0', 'C');
$pdf->Cell('35', '10', 'Amount Paid', '1', '0', 'C');
$pdf->Cell('38', '10', 'Amount Owing', '1', '1', 'C');


$pdf->SetFont('arial', '', '12');
while ($row = mysqli_fetch_assoc($data)) {

    $pdf->Cell('40', '10', $row['name'], '1', '0', 'C');
    $pdf->Cell('35', '10', $row['class'], '1', '0', 'C');
    $pdf->Cell('35', '10', $row['amount paid($)'], '1', '0', 'C');
    $pdf->Cell('38', '10', $row['amount owing($)'], '1', '1', 'C');
}

$pdf->Output();
?>

<a href="admin\debtors.php">Go back</a>