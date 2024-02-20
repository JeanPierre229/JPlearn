<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>JPlearn - Paramètre du Profil</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <style>
        #profil1{
            border: 2px solid transparent;
            background-color: gray;
            padding: 30px;
        }
    </style>

    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- ***** Form Area Starts ***** -->
    <section class="section mt-4" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto my-5 shadow px-5 py-4">
                    <div>
                        <i class="fa fa-user form-control" id="profil1" style="font-size: 100px;"></i>
                    </div>
                    <div class="my-5">
                        <h5 class="text-primary">INFORMATIONS PERSONNELLES </h2>
                        <h6 class="mt-3 mb-2 text-secondary"><strong>Nom et Prénoms:</strong> <?php echo $_SESSION['nom']. ' ' .$_SESSION['prenom']; ?></h4>
                        <h6 class="mt-3 mb-2 text-secondary"><strong>Adresse Mail:</strong> <?php echo $_SESSION['mail'] ?></h4>
                    </div>
                    <div class="mt-5">
                        <h5 class="text-primary">MODIFIER VOS INFORMATIONS </h2>
                        <h6 class="mt-3 mb-2"><a href="profilUpdate.php" class="text-secondary">Modifier votre adresse mail </a></h4>
                        <h6 class="mt-3 mb-2"><a href="profilUpdate1.php" class="text-secondary">Modifier votre mot de passe </a></h4>
                        <p class="text-right"><a href="deleteAccount.php" style="color: red;">Supprimer le compte !</a></p>
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Form Area Ends ***** -->
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>