<?php 
    session_start();
    include '../koneksi.php';
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
    <link rel="stylesheet" href="../assets/style.css">

    <title>GundaRoom</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="admin/index.php"><img class="navbar-brand" src="../image/logo gundaroom.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-link" href="data-admin.php">Data Admin</a>
                <a class="nav-link" href="data-user.php">Data User</a>
                <a class="nav-link" href="data-forum.php">Forum</a>
                <a class="nav-link" href="data-event.php">Event</a>
                <a class="nav-link" href="data-partnership.php">Partnership</a>
                <a class="btn btn-outline-success tombol" href="../logout.php">LOGOUT</a>
                </div>
            </div>
        </div>
    </nav>
        <!-- End Navbar -->
        <?php 


            $proses=mysqli_real_escape_string($kon,@$_GET['proses']);
            if($proses=="simpan"){
                $judul=$_POST['judul'];
                $deskripsi=$_POST['deskripsi'];

                $tanggal_input=date("Y-m-d");
                $waktu_input=date("H:i:s");

                $nama_gambar=@$_FILES['gambar']['name'];
                $tmp_gambar=@$_FILES['gambar']['tmp_name'];
                if(!empty($nama_gambar)){
                    copy($tmp_gambar, "../fotoevent/$nama_gambar");
                }
                $simpan=mysqli_query($kon,"INSERT INTO event(judul,deskripsi,gambar) 
                VALUES('$judul','$deskripsi','fotoevent/$nama_gambar')");
                if($simpan){
                    echo "<h3>Event Berhasil ditambahkan</h3>";
                    echo "<script>location='index.php'; </script>";
                }else{
                    echo "<h3>Event Gagal ditambahkan</h3>";
                }
            }
                  
            

    ?>

        <!-- Form Pertanyaan -->
    <form action="?proses=simpan" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1 class="tambah-event">Tambah Event</h1>
            <hr class="garis-event1"width="25%">
            <div class="formevent">
                <label for="exampleFormControlInput1">Title</label>
                <p class="formask1">Tulis judul yang merangkum masalah kamu. (max: 200)</p>
                <input type="text" class="form-control" name="judul" placeholder="name@example.com">
            </div>
            <div class="formevent">
                <label>Foto Bukti</label><br>
                <p class="formask1">Maksimum Foto Berukuran 5MB</p>
                <input type="file" class="form-control" name="gambar">
            </div>
            <div class="formevent">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" type="text" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="row justify-content-end">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <button type="submit" name="submit" class="btn btn-primary buttonask">Tambah</button>
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