<?php
    session_start();
?>
<!-- Vérification du mail, connexion à la base de donnée et envoie du mail -->
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    $nom = null;
    $message = null;
    $email = null;
    $error = null;
    $sucess = null;
    if(!empty($_POST['email']) && !empty($_POST) && isset($_POST)) {
        $nom = $_POST['nom'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $connect = new PDO("mysql: host=localhost; dbname=doc_formation", 'root', '');
            $requete = $connect->query("
                                INSERT INTO contact_us(nom_user, mail, message_user)
                                VALUES ('$nom', '$email','$message');
                            ");
            $sucess = "Message envoyé !";
        }else{
            $error = "E-mail incorrect !";
        }
        if(envoi_mail($nom, $email, $message)){
            $sucess = "Message envoyé !";
        }else{
            $error = "Erreur d'envoie !";
        }
    } 

    function envoi_mail($from_name, $from_mail, $from_message){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'dodohoundealo@gmail.com';
        $mail->Password = 'ryvryvnagpyykuut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom($from_name, $from_mail);
        $mail->addAddress('dodohoundealo@gmail.com','Jean Pierre');
        $mail->isHTML(true);
        //$mail->Subject = $subject;
        $mail->Body = $from_message;
        $mail->setLanguage('fr');
        
        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

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

    <title>JPlearn Formation</title>


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
        #ins{
            border: 1px solid gray;
            border-radius: 10px;
        }
        #ins:hover{
            background-color: black;
            color: #fff;
        }
        .reduced-opacity{
            opacity: 0.8;
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
                            <li class="scroll-to-section"><a href="accueil.php" class="active">Accueil</a></li>
                            <li class="scroll-to-section"><a href="formation.php">Formation</a></li>
                            <li class="scroll-to-section"><a href="temoignage.php">Témoignage</a></li>
                            <li class="scroll-to-section"><a href="about.php">A propos</a></li>
                            <li class="scroll-to-section"><a href="contact.php">Contactez-nous</a></li>
                            <?php if(empty($_SESSION['mail'])){ ?>
                                <li class="scroll-to-section mx-2" id="ins"><a href="sign_in.php">S'inscrire</a></li>
                                <li class="scroll-to-section px-2" id="ins"><a href="login.php">Connexion</a></li>
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
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Ici c'est JPLEARN</h4>
                                <span><strong>Découvrez notre plateforme de formation en ligne, votre clé vers la <br> réussite.</strong></span>
                                <div class="main-border-button">
                                    <a href="formation.php">Acheter !</a>
                                </div>
                            </div>
                            <img src="assets/images/1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Témoignage</h4>
                                            <span style="color: aliceblue;">Que de bon témoignage</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Témoignage</h4>
                                                <p>Des histoires inspirantes, des réussites partagées.</p>
                                                <div class="main-border-button">
                                                    <a href="temoignage.php">Découvrir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/1t.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Formation</h4>
                                            <span id="couleur">Les meilleurs formations</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Formation</h4>
                                                <p>Explorez nos formations de pointe et élevez vos compétences.</p>
                                                <div class="main-border-button">
                                                    <a href="formation.php">Découvrir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/1f.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>A propos !</h4>
                                            <span>Du contenus sur nous</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>A propos</h4>
                                                <p>Découvrez notre histoire et notre engagement envers l'excellence.</p>
                                                <div class="main-border-button">
                                                    <a href="about.php">Découvrir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/1p.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Contactez-nous</h4>
                                            <span>Contactez-nous dès maintenant !</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Contactez-nous</h4>
                                                <p>Contactez-nous dès aujourd'hui et laissez-nous vous guider vers l'avenir de la programmation !</p>
                                                <div class="main-border-button">
                                                    <a href="contact.php">Découvrir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/contact.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Formation</h2>
                        <span>Explorez nos formations de pointe et élevez vos compétences.</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
            $requete = $connect->query("SELECT * FROM info_doc;");
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-lg-12">';
                        echo '<div class="men-item-carousel">';
                            echo '<div class="owl-men-item owl-carousel">';
            while($ligne = $requete->fetch()){
                            echo '<div class="item">';
                                echo '<div class="thumb">';
                                echo '<div class="hover-content">';
                                    echo '<ul>';
                                        echo '<li><a href="view_doc.php?id='. $ligne['id']. '"><i class="fa fa-eye"></i></a></li>';
                                        echo '<li><a href="view_doc.php?id='. $ligne['id']. '"><i class="fa fa-shopping-cart"></i></a></li>';
                                    echo '</ul>';
                                echo '</div>';
                                echo '<img style="height: 400px;" src="assets/images/new/' .$ligne['img_doc']. '" alt="">';
                                echo '</div>';
                                echo '<div class="down-content">';
                                    echo '<h4>' .$ligne['titre']. '</h4>';
                                    echo '<span>' .$ligne['prix']. " FCFA" . '</span>';
                                    echo '<ul class="stars">';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                        echo '<li><i class="fa fa-star"></i></li>';
                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        ?>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2 id="temoin">Témoignage</h2>
                        <span>Des histoires inspirantes, des réussites partagées.</span>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
            $requete = $connect->query("SELECT * FROM temoignage;");
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-lg-12">';
                        echo '<div class="men-item-carousel">';
                            echo '<div class="owl-men-item owl-carousel">';
            while($ligne = $requete->fetch()){
                            echo '<div class="item">';
                                echo '<div class="thumb">';
                                echo '<div class="hover-content">';
                                    echo '<ul>';
                                        echo '<li><a href="view_temoin.php?id='. $ligne['id']. '"><i class="fa fa-eye"></i></a></li>';
                                    echo '</ul>';
                                echo '</div>';
                                echo '<img style="height: 400px;" src="assets/images/' .$ligne['image']. '" alt="">';
                                echo '</div>';
                                echo '<div class="down-content">';
                                    echo '<h4>' .$ligne['nom_temoin']. '</h4>';
                                    echo "<p>" .$ligne['message_temoin']. "</p>";
                                echo '</div>';
                            echo '</div>';
            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        ?>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>A propos de nous !</h2>
                        <span>
                            Bienvenue sur [JPlearn] ! En tant que groupe de développeurs fullstack expérimenté, nous 
                            avons eu le privilège de vivre la puissance de la programmation sous toutes ses facettes. 
                            Notre plateforme offre une passerelle vers cet univers fascinant en proposant une variété 
                            de formations sur différents langages de programmation.
                        </span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Nous disons toujours: "A la volonté, rien d'impossible !"</p>
                        </div>
                        <p>
                            Que vous soyez un débutant cherchant à prendre ses premiers pas dans le monde du développement 
                            ou un expert désireux de perfectionner ses compétences, nos cours sont conçus pour vous accompagner 
                            à chaque étape de votre parcours. De JavaScript à Python, en passant par HTML/CSS et bien d'autres 
                            langages, notre objectif est de vous fournir les outils et les connaissances nécessaires pour 
                            atteindre vos objectifs de développement, que ce soit pour créer des applications web dynamiques, 
                            des applications mobiles innovantes ou des solutions logicielles complexes. 
                        </p>
                        <div class="main-border-button">
                            <a href="about.php">Découvrir</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Developpement web</h4>
                                    <span>Le meilleur pour vous</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="assets/images/about1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="assets/images/about2.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Differents Types</h4>
                                    <span>Plus de 06 Formation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->
<!-- ***** Contact Area Starts ***** -->
<div class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125977.52701863702!2d2.5271934954203368!3d9.351160549754804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10320550a556d695%3A0x706d4b90bc86232d!2sParakou!5e0!3m2!1sfr!2sbj!4v1708417046394!5m2!1sfr!2sbj" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Dites salut. Ne soyez pas timide !</h2>
                    <span>Contactez-nous dès aujourd'hui et laissez-nous vous guider vers l'avenir de la programmation !</span>
                </div>
                <?php if($error){ ?>
                    <p class="alert alert-danger">
                        <?= $error ?>
                    </p>
                <?php }elseif($sucess){ ?>
                    <p class="alert alert-success">
                        <?= $sucess ?>
                    </p>
                <?php } ?>
                <form id="contact" action="" method="post">
                    <div class="row">
                      <div class="col-lg-6">
                        <fieldset>
                          <input name="nom" type="text" id="name" placeholder="Votre nom" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-6">
                        <fieldset>
                          <input name="email" type="text" id="email" placeholder="Votre mail" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="message" rows="6" id="message" placeholder="Votre message" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
<!-- ***** Contact Area Ends ***** -->
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