
<div class="row zone-inscription">
    <div class="col-sm-6 text-center d-flex align-items-center justify-content-center text-white partie-bleu">
        <div class=" mt-5 font-weight-bold title">S'INSCRIRE</div>
         <div class="mt-5 mr-5  sous-titre3">Pour tester votre niveau de culture general</div>
        <button type="button" class="btn btn-white mt-3 text-white btn-index"><a href="index.php"> connexion</a></button>
        
        
    </div>
    <div class="col-sm-6 bg-white partie-blanche">
        
        <img id="images"class="ml-5 rounded-circle border border-info  image" style="width: 150px; height :150px; " />

        <form id="form" enctype="multipart/form-data" method="post" class="mb-5">
        <div id="div"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="nom" placeholder="nom" name="nom" required>
                <small id="nom_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom" required>
                <small id="prenom_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
                <small id="login_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control " id="password" placeholder="password" name="password" required>
                <small id="pwd_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control " id="pwd2" placeholder="password confirm" required>
                <small id="pwd2_error" class="text-danger"></small>
            </div>
            <!-- <div class="choise form-gr"> -->
            <!-- <small id="" class="form-text text-muted"></small> -->
                <!-- <label for="file" class="label-file">Choisir image</label>
                <input id="file" type="file" class="input-file" accept="image/*" name="image" onchange="loadFile(event)"> 
            </div> -->
           <input type="button" class="btn btn-primary btn-create" value="Creer Compte" name="creer_compte" id="btn_create">

        </form>
    </div>
</div>

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
            $.post('./traitement/Add_gamer.php',{prenom:prenom,nom:nom,login:login,password:password,pwd2:pwd2},function(data){
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