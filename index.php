<?php
    $title = 'Dashboard';
    include('layouts/header.php');
?>

    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h1>Dashboard</h1>
                    <p class="text-secondary">
                        Welcome to your dashboard. Here you can manage your website.
                    </p>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="check-room.php" method="get" class="row align-items-end">
                                <input type="hidden" name="action" value="add">
                                <div class="form-group col-6 mb-3">
                                    <label for="checkin">Check-in Date</label>
                                    <input type="date" class="form-control" id="checkin" name="book_start_date" required>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="checkout">Check-out Date</label>
                                    <input type="date" class="form-control" id="checkout" name="book_end_date" required>
                                </div>
                                <div class="form-group col-8">
                                    <label for="gender">Gender</label>
                                    <select name="room_gender" id="gender" class="form-control">
                                        <option value="Men">Men</option>
                                        <option value="Women">Women</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary w-100" type="submit">Check Available</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <h4 class="mt-5">Unpaid Report</h4>
            <div class="card border-0 mt-3">
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
                                $query = mysqli_query($conn, "SELECT * FROM books WHERE payment_status = 'unpaid'");
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
                                        $date_in_7_day = date('Y-m-d', strtotime($row['book_start_date'] . ' + 7 days')); // 7 days from start date
                                        $diff = date_diff(date_create($date_in_7_day), date_create(date('Y-m-d')));
                                        // echo $diff->format('%R%a days');
                                        if($date_in_7_day > date('Y-m-d')) { // if 7 days from start date is greater than today
                                            echo '<span class="badge bg-danger">Late Paying in ' . $diff->format('%R%a days') . '</span>'; // late paying in x days
                                        } else { // if 7 days from start date is less than today
                                            echo '<span class="badge bg-warning">unpaid</span>'; // unpaid
                                        }
                                    ?>
                                </td>
                                <td class="d-flex gap-2">
                                    <a href="config/action-book.php?action=paid&id=<?= $row['book_id'] ?>" class="btn btn-primary btn-sm">Paid</a>
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
    </section>

<?php include('layouts/footer.php') ?>