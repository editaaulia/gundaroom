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
                <?php if (isset($_SESSION['member'])) : ?>
                    <a class="btn btn-outline-success tombol" href="profile.php">PROFILE</a>
                <?php else : ?>
                    <a class="btn btn-outline-success tombol" href="login.php">LOGIN / SIGNUP</a>
                <?php endif ?>
                </div>
            </div>
        </div>
    </nav>
        <!-- End Navbar -->
    <!-- Jumbotron -->
    <div class="header">
            <img src="image/about.png" width="100%">
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->

    <div class="container">

        <!-- Panel About Us -->

        <div class="row justify-content-center">
            <div class="col-lg-12 info-panel">
                <h1 class="gundaroomteam">Gundaroom's Team</h1>
            </div>
        </div>

        <!-- End Panel About Us -->


        <!-- Gundaroom Team -->

        <div class="row pani">
            <div class="col">
                <img src="image/profilabout.png" class="float-left" width="250px" height="250px">
                <h2 class="nama">Pani Saputri</h2>
                <p class="tugas">Pimpinan Proyek</p>
            </div>
        </div>
        
        <div class="row parhan">
            <div class="col">
                <img src="image/parhan.jpeg" class="float-right profil-about1" width="250px" height="250px">
                <h2 class="nama1">Muhammad Farhan</h2>
                <p class="tugas1">Programmer</p>
                
            </div>
        </div>
        
        <div class="row pina">
            <div class="col">
                <img src="image/pina.jpg" class="float-left profil-about" width="250px" height="250px">
                <h2 class="nama">Alfina Damayanti</h2>
                <p class="tugas">Dokumentator</p>
            </div>
        </div>
        
        <div class="row acil">
            <div class="col">
                <img src="image/profilabout.png" class="float-right" width="250px" height="250px">
                <h2 class="nama1">Nurfathony Permana</h2>
                <p class="tugas1">Testing</p>
                
            </div>
            
        </div>
        
        <div class="row dita">
            <div class="col">
                <img src="image/profilabout.png" class="float-left" width="250px" height="250px">
                <h2 class="nama">Edita Aulita Averiani</h2>
                <p class="tugas">Analisis</p>
            </div>
        </div>
        
        <div class="row ivan">
            <div class="col">
                <img src="image/ivan.jpg" class="float-right profil-about1" width="250px" height="250px">
                <h2 class="nama1">Ivan Fakhri Maulana</h2>
                <p class="tugas1">Designer Database</p>
            </div>
        </div>
        
        <div class="row salman">
            <div class="col">
                <img src="image/profilabout.png" class="float-left" width="250px" height="250px">
                <h2 class="nama">Salman Faris Bahaswan</h2>
                <p class="tugas">Testing</p>
            </div>
        </div>
        
        <div class="row aurel">

            <div class="col">
                <img src="image/aurel.jpg" class="float-right profil-about1" width="250px" height="250px">
                <h2 class="nama1">Yasmin Aurelia Nurqadira Putri</h2>
                <p class="tugas1">Designer UI/UX</p>
            </div>
        </div>

        <!-- End Gundaroom Team -->


    </div>

    <!-- End Container -->
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