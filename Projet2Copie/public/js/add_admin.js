// function fileContentLoader(target, fileName){
//     target.load(`pages/${fileName}` ,function(response, status,detail){        
//          if(status === 'error'){
//             $("#table").html(`<p class="text-center alert alert-danger col">Le contenu demandé est introuvable!</p>`);
//             //ou bien
//             //$("#table").html(`<p class="text-center alert alert-danger col">Code Erreur : ${detail.status}, ${detail.statusText}</p>`);
//         }
//     });
// }


// $(document).ready(function () {
//  const form= $('#formAdd');
//  const table= $('#table');
// //  form.load("creerAdmin.php")
// //  table.load('listJoueur.php')


//      fileContentLoader(form,'formAdd.php');
//      fileContentLoader(table,'table.php',{date:1});
// });

// $('.charger').click(function(e){
//     const form = $('#formAdd');
//     const table = $('#table');
//     if(e.target.id === 'creerAdmin'){
//         fileContentLoader(form,'creerAdmin.php');
//         // fileContentLoader(table,'listJoueur.php');
//     }if(e.target.id === 'listJoueur'){
//         fileContentLoader(table,'listJoueur.php');
//     }
//     // else if(e.target.id === 'historique'){
//     //     fileContentLoader(form,'formSearch.php');
//     //     fileContentLoader(table,'table.php');
//     // }
// });
