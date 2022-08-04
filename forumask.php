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
    
        <?php if(!isset($_SESSION['member'])){
            echo"<script>alert('Silahkan Login Dahulu'); </script>";
            echo"<script>location='login.php'; </script>";
        }?>

        <!-- BreadCrumbs -->
    <nav aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb breadcrumb1">
                <li class="breadcrumb-item"><a href="#">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ask</li>
            </ol>
        </div>
    </nav>
        <!-- End BreadCrumbs -->
        <?php 

            // Mengambil Session User Sebagai Array
            $member_id=$_SESSION['member']['member_id'];
            $ambil=mysqli_query($kon, "SELECT * FROM member WHERE member_id='$member_id'");
            $pecah=mysqli_fetch_array($ambil);

            $proses=mysqli_real_escape_string($kon, @$_GET['proses']);
            $judul=mysqli_real_escape_string($kon, @$_POST['judul']);
            $deskripsi=mysqli_real_escape_string($kon, @$_POST['deskripsi']);
            $tgl_ask=date("Y-m-d");
                  
            // $pesanproduk=mysqli_query($kon, "UPDATE pembelian SET idpesanproduk = '$idpesanproduk' WHERE idpembelianproduk = '$idpembelianproduk'");
             if($proses=="ask"){
                $simpan=mysqli_query($kon,"INSERT INTO topik(member_id,title,deskripsi,date)
                VALUES ('$pecah[member_id]','$judul','$deskripsi','$tgl_ask')");
                    if($simpan){
                        echo "<script>alert('Pertanyaan Anda Berhasil di upload'); </script>";
                        echo "<script>location='index.php'; </script>";
                    }else{
                        echo "<script>alert('Pertanyaan anda gagal di upload'); </script>";
                    }
            }

    ?>

        <!-- Form Pertanyaan -->
    <form action="?proses=ask" method="post">
        <div class="container">
            <h1 class="forum">Forum</h1>
            <hr width="50%">
            <div class="formask">
                <label for="exampleFormControlInput1">Title</label>
                <p class="formask1">Tulis judul yang merangkum masalah kamu. (max: 200)</p>
                <input type="text" class="form-control" name="judul" placeholder="name@example.com">
            </div>
            <!-- <div class="formask">
                <label for="exampleFormControlInput1">Tags</label>
                <p class="formask1">Masukkan tags yang cocok dengan pertanyaan ini. (min: 1)</p>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div> -->
            
            <div class="formask">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" type="text" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="row justify-content-end">
                <div class="col-4">
                    <a class="btn btn-primary buttonback" href="index.php">Back</a>
                </div>
                <div class="col-4">
                    <button type="submit" name="Proses Ask" class="btn btn-primary buttonask">Ask</button>
                </div>
            </div>
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