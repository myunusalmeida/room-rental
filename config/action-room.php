<?php
    include('config.php');

    if(isset($_POST['action'])) {
        $room_label         = $_POST['room_label'];
        $room_location      = $_POST['room_location'];
        $room_gender        = $_POST['room_gender'];
        $room_window        = $_POST['room_window'];
        $room_monthly_price = $_POST['room_monthly_price'];
        $room_availability  = $_POST['room_availability'];
        $room_description   = $_POST['room_description'];

        if($_POST['action'] == 'add') {
            $query = mysqli_query($conn, "INSERT INTO rooms VALUES('', '$room_label', '$room_location', '$room_gender', '$room_window', '$room_monthly_price', '$room_availability', '$room_description')");
            header('location: ../rooms.php');
        } else if($_POST['action'] == 'edit') {
            $id = $_POST['id'];
            $query = mysqli_query($conn, "UPDATE rooms SET room_label = '$room_label', room_location = '$room_location', room_window = '$room_window', room_monthly_price = '$room_monthly_price', room_availability = '$room_availability', room_description = '$room_description' WHERE room_id = '$id'");
            header('location: ../rooms.php');
        }
    } else if(isset($_GET['action'])) {
        if($_GET['action'] == 'delete') {
            $id = $_GET['id'];
            $query = mysqli_query($conn, "DELETE FROM rooms WHERE room_id = '$id'");
            header('location: ../rooms.php');
        }
    }
?>