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
                if(isset($_POST["submit"])){
                    // Mengambil input dari form dan dimasukan ke variabel
                    $username = $_POST["username"];
                    $nama = $_POST["nama"];
                    $jurusan = $_POST["jurusan"];
                    $angkatan = $_POST["angkatan"];
                    $password = $_POST["password"];

                    // Mengecek apakah email sudah dipakai apa belum
                    $ambil = mysqli_query($kon,"SELECT * FROM member where username='$username'");
                    $emailcocok=mysqli_num_rows($ambil);
                    if($emailcocok==1){
                        echo"<script>alert('Email anda sudah digunakan'); </script>";
                        echo"<script>location='register.php'; </script>";
                        return false;
                    }

                    if($password == $password){
                        $insert=mysqli_query($kon,"INSERT INTO member (username,nama,angkatan,jurusan,password)
                        VALUES ('$username','$nama','$angkatan','$jurusan','$password')");
                        echo"<script>alert('Akun Berhasil dibuat');</script>";
                        echo"<script>location='login.php';</script>";
                    }

                    



                }
        
            ?>
    <div class="container">
        <div class="row loginform">
            
                <div class="col">
                    <img src="image/gundaroom.png" width="300px" height="307px">
                </div>
                
                <div class="col">
                    <form method="post" action="?proses=registrasi">
                        <div class="signform">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="signform">
                            <label for="exampleInputEmail1">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" required>
                        </div>
                        <div class="signform">
                            <label for="exampleInputEmail1">Angkatan</label>
                            <input type="text" class="form-control" name="angkatan" required>
                        </div>
                        <div class="signform">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="signform">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary signupbutton" name="submit">Signup</button>

                        <p class="logintext">Already have an account yet? <a class="signuphere" href="login.php"><i>LOGIN here</i></a></p>
            
                    </form>
                </div>
            
        </div>
    </div>    

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