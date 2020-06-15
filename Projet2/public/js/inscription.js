
var loadFile = function(event) {
    var output = document.getElementById('images');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src)
    }
};


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
//  const


// });

// $(document).ready(function () {
   
   
   
   
//     $ ('#btn_create').on('click', function() {
//         const nom = $('#nom').val();
//         const prenom = $('#prenom').val();
//          const login = $('#login').val();
//          const password = $('#password').val();
//          const file = $('#file').val();
//          if (! nom || !prenom || !login || !password || !file ) {
             
//             $ ('.error').spectacle(3000).html( "Tous les champs sont obligatoires." ). retard( 3200 ).fadeOut(3000);
//         }else{
//             var url = 'http://localhost/sonatelAcademyPhp/quizz2/Projet2Copie/traitement/insertion.php';

//           $.post( 
//               url,
//                {nom:nom, prenom: prenom, login: login, password: password, file: file }
//                ).done(function( data ) {
//            if(data > 0){
//              $('.success').show(3000).html("Record saved successfully.").delay(2000).fadeOut(1000);
//            }else{
//              $('.error').show(3000).html("Record could not be saved. Please try again.").delay(2000).fadeOut(1000);
//            }

//            $("#btn_create").val('btn_create');
//            setTimeout(function(){
//                window.location.reload(1);
//            }, 15000);
//        });
//     }
//  });
//      });








// $("#nom_error").hide();
// $("#prenom_error").hide();
// $("#login_error").hide();
// $("#pwd_error").hide();
// $("#pwd2_error").hide();



// var nom_error = false;
// var prenom_error = false;
// var login_error = false;
// var pwd_error = false;
// var pwd2_error = false;

// // Function

// function check_nom() {
// var nom_length = $("#nom").val().length;
// if(nom_length < 1) {
// $("#nom_error").html("Ce champs est obligatoire");
// $("#nom_error").show();
// nom_error = true;
// }else {
// $("#nom_error").hide();
// }
// }

// function check_prenom() {
// var prenom_length = $("#prenom").val().length;
// if(prenom_length < 1) {
// $("#prenom_error").html("Ce champs est obligatoire");
// $("#prenom_error").show();
// prenom_error = true;
// }else {
// $("#prenom_error").hide();
// }
// }

// function check_login() {
// var login_length = $("#login").val().length;
// if(login_length < 1) {
// $("#login_error").html("le login est obligatoire");
// $("#login_error").show();
// login_error = true;
// }else {
// $("#login_error").hide();
// }
// }

// function check_pwd() {
// var pwd_length = $("#pwd").val().length;
// if(pwd_length < 1) {
// $("#pwd_error").html("le mot de passe est obligatoire");
// $("#pwd_error").show();
// pwd_error = true;
// }else {
// $("#pwd_error").hide();
// }
// }

// function check_pwd2() {

// var pwd = $("#pwd").val();
// var pwd2 = $("#pwd2").val();

// if(pwd != pwd2) {
// $("#pwd2_error").html("les mots passe de correspondent pas");
// $("#pwd2_error").show();
// pwd2_error = true;
// }else {
// $("#pwd2_error").hide();
// }
// }

// //LES EVENEMENTS

// $("#nom").focusout(function() { 
// check_login();
// });

// $("#prenom").focusout(function() { 
// check_login();
// });
// $("#login").focusout(function() { 
// check_login();
// });

// $("#pwd").focusout(function() {
// check_pwd();
// });

// $("#form").submit(function() {

// nom_error = false;
// prenom_error = false;
// login_error = false;
// pwd_error = false;
// pwd2_error = false;

// check_nom();
// check_prenom();
// check_login();
// check_pwd();
// check_pwd2();

// if(nom_error == false && prenom_error == false && login_error == false && pwd_error == false && pwd2_error == false){
// return true;
// }else{
// return false;
// }
// });