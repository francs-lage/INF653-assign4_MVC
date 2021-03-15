<?php
    $dataSourceName = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=m9hrdx7mawh6mtur';
    $user = 'jf60ce86hzd5yrp5';
    $password = 'mpafrjoxiz9i7l7u';

    try {
        $database = new PDO($dataSourceName, $user, $password);
    }
    catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        include('view/error.php');
        exit();
    }
?>
