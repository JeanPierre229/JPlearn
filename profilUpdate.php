<?php
    session_start();
    $oldmail = null;
    $newmail = null;
    $newmail1 = null;
    //$us_m = null;
    $nmError = null;
    $mailError =null;
    if(!empty($_POST) && isset($_POST)){
        if(
            (filter_var($_POST['oldmail'], FILTER_VALIDATE_EMAIL)) || 
            (filter_var($_POST['newmail'], FILTER_VALIDATE_EMAIL)) ||
            (filter_var($_POST['newmail1'], FILTER_VALIDATE_EMAIL))
        ){
            $oldmail = check($_POST["oldmail"]);
            $newmail = check($_POST["newmail"]);
            $newmail1 = check($_POST["newmail1"]);
            $us_m = $_SESSION['mail'];

            if($newmail == $newmail1){
                if($oldmail == $newmail){
                    $nmError = "Votre ancien mail ne peut pas être votre nouveau mail";
                }else{
                    $newmail = check($_POST['newmail']);
                    $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                    $requete = $connect->query("
                                                UPDATE users
                                                SET mail = '$newmail'
                                                WHERE mail = '$us_m';
                                                ");
                    header("Location: login.php");
                }      
            }else{
                $nmError = "Mail non identique !";
            }
            if($oldmail != $us_m){
                $mailError = "Votre ancien mail est incorrect !";
            }
        }else{
            $mailError = "E-mail incorrect !";
        }
    }
    function check($donnee){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
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
                <div class="col-lg-6 mx-auto shadow">
                <form action="profilUpdate.php" method="post">
                    <div class="my-3">
                        <h4>Modifier le mail de votre compte</h4>
                    </div>
                    <?php if($mailError): ?>
                        <p class="alert alert-danger"><?= $mailError ?></p>
                    <?php endif ?>
                    <div class="mb-3">
                        <label for="oldmail" class="form-label">Entrez l'ancien mail: </label>
                        <input type="text" class="form-control" id="oldmail" name="oldmail" placeholder="Ancien mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="newmail" class="form-label">Entrez le nouveau mail: </label>
                        <input type="text" class="form-control" id="newmail" name="newmail" placeholder="Nouveau mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="newmail" class="form-label">Confirmez le nouveau mail: </label>
                        <input type="text" class="form-control" id="newmail1" name="newmail1" placeholder="Confirmez le nouveau mail" required>
                    </div>
                    <?php if($nmError): ?>
                        <p class="alert alert-danger"><?= $nmError ?></p>
                    <?php endif ?>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-warning" value="Modifier" required>
                    </div>
                </form>   
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
