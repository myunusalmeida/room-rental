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
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM books");
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
                                        if($row['payment_status'] == 'unpaid') {
                                            $date_in_7_day = date('Y-m-d', strtotime($row['book_start_date'] . ' + 7 days')); // 7 days from start date
                                            $diff = date_diff(date_create($date_in_7_day), date_create(date('Y-m-d')));
                                            // echo $diff->format('%R%a days');
                                            if(date('Y-m-d') > $date_in_7_day ) { // if 7 days from start date is greater than today
                                                echo '<span class="badge bg-danger">Late Paying in ' . $diff->format('%R%a days') . '</span>'; // late paying in x days
                                            } else { // if 7 days from start date is less than today
                                                echo '<span class="badge bg-warning">unpaid</span>'; // unpaid
                                            }
                                        } else {
                                            echo '<span class="badge bg-success">Paid</span>';
                                        }
                                    ?>
                                </td>
                                <td class="d-flex gap-2">
                                    <?php
                                        if($row['payment_status'] == 'paid') {
                                            echo '<a href="book-complete.php?id='. $row['book_id'] .'" class="btn btn-sm btn-success">Booking Completed</a>';
                                            echo '<a href="invoice.php?id='. $row['book_id'] .'" class="btn btn-sm btn-info text-white" target="_blank">Invoice</a>';
                                        } else {
                                            echo '<a href="config/action-book.php?action=paid&id='. $row['book_id'] .'" class="btn btn-sm btn-primary">Pay Now</a>';
                                        }
                                    ?>
                                    <a href="config/action-book.php?action=delete&id=<?= $row['book_id'] ?>"
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
    </div>
</section>

<?php include('layouts/footer.php') ?>