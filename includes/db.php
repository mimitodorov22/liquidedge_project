<?php

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'medical';

// foreach ($db as $key => $value) {

//     define(strtoupper($key), $value);
// }


$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$connection) 
    {
        die("Database connection failed: ");
    }

//Select a database to use 
    // $db_select = mysqli_select_db($connection,$DB_NAME);
    // if (!$db_select) 
    // {
    //     die("Database selection failed.....: ");
    // }

    ?>