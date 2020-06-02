<div class="titre">paramettre du quizz</div>
    <div class="sous-titre">liste des Administrateurs</div>
    <div class="list">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             require_once('./traitement/connexiondb.php');
           
            $result = $connexion->query("SELECT * FROM users")->fetchAll();
            foreach($result as $row){
                if($row['role']=='admin'){
                ?>
           
                    <th scope="row"></th>
                    <td><?=$row['nom']?></td>
                    <td><?=$row['prenom']?></td>
                    <td><img src="./public/icone/icons-edit.png" alt="" class="img2"></td>
                    <td><img src="./public/icone/ic-supprimer.png" alt=""></td>
                </tr>
                
            </tbody>
        <?php 
    }    
    }
            ?>
            <tr>
    </table>
            
    </div>