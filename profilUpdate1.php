<?php
    session_start();
    $oldpass = null;
    $newpass = null;
    $newpass1 = null;
    $npError = null;
    $passError =null;
    if(!empty($_POST) && isset($_POST)){
        $oldpass = check($_POST["oldpass"]);
        $oldpass = sha1($oldpass);

        $newpass = check($_POST["newpass"]);
        $newpass = sha1($newpass);

        $newpass1 = check($_POST["newpass1"]);
        $newpass1 = sha1($newpass1);
        $us_p = $_SESSION['motDePasse'];

        if($newpass == $newpass1){
            if($oldpass == $newpass){
                $npError = "Votre ancien mot de passe ne peut pas être votre nouveau mot de passe";
            }else{
                $newpass = sha1(check($_POST['newpass']));
                $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                $requete = $connect->query("
                                            UPDATE users
                                            SET motDePasse = '$newpass'
                                            WHERE motDePasse = '$us_p';
                                            ");
                header("Location: login.php");
            }      
        }else{
            $npError = "Mot de passe non identique !";
        }
        if($oldpass != $us_m){
            $passError = "Votre ancien mot de passe est incorrect !";
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
                <form action="profilUpdate1.php" method="post">
                    <div class="my-3">
                        <h4>Modifier le mot de passe de votre compte</h4>
                    </div>
                    <?php if($passError): ?>
                        <p class="alert alert-danger"><?= $passError ?></p>
                    <?php endif ?>
                    <div class="mb-3">
                        <label for="oldpass" class="form-label">Entrez l'ancien mot de passe: </label>
                        <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Ancien mot de passe" required>
                    </div>
                    <div class="mb-3">
                        <label for="newpass" class="form-label">Entrez le nouveau mot de passe: </label>
                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Nouveau mot de passe" required>
                    </div>
                    <div class="mb-3">
                        <label for="newpass" class="form-label">Confirmez le nouveau mot de passe: </label>
                        <input type="password" class="form-control" id="newpass1" name="newpass1" placeholder="Confirmez le nouveau mot de passe" required>
                    </div>
                    <?php if($npError): ?>
                        <p class="alert alert-danger"><?= $npError ?></p>
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
