<?php
    $title = 'Tenant Detail';
    include('layouts/header.php');

    if(isset($_GET['id'])) {
        $id   = $_GET['id'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tenants WHERE tenant_id = '$id'"));
    } else {
        header('location: ../tenants.php');
    }    
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Tenant Detail</h3>
            <a href="tenants.php" class="btn btn-outline-secondary">Back to tenants list</a>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <table class="table">
                    <tr style="vertical-align: middle;">
                        <th>Tenant KTP No</th>
                        <td>: <?= $data['tenant_ktp_no'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Name</th>
                        <td>: <?= $data['tenant_name'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Address</th>
                        <td>: <?= $data['tenant_address'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Phone</th>
                        <td>: <?= $data['tenant_phone'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Email</th>
                        <td>: <?= $data['tenant_email'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Emergency CP</th>
                        <td>: <?= $data['tenant_emergcp'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Emergency Phone</th>
                        <td>: <?= $data['tenant_emergcp_phone'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Emergency Email</th>
                        <td>: <?= $data['tenant_emergcp_email'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Bank Account</th>
                        <td>: <?= $data['tenant_bankaccount'] ?></td>
                    </tr>
                    <tr style="vertical-align: middle;">
                        <th>Tenant Bank Account No</th>
                        <td>: <?= $data['tenant_bankaccount_no'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>