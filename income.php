<?php
    $title = 'Income';
    include('layouts/header.php');

    // SUM FOR BOOK TABLE
    $sum_histories = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) AS total_income FROM histories"));


?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Income</h3>
            <h3>Total Income <strong>Rp. <?= number_format($sum_histories['total_income']) ?></strong></h3>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>