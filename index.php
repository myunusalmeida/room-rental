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
            
        </div>
    </section>

<?php include('layouts/footer.php') ?>