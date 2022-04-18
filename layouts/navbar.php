<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <a href="index.php" class="navbar-brand text-primary fw-bold">Summer's Kost</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto gap-4">
                <li class="nav-item">
                    <a href="books.php" class="nav-link <?= ($title == 'Books' || $title == 'Book Room'|| $title == 'Completing Book' || $title == 'Room Check') ? 'active' : '' ?>">Books</a>
                </li>
                <li class="nav-item">
                    <a href="rooms.php" class="nav-link <?= ($title == 'Rooms' || $title == 'Room Add' || $title == 'Room Edit') ? 'active' : '' ?>">Rooms</a>
                </li>
                <li class="nav-item">
                    <a href="tenants.php" class="nav-link <?= ($title == 'Tenants' || $title == 'Tenant Detail' || $title == 'Tenant Edit') ? 'active' : '' ?>">Tenants</a>
                </li>
                <li class="nav-item">
                    <a href="history.php" class="nav-link <?= ($title == 'Book History') ? 'active' : '' ?>">History</a>
                </li>
                <li class="nav-item">
                    <a href="income.php" class="nav-link <?= ($title == 'Income' || $title == 'Income Permonth' || $title == 'Income Peryear') ? 'active' : '' ?>">Income</a>
                </li>
                <li class="nav-item">
                    <a href="config/logout.php" onclick="return confirm('Are you sure?')" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>