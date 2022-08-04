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

    <!-- Link FontAwesome -->

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
            <img src="image/faq.png" width="100%">
    </div>
    <!-- End Jumbotron -->

    <!-- Container -->

    <div class="container">

        <!-- Panel FAQ -->

        <div class="row justify-content-center">
            <div class="col-lg-12 info-faq">
                <h1 class="gundaroomteam">FREQUENTLY ASKED QUESTIONS</h1>
            </div>
        </div>

        <!-- End Panel FAQ -->

        <!-- FAQ -->
    <div class="accordion" id="accordionExample">
        
        <div class="faq text-faq">
            <p class="mb-3">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            </p>
                
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                </div>
            </div>
        </div>
        
        <div class="faq">
            <p class="mb-3 text-faq">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    
            </p>
            
            
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    Some placeholder content for the second accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>
        
        
        <div class="faq">
            <p class="mb-3 text-faq">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            </p>
            
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>

        <div class="faq">
            <p class="mb-3 text-faq">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            </p>
            
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                    And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>

        <div class="faq">
            <p class="mb-3 text-faq">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            </p>
            
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body">
                    And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>

        <div class="faq">
            <p class="mb-3 text-faq">
            Sollicitant homines non sunt nisi quam formae rerum principiis opiniones. Mors enim est terribilis ut Socrati aliud esse apparet. Sed timor mortis est notio terribile. Cum igitur impediantur turbentur aut dolere videamus aliis non tribuunt nisi nobis hoc est, in principiis nostra.
                <img src="image/dropdown1.png" class="dropdown" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            </p>
            
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body">
                    And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>

    </div>

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