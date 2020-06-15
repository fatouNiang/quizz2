<div class="row">
<div class="titre">PARAMETTRE DU QUIZZ</div>
    <div class="sous-titre">LISTE DES ADMINISTRATEURS</div>
    <div class="list" id='scrolleZone'>
    <table class="table table-striped mt-3" >
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
</div>
<script>
     $(document).ready(function(){

        let offset= 0;
        const tbody = $('#tbody');
        $.ajax({
            type: "POST",
             url: './traitement/getDataAdmin.php',
             dataType: 'JSON',
             data:{
                limit: 5,
                offset: offset
            },
            success: function(data){
                getData(data, tbody);
                offset+=5;
        }
        
    });

    function getData(data, tbody) {
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
   
        const scrollzone= $('#scrolleZone');
        scrollzone.scroll(function () {
            const st= scrollzone[0].scrollTop;
            const sh= scrollzone[0].scrollHeight;
            const ch= scrollzone[0].clientHeight;
            if (sh-st<= ch){
                $.ajax({
                    type:'post',
                    url:'./traitement/getDataAdmin.php',
                    dataType: 'JSON',
                    data:{
                        limit: 5,
                        offset: offset
                    },
                    
                    success: function (data) {
                        getData(data, tbody);
                        offset+=5;
                    }
                });
            }
        });




        $(document).on('click','#delete',function () {
            if (confirm("veux-tu supprimer cet admin")){ // demande une confirmation de suppression
                $(this).parents("tr").remove(); // récupère le div parent à supprimer
                let id= $(this).parents('tr').find('td').eq(0).html(); // supprime le td du tr parent selectionné comportant le login
               
                $.ajax({
                    type:'post',
                    url:'./traitement/deleteAdmin.php',
                    dataType:'html',
                    data:{
                        id: id
                    },
                    success:function (data) {
                        alert(data);
                        if (data==="ok"){
                            alert('suppression reussie');
                        }
                    }
                });
            }
        });
});
</script>