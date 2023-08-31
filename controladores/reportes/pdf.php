<?php

require_once '../../vendor/autoload.php';

require '../../modelos/PersonaModel.php';

$usuarios = PersonaModel::mostrarUsuario();

$pdf = new FPDF("P", "mm", [220, 280]);
$pdf->AddPage();

$pdf->SetFont('Arial', 'BU', 16);
$pdf->Cell(0, 7, 'LISTADO DE USUARIOS', 0, 1, 'C');
$pdf->Ln(3);

# CABECERA DE LA TABLA
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(7, 8, '#', 1, 0, 'C');
$pdf->Cell(42, 8, 'NOMBRES', 1, 0, 'C');
$pdf->Cell(38, 8, 'PATERNO', 1, 0, 'C');
$pdf->Cell(38, 8, 'MATERNO', 1, 0, 'C');
$pdf->Cell(50, 8, 'CORREO', 1, 0, 'C');
$pdf->Cell(25, 8, 'ESTADO', 1, 1, 'C');

#impresión de datos 
$pdf->SetFont('Arial', '', 10);

foreach ($usuarios as $key => $usuario) {
    $pdf->Cell(7, 8, ($key + 1), 1, 0, 'C');
    $pdf->Cell(42, 8, utf8_decode($usuario['nombre']), 1, 0, 'L');
    $pdf->Cell(38, 8, utf8_decode($usuario['paterno']), 1, 0, 'L');
    $pdf->Cell(38, 8, utf8_decode($usuario['materno']), 1, 0, 'L');
    $pdf->Cell(50, 8, $usuario['usuario'], 1, 0, 'L');
    $pdf->Cell(25, 8, $usuario['estado'], 1, 1, 'C');
}


$pdf->Output();
