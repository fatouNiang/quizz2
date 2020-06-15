<?php
function testLog($login){
       
    $host='mysql-fatimah.alwaysdata.net';
    $username='fatimah';
    $password='iboulaye';
    $database= 'fatimah_quizz';
        try{
            $connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            
            $data= $connexion->query(" SELECT * FROM users WHERE `role`='admin' ");
            while ($row = $data->fetch()) {
                if ($row['login']===$login) {
                    return true; 
                }
            }
        }catch(PDOException $e){
            echo "erreur : " .$e->getMessage();
        } 
    
}

function testLogin($login){
       
    $host='mysql-fatimah.alwaysdata.net';
    $username='fatimah';
    $password='iboulaye';
    $database= 'fatimah_quizz';
        try{
            $connexion = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            
            $data= $connexion->query(" SELECT * FROM users WHERE `role`='joueur' ");
            while ($row = $data->fetch()) {
                if ($row['login']===$login) {
                    return true; 
                }
            }
        }catch(PDOException $e){
            echo "erreur : " .$e->getMessage();
        } 
    
}