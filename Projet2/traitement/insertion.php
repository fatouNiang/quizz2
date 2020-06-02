<?php 





if(isset($_POST["creer_compte"])){
    var_dump($_POST);
    // $target= "./public/image/".basename($_FILES['image']['name']);
    // require_once('connexiondb.php');
    // $nom=$_POST['nom'];
    // $prenom=$_POST['prenom'];
    // $login = $_POST['login'];
    // $password=$_POST['password'];
    // $images= $_FILES['image']['name'];
    // $role='joueur';
    // $score= 500;

    // if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password) && !empty($images)){

        
    //     $query= "INSERT INTO users VALUES(NULL,'$nom','$prenom','$login','$password','$images','$role','$score')";
        
    //     if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    //         echo'reussie';
    //     }else{
    //         echo'echec';
    //     }
    //     $connexion->exec($query);
    //     header('location:index.php');
    // }
}


// if(isset($_POST['creer_compte'])){

//     $host='mysql-fatimah.alwaysdata.net';
//     $username='fatimah';
//     $password='iboulaye';
//     $database= 'fatimah_quizz';

//         $objetPdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
//         // require_once('connexiondb.php');
//         $image= $_FILES['image']['name'];
//         $image_size= $_FILES['image']['size'];
//         $image_tmp= $_FILES['image']['tmp_name'];

//         $upload_dir='./public/image/';
//         $image_Ext=strtolower(pathinfo($image,PATHINFO_EXTENSION));
//         $valid_EXT=array('jpeg','png','jpg');
//         $pict_profil=rand(1000, 1000000).'.'.$image_Ext;
//         move_uploaded_file($image_tmp, $upload_dir, $pict_profil);

//         $pdoStat= $objetPdo->prepare('INSERT INTO users VALUES(NULL, :nom, :prenom, :login, :password, :image, :role,)');
  
//         $pdoStat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
//         $pdoStat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
//         $pdoStat->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
//         $pdoStat->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
//         $pdoStat->bindValue(':image', $pict_profil, PDO::PARAM_STR);
//         $pdoStat->bindValue(':role', 'joueur', PDO::PARAM_STR);
//         $pdoStat->bindValue(':score', 'joueur', PDO::PARAM_STR);

//         $insertIsOk = $pdoStat->execute();

//         if($insertIsOk){
//             header('location:index.php');
//         }else{
//             echo'echec insertion';
//         }

// }



// if(isset($_POST["creer_compte"])){
//     $nom=$_POST['nom'];
//     $prenom=$_POST['prenom'];
//     $login=$_POST['login'];
//     $password=$_POST['password'];
//     $image=$_POST['choiseImage'];
//     $role='joueur';
//     if(!empty($nom) && !empty($prenom) && !empty($login) && !empty($password) && !empty($image)){

//         require_once('connexiondb.php');
//         $query= "INSERT INTO users VALUES(NULL,'$nom','$prenom','$login','$password','$image','$role')";
//         $query->exec($query);
//         echo"insertion reussie";
//     }
// }