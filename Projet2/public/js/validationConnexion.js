
    // Hiding error message

    $("#login_error").hide();
    $("#pwd_error").hide();

    var login_error = false;
    var pwd_error = false;


    //functions

    function check_login() {
        var login_length = $("#login").val().length;
        if(login_length < 1) {
            $("#login_error").html("Ce champs est obligatoire!");
            $("#login_error").show();
            login_error = true;
        }else {
            $("#login_error").hide();
        }
    }

 function check_pwd() {
        var pwd_length = $("#pwd").val().length;
        if(pwd_length < 1) {
            $("#pwd_error").html("Ce champs est obligatoire!");
            $("#pwd_error").show();
            pwd_error = true;
        }else {
            $("#pwd_error").hide();
        }
    }

    //Evenements

    $("#login").focusout(function() { 
        check_login();
    });

    $("#pwd").focusout(function() {
        check_pwd();
    });

    $("#form").submit(function() {

        login_error = false;
        pwd_error = false;

        check_login();
        check_pwd();

        if(login_error == false && pwd_error == false){
            return true;
        }else{
            return false;
        }
    });
    

    /* $("#form").validate(); */

