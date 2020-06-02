<?php 

if(isset($_POST["creer_compte"])){
    $target= "./public/image/".basename($_FILES['image']['name']);
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $login = $_POST['login'];
    $password=$_POST['password'];
    $images= $_FILES['image']['name'];
    $role='joueur';
    $score= 0;
    $message='';

    $host='mysql-fatimah.alwaysdata.net';
    $username='fatimah';
    $passwd='iboulaye';
    $database= 'fatimah_quizz';
    
    $connexion = new PDO("mysql:host=$host;dbname=$database", $username, $passwd);


    if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password) && !empty($images)){

                $query= "INSERT INTO users VALUES('$login','$password','$prenom','$nom','$images','$role','$score')";
        
                move_uploaded_file($_FILES['image']['tmp_name'], $target);

                $result = $connexion->exec($query);

                if($result) {
                    header('location:index.php');
                }
                else {
                    $message='Ce login existe deja'; 
                }

        }

        
    }


?>
<div class="row">
    <div class="col-sm  partie-bleu">
        <h2 class="title">S'INSCRIRE</h2>
        <div class="sous-titre3">pour tester votre niveau de culture general</div>
        <button type="button" class="btn btn-light btn-conRetour"><a href="index.php"> connexion</a></button>
        <?php
        if(isset($message)){
            echo'<span class="text-danger">'. $message.'</span>';
        }
        ?>
        
    </div>
    <div class="col-sm partie-blanche">
        
        <img id="images"class="image" />

        <form id="form" method="post" enctype="multipart/form-data">
        
            <div class="form-group form-gr ">
                <input type="text" class="form-control control-form" id="nom" placeholder="nom" name="nom">
                <small  class="form-text text-muted">validattion error</small>
            </div>
            <div class="form-group form-gr ">
                <input type="text" class="form-control control-form" id="prenom" placeholder="prenom" name="prenom">
                <small  class="form-text text-muted">validattion error</small>
            </div>
            <div class="form-group form-gr ">
                <input type="text" class="form-control control-form" id="login" placeholder="login" name="login">
                <small  class="form-text text-muted">validattion error</small>
            </div>
            <div class="form-group form-gr ">
                <input type="password" class="form-control control-form " id="password" placeholder="password" name="password">
                <small class="form-text text-muted">validattion error</small>
            </div>
            <div class="form-group form-gr">
                <input type="password" class="form-control control-form " id="password2" placeholder="password confirm">
                <small class="form-text text-muted">validattion error</small>
            </div>
            <div class="choise form-gr">
            <small id="" class="form-text text-muted">validattion error</small>
                <label for="file" class="label-file">Choisir image</label>
                <input id="file" type="file" class="input-file" accept="image/*" name="image" onchange="loadFile(event)"> 
            </div>
           <input type="submit" class="btn btn-primary btn-create" value="Creer Compte" name="creer_compte" id="btn_create">

        </form>
    </div>
</div>
<script src="./public/js/validateInscription.js"></script>
 <script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
 </script>
