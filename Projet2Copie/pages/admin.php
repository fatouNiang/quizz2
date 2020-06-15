<?php
    if(!isset($_SESSION['role'])){
        header("location: index.php");
        exit;
    }
    
    ?>
    <div class="row bg-row">
        <div class="col-sm-12 nav">
            <button type="button" class="btn Monbleu"><a href="pages/dashboard.php" class="charger  p-3"> Dashbord</a></button>
            <button type="button" class="btn Monbleu"><a href="pages/creerAdmin.php" class="charger  p-3">creer admin</a></button>
            <button type="button" class="btn Monbleu"><a href="pages/listeAdmin.php" class="charger  p-3">lister admin</a></button>
            <button type="button" class="btn Monbleu"><a href="pages/listeJoueur.php" class="charger  p-3">liste Joueur</a></button>
            <button type="button" class="btn Monbleu"><a href="pages/creerQuestion.php" class="charger  p-3">creer question</a></button>
            <button type="button" class="btn Monbleu"><a href="pages/listeQuestion.php" class="charger  p-3">Lister question</a></button>
        </div>
        <div class="col-sm-3 profil mb-5 ml-5" >
            <div class="profilAdmin">
                <img src="./public/image/quiz.jpg" alt="" srcset="" class="rounded-circle" style="width: 150px; height :150px; ">
                <!-- <img src="./public/image/" alt="" srcset="" class="imageAdmin"> -->
                
                <div class="nomAdmin font-weight-bold"><?php echo $_SESSION['prenom']." ".$_SESSION['nom'];?> </div>
            </div>
            <button type="button" class="btn btn-light text-danger btn-deconnexion"><a href="logout.php">deconnexion</a></button>
        </div>
        <div class="col-sm-8 cadreAdmin mb-5" id="test">
        
            

        </div>
        
    </div>
