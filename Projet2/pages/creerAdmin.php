<?php
if(isset($_POST["creer_compte"])){
    $target= "./public/image/".basename($_FILES['image']['name']);
     
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $login = $_POST['login'];
    $password=$_POST['password'];
    $images= $_FILES['image']['name'];
    $role='admin';
    $score= 0;
    $message='';

    // connexion database

    $host='mysql-fatimah.alwaysdata.net';
    $username='fatimah';
    $passwd='iboulaye';
    $database= 'fatimah_quizz';
    
    $connexion = new PDO("mysql:host=$host;dbname=$database", $username, $passwd);



    if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password) && !empty($images)){

        
        $query= "INSERT INTO users VALUES('$login','$password','$nom','$prenom','$images','$role','$score')";

        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $result = $connexion->exec($query);

                if($result) {
                    header('location:index.php?lien=admin&bloc=listeAdmin');
                }
                else {
                    $message='Ce login existe deja'; 
                }
    }
}


?>

<div class="col-6">
    <div class="titre_A">paramettre du quizz</div>
    <div class="sous-titre2">Ajouter un administrateur</div>
</div>
<div class="col-6 barre">
    <div><img id="images"class="img3"></div>
<?php if(isset($message)){echo $message;} ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group position-input">
            <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom">
            <!-- <small id="nom" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group position-input">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prenom">
            <!-- <small id="prenom" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group position-input">
            <input type="text" class="form-control" id="login" name="login" placeholder="votre login">
            <!-- <small id="login" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group position-input">
            <input type="password" class="form-control" id="password" name="password" placeholder="votre password">
        </div>
        <div class="form-group position-input">
            <input type="password" class="form-control" id="password2" placeholder="confirmer votre mot de passe">
        </div>
        <div class="choise2">
            <label for="file" class="label-file">Choisir image</label>
            <input id="file" type="file" class="input-file" accept="image/*" name="image" onchange="loadFile(event)"> 
        </div>
            <button type="submit" class="btn btn-primary btnCreat" name="creer_compte">creer admin</button>
    </form>
</div>
<script src=""></script>
<script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
 </script>
