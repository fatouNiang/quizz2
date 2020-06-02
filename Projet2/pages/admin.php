<?php
    if(!isset($_SESSION['role'])){
        header("location: index.php");
        exit;
    }
    
    ?>
    <div class="row bg-row">
        <div class="col-12 nav">
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=dashboard"> Dashbord</a></button>
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=creerAdmin">creer admin</a></button>
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=listeAdmin">lister admin</a></button>
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=listeJoueur">liste Joueur</a></button>
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=creerQuestion">creer question</a></button>
            <button type="button" class="btn btn-primary Monbleu"><a href="index.php?lien=admin&bloc=listeQuestion">Lister question</a></button>
        </div>
        <div class="col-3 profil">
            <div class="profilAdmin">
                <img src="./public/image/<?=$_SESSION['image']?>" alt="" srcset="" class="imageAdmin">
                
                <div class="nomAdmin font-weight-bold"><?php echo $_SESSION['prenom']." ".$_SESSION['nom'];?> </div>
            </div>
            <button type="button" class="btn btn-light text-danger btn-deconnexion"><a href="logout.php">deconnexion</a></button>
        </div>
        <div class="col-8 cadreAdmin">
            <?php
            if(isset($_GET['bloc'])){
                switch ($_GET['bloc']) {
                    case 'dashboard':
                        require_once('dashboard.php');
                        break;
                    case 'creerAdmin':
                        require_once('creerAdmin.php');
                        break;
                    case 'listeAdmin':
                        require_once('listeAdmin.php');
                        break;
                    case 'listeJoueur':
                        require_once('listeJoueur.php');
                        break;
                    case 'creerQuestion':
                        require_once('creerQuestion.php');
                        break;
                    case 'listeQuestion':
                        require_once('listeQuestion.php');
                        break;
                    
                    default:
                        require_once('listeJoueur.php');
                        break;
                }
            }else{
                require_once('listeJoueur.php');
            }
            ?>
        
    </div>

 