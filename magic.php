<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';
session_start();

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$link = mysqli_connect('localhost','mysql','mysql','id-base');
$connect = new PDO("mysql:host=localhost;dbname=id-base", "mysql", "mysql");


$query = "SELECT * FROM `user-data` ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();


$data_temp = mysqli_query($link, 'SELECT * FROM `admin` WHERE 1');
$data = mysqli_fetch_array($data_temp);

if($_SESSION['password']==$data['password'])
{
    $file = new Spreadsheet();

    $active_sheet = $file->getActiveSheet();

    $active_sheet->setCellValue('A1', 'Имя');
    $active_sheet->setCellValue('B1', 'На велосипеде');
    $active_sheet->setCellValue('C1', 'Проплыл');
    $active_sheet->setCellValue('D1', 'Пробежал');

    $count = 2;

    foreach($result as $row)
    {
        $active_sheet->setCellValue('A' . $count, $row["name"]);
        $active_sheet->setCellValue('B' . $count, $row["rides-total"]);
        $active_sheet->setCellValue('C' . $count, $row["swim-total"]);
        $active_sheet->setCellValue('D' . $count, $row["run-total"]);

        $count = $count + 1;
    }

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, 'Xls');

    $file_name = time() . '.' . strtolower('Xls');

    $writer->save($file_name);

    header('Content-Type: application/x-www-form-urlencoded');

    header('Content-Transfer-Encoding: Binary');

    header("Content-disposition: attachment; filename=\"".$file_name."\"");

    readfile($file_name);

    unlink($file_name);

    header('Location: index.php');

    exit;

}

?>