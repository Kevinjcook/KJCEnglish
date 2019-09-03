<?php
// Include PHPExcel_IOFactory
include 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$inputFileName = 'namez.xls';

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$sheetData = $objPHPExcel->getActiveSheet();
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 

echo '<table>';
//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++){ 
    //  Read a row of data into an array
    echo '<tr>';
    for ($col = 0; $col <= $highestColumnIndex; ++$col) {
        echo '<td>' . $sheetData->getCellByColumnAndRow($col, $row)->getValue() . '</td>';
    }

    echo '</tr>';
    }
echo '</table>';

   // $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
   //                                 NULL,
   //                                 TRUE,
   //                                 FALSE);
    //  Insert row data array into database he

 
?>