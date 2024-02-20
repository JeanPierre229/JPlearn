<?php
    session_start();
    
    $imageErreur = null;
    $id = null;
    if(!empty($_POST) && isset($_POST)){
        $image = check($_FILES["image"]["name"]);
        $image_path = 'assets/profil/' . basename($image);
        $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);
        $upload = false;

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
            $id = $_SESSION['id'];
    
            if($upload){
                $connect = new PDO("mysql: host=localhost; dbname=doc_formation","root","");
                $requete = $connect->query("
                                            UPDATE users
                                            SET image = '$image'
                                            WHERE id = $id;
                                            ");
                $sucess = "Profil ajouté";
                header("Location: accueil.php");
            }
        }
    }

    function check( $donnee ){
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
        #profil1{
            border: 2px solid transparent;
            background-color: gray;
            border-radius: 50%;
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
                <div class="col-lg-6 mx-auto shadow px-5 py-4">
                    <div class="mx-2">
                        <form action="add_profil.php" method="post" enctype="multipart/form-data">
                            <div>
                                <label for="image" style="text-decoration: underline;" class="form-label">Ajoutez une photo de profil</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                                <?php if($imageErreur): ?>
                                    <p class="text-danger"><?= $imageErreur ?></p>
                                <?php endif ?>
                            </div>
                            <div class="text-right mt-2">
                                <input type="submit" class="btn btn-secondary" value="Ajouter">
                            </div>
                        </form>
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
