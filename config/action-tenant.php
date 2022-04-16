<?php
    include('config.php');

    if(isset($_POST['action'])) {
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

        if($_POST['action'] == 'edit') {
            $id = $_POST['id'];
            // UPDATE DATA
            $query = mysqli_query($conn, "UPDATE tenants SET tenant_name = '$tenant_name', tenant_address = '$tenant_address', tenant_ktp_no = '$tenant_ktp_no', tenant_phone = '$tenant_phone', tenant_email = '$tenant_email', tenant_emergcp = '$tenant_emergcp', tenant_emergcp_phone = '$tenant_emergcp_phone', tenant_emergcp_email = '$tenant_emergcp_email', tenant_bankaccount = '$tenant_bankaccount', tenant_bankaccount_no = '$tenant_bankaccount_no' WHERE tenant_id = '$id'");
            header('location: ../tenants.php');
        }
    } else if(isset($_GET['action'])) {
        if($_GET['action'] == 'delete') {
            $id = $_GET['id'];
            // DELETE DATA
            $query = mysqli_query($conn, "DELETE FROM tenants WHERE tenant_id = '$id'");
            header('location: ../tenants.php');
        }
    }
?>