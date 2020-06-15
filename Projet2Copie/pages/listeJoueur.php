    <div class="titre">paramettre du quizz</div>
    <div class="sous-titre">liste des joueurs</div>
    <div class="list" id='scrollzone'>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Score</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbody">
           
        </tbody>
    </table>
            
    </div>


<script>
 
 $(document).ready(function(){

    let offset= 0;
    const tbody = $('#tbody');
        $.ajax({
            type: "POST",
             url: './traitement/getUser.php',
             dataType: 'json',
             data:{
                limit: 12,
                offset: offset
            },
            success: function(data){
                showData(data, tbody);
                offset+=12;
        }
        
    });

    function showData(data, tbody) {
            $.each(data, (indice, users)=> {
                tbody.append(`<tr>
                    <td style="display:none;">${users.id}</td>
                    <td>${users.prenom}</td>
                    <td>${users.nom}</td>
                    <td>${users.score}</td>
                    <td><button type="button" class="btn btn-outline-info" id="edit" data-toggle="modal" data-target="#myModal">Edit</button></td>
                    <td><button type="button" class="btn btn-outline-danger" id="delete">Delete</button></td>
                </tr>`);
            })
        }

        const scrollzone= $('#scrollzone');
        scrollzone.scroll(function () {
            const st= scrollzone[0].scrollTop;
            const sh= scrollzone[0].scrollHeight;
            const ch= scrollzone[0].clientHeight;
            if (sh-st<= ch){
                $.ajax({
                    type:'post',
                    url:'./traitement/getUser.php',
                    data:{
                        limit: 12,
                        offset: offset
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        showData(data, tbody);
                        offset+=12;
                    }
                });
            }
        });




        $(document).on('click','#delete',function () {
            if (confirm("Do you want to delete?")){ // demande une confirmation de suppression
                $(this).parents("tr").remove(); // récupère le div parent à supprimer
                let id= $(this).parents('tr').find('td').eq(0).html(); // supprime le td du tr parent selectionné comportant le login
               
                $.ajax({
                    type:'post',
                    url:'./traitement/deleteUser.php',
                    dataType:'html',
                    data:{
                        id: id
                    },
                    success:function (data) {
                        alert(data);
                        if (data==="ok"){
                            alert('Successful deletion');
                        }
                    }
                });
            }
        });

        // Fonction qui modifie le joueur

        $(document).on("click","#edit", function() {
                let nom=$('#nom').val();
                let prenom=$('#prenom').val();
                let login=users.login;
                $.ajax({
                    url:'../Traitement/modifyPlayer.php',
                    type:'post',
                    data:{
                        firstname:firstname,
                        lastname:lastname,
                        idu:idu
                    },
                    dataType:'html',
                    success:function (data) {
                            alert('Modification carried out successfully');
                    }
                });
            });

});   
</script>