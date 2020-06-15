<?php

$host='mysql-fatimah.alwaysdata.net';
$username='fatimah';
$password='iboulaye';
$database= 'fatimah_quizz';
    try{
        $connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        
    }catch(PDOException $e){
        echo "erreur : " .$e->getMessage();
        // echo "erreur survenu lors de la connexion ";
    }
    

