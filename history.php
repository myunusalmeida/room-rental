<?php
    $title = 'Book History';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Book History</h3>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Room Label</th>
                                <th>Tenant Name</th>
                                <th>Book Start Date</th>
                                <th>Book End Date</th>
                                <th>Book Price</th>
                                <th>Fines</th>
                                <th>Total (- Deposit)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM histories");
                                $sum_histories = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) AS total_income FROM histories"));
                                $no = 1;
                                while($row = mysqli_fetch_assoc($query)) {
                                    $room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$row[room_id]'"));
                                    $tenant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tenants WHERE tenant_id = '$row[tenant_id]'"));
                                    $total_fines = $row['fine_broken_bed'] + $row['fine_broken_mattress'] + $row['fine_broken_pillow'] + $row['fine_light_bulb'] + $row['fine_desk'] + $row['fine_air_conditioner'] + $row['fine_trash_can'] + $row['fine_window'];

                                    // TOTAL BOOK ROOM
                                    $date1 = new DateTime($row['book_start_date']);
                                    $date2 = new DateTime($row['book_end_date']);
                                
                                    $diff = $date2->diff($date1)->format("%m");
                                    $total_room = $diff * $room['room_monthly_price'];
                            ?>
                            <tr style="vertical-align: middle;">
                                <td><?= $no++ ?></td>
                                <td><?= $room['room_label'] ?></td>
                                <td><?= $tenant['tenant_name'] ?></td>
                                <td><?= $row['book_start_date'] ?></td>
                                <td><?= $row['book_end_date'] ?></td>
                                <td>Rp. <?= number_format($total_room + 1000000) ?></td>
                                <td>Rp. <?= number_format($total_fines) ?></td>
                                <td>Rp. <?= number_format($row['total_price']) ?></td>
                                <td class="d-flex gap-2">
                                    <a href="invoice-history.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info text-white" target="_blank">Invoice</a>
                                    <a href="config/action-history.php?action=delete&id=<?= $row['id'] ?>"
                                        onClick="return confirm('Yakin Ingin Menghapus Data? \nData Tersebut Tidak Bisa Dikembalikan Lagi !')"
                                        class="btn btn-sm btn-outline-secondary">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="7" class="text-right">Total Income</td>
                                <td colspan="2">Rp. <?= number_format($sum_histories['total_income']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>