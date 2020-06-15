<?php
require_once "connexiondb.php";
 global $connexion;


    $limit = $_POST["limit"]; // 
    $offset = $_POST["offset"];


    $sql ="
            SELECT `id`,`nom`,`prenom`,`score` FROM users 
            WHERE role='admin'
            ORDER BY `users`.`score` DESC
            LIMIT {$limit}
            OFFSET {$offset}
    ";

    $req = $connexion->query($sql);
    $result = $req->fetchAll(2);

    echo json_encode($result);

   