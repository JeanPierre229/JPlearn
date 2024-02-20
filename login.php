<?php
    $usermail = null;
    $motDePasse = null;
    $idError = null;
    $mailError = null;
    
    if(!empty($_POST) && isset($_POST)){
        if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
            $usermail = check($_POST['mail']);
            $motDePasse = check($_POST['motDePasse']);
            $motDePasse = sha1($motDePasse);

            $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
            $requete = $connect->prepare("
                                        SELECT * FROM users 
                                        WHERE mail = ? AND motDePasse = ?;
                                      ");
            $requete->execute(array($usermail, $motDePasse));
            $row = $requete->fetch();

            if($requete->rowCount() == 1){
                session_start();
                $_SESSION['mail'] = $usermail;
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['motDePasse'] = $motDePasse;
                $_SESSION['id'] = $row['id'];
                $us = $_SESSION['nom'];

                $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                $requete1 = $connect->query("SHOW TABLES LIKE 'panier_$us';");

                if( $requete1->rowCount() > 0){
                    //DO NOTHING
                }else{
                    $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                    $requete2 = $connect->query("
                                                CREATE TABLE panier_$us (
                                                    id int(11) PRIMARY KEY AUTO_INCREMENT,
                                                    titre varchar(200), 
                                                    nom_doc varchar(200), 
                                                    prix int(11)
                                                );"
                                            );
                }
                header("Location: accueil.php");
            }else{
                $idError = "Identifiants incorrects !";
            }

        }else{
            $mailError = "E-mail Incorrect ";
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

    <title>JPlearn - Connexion</title>


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

    <!-- ***** Product Area Starts ***** -->
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
                    <h4 class="text-center">Connectez-vous !</h4>
                    <?php if($idError): ?>
                        <p class="alert alert-danger mt-2"><?= $idError ?></p>
                    <?php endif ?>
                    <form action="login.php" class="form" method="post">
                        <div class="mb-3">
                            <label for="mail" class="form-label h5">E-mail: </label>
                            <input type="text" class="form-control" id="mail" name="mail" placeholder="E-mail" required>
                            <?php if($mailError): ?>
                                <p style="color: red;"><?= $mailError ?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="motDePasse" class="form-label h5">Mot de passe: </label>
                            <input type="password" class="form-control" id="motDePasse" name="motDePasse" placeholder="Mot de Passe" required>
                        </div>
                        <div>
                            <input type="submit" class="form-control btn btn-secondary" value="Connexion">
                        </div>
                        <div class="mt-3">
                            <span>Vous n'avez pas de compte ?</span>
                            <span class="mx-3"><a href="sign_in.php">S'inscrire</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    

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
