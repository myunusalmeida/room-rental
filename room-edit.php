<?php
    $title = 'Room Edit';
    include('layouts/header.php');

    if(isset($_GET['id'])) {
        $id   = $_GET['id'];
        $data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$id'"));
    } else {
        header('location: ../rooms.php');
    }
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Edit Room <?= $data['room_label'] ?></h3>
        </div>

        <div class="card border-0 mt-4">
            <div class="card-body">
                <form class="row g-3" action="config/action-room.php" method="POST">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $data['room_id'] ?>">
                    <div class="col-md-6">
                        <label for="roomLabel" class="form-label">Room Label</label>
                        <input type="text" name="room_label" class="form-control" id="roomLabel"
                            value="<?= $data['room_label'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="roomLocation" class="form-label">Room Location</label>
                        <select id="roomLocation" name="room_location" class="form-select" required>
                            <option value="1st Floor" <?= ($data['room_location'] == '1st Floor') ? 'selected' : '' ?>>1st Floor</option>
                            <option value="2nd Floor" <?= ($data['room_location'] == '2st Floor') ? 'selected' : '' ?>>2nd Floor</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="room_gender" class="form-select" required>
                            <option value="<?= $data['room_gender'] ?>"><?= $data['room_gender'] ?></option>
                        </select>
                        <span class="form-text text-danger">Sorry! You can't change the gender of the room</span>
                    </div>
                    <div class="col-md-6">
                        <label for="window" class="form-label">Window</label>
                        <input type="text" name="room_window" class="form-control" id="window"
                            value="<?= $data['room_window'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="monthly_price" class="form-label">Monthly Price</label>
                        <input type="number" name="room_monthly_price" class="form-control" id="monthly_price"
                            value="<?= $data['room_monthly_price'] ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="availability" class="form-label">Room Availability</label>
                        <select id="availability" name="room_availability" class="form-select">
                            <option selected>Choose...</option>
                            <option value="Available" <?= ($data['room_availability'] == 'Available') ? 'selected' : '' ?>>Available</option>
                            <option value="Booked" <?= ($data['room_availability'] == 'Booked') ? 'selected' : '' ?>>Booked</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="room_description" id="description" rows="3" class="form-control"><?= $data['room_description'] ?></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="rooms.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>