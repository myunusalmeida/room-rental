<?php
    if(!isset($_GET['id'])) {
        header("Location: histoy.php");
    }

    include('config/config.php');

    $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM histories WHERE id = '$_GET[id]'"));
    $room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$book[room_id]'"));
    $tenant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tenants WHERE tenant_id = '$book[tenant_id]'"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <section class="container">
        <div class="invoice-title mb-5">
            <div class="d-flex align-items-center justify-content-between">
                <h2>Invoice</h2>
                <h3 class="text-right">Order # 12345</h3>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="col-md-4">
                <h5 class="mb-3">Bill From</h5>
                <p>Name: <strong>Kostan</strong></p>
                <p>Company Name: <strong>Jakarta</strong></p>
                <p>Street Address: <strong>Jl. Tribun 781</strong></p>
                <p>City, ST ZIP Code: <strong>Jakarta, 31231</strong></p>
                <p>Phone: <strong>+62 8123 4567 89</strong></p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Bill To</h5>
                <p>Name: <strong><?= $tenant['tenant_name'] ?></strong></p>
                <p>Company Name: <strong>Money Heist</strong></p>
                <p>Street Address: <strong><?= $tenant['tenant_address'] ?></strong></p>
                <p>City, ST ZIP Code: <strong>Blitar, 31231</strong></p>
                <p>Phone: <strong><?= $tenant['tenant_phone'] ?></strong></p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Invoice No. 31321</h5>
                <p>Invoice Date: <?= date('d-m-Y') ?></p>
                <p>Due Date: <?= date('d-m-Y') ?></p>
            </div>
        </div>

        <table class="table mt-5">
            <thead>
                <tr class="table-info">
                    <th>Property Address</th>
                    <th>Rent</th>
                    <th>Fee(s)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $room['room_label'] ?></td>
                    <td>
                        <?php
                            $date1 = new DateTime($book['book_start_date']);
                            $date2 = new DateTime($book['book_end_date']);

                            $diff = $date2->diff($date1)->format("%m");
                            $total = $room['room_monthly_price'] * $diff;
                            echo $diff . " months";
                        ?>
                    </td>
                    <td>Rp. <?= number_format($room['room_monthly_price']) ?></td>
                    <td>Rp. <?= number_format($total); ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Fines</td>
                    <td>
                        <?php
                            $total_fines = $book['fine_broken_bed'] + $book['fine_broken_mattress'] + $book['fine_broken_pillow'] + $book['fine_light_bulb'] + $book['fine_desk'] + $book['fine_air_conditioner'] + $book['fine_trash_can'] + $book['fine_window'];
                            echo "Rp. " . number_format($total_fines);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Subtotal</td>
                    <td>Rp. <?= number_format($room['room_monthly_price'] * $diff + $total_fines) ?></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Deposit</td>
                    <td>Rp. 1,000,000</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Total</td>
                    <td>Rp. <?= number_format($book['total_price']) ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    
    <script>
        window.print();
    </script>
</body>
</html>