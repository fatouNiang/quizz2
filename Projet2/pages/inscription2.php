<?php 

if(isset($_POST["creer_compte"])){
    $target= "./public/image/".basename($_FILES['image']['name']);
    require_once('./traitement/connexiondb.php');
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $login = $_POST['login'];
    $password=$_POST['password'];
    $images= $_FILES['image']['name'];
    $role='joueur';
    $score= 0;
    $message='';


    if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password) && !empty($images)){

        $result= $connexion->query("SELECT * FROM users")->fetchAll();
        foreach ($result as $row) {
            if($row['login']=== $login){
                $message= 'ce login existe';
            }else{
                $query= "INSERT INTO users VALUES(NULL,'$nom','$prenom','$login','$password','$images','$role','$score')";
        
                move_uploaded_file($_FILES['image']['tmp_name'], $target);

                $connexion->exec($query);
                header('location:index.php');
                // $message='beugouma li';
            }
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
            echo $message;
        }
        ?>
        
    </div>
    <div class="col-sm partie-blanche">
        <!-- <img src="./public/image/imageProfil.jpg" alt="" class="image"> -->
        <img id="images"style="width:160px; height:160px; border-radius:100px;"/>
        <form action="" method="post" enctype="multipart/form-data">
        <!-- <form action="./traitement/insertion.php" method="post"> -->
        
            <div class="form-group">
                <input type="text" class="form-control control-form" id="nom" placeholder="nom" name="nom">
                <small id="nom" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control control-form" id="prenom" placeholder="prenom" name="prenom">
                <small id="prenom" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control control-form" id="login" placeholder="login" name="login">
                <small id="login" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control control-form" id="password" placeholder="password" name="password">
                <small id="password" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control control-form" id="password2" placeholder="password confirm">
                <small id="password2" class="form-text text-muted"></small>
            </div>
            <div class="choise">
                <label for="file" class="label-file">Choisir image</label>
                <input id="file" type="file" class="input-file" accept="image/*" name="image" onchange="loadFile(event)"> 
            </div>
           <input type="submit" class="btn btn-primary btn-create" value="Creer Compte" name="creer_compte">

        </form>
    </div>
</div>
 <script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
 </script>
