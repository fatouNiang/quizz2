<?php
$host='mysql-fatimah.alwaysdata.net';
$username='fatimah';
$password='iboulaye';
$database= 'fatimah_quizz';
$message="" ;
try{
    $connect= new PDO("mysql:host=$host; dbname=$database",$username,$password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST['connexion'])){
        if(!empty($_POST['login']) || !empty($_POST['password'])){
           
            $query= "SELECT * FROM users WHERE login= :login AND password= :password";
            $statement= $connect->prepare($query);
            $statement->execute(
                            array(
                                'login' => $_POST['login'],
                                'password' => $_POST['password']
                            )
            );
            $result= $statement->fetch(PDO::FETCH_ASSOC);
            if($result['role']=='admin'){
                header('location:index.php?lien=admin');
            }elseif($result['role']=='joueur'){
                header('location:index.php?lien=jeux');
            }
            $count= $statement->rowCount();
            if($count>0){
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION["role"] = $result["role"];
                $_SESSION["image"] = $result["image"];
            }else{
                $message='<label class="text-danger font-weight-bold">login ou mot de pass incorect</label>';
            }
        }
    }
}catch(PDOException $error){
    $message= $error->getMessage();
}
?>

<div class="row zone-connexion">
    <div class="col-sm-6 text-center d-flex align-items-center justify-content-center part_bleu"> Bienvenue dans la plateforme de Quizz </div>

    <div class="col-sm-6 pt-4 font-weight-bold part_blanc">
        <div class="login col-md-12">LOGIN</div>
        <form  method="post" id="form" class="col-md-12 mt-4">
        <?= $message ?>
            <div class="form-group ">
                <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
                <!-- <div class="img1"><img src="./public/image/icone1.jpg" alt="" class="img1"></div> -->
                <small id="login_error" class="text-danger font-weight-bold"></small>
            </div>
            <div class="form-group ">
                <input type="password" class="form-control" id="pwd" placeholder="password" name="password" required>
                <!-- <div class="img1"><img src="./public/image/ic-password.png" alt="" class="img1"></div> -->
                <small id="pwd_error" class="text-danger font-weight-bold"></small>
            </div>
            <input type="submit" class="btn font-weight-bold text-light btn-con" value="CONNEXION" name="connexion">
            <h6>Vous n'avez pas de compte ?</h6>
            <a href="index.php?lien=inscription" class="col-md-12 text-center mt-3 p3">creer un compte</a>
        </form>
    </div>
