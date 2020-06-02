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

    <form id="form" method="post" enctype="multipart/form-data">
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="nom" name="nom" placeholder="votre nom">
            <small id="nom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="prenom" name="prenom" placeholder="votre prenom">
            <small id="prenom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="login" name="login" placeholder="votre login">
            <small id="login_error" class="text-danger dep_small"></small>
            <?php if(isset($message)){ echo'<small class="text-danger dep_small">'. $message.'</small>'; }?>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="pwd" name="password" placeholder="votre password">
            <small id="pwd_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="pwd2" placeholder="confirmer votre mot de passe">
            <small id="pwd2_error" class="text-danger dep_small"></small>
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



// validation des champs
  
        // Hiding error message and define error values

        $("#nom_error").hide();
        $("#prenom_error").hide();
        $("#login_error").hide();
        $("#pwd_error").hide();
        $("#pwd2_error").hide();
       


var nom_error = false;
var prenom_error = false;
var login_error = false;
var pwd_error = false;
var pwd2_error = false;

// Function

function check_nom() {
    var nom_length = $("#nom").val().length;
    if(nom_length < 1) {
        $("#nom_error").html("Ce champs est obligatoire");
        $("#nom_error").show();
        nom_error = true;
    }else {
        $("#nom_error").hide();
    }
}

function check_prenom() {
    var prenom_length = $("#prenom").val().length;
    if(prenom_length < 1) {
        $("#prenom_error").html("Ce champs est obligatoire");
        $("#prenom_error").show();
        prenom_error = true;
    }else {
        $("#prenom_error").hide();
    }
}

function check_login() {
    var login_length = $("#login").val().length;
    if(login_length < 1) {
        $("#login_error").html("le login est obligatoire");
        $("#login_error").show();
        login_error = true;
    }else {
        $("#login_error").hide();
    }
}

function check_pwd() {
    var pwd_length = $("#pwd").val().length;
    if(pwd_length < 1) {
        $("#pwd_error").html("le mot de passe est obligatoire");
        $("#pwd_error").show();
        pwd_error = true;
    }else {
        $("#pwd_error").hide();
    }
}

function check_pwd2() {

    var pwd = $("#pwd").val();
    var pwd2 = $("#pwd2").val();

    if(pwd != pwd2) {
        $("#pwd2_error").html("les mots passe de correspondent pas");
        $("#pwd2_error").show();
        pwd2_error = true;
    }else {
        $("#pwd2_error").hide();
    }
}

//LES EVENEMENTS

$("#nom").focusout(function() { 
    check_login();
});

$("#prenom").focusout(function() { 
    check_login();
});
$("#login").focusout(function() { 
    check_login();
});

$("#pwd").focusout(function() {
    check_pwd();
});

$("#form").submit(function() {

    nom_error = false;
    prenom_error = false;
    login_error = false;
    pwd_error = false;
    pwd2_error = false;

    check_nom();
    check_prenom();
    check_login();
    check_pwd();
    check_pwd2();

    if(nom_error == false && prenom_error == false && login_error == false && pwd_error == false && pwd2_error == false){
        return true;
    }else{
        return false;
    }
});
 </script>
