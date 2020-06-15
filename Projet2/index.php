<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="./public/css/style.css">
        <link rel="stylesheet" href="./public/css/mobile.css">
        <title>Quizz</title>
    </head>
    <body class="d-flex align-items-center justify-content-center">
          <!-- <div class="container d-flex justify-content-center p-2"> -->
            <?php
            if(isset($_GET['lien'])){
               switch($_GET['lien']){
                   case "admin":
                        require_once('./pages/admin.php');
                   break;
                   case "jeux":
                        require_once('./pages/jeux.php');
                   break;
                   case "inscription":
                        require_once('./pages/inscription.php');
                   break;
               }
            }else{
                require_once('./pages/connexion.php');
            }
    
            ?>
        <!--   </div> -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- <script src="./public/js/jquery.js"></script> -->
        <!-- <script src="./public/js/validationConnexion.js"></script> -->
        <script src="./public/js/admin.js"></script>
        <!-- <script src="./public/js/inscription.js"></script> -->
        <script src="./public/js/add_admin.js"></script>
    </body> 
</html>
