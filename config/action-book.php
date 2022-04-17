<?php
    include('config.php');

    if(isset($_POST['action'])) {
        if($_POST['action'] == 'add') {
            $room_id               = $_POST['room_id'];
            $book_start_date       = $_POST['book_start_date'];
            $book_end_date         = $_POST['book_end_date'];

            // INPUT DATA TENANT TO DB
            $tenant_name           = $_POST['tenant_name'];
            $tenant_address        = $_POST['tenant_address'];
            $tenant_ktp_no         = $_POST['tenant_ktp_no'];
            $tenant_phone          = $_POST['tenant_phone'];
            $tenant_email          = $_POST['tenant_email'];
            $tenant_emergcp        = $_POST['tenant_emergcp'];
            $tenant_emergcp_phone  = $_POST['tenant_emergcp_phone'];
            $tenant_emergcp_email  = $_POST['tenant_emergcp_email'];
            $tenant_bankaccount    = $_POST['tenant_bankaccount'];
            $tenant_bankaccount_no = $_POST['tenant_bankaccount_no'];

            $add_tenant            = mysqli_query($conn, "INSERT INTO tenants (tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no) VALUES ('$tenant_name', '$tenant_address', '$tenant_ktp_no', '$tenant_phone', '$tenant_email', '$tenant_emergcp', '$tenant_emergcp_phone', '$tenant_emergcp_email', '$tenant_bankaccount', '$tenant_bankaccount_no')");
        
            // GET TENANT ID FROM LAST TENANT ADDED
            $tenant = mysqli_query($conn, "SELECT * FROM tenants ORDER BY tenant_id DESC LIMIT 1");
            $tenant_id = mysqli_fetch_assoc($tenant)['tenant_id'];
    
            // QUERY ADD BOOKING
            $booking = mysqli_query($conn, "INSERT INTO books (room_id, tenant_id, book_start_date, book_end_date, payment_status) VALUES ('$room_id', '$tenant_id', '$book_start_date', '$book_end_date', 'unpaid')");
    
            // CHANGE ROOM STATUS TO BOOKED
            $change_room_status = mysqli_query($conn, "UPDATE rooms SET room_availability = 'Booked' WHERE room_id = '$room_id'");
            header('location: ../books.php');
        } else if($_POST['action'] == 'complete') {
            $id = $_POST['id'];

            // FINES
            if(empty($_POST['fine_broken_bed'])) {
                $fine_broken_bed = 0;
            } else {
                $fine_broken_bed = $_POST['fine_broken_bed'];
            }

            if(empty($_POST['fine_broken_mattress'])) {
                $fine_broken_mattress = 0;
            } else {
                $fine_broken_mattress = $_POST['fine_broken_mattress'];
            }

            if(empty($_POST['fine_broken_pillow'])) {
                $fine_broken_pillow = 0;
            } else {
                $fine_broken_pillow = $_POST['fine_broken_pillow'];
            }

            if(empty($_POST['fine_light_bulb'])) {
                $fine_light_bulb = 0;
            } else {
                $fine_light_bulb = $_POST['fine_light_bulb'];
            }

            if(empty($_POST['fine_air_conditioner'])) {
                $fine_air_conditioner = 0;
            } else {
                $fine_air_conditioner = $_POST['fine_air_conditioner'];
            }

            if(empty($_POST['fine_trash_can'])) {
                $fine_trash_can = 0;
            } else {
                $fine_trash_can = $_POST['fine_trash_can'];
            }

            if(empty($_POST['fine_window'])) {
                $fine_window = 0;
            } else {
                $fine_window = $_POST['fine_window'];
            }

            $total_fines = $fine_broken_bed + $fine_broken_mattress + $fine_broken_pillow + $fine_light_bulb + $fine_air_conditioner + $fine_trash_can + $fine_window;

            $book            = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE book_id = '$id'"));
            $room_id         = $book['room_id'];
            $room            = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$room_id'"));
            $tenant_id       = $book['tenant_id'];
            $book_start_date = $book['book_start_date'];
            $book_end_date   = $book['book_end_date'];

            // QUERY ADD histories
            $date1 = new DateTime($book['book_start_date']);
            $date2 = new DateTime($book['book_end_date']);
        
            $diff = $date2->diff($date1)->format("%m");
            $total_room = $diff * $room['room_monthly_price'];

            $total_price = $total_room + $total_fines - 1000000; // 1000000 = deposit
            $add_histories = mysqli_query($conn, "INSERT INTO histories (room_id, tenant_id, book_start_date, book_end_date, fine_broken_bed, fine_broken_mattress, fine_broken_pillow, fine_light_bulb, fine_air_conditioner, fine_trash_can, fine_window, total_price) VALUES ('$room_id', '$tenant_id', '$book_start_date', '$book_end_date', '$fine_broken_bed', '$fine_broken_mattress', '$fine_broken_pillow', '$fine_light_bulb', '$fine_air_conditioner', '$fine_trash_can', '$fine_window', '$total_price')");

            // CHANGE ROOM STATUS TO VACANT
            $change_room_status = mysqli_query($conn, "UPDATE rooms SET room_availability = 'Available' WHERE room_id = '$room_id'");

            // DELETE BOOKING STATUS COMPLETE
            $delete_booking = mysqli_query($conn, "DELETE FROM books WHERE book_id = '$id'");

            header('location: ../history.php');
        }
    } else if($_GET['action']) {
        $id = $_GET['id'];
        
        if($_GET['action'] == 'delete') {
            // DELETE DATA
            $query = mysqli_query($conn, "DELETE FROM books WHERE book_id = '$id'");
            header('location: ../books.php');
        } else if($_GET['action'] == 'paid') {
            // CHANGE PAYMENT STATUS TO PAID
            $query = mysqli_query($conn, "UPDATE books SET payment_status = 'paid' WHERE book_id = '$id'");
            header('location: ../books.php');
        }
    }
?>