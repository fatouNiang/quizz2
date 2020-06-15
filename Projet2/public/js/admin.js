$(document).ready(function(){

    $(".charger").click(function(event){
        let page= $(this).attr('href');
        
        event.preventDefault();
        $("#test").load(page);


    });
   
    function afficher(data){
        $("#test").fadeOut('500', function(){
            $("#test").empty();
            $("#test").append(data);
            $("#test").fadeIn('500');
        });
    }
 });