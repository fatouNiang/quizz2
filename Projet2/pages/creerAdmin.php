<!-- <div class="row"> -->
<div class="col-sm-6 ">
    <div class=" titre_A font-weight-bold text-center ">PARAMETTRE DU QUIZZ</div>
    <div class="font-weight-bold sous-titre2">AJOUTER UN ADMINISTRATEUR</div>
</div>
<div class="col-sm-6 d-flex ml-auto text-center justify-content-end barre" id="formAdd">
    <div><img id="images"class=" img3"></div>
    <form id="form" method="post" enctype="multipart/form-data">
    <div id="div"></div>

        <div class="form-group ">
            <input type="text" class="form-control position-input" id="nom" name="nom" placeholder="votre nom" required>
            <small id="nom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="prenom" name="prenom" placeholder="votre prenom" required>
            <small id="prenom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="login" name="login" placeholder="votre login" required>
            <small id="login_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="password" name="password" placeholder="votre password" required>
            <small id="pwd_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="pwd2" placeholder="confirmer votre mot de passe" required>
            <small id="pwd2_error" class="text-danger dep_small"></small>
        </div>

        <!-- <div class="choise2">
            <label for="file" class="label-file">Choisir image</label>
            <input id="file" type="text" class="input-file" accept="image/*" value="image" name="image" onchange="loadFile(event)" required> 
        </div> -->
            <button type="button" id="btn_create" class="btn btnCreat" name="creer_compte">creer admin</button>
    </form>
</div>
<!-- </div>  -->
<script src="./public/js/jquery.js"></script>
<script>
       $('#btn_create').click(function(){
        alert('ok');
        var prenom = $("#prenom").val();
        var nom = $("#nom").val();
        var login = $("#login").val();
        var password = $("#password").val();
        var pwd2 = $("#pwd2").val();
        // var image = $("#file").val();
        if(password != pwd2){
            $("#pwd2_error").html("les mots passe de correspondent pas");
        }else{
            $.post('./traitement/Add_admin.php',{prenom:prenom,nom:nom,login:login,password:password,pwd2:pwd2},function(data){
                $("#prenom").val('');
                $("#nom").val('');
                $("#login").val('');
                $("#password").val('');
                $("#pwd2").val('');
                // $("#file").val('');
        // console.log(data);
                $("#div").html(data);
            
            });
         }

    });


    
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


 </script>
