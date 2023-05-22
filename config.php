<?php
    session_start();
    
    $env = 'dev';
    if($env == 'dev') {
        $dbName = '<nome_do_banco>';
        $dbHost = 'localhost';
        $dbUser = '<db_user>';
        $dbPass = '<db_pass>';
    } else {
        $dbName = '<nome_do_banco_prod>';
        $dbHost = 'localhost';
        $dbUser = '<db_user_prod>';
        $dbPass = '<db_pass_prod>';
    }

    $pdo = new PDO("mysql:dbname=$dbName;host=$dbHost", $dbUser, $dbPass);

    $array = [
        'error' => '',
        'resp' => []
    ];
