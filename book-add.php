<?php
    $title = 'Books Add';
    include('layouts/header.php');
?>

<section class="main-content">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h3>Add New Books</h3>
        </div>

        <div class="card border-0 mt-4">
            <div class="card-body">
                <form class="row g-3" action="config/action-books.php" method="POST">
                    <input type="hidden" name="action" value="add">
                    <div class="col-md-4">
                        <label for="bookID" class="form-label">Book ID</label>
                        <input type="number" name="book_id" class="form-control" id="bookID" required>
                    </div>
                    <div class="col-md-4">
                        <label for="roomID" class="form-label">Room ID</label>
                        <input type="text" name="room_id" class="form-control" id="roomID" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tenantID" class="form-label">Tenant ID</label>
                        <input type="text" name="tenant_id" id="tenantID" rows="2" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="bookStart" class="form-label">Book Start Date</label>
                        <input type="date" name="book_start" class="form-control" id="bookStart" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bookEnd" class="form-label">Book End Date</label>
                        <input type="date" name="book_end" class="form-control" id="bookEnd" required>
                    </div>

                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="books.php" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include('layouts/footer.php') ?>