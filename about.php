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

    <title>JPlearn -- A propos</title>


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
                            <li class="scroll-to-section"><a href="about.php" class="active">A propos</a></li>
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
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>A propos de nous !</h2>
                        <span>Découvrez notre histoire et notre engagement envers l'excellence.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="assets/images/about_image.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>A propos de nous et de notre Expertises</h4>
                        <span>
                            Bienvenue sur [JPlearn] ! En tant que groupe de développeurs fullstack expérimenté, nous 
                            avons eu le privilège de vivre la puissance de la programmation sous toutes ses facettes. 
                        </span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Nous disons toujours: "A la volonté, rien d'impossible !"</p>
                        </div>
                        <p>
                            Que vous soyez un débutant cherchant à prendre ses premiers pas dans le monde du développement 
                            ou un expert désireux de perfectionner ses compétences, nos cours sont conçus pour vous accompagner 
                            à chaque étape de votre parcours. De JavaScript à Python, en passant par HTML/CSS et bien d'autres 
                            langages, notre objectif est de vous fournir les outils et les connaissances nécessaires.
                        </p>
                        <ul>
                            <li><a href="https://www.facebook.com/profile.php?id=100056844365324"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/JHoundealo?s=09"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/jean-pierre-houndealo-45a4b6268?utm_source=share&utm_campaign=share_via"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Notre Equipe Incroyable</h2>
                        <span>Découvrez la composition de notre équipe de travail incroyable !</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100056844365324"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/JHoundealo?s=09"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/jean-pierre-houndealo-45a4b6268?utm_source=share&utm_campaign=share_via"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/j-p.png">
                        </div>
                        <div class="down-content">
                            <h4>Président Directeur Générale</h4>
                            <span>Jean-Pierre HOUNDEALO</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.facebook.com/houetchowanou"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://x.com/houetchowanou?t=OlPd1ILYV_fbmRe4LE6OWA&s=09"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="https://www.linkedin.com/in/jean-baptiste-y%C3%A9malin-houetchowanou-609318253?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/j-b.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Chargé de la formation</h4>
                            <span>Jean-Baptiste HOUETCHOWANOU</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100067460893936"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="http://linkedin.com/in/romaric-akodjenou-52aa77268"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/romaric.jpeg">
                        </div>
                        <div class="down-content">
                            <h4>Chargé de la sécurité et de l'organisation</h4>
                            <span>Romaric AKODJENOU</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Nos Services</h2>
                        <span>Les différents services que nous proposons sur cette plateforme</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item" style="height: 500px;">
                        <h4>Algorithme de base</h4>
                        <p>
                            Les algorithmes de base sont les blocs de construction numériques qui orchestrent la logique derrière 
                            chaque décision informatique, établissant ainsi les fondations sur lesquelles reposent les solutions 
                            technologiques modernes.
                        </p>
                        <img src="assets/images/sv-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item" style="height: 500px;">
                        <h4>Développement Mobile</h4>
                        <p>
                            Le développement mobile offre une connectivité sans frontières, transformant les smartphones en 
                            passerelles vers des expériences personnalisées et des services instantanés, où que vous soyez.
                        </p>
                        <img src="assets/images/sv-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item" style="height: 500px;">
                        <h4>Développement Web</h4>
                        <p>
                            Le développement web ouvre les portes virtuelles vers des expériences interactives, où la créativité
                            rencontre la fonctionnalité pour façonner des sites et des applications accessibles à tous les coins 
                            du monde.
                        </p>
                        <img src="assets/images/sv-03.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->

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
