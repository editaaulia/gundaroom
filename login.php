<?php
    session_start();
    include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Link My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <!-- Link My CSS -->
    <link rel="stylesheet" href="assets/style.css">

    <title>GundaRoom</title>
  </head>
  <body>
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="index.php"><img class="navbar-brand" src="image/logo gundaroom.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-link" href="about.php">ABOUT US</a>
                <a class="nav-link" href="faq.php">FAQs</a>
                <a class="nav-link" href="event.php">EVENT</a>
                <a class="nav-link" href="partnership.php">PARTNERSHIP</a>
                <a class="btn btn-outline-success tombol" href="login.php">LOGIN / SIGNUP</a>
                </div>
            </div>
        </div>
    </nav>
        <!-- End Navbar -->

    <!-- Login Form -->
    <?php
        $proses = mysqli_real_escape_string($kon, @$_GET['proses']);
        if ($proses == "login") {
            $email = mysqli_real_escape_string($kon, $_POST['username']);
            $password = mysqli_real_escape_string($kon, $_POST['password']);
            $cekakun = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM admin WHERE username='$email' AND password='$password'"));
            $ambil = mysqli_query($kon, "SELECT * FROM member where username='$email' AND password='$password'");
            $cekakun1 = mysqli_num_rows($ambil);
            if ($cekakun != 0) { // untuk mengecek akun admin
                $_SESSION['username'] = $email;
                $_SESSION['password'] = $password;
                
                echo "<script>alert('Anda Berhasil Login sebagai Administrator'); </script>";
                echo "<script>location='admin/index.php'; </script>";
            } elseif ($cekakun1 != 0) { // untuk mengecek akun member
                $akun = mysqli_fetch_assoc($ambil);
                $_SESSION['username'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['member'] = $akun;
                echo "<script>alert('Anda Berhasil Login'); </script>";
                echo "<script>location='index.php'; </script>";
            } else {
                echo "<script>alert('Anda Gagal login'); </script>";
            }
        }

    ?>
    <form method="post" action="?proses=login">
        <div class="container">
            <img class="logo" src="image/logo_gundaroom.png">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary login">Login</button>

            <p class="signup">Don't have an account yet? <a class="signuphere" href="register.php"><i>SIGNUP here</i></a></p>
        </div>
    </form>

    <footer>
        <div class="container">
            <p class="copyright"> &copy; <script>
                    document.write(new Date().getFullYear());
                </script> GundaRoom. All rights reserved.</p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>