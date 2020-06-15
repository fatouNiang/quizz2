<?php
require_once('connexiondb.php');
global $connexion;



$question= $_POST['question'];
$nbrPoint= $_POST['nbrPoint'];
$typeReponse=$_POST['typeReponse'];
$reponse= $_POST['reponse'];
// if($typeReponse=="simple"){
//     $choix=$_POST['radio'];
// }elseif($typeReponse=="multiple"){
//     $choix= $_POST['check'];
// }else{
//     $choix="";
// }

if(!empty($question) && !empty($nbrPoint) && !empty($typeReponse) && !empty($reponse)){
    if($nbrPoint>=1){

        $sql=$connexion->prepare( "INSERT INTO `question`(`id`, `question`, `nbrPoint`, `typeReponse`) VALUES (NULL, ?, ?, ?, ?)");
        $result= $sql->execute(array($question, $nbrPoint, $typeReponse, $reponse));
        if($result){
            echo 'question enregistre avec succes';
        }else{
            echo 'echec de l insertion';
        }
    }
}else{
    echo 'veuillez remplir tous les champs';
}

?>