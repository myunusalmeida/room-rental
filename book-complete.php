<?php
    $title = 'Completing Book';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Complete the Rental</h3>
        </div>

        <div class="card border-0 mt-4">
            <div class="card-body">
                <form class="row g-3" action="config/action-room.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="col-md-6">
                        <label for="roomLabel" class="form-label">Room Label</label>
                        <input type="text" name="room_label" class="form-control" id="roomLabel" required>
                    </div>
                    <div class="col-md-6">
                        <label for="roomLocation" class="form-label">Room Location</label>
                        <select id="roomLocation" name="room_location" class="form-select" required>
                            <option selected>Choose...</option>
                            <option value="1st Floor">1st Floor</option>
                            <option value="2nd Floor">2nd Floor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="room_gender" class="form-select" required>
                            <option selected>Choose...</option>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="window" class="form-label">Window</label>
                        <input type="text" name="room_window" class="form-control" id="window" required>
                    </div>
                    <div class="col-md-6">
                        <label for="monthly_price" class="form-label">Monthly Price</label>
                        <input type="number" name="room_monthly_price" class="form-control" id="monthly_price" required>
                    </div>
                    <div class="col-md-6">
                        <label for="availability" class="form-label">Room Availability</label>
                        <select id="availability" name="room_availability" class="form-select">
                            <option selected>Choose...</option>
                            <option value="Available">Available</option>
                            <option value="Booked">Booked</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="room_description" id="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="rooms.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>