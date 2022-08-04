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
    
    <?php
        
        $produk=mysqli_query($kon, "SELECT * FROM member");
        $memberid=$_SESSION['member']['member_id'];
        $ambil=mysqli_query($kon,"SELECT * FROM member WHERE member_id='$memberid'");
        $pecah=mysqli_fetch_array($ambil);
        $ambil1=mysqli_query($kon,"SELECT foto FROM member WHERE member_id='$memberid'");
        $cekphoto = mysqli_fetch_array($ambil1);

        $proses=mysqli_real_escape_string($kon,@$_GET['proses']);
            if($proses=="simpan"){
                $nama_gambar=@$_FILES['gambar']['name'];
                $tmp_gambar=@$_FILES['gambar']['tmp_name'];
                if(!empty($nama_gambar)){
                    copy($tmp_gambar, "fotoprofil/$nama_gambar");
                }
                $simpan=mysqli_query($kon,"UPDATE member SET foto='fotoprofil/$nama_gambar' WHERE member_id='$memberid'");
                if($simpan){
                    echo "<h3>Photo Berhasil diupload</h3>";
                    echo "<script>location='index.php'; </script>";
                }else{
                    echo "<h3>Photo Gagal diupload</h3>";
                    echo "<script>location='index.php'; </script>";
                }
            }

        // if(isset($_POST['kirim'])){

        //     // upload file foto bukti
        //     $namabukti=$_FILES["bukti"]["name"];
        //     $lokasibukti=$_FILES["bukti"]["tmp_name"];
        //     $original=date("YmdHis").$namabukti;
        //     move_uploaded_file($lokasibukti, "fotoprofil/$original");


        //     $simpan=mysqli_query($kon,"UPDATE member SET foto='$original' WHERE member_id='$memberid'");

            
        //     echo"<script>alert('Upload Photo Berhasil'); </script>";
        //     echo"<script>location='index.php'; </script>";
        // }
        
        
    ?>
        <!-- Jumbotron -->
<form action="?proses=simpan" method="post" enctype="multipart/form-data">
    <div class="profile">
        <div class="container">
            <?php
            if (empty($cekphoto['foto'])) :?>
                <img class="profileimg"src="image/profileimg.png">
            <?php else : ?>
                <img class="profileimg"src="<?php echo $pecah['foto']?>">
            <?php endif ?>
            <?php if (empty($cekphoto['foto'])) :?>
                <input type="file" class="tombol-upload" name="gambar">
                <button type="submit" name="submit" class="tombol-upload">Upload Photo</button>
            <?php else : ?>
            
            <?php endif ?>
                <h1 class="namauser"><?php echo $pecah['nama'] ;?></h1>
                <h1 class="jurusan"><?php echo $pecah['jurusan']; ?></h1>
                <h1 class="angkatan"><?php echo $pecah['angkatan']?></h1>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <a class="btn btn-primary buttonlogout" href="logout.php">Logout</a>
                    </div>
                    <div class="col-4">
                        <a class="btn btn-primary buttonhomepage" href="index.php">Homepage</a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 info-panel">
                        <h1 class="gundaroomteam">ASK QUESTIONS</h1>
                    </div>
                </div>
            </div>
            
        </div>
</form>
        <!-- End Jumbotron -->


    <footer>
        <div class="container">
            <p class="copyrightprofile"> &copy; <script>
                    document.write(new Date().getFullYear());
                </script>  GundaRoom. All rights reserved.</p>
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