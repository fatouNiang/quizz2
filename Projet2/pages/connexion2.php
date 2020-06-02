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

<div class="row">
    <div class="col-sm col-sm-  part-bleu">
        <h2 class="title">BIENVENU DANS NOTRE QUIZZ</h2>
    </div>
    <div class="col-sm col-sm- part-blanche">
        <h2 class="login">LOGIN</h2>
        <form action="" method="post" id="form">
        <?= $message ?>
            <div class="form-group form-g">
                <input type="text" class="form-control input-control" id="login" placeholder="login" name="login" required >
                <div class="img1"><img src="./public/image/icone1.jpg" alt="" class="img1"></div>
                <small id="login" class="form-text text-muted"></small>
            </div>
            <div class="form-group form-g">
                <input type="password" class="form-control input-control" id="password" placeholder="password" name="password" required>
                <div class="img1"><img src="./public/image/ic-password.png" alt="" class="img1"></div>
                <small id="password" class="form-text text-muted"></small>
            </div>
            <input type="submit" class="btn btn-primary btn-connexion" value="CONNEXION" name="connexion">
            <h6>Vous n'avez pas de compte ?</h6>
            <a href="index.php?lien=inscription" class="btn-white">creer un compte</a>
        </form>
    </div>
<script>
    $("#form").validate();
</script>
