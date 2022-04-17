<?php
    $title = 'Income';
    include('layouts/header.php');

    // SUM FOR BOOK TABLE
    $year = $_GET['year'];
    $sum_histories = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) AS total_income FROM histories WHERE YEAR(book_end_date) = '$year'"));
?>

<section class="main-content">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <h3 class="col">Income in <?= $year ?></h3>
            <div class="col-md-4 d-flex justify-content-end gap-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Permonth
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="income-permonth.php?month=1">January</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=2">February</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=3">March</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=4">April</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=5">May</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=6">June</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=7">July</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=8">August</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=9">September</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=10">October</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=11">November</a></li>
                        <li><a class="dropdown-item" href="income-permonth.php?month=12">December</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Peryear
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="income-peryear.php?year=2020">2020</a></li>
                        <li><a class="dropdown-item" href="income-peryear.php?year=2021">2021</a></li>
                        <li><a class="dropdown-item" href="income-peryear.php?year=2022">2022</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $histories = mysqli_query($conn, "SELECT * FROM histories WHERE YEAR(book_end_date) = '$year'");
                                while ($history = mysqli_fetch_assoc($histories)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $history['book_end_date'] ?></td>
                                <td>Rp. <?= number_format($history['total_price']) ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2">Total</td>
                                <td>Rp. <?= number_format($sum_histories['total_income']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>