<?php
    $nom = null;
    $prenom = null;
    $mail = null;
    $motDePasse = null;
    $motDePasse1 = null;
    $mdpError = null;
    $mailError = null;
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $nom = check($_POST["nom"]);
            $prenom = check($_POST["prenom"]);
            $mail = check($_POST["mail"]);
            $motDePasse = check($_POST["motDePasse"]);
            $motDePasse1 = check($_POST["motDePasse1"]);
            if($motDePasse == $motDePasse1){
                $motDePasse = check($_POST['motDePasse']);
                $motDePasse = sha1($motDePasse);
                $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                $requete = $connect->query("
                                            INSERT INTO users(nom, prenom, mail, motDePasse)
                                            VALUES('$nom','$prenom','$mail', '$motDePasse');
                                            ");
                header("Location: login.php");
            }else{
                $mdpError = "Mot de passe non identique !";
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
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>JPlearn - Inscription</title>


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
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-5">
                    <div class="my-5">
                        <h2 style="color:cadetblue;"><strong>JPLEARN</strong></h2>
                        <p class="h5">A la volonté, rien d'impossible !</p>
                    </div>
                </div>
                <div class="col-lg-6 shadow px-5 py-5">
                    <h4 class="text-center">Inscrivez-vous !</h4>
                    <form action="sign_in.php" class="form" method="post">
                        <div class="mb-3">
                            <label for="nom" class="form-label h5">Nom: </label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label h5">Prénom: </label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label h5">E-mail: </label>
                            <input type="text" class="form-control" id="mail" name="mail" placeholder="E-mail" required>
                            <?php if($mailError): ?>
                                <p style="color: red;"><?= $mailError ?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="motDePasse" class="form-label h5">Mot de passe: </label>
                            <input type="password" class="form-control" minlength="8" id="motDePasse" name="motDePasse" placeholder="Mot de Passe" required>
                        </div>
                        <div class="mb-3">
                            <label for="motDePasse1" class="form-label h5">Confirmez votre mot de passe: </label>
                            <input type="password" class="form-control" minlength="8" id="motDePasse1" name="motDePasse1" placeholder="Confirmez le mot de Passe" required>
                            <?php if($mdpError): ?>
                                <p style="color: red;"><?= $mdpError ?></p>
                            <?php endif ?>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-secondary" value="S'inscrire">
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
