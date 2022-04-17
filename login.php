<?php
    include('./config/config.php');

    if (isset($_SESSION['id_user'])) {
        header('location: ./');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
</head>
<body>

    <div class="login">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>

                            <form action="" method="post" class="mt-5">
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <button class="btn btn-primary d-block w-100" name="login" type="submit">Login</button>
                            </form>
                            <?php
                                if (isset($_POST['login'])) {
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];

                                    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' ");

                                    if (mysqli_num_rows($cek) > 0) {
                                        $data = mysqli_fetch_array($cek);

                                        $_SESSION['id_user']    = $data['id'];
                                        $_SESSION['username']   = $data['username'];

                                        header('location: ./');
                                    } else {
                                        echo "<script> alert('Username atau password tidak dikenali!') </script>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>