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
                <h1 class="gundaroomteam">ANSWER QUESTION</h1>
            </div>
        </div>

        <!-- End Panel FAQ -->

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <div class="container">
                <ol class="breadcrumb breadcrumb2">
                    <li class="breadcrumb-item"><a href="index.php">Homepage</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Answer</li>
                </ol>
            </div>
        </nav>
        <!-- End Breadcrumbs -->

        <?php

            // Mengambil array melalui URL dengan get
            $idArtikel = $_GET['topik_id'];
            
            $member_id=$_SESSION['member']['member_id'];
            $ambil=mysqli_query($kon, "SELECT * FROM member WHERE member_id='$member_id'");
            $pecah=mysqli_fetch_array($ambil);
            
            $daftarmember=mysqli_query($kon, "SELECT * FROM topik a LEFT JOIN member b ON a.member_id=b.member_id WHERE topik_id='$idArtikel'");
            $member=mysqli_fetch_array($daftarmember);
            
            
            
            
            
            
            $daftarcomment = mysqli_query($kon, "SELECT * FROM comment JOIN topik ON comment.topik_id = topik.topik_id JOIN member  ON comment.member_id = member.member_id");
            $comment=mysqli_fetch_array($daftarcomment);

            $query= mysqli_query($kon, "SELECT * FROM comment WHERE topik_id='$idArtikel'");

            

        ?>

        <?php 
        
            if (isset($_POST['submit']))
            {
                // membaca data komentar dari form
                $nama= $_POST['nama'];
                $komentar = $_POST['komentar'];
                $idArtikel = $_POST['idArtikel'];
                $tglKomentar = date("Y-m-d");
                    
                // proses insert komentar ke database
                $query = mysqli_query($kon, "INSERT INTO comment (topik_id, member_id, nama, komentar, tgl_komen)
                            VALUES ('$idArtikel','$pecah[member_id]', '$nama','$komentar', '$tglKomentar')");
                if($query){
                    echo "<script>alert('Komentar anda berhasil di upload'); </script>";
                    echo "<script>location='index.php'; </script>";
                }else{
                    echo "<script>alert('Komentar anda gagal di upload'); </script>";
                }
                
            }
            
            
            $ambil1=mysqli_query($kon,"SELECT foto FROM member");
            $cekphoto=mysqli_fetch_array($ambil1);

        ?>


        <!-- Answer -->
        <div class="answer">
            <div class="row">
                <div class="col-1">
                    <img class="profil-user1" src="image/profile-user.png">
                </div>
                
                <div class="col-6">
                    <p class="text-user1"><?php echo $member['nama']; ?> / Mahasiswa Universitas Gunadarma</p>
                </div>
                
            </div>
            <h1 class="judul-answer"><?php echo $member['title']; ?></h1>
            <p class="deskripsi-answer"><?php echo $member['deskripsi']; ?></p>
        <?php 
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."?topik_id=".$idArtikel."&act=submit'>";
        echo "<div class='formanswer'>";
            echo "<input class='form-control' type='text' name='nama' placeholder='Masukkan Nama'>";
        echo "</div>";
        echo "<div class='formanswer'>";
            echo "<textarea class='form-control' type='text' name='komentar' rows='1' placeholder='Masukkan komentar..'></textarea>";
        echo "</div>";
        echo "<div class='row justify-content-end'>";
            echo "<div class='col-4'>";
                echo "<input type='submit' name='submit' class='btn btn-primary buttonkirim' value='Kirim'><input type='hidden' name='idArtikel' value='".$idArtikel."'>";
            echo "</div>";
        echo "</div>";
        echo "</form>";
        ?>
        </div>
        
        <?php while($key=mysqli_fetch_array($query)) { ?>
            <div class="answer">
                <h1 class="jawaban">Jawaban</h1>
                <hr class="garis-event">
                <div class="row">
                    <div class="col-1">
                        <img class="profil-user1"src="image/profile-user.png">
                    </div>

                
                    <div class="col-6">
                        <p class="text-user1"><?php echo $key['nama']?> / Mahasiswa Universitas Gunadarma</p>
                    </div>
                
                </div>
                <p class="deskripsi-answer"><?php echo $key['komentar']; ?></p>

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