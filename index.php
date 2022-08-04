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
            <img src="image/homepage.png" width="100%">
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->

    <div class="container">

        <!-- Panel FAQ -->

        <div class="row justify-content-center">
            <div class="col-lg-12 info-panel">
                <a href="forumask.php"><h1 class="gundaroomteam">ASK QUESTIONS</h1></a>
            </div>
        </div>

        <!-- End Panel FAQ -->

        <!-- Search Box -->

        <div class="row height d-flex  align-items-center">
            <div class="col-md-8">
                <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Type here to find a question.."> <button class="btn btn-primary">Search</button> </div>
            </div>
        </div>

        <!-- End Search Box -->
        
        <?php

            // $member_id=$_SESSION['member']['member_id'];
            $ambil=mysqli_query($kon, "SELECT * FROM member");
            $pecah=mysqli_fetch_array($ambil);
                
            $ambiltopik=mysqli_query($kon,"SELECT * FROM topik");
            $ambiltopikid=mysqli_fetch_assoc($ambiltopik);
            


            $daftarmember=mysqli_query($kon, "SELECT * FROM topik a LEFT JOIN member b ON a.member_id=b.member_id");
            
            
            $ambil1=mysqli_query($kon,"SELECT foto FROM member ");
            $cekphoto=mysqli_fetch_array($ambil1);
            
        ?>


        <!-- Question -->
        <?php while($key = mysqli_fetch_array($daftarmember)) { ?>
            <div class="question">
                <h1 class="judul"><?php echo $key['title'] ;?></h1>
                <p class="isi"><?php echo $key['deskripsi'] ;?></p>
                    <div class="row">
                        <div class="col-6">
                            <?php echo "<a class='btn btn-outline-success tombol-comment' href='komentar.php?topik_id=".$key['topik_id']."'>Comment</a>";?>
                        </div>
                        <div class="col-5">
                            <p class="text-user"><?php echo $key['nama']; ?> / Mahasiswa Universitas Gunadarma</p>
                        </div>

                        
                        <div class="col">
                            <img class="profil-user" src="image/profile-user.png">
                        </div>
                    
                        
                    </div>
            </div>
        <?php } ?>
        

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