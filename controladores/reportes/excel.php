<?php

require_once '../../vendor/autoload.php';

require '../../modelos/PersonaModel.php';

$usuarios = PersonaModel::mostrarUsuario();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('USUARIOS');

$spreadsheet->getActiveSheet()->mergeCells("A2:F2")->setCellValue('A2', 'LISTADO DE USUARIOS')
    ->getStyle('A2')
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

$styleArray = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => 'FFFF0000'],
        ],
    ],
];

// TAMAÑO COLUMNAS //
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(18);

// CABECERA //
$contador = 4;

$spreadsheet->getActiveSheet()->setCellValue('A' . $contador, '#')
    ->getStyle('A' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A' . $contador)->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->setCellValue('B' . $contador, 'NOMBRES')
    ->getStyle('B' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('B' . $contador)->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->setCellValue('C' . $contador, 'PATERNO')
    ->getStyle('C' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('C' . $contador)->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->setCellValue('D' . $contador, 'MATERNO')
    ->getStyle('D' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('D' . $contador)->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->setCellValue('E' . $contador, 'CORREO')
    ->getStyle('E' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('E' . $contador)->applyFromArray($styleArray);

$spreadsheet->getActiveSheet()->setCellValue('F' . $contador, 'ESTADO')
    ->getStyle('F' . $contador)
    ->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('F' . $contador)->applyFromArray($styleArray);


// IMPRESIÓN DE DATOS //
$contador++;

foreach ($usuarios as $key => $usuario) {
    $spreadsheet->getActiveSheet()->setCellValue('A' . $contador, ($key + 1))
        ->getStyle('A' . $contador)
        ->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('B' . $contador, $usuario['nombre']);
    $sheet->getStyle('B' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('C' . $contador, $usuario['paterno']);
    $sheet->getStyle('C' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('D' . $contador, $usuario['materno']);
    $sheet->getStyle('D' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('E' . $contador, $usuario['usuario']);
    $sheet->getStyle('E' . $contador)->applyFromArray($styleArray);

    $spreadsheet->getActiveSheet()->setCellValue('F' . $contador, $usuario['estado'])
        ->getStyle('F' . $contador)
        ->getAlignment()
        ->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('F' . $contador)->applyFromArray($styleArray);

    $contador++;
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename="reportes.xlsx"');
$writer->save('php://output');
