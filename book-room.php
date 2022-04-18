<?php
    $title = 'Book Room';
    include('layouts/header.php');

    $room_id         = $_GET['room_id'];
    $book_start_date = $_GET['book_start_date'];
    $book_end_date   = $_GET['book_end_date'];

    $room_data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `rooms` WHERE room_id = '$room_id'"));
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Add New Books</h3>
        </div>

        <form action="config/action-book.php" method="post">
            <input type="hidden" name="action" value="add">
            <input type="hidden" name="room_id" value="<?= $room_id ?>">
            <input type="hidden" name="book_start_date" value="<?= $book_start_date ?>">
            <input type="hidden" name="book_end_date" value="<?= $book_end_date ?>">

            <div class="row">
                <div class="col-md-8">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Tenant Informations</h5>

                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantKtp" class="form-label">Tenant KTP No</label>
                                    <input type="number" name="tenant_ktp_no" class="form-control" id="tenantKtp" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantName" class="form-label">Tenant Name</label>
                                    <input type="text" name="tenant_name" class="form-control" id="tenantName" required>
                                </div>
                                <div class="form-group mb-3 col-12">
                                    <label for="tenantAddress" class="form-label">Tenant Address</label>
                                    <textarea name="tenant_address" id="tenantAddress" rows="2"
                                        class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantPhone" class="form-label">Tenant Phone</label>
                                    <input type="tel" name="tenant_phone" class="form-control" id="tenantPhone" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantEmail" class="form-label">Tenant Email</label>
                                    <input type="email" name="tenant_email" class="form-control" id="tenantEmail" required>
                                </div>

                                <div class="form-group mb-3 col-12">
                                    <label for="tenantEmergCp" class="form-label">Tenant Emerge CP Name</label>
                                    <input type="text" name="tenant_emergcp" class="form-control" id="tenantEmergCp"
                                        required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantEmergPhone" class="form-label">Tenant Emergency CP Phone</label>
                                    <input type="tel" name="tenant_emergcp_phone" class="form-control" id="tenantEmergPhone"
                                        required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantEmergEmail" class="form-label">Tenant Emergecency CP Email</label>
                                    <input type="email" name="tenant_emergcp_email" class="form-control"
                                        id="tenantEmergEmail" required>
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantBankAccount" class="form-label">Tenant Bank Account Name</label>
                                    <input type="text" name="tenant_bankaccount" class="form-control"
                                        id="tenantBankAccount" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="tenantBankAccountNo" class="form-label">Tenant Bank Account No</label>
                                    <input type="text" name="tenant_bankaccount_no" class="form-control"
                                        id="tenantBankAccountNo" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title mb-5">Book Informations</h5>
                            <table class="table">
                                <tr>
                                    <td>Room Label</td>
                                    <td>:</td>
                                    <th><?= $room_data['room_label'] ?></th>
                                </tr>
                                <tr>
                                    <td>Room Price</td>
                                    <td>:</td>
                                    <th>Rp. <?= number_format($room_data['room_monthly_price']) ?>/month</th>
                                </tr>
                                <tr>
                                    <td>From Date</td>
                                    <td>:</td>
                                    <th><?= $book_start_date ?></th>
                                </tr>
                                <tr>
                                    <td>From Date</td>
                                    <td>:</td>
                                    <th><?= $book_end_date ?></th>
                                </tr>
                                <tr>
                                    <td>Book Duration</td>
                                    <td>:</td>
                                    <th>
                                        <?php
                                            $date1 = new DateTime($book_start_date);
                                            $date2 = new DateTime($book_end_date);
                                        
                                            $diff = $date2->diff($date1)->format("%m");
                                            echo $diff . " Months";
                                        ?>    
                                    </th>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>:</td>
                                    <th>
                                        <?php
                                            $subtotal = $room_data['room_monthly_price'] * $diff;
                                            echo "Rp. " . number_format($subtotal);
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <td>Deposit</td>
                                    <td>:</td>
                                    <th>Rp. 1,000,000</th>
                                </tr>
                                <tr>
                                    <td>Total Price</td>
                                    <td>:</td>
                                    <th>
                                        <?php
                                            $total_price = $subtotal + 1000000;
                                            echo "Rp. " . number_format($total_price) . "";
                                        ?>
                                    </th>
                                </tr>
                            </table>
                            <button class="btn btn-primary mt-3 w-100">Start Book</button>
                            <a href="index.php" class="btn btn-light mt-3 w-100">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<?php include('layouts/footer.php') ?>