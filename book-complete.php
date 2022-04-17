<?php
    $title = 'Completing Book';
    include('layouts/header.php');

    if(!isset($_GET['id'])) {
        header('location: ../books.php');
    }

    $id = $_GET['id'];
    $book = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM books WHERE book_id = '$id'"));
    $room = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$book[room_id]'"));
    $tenant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tenants WHERE tenant_id = '$book[tenant_id]'"));

    // CHECK PRICE PER MONTH AND TOTAL
    $date1 = new DateTime($book['book_start_date']);
    $date2 = new DateTime($book['book_end_date']);

    $diff = $date2->diff($date1)->format("%m");
    $total = $diff * $room['room_monthly_price'];

?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Complete the Rental</h3>
        </div>

        <form action="config/action-book.php" method="post">
            <input type="hidden" name="action" value="complete">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="row mt-5">
                <div class="col-md-7">
                    <h5>Fines (Tick Fines if any)</h5>
                    <div class="card  mt-4">
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_broken_bed" value="1500000" id="brokenBed">
                                <label class="form-check-label" for="brokenBed">
                                    Broken Bed - Rp. 1,500,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_broken_mattress" value="500000" id="brokenMattress">
                                <label class="form-check-label" for="brokenMattress">
                                    Broken Mattress - Rp. 500,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_broken_pillow" value="100000" id="brokenPillow">
                                <label class="form-check-label" for="brokenPillow">
                                    Broken Pillow - Rp. 100,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_light_bulb" value="30000" id="lightBulb">
                                <label class="form-check-label" for="lightBulb">
                                    Light Bulb - Rp. 30,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_desk" value="150000" id="desk">
                                <label class="form-check-label" for="desk">
                                    Desk/chair/cabinet - Rp. 150,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_air_conditioner" value="1500000" id="airConditioner">
                                <label class="form-check-label" for="airConditioner">
                                    Air Conditioner - Rp. 1,500,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_trash_can" value="25000" id="trashCan">
                                <label class="form-check-label" for="trashCan">
                                    Trash Can - Rp. 25,000
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="fine_window" value="1000000" id="window">
                                <label class="form-check-label" for="window">
                                    Window - Rp. 1,000,000
                                </label>
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="col-md-5">
                    <h5>Informations</h5>

                    <div class="card  mt-4">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Book ID</td>
                                    <td>: <?= $id ?></td>
                                </tr>
                                <tr>
                                    <td>Tenant Name</td>
                                    <td>: <?= $tenant['tenant_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Room Label</td>
                                    <td>: <?= $room['room_label'] ?></td>
                                </tr>
                                <tr>
                                    <td>Book Duration</td>
                                    <td>: <?= $diff ?> month</td>
                                </tr>
                                <tr>
                                    <td>Room Price</td>
                                    <td>: Rp. <?= number_format($room['room_monthly_price']) ?>/month</td>
                                </tr>
                                <tr>
                                    <td>Total Price (without fines)</td>
                                    <td>: Rp. <?= number_format($total) ?></td>
                                </tr>
                            </table>

                            <button type="submit" class="btn btn-primary btn-block w-100 mt-3">Complete</button>
                            <a href="books.php" class="btn btn-secondary btn-block w-100 mt-2">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>            
        </form>


    </div>
</section>

<?php include('layouts/footer.php') ?>