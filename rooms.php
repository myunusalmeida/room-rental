<?php
    $title = 'Rooms';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Rooms</h3>
            <a href="room-add.php" class="btn btn-primary">Add New Room</a>
        </div>

        <div class="card border-0 mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Room Label</th>
                            <th>Location</th>
                            <th>Gender</th>
                            <th>Window</th>
                            <th>Monthly Price</th>
                            <th>Description</th>
                            <th>Availability</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM rooms");
                            $no = 1;
                            while($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr style="vertical-align: middle;">
                            <td><?= $no++ ?></td>
                            <td><?= $row['room_label'] ?></td>
                            <td><?= $row['room_location'] ?></td>
                            <td><?= $row['room_gender'] ?></td>
                            <td><?= $row['room_window'] ?></td>
                            <td>Rp. <?= number_format($row['room_monthly_price']) ?></td>
                            <td><?= $row['room_description'] ?></td>
                            <td>
                                <?php
                                    if($row['room_availability'] == 'Available') {
                                        echo '<span class="badge bg-success">Available</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Booked</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="room-edit.php?id=<?= $row['room_id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="config/action-room.php?action=delete&id=<?= $row['room_id'] ?>"
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