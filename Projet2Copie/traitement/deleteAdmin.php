<?php

require_once "connexiondb.php";
global $connexion;
$id=$_POST['id'];
$req=$connexion->query("DELETE FROM users WHERE id='$id'");
if ($req->rowCount()>0){
    echo 'ok';
}