<?php
require_once "connexiondb.php";
require_once "function.php";
    global $connexion;

      
    //  $target= "./public/image/".basename($_FILES['image']['name']);
    $nom=trim($_POST['nom']);
    $prenom=trim($_POST['prenom']);
    $login = trim($_POST['login']);
    $password=trim($_POST['password']);
    $image= 'image';
    $score= 0;
    $resultat = array();


    if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password)){
 
            if (testLog($login)) {
                echo "ce login existe";
            }else{

          
        $data=$connexion->prepare("INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `password`, `image`, `role`, `score`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?) ");
        // move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $ok= $data->execute(array($nom,$prenom,$login,$password,$image,$role="admin",$score));
            if($ok){
                $result["redirection"]= "index.php";
                echo '<div class="alert alert-primary" role="alert" >vous avez ajouté un nouvel administrateur avec succés.</div>';
            }else{
                echo "Error lors de l'insertion";

            }

        }
    }else{
        echo "Veuillez remplir tous les champs !";

    }
