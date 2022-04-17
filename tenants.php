<?php
    $title = 'Tenants';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <h3>Tenants</h3>

        <div class="card  mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>KTP No</th>
                            <th>Tenant Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM tenants");
                            $no = 1;
                            while($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr style="vertical-align: middle;">
                            <td><?= $no++ ?></td>
                            <td><?= $row['tenant_ktp_no'] ?></td>
                            <td><?= $row['tenant_name'] ?></td>
                            <td><?= $row['tenant_phone'] ?></td>
                            <td><?= $row['tenant_email'] ?></td>
                            <td><?= $row['tenant_address'] ?></td>
                            <td>
                                <a href="tenant-detail.php?id=<?= $row['tenant_id'] ?>" class="btn btn-sm btn-outline-secondary">Detail</a>
                                <a href="tenant-edit.php?id=<?= $row['tenant_id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="config/action-tenant.php?action=delete&id=<?= $row['tenant_id'] ?>"
                                onClick="return confirm('Yakin Ingin Menghapus Data? \nData Tersebut Tidak Bisa Dikembalikan Lagi !')"
                                class="btn btn-sm btn-outline-secondary">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>