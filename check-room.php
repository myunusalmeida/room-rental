<?php
    $title = 'Room Check';
    include('layouts/header.php');
    if(isset($_GET['book_start_date'])) {
        $book_start_date = $_GET['book_start_date'];
        $book_end_date   = $_GET['book_end_date'];
        $room_gender     = $_GET['room_gender'];
    } else {
        header('Location: index.php');
    }
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Room Available in <?= $book_start_date ?> to <?= $book_end_date ?></h3>
        </div>

        <div class="card  mt-4">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th>Room ID</th>
                            <th>Room Label</th>
                            <th>Location</th>
                            <th>Gender</th>
                            <th>Window</th>
                            <th>Monthly Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $rooms = mysqli_query($conn, "SELECT r.*
                                                            FROM rooms r
                                                            LEFT JOIN books b ON b.room_id = r.room_id
                                                            WHERE b.book_id IS NULL
                                                            OR (b.book_end_date >= '$book_start_date' AND b.book_start_date >= '$book_end_date')
                                                            OR (b.book_end_date <= '$book_start_date' AND b.book_start_date <= '$book_end_date')");

                            while($rooms_data = mysqli_fetch_assoc($rooms)) {
                                if($rooms_data['room_gender']  == $room_gender) {
                                    ?>
                                    <tr>
                                        <td><?= $rooms_data['room_id'] ?></td>
                                        <td><?= $rooms_data['room_label'] ?></td>
                                        <td><?= $rooms_data['room_location'] ?></td>
                                        <td><?= $rooms_data['room_gender'] ?></td>
                                        <td><?= $rooms_data['room_window'] ?></td>
                                        <td>Rp. <?= number_format($rooms_data['room_monthly_price']) ?></td>
                                        <td><?= $rooms_data['room_description'] ?></td>
                                        <td>
                                            <a href="book-room.php?room_id=<?= $rooms_data['room_id'] ?>&book_start_date=<?= $book_start_date ?>&book_end_date=<?= $book_end_date ?>" class="btn btn-primary py-2 px-4">
                                                Book
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>