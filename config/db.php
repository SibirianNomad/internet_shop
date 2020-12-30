<?php
/**
 * инициализация подключения к БД
 */
    $dblocation="127.0.0.1";
    $dbname="internet_shop";
    $dbuser="root";
    $dbpassword="";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dbh = new PDO("mysql:host=$dblocation;dbname=$dbname", $dbuser, $dbpassword,$opt);

    if(!$dbh){
        echo 'Error connect to MySql';
        exit();
    }

