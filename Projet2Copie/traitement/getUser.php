 <?php
require_once "connexiondb.php";
 global $connexion;
//  $sql =$connexion->prepare("SELECT * FROM users WHERE role='joueur' ORDER BY score DESC") ;
//  $sql->execute();
// while ($row= $sql->fetch()){
  
// }
    

    $limit = $_POST["limit"]; // 
    $offset = $_POST["offset"];


    $sql ="
            SELECT `id`,`nom`,`prenom`,`score` FROM users 
            WHERE role='joueur'
            ORDER BY `users`.`score` DESC
            LIMIT {$limit}
            OFFSET {$offset}
    ";

    $req = $connexion->query($sql);
    $result = $req->fetchAll(2);

    echo json_encode($result);


// $id= $_GET['id'];
// $req= $connexion->prepare("DELETE FROM users WHERE id=?");
// $req->bindParam(1,$id);
// if($req->execute()){
//     echo "success delete data";
// }else{
//     echo "fail delete data";
// }