<?php ob_start(); ?>

<!-- used for cookies -->
<?php session_start(); ?>

<?php include "../includes/db.php" ?>
<?php include "functions.php" ?>

<?php

if(!isset($_SESSION['user_role'])) {

        header("Location: ../index.php");
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LifeHub Admin</title>

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- <link rel="stylesheet" href="../css/style.css"> -->

    <!-- diagram code from google charts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>


