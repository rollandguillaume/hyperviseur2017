
<?php
require('ressources/php/fpdf181/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->MultiCell(40,10,"robot 2");
$pdf->MultiCell(40,10,"id 2");
$pdf->MultiCell(40,10,"vitesse 25");
$pdf->MultiCell(40,10,"dispo 1");
$pdf->MultiCell(40,10,"charge 20");

if (isset($_POST["truc"])) {
  //si on pouvait mettre dans un form cacher avec java script ca marcherait
  $pdf->MultiCell(40,10,$_POST["truc"]);
}


$pdf->Output("ressources/pdf/compteRendu.pdf", "D");
?>
