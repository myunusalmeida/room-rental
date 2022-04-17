<?php
    include('config/config.php');

    if (!isset($_SESSION['id_user'])) {
        header('location: ./');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Room Rental | Konstan</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php include('layouts/navbar.php') ?>