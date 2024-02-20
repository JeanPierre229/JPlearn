<?php
    session_start();
    function check( $donnee ){
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
    $imageErreur = null;
    $nameErreur = null;
    if(!empty($_POST) && isset($_POST)){
        $nom = check($_POST["nom"]);
        $message = check($_POST["message_temoin"]);
        $image = check($_FILES["image"]["name"]);
        $image_path = 'assets/images/' . basename($image);
        $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $date = new DateTime();
        $date = $date->format('Y-m-d');
        $upload = false;
        $np = $_SESSION['nom']. ' ' .$_SESSION['prenom'];
        $pn = $_SESSION['prenom']. ' ' .$_SESSION['nom'];

        if(($np != $nom) && ($pn != $nom)){
            $nameErreur = "Votre identité est incorrect !";
        }else{
            if($image){
                $upload = true;
                if($image_ext != 'jpg' && $image_ext != 'png' && $image_ext != 'jpeg' && $image_ext != 'gif'){
                    $imageErreur = "Le fichier doit être sous l'un de ces formats: .jpg, .png, .jpeg, et .gif";
                    $upload = false;
                }
                if(file_exists($image_path)){
                    $imageErreur = "Cette image existe déjà !";
                    $upload = false;
                }
                if($_FILES["image"]["size"] > 500000){
                    $imageErreur = "Le fichier ne doit pas dépasser 500kb";
                    $upload = false;
                }
                $apostrophe = "'";
                $slash = "/";
                $antislash = "\\";
                $deuxp = ":";
                $co = "<";
                $cf = ">";
                if(
                    (strpos($image, $apostrophe) !== false) || (strpos($image, $slash) !== false) ||
                    (strpos($image, $antislash) !== false) || (strpos($image, $deuxp) !== false) ||
                    (strpos($image, $co) !== false) || (strpos($image, $cf) !== false)
                    ){
                    $imageErreur = "Le nom du fichier ne doit pas contenir ces caractères: <strong>/, \, ', :, < et ></strong>";
                    $upload = false;
                }
                if($upload){
                    if(!move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)){
                        $imageErreur = "Erreur lors du chargement du fichier";
                        $upload = false;
                    }
                }
        
                if($upload){
                    $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
                    $requete = $connect->query("
                                                INSERT INTO temoignage(nom_temoin, message_temoin, date, image)
                                                VALUES('$nom','$message','$date','$image')
                                               ");
                    header("Location: accueil.php#temoin");
                }
            }
        }
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

    <title>JPlearn --Temoignage</title>


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
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="accueil.php" class="logo">
                            <p style="font-size: 30px" class="my-5">JPLEARN</p>
                            <!--<img src="assets/images/logo.png">-->
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="accueil.php">Accueil</a></li>
                            <li class="scroll-to-section"><a href="formation.php">Formation</a></li>
                            <li class="scroll-to-section"><a href="temoignage.php">Témoignage</a></li>
                            <li class="scroll-to-section"><a href="about.php">A propos</a></li>
                            <li class="scroll-to-section"><a href="contact.php">Contactez-nous</a></li>
                            <?php if(empty($_SESSION['mail'])){ ?>
                            <?php }else{ //nothing?>
                                <li class="scroll-to-section"><a href="panier.php"><i class="fa fa-shopping-cart"></i></a></li>
                                <li class="submenu"><a href="#"><i class="fa fa-user"></i></a>   
                                <ul>
                                    <li class="scroll-to-section"><a href="profilSettings.php"><strong><?php echo $_SESSION['nom']. ' ' .$_SESSION['prenom']; ?></strong></a></li>
                                    <li class="scroll-to-section"><a href="logout.php">Déconnexion</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Ajoutez votre Témoignage</h2>
                        <span>Découvrez le document que vous cherchez et donnez votre témoignage.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <?php
                    //Empêcher une même personne de soumettre plusieurs commentaires
                    $nm = $_SESSION['nom']. ' ' .$_SESSION['prenom'];
                    $connect = new PDO('mysql: host=localhost; dbname=doc_formation','root','');
                    $rq = $connect->prepare('SELECT * FROM temoignage WHERE nom_temoin = ?');
                    $rq->execute(array($nm));

                    if( $rq->rowCount() > 0){
                        echo "<strong class='mx-auto'>Votre témoignage a déjà été ajouté✅</strong>";
                    }else{
                ?>
                <div class="col-lg-6 mx-auto shadow px-5 py-5">
                    <h4>Ajoutez votre témoignage !</h4>
                    <form action="add_temoin.php" class="form rounded-5" method="post" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="nom" class="form-label h5">Nom et Prénoms: </label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom et Prénoms " required>
                            <?php if($nameErreur): ?>
                                <p style="color: red;"><?= $nameErreur ?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="message_temoin" class="form-label h5">Message: </label>
                            <textarea class="form-control" minlength="100" maxlength="3000" name="message_temoin" id="message_temoin" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label h5">Image(500kb au plus): </label>
                            <input type="file" class="form-control" id="image" name="image" required>
                            <?php if($imageErreur): ?>
                                <p style="color: red;"><?= $imageErreur ?></p>
                            <?php endif ?>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-secondary mt-3" value="Envoyer">
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

    <?php
        require 'footer.php';
    ?>
    
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
