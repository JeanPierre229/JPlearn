<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>JPlearn - Documents de Formation</title>


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
    
    
    <!-- ***** Début Espace Header ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <?php if(!empty($_SESSION['mail'])){ ?>
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="accueil.php" class="logo">
                            <p style="font-size: 30px" class="my-5">JPLEARN</p>
                        </a>
                        <!-- ***** Début Menu ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="accueil.php">Accueil</a></li>
                            <li class="scroll-to-section"><a href="formation.php" class="active">Formation</a></li>
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
                        <!-- ***** Fin Menu ***** -->
                    </nav>
                </div>
            </div>
            <?php
                }else{
                    header('Location: login.php');
                }
            ?>
        </div>
    </header>
    <!-- ***** Fin Espace Header ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Voir le document</h2>
                        <span>Découvrez de nouvelles notions grâce à ce document.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Début Espace Documents ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <?php
                        $id = null;
                        if(!empty($_GET['id'])){
                            $id = check($_GET['id']);
                        }
                        $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
                        $requete = $connect->prepare("SELECT * FROM info_doc WHERE id = ?;");
                        $requete->execute(array($id));
                        $ligne = $requete->fetch();
                        echo '<img style="height: 50%;" src="assets/images/new/' .$ligne['img_doc'].'" alt="">';
                    ?>
                </div>
            </div>
            <?php
                function check( $donnee ){
                    $donnee = trim($donnee);
                    $donnee = stripslashes($donnee);
                    $donnee = htmlspecialchars($donnee);
                    return $donnee;
                }
                $id = null;
                if(!empty($_GET['id'])){
                    $id = check($_GET['id']);
                }
                //Connexion avec la base de donnée doc_formation
                $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
                $requete = $connect->prepare("SELECT * FROM info_doc WHERE id = ?;");
                $requete->execute(array($id));
                $ligne = $requete->fetch();
                echo '<div class="col-lg-4">';
                    echo '<div class="right-content">';
                        echo '<h4>'. $ligne['titre']. '</h4>';
                        echo '<span class="price">'. $ligne['prix']. ' FCFA' .'</span>';
                        echo '<ul class="stars">';
                            echo '<li><i class="fa fa-star"></i></li>';
                            echo '<li><i class="fa fa-star"></i></li>';
                            echo '<li><i class="fa fa-star"></i></li>';
                            echo '<li><i class="fa fa-star"></i></li>';
                            echo '<li><i class="fa fa-star"></i></li>';
                        echo '</ul>';
                        echo '<h3 class="mt-5"><strong>Auteur:</strong> ' .$ligne['auteur'].'</h3>';
                        echo '<div class="quote">';
                            echo '<i class="fa fa-quote-left"></i><p style="font-size: 18px;">' .$ligne['description']. '</p>';
                        echo '</div>';
                        echo '<h3 class="mt-5"><strong>Nom du document:<br/></strong> '. '<i class="fa fa-quote-left"></i> ' .$ligne['nom_doc']. ' <i class="fa fa-quote-right"></i>'. '</h3>';
                        echo '<div class="total my-5">';
                            echo '<div class="main-border-button"><a href="add_doc.php?id='.$ligne['id'].'">Ajouter au Panier</a></div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            ?>
        </div>
    </section>
    <!-- ***** Fin Espace Documents ***** -->
    
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
