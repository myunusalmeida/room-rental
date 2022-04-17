<?php
    $title = 'Tenant Edit';
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
            <h3>Edit Tenant <?= $data['tenant_name'] ?></h3>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <form class="row g-3" action="config/action-tenant.php" method="POST">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $data['tenant_id'] ?>">
                    <div class="col-md-6">
                        <label for="tenantKtp" class="form-label">Tenant KTP No</label>
                        <input type="number" name="tenant_ktp_no" class="form-control" id="tenantKtp"
                            value="<?= $data['tenant_ktp_no'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantName" class="form-label">Tenant Name</label>
                        <input type="text" name="tenant_name" class="form-control" id="tenantName"
                            value="<?= $data['tenant_name'] ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="tenantAddress" class="form-label">Tenant Address</label>
                        <textarea name="tenant_address" id="tenantAddress" rows="2" class="form-control"><?= $data['tenant_address'] ?></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantPhone" class="form-label">Tenant Phone</label>
                        <input type="tel" name="tenant_phone" class="form-control" id="tenantPhone"
                            value="<?= $data['tenant_phone'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantEmail" class="form-label">Tenant Email</label>
                        <input type="email" name="tenant_email" class="form-control" id="tenantEmail"
                        value="<?= $data['tenant_email'] ?>" required>
                    </div>
                    
                    <hr>

                    <div class="col-12">
                        <label for="tenantEmergCp" class="form-label">Tenant Emerge CP Name</label>
                        <input type="text" name="tenant_emergcp" class="form-control" id="tenantEmergCp"
                        value="<?= $data['tenant_emergcp'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantEmergPhone" class="form-label">Tenant Emergency CP Phone</label>
                        <input type="tel" name="tenant_emergcp_phone" class="form-control" id="tenantEmergPhone"
                        value="<?= $data['tenant_emergcp_phone'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantEmergEmail" class="form-label">Tenant Emergecency CP Email</label>
                        <input type="email" name="tenant_emergcp_email" class="form-control" id="tenantEmergEmail"
                        value="<?= $data['tenant_emergcp_email'] ?>" required>
                    </div>
                    
                    <hr>

                    <div class="col-md-6">
                        <label for="tenantBankAccount" class="form-label">Tenant Bank Account Name</label>
                        <input type="text" name="tenant_bankaccount" class="form-control" id="tenantBankAccount" 
                        value="<?= $data['tenant_bankaccount'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tenantBankAccountNo" class="form-label">Tenant Bank Account No</label>
                        <input type="text" name="tenant_bankaccount_no" class="form-control" id="tenantBankAccountNo" 
                        value="<?= $data['tenant_bankaccount_no'] ?>" required>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="tenants.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>