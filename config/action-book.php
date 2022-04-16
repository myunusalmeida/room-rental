<?php
    include('config.php');

    if(isset($_POST['action'])) {
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

        if($_POST['action'] == 'add') {
            $add_tenant            = mysqli_query($conn, "INSERT INTO tenants (tenant_name, tenant_address, tenant_ktp_no, tenant_phone, tenant_email, tenant_emergcp, tenant_emergcp_phone, tenant_emergcp_email, tenant_bankaccount, tenant_bankaccount_no) VALUES ('$tenant_name', '$tenant_address', '$tenant_ktp_no', '$tenant_phone', '$tenant_email', '$tenant_emergcp', '$tenant_emergcp_phone', '$tenant_emergcp_email', '$tenant_bankaccount', '$tenant_bankaccount_no')");
        
            // GET TENANT ID FROM LAST TENANT ADDED
            $tenant = mysqli_query($conn, "SELECT * FROM tenants ORDER BY tenant_id DESC LIMIT 1");
            $tenant_id = mysqli_fetch_assoc($tenant)['tenant_id'];
    
            // QUERY ADD BOOKING
            $booking = mysqli_query($conn, "INSERT INTO books (room_id, tenant_id, book_start_date, book_end_date, payment_status) VALUES ('$room_id', '$tenant_id', '$book_start_date', '$book_end_date', 'paid')");
    
            // CHANGE ROOM STATUS TO BOOKED
            $change_room_status = mysqli_query($conn, "UPDATE rooms SET room_availability = 'Booked' WHERE room_id = '$room_id'");
            header('location: ../books.php');
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
            header('location: ../invoice.php?id='.$id);
        }
    }
?>