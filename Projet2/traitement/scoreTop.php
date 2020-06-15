<?php
require_once "connexiondb.php";
global $connexion;

$sql ="SELECT `prenom`, `score` FROM users WHERE role='joueur' ORDER BY score DESC LIMIT 5";
$req= $connexion->query($sql);
$result= $req->fetchAll(2);

echo json_encode($result);
?>