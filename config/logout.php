<?php
    session_start();
    unset($_SESSION['id_user']);
    unset($_SESSION['username']);
    header('location: ../login.php');
?>