<?php
    if(!isset($_SESSION['role'])){
        header("location: index.php");
        exit;
    }
    
    ?>

<div class="row">
    <div class="col-12 p-3 mb-2 bg-bleu text-center text-dark font-weight-bold"><h3>Bienvenu dans notre quizz</h3>
    <button type="button" class="btn btn-light text-danger ml-5"><a href="logout.php">deconnexion</a></button>

    </div>
    <div class="col-9 bg-light">sdfghjklmù</div>
    <div class="col-3 bg-blue profilJoueur">
        <div class="col imageJoueur">
            <img src="./public/image/" alt="" srcset="" class="imageAdmin">
            <div class="nomAdmin font-weight-bold"><?= $_SESSION['prenom']." ".$_SESSION['nom'];?> </div>
        </div>
        <div class="col-lg">
            <div class="col bg-light text-waring">TOP SCORE</div>
            <div class="listTop font-weight-bold">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Prenom</th>
                    <th scope="col">score</th>
                    </tr>
                </thead>
                <tbody id="topbody">
                    
                </tbody>
            </table>
            </div>
        </div>



    </div>
</div>
<script src="./public/js/jquery.js"></script>

<script>

$(document).ready(function(){
        const tbody = $('#topbody');
        $.ajax({
            type: "POST",
            url: './traitement/scoreTop.php',
            dataType: 'JSON',
            success: function(data){
            afficheData(data, tbody);
        }
        
        
    });
    
    function afficheData(data, tbody) {
            $.each(data, (indice, users)=> {
                tbody.append(`<tr>
                    <td>${users.prenom}</td>
                    <td>${users.score}</td>
                </tr>`);
            })
        }
});   
</script>    