<div class="col-6">
    <div class="titre_A">Editer un joueur</div>
</div>
<div class="col-6 barre">
    <div><img id="images"class="img3"></div>

    <form id="form" method="post">
    <input type="hidden" id="id" name="id" value="<?= $row['id'] ?>">

        <div class="form-group ">
            <input type="text" class="form-control position-input" id="nom" name="nom" value="<?= $row['nom'] ?>">
            <small id="nom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="prenom" name="prenom" value="<?= $row['prenom'] ?>">
            <small id="prenom_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="text" class="form-control position-input" id="login" name="login" value="<?= $row['login'] ?>">
            <small id="login_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="pwd" name="password" value="<?= $row['password'] ?>">
            <small id="pwd_error" class="text-danger dep_small"></small>
        </div>
        <div class="form-group ">
            <input type="password" class="form-control position-input" id="pwd2" value="<?= $row['id'] ?>">
            <small id="pwd2_error" class="text-danger dep_small"></small>
        </div>
            <button type="submit" class="btn btn-primary btnCreat" name="creer_compte">edit info joueur</button>
    </form>
</div>

<script>
    
</script>