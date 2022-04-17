<?php
    include('config.php');

    if($_GET['action']) {
        $id = $_GET['id'];
        
        if($_GET['action'] == 'delete') {
            // DELETE DATA
            $query = mysqli_query($conn, "DELETE FROM histories WHERE id = '$id'");
            header('location: ../history.php');
        }
    }
?>