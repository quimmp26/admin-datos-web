<?php

session_start();
$product_array = $_SESSION['array'];

$filename = 'report.xls';
            
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=\"$filename\"");
            
    $isPrintHeader = false;

    foreach ($product_array as $row) {
        
        if (! $isPrintHeader ) {

            echo implode("\t", array_keys($row)) . "\n";
            $isPrintHeader = true;

        }

            echo implode("\t", array_values($row)) . "\n";

    }
    
    exit();
            
?>