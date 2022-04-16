<?php
    $title = 'books';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Books</h3>
            <a href="." class="btn btn-primary">Add New Book</a>
        </div>

        <div class="card border-0 mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Room Label</th>
                            <th>Tenant Name</th>
                            <th>Book Start Date</th>
                            <th>Book End Date</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM transactions");
                            $no = 1;
                            while($row = mysqli_fetch_assoc($query)) {
                                $room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$row[room_id]'"));
                                $tenant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tenants WHERE tenant_id = '$row[tenant_id]'"));
                        ?>
                        <tr style="vertical-align: middle;">
                            <td><?= $no++ ?></td>
                            <td><?= $room['room_label'] ?></td>
                            <td><?= $tenant['tenant_name'] ?></td>
                            <td><?= $row['book_start_date'] ?></td>
                            <td><?= $row['book_end_date'] ?></td>
                            <td>
                                <?php
                                    if($row['payment_status'] == 'Paid') {
                                        echo '<span class="badge bg-success">Paid</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Unpaid</span>';
                                    }
                                ?>    
                            </td>
                            <td class="d-flex gap-2">
                                <?php
                                    if($row['payment_status'] == 'Paid') {
                                        echo '<a href="config/action-book.php?action=delete&id=' . $row['book_id'] . '"
                                        onClick="return confirm(Yakin Ingin Menghapus Data? \nData Tersebut Tidak Bisa Dikembalikan Lagi !)"
                                        class="btn btn-sm btn-outline-secondary">Delete</a>';
                                    } else {
                                        echo '<a href="config/action-book.php.php?action=paid&id='.$row['book_id'].'" class="btn btn-primary btn-sm">Paid</a>';
                                        echo '<a href="config/action-book.php?action=delete&id=' . $row['book_id'] . '"
                                        onClick="return confirm(Yakin Ingin Menghapus Data? \nData Tersebut Tidak Bisa Dikembalikan Lagi !)"
                                        class="btn btn-sm btn-outline-secondary">Delete</a>';
                                    }
                                ?>
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