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

    <title>JPlearn -- Aide</title>


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
                            <li class="scroll-to-section"><a href="#">❓</a></li>
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
                        <h2>Notre page d'Aide</h2>
                        <span>Découvrez le site et ses différentes fonctionnalités</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div>
                        <h4 class="mb-3"><i class="fa fa-quote-left" style="font-size: 15px;"></i> AIDE !</h4>
                    </div>
                    <div>
                        <h6 class="mb-5 text-justify">
                            Vous êtes sur JPlearn et vous souhaitez commencer à prendre des cours en 
                            ligne ? Parfait ! Nous avons créé cette page d'aide pour vous guider tout 
                            au long du processus. Nous sommes fiers de notre offre de cours en ligne et 
                            nous sommes sûrs que vous allez apprécier vos études avec nous.
                        </h6>
                    </div>
                    <div>
                        <h4 class="mb-3"><i class="fa fa-quote-left" style="font-size: 15px;"></i> FAQ'S</h4>
                    </div>
                    <div class="mb-5">
                        <h6 class="text-justify">
                            Vous trouverez ci-dessous les réponses aux questions fréquemment posées par nos 
                            utilisateurs. Si vous n'y trouvez pas la réponse à votre question, n'hésitez pas 
                            à contacter notre équipe de support.
                        </h6>
                        <strong><i>👉 Qui peut utiliser notre site de formation en ligne ?</i></strong>
                        <h6 class="my-2 text-justify">
                            N'importe qui peut utiliser notre site de formation en ligne. 
                            Nous offrons des formations adaptées à tous les niveaux, de la base aux avancés.
                        </h6>
                        <strong><i>👉 Quelles langues sont disponibles sur notre site ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Nos cours sont disponibles en français et en anglais. Toutefois, 
                            notre site web est disponible uniquement en français.
                        </h6>
                        <strong><i>👉 Quelles sont les conditions d'utilisation de notre site ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Pour utiliser notre site de formation en ligne, vous devez accepter nos conditions 
                            d'utilisation. Ces conditions régissent l'utilisation de notre site, y compris le 
                            contenu, les services et les fonctionnalités offerts.
                        </h6>
                        <strong><i>👉 Quelles sont les méthodes de paiement acceptées sur notre site ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Nous acceptons les paiements par carte bancaire et PayPal.
                        </h6>
                        <strong><i>👉 Quel est le processus de réclamation pour obtenir un remboursement ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Pour obtenir un remboursement, veuillez contacter notre équipe de support en 
                            indiquant les raisons de votre demande. Nous examinerons votre demande et vous 
                            donnerons des instructions sur la procédure à suivre.
                        </h6>
                    </div>
                    <div>
                        <h4 class="mb-3"><i class="fa fa-quote-left" style="font-size: 15px;"></i> SUIVIES</h4>
                    </div>
                    <div>
                        <h6 class="text-justify">Vous trouverez ci-dessous des informations sur la façon de suivre nos cours en ligne.</h6>
                        <strong><i>👉 Comment suivez-vous nos cours ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Nos cours sont disponibles en ligne et peuvent être suivis à votre rythme et à votre convenance. 
                            Chaque module comprend des vidéos, des documents et des quizz pour aider à la compréhension.
                        </h6>
                        <strong><i>👉 Quelles sont les conditions d'accès aux cours ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Pour accéder aux cours, vous devez être inscrit sur notre site. Une fois 
                            inscrit, vous pouvez accéder à tous les cours en ligne.
                        </h6>
                        <strong><i>👉 Est-ce possible de suivre les cours sans être connecté à Internet ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Non, nos cours sont disponibles uniquement en ligne et nécessitent une connexion 
                            Internet pour être accédés.
                        </h6>
                        <strong><i>👉 Est-ce possible de suivre les cours en groupe ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Bien que nos cours soient disponibles en ligne et puissent être suivis à votre 
                            rythme, nous ne proposons pas actuellement de suivi en groupe.
                        </h6>
                        <strong><i>👉 Est-ce possible d'avoir un soutien de l'équipe de formation pendant la suivi des cours ?</i></strong>
                        <h6 class="my-2 text-justify">
                            Oui, notre équipe de support est disponible pour répondre à vos questions et vous 
                            aider à résoudre vos problèmes tout au long de votre parcours de formation. Vous pouvez 
                            contacter notre équipe par e-mail ou en utilisant le formulaire de contact sur notre site web.
                        </h6>
                    </div>
                </div>
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
