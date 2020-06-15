<div class="col ">
<h2 class="Textbleu text-center font-weight-bolder">Paramettre du Quizz</h2>
<h3 class="text-center font-weight-bolder">Ajoutez des Questions</h3>
<!-- <div class="form-question"> -->
    <form method="post" id="questionnaire">
        <div class="form-group form-question ">
            <!-- <label for="question"></label> -->
            Question<textarea class="form-control border border-primary bg-light" id="question" name="question" rows="3" placeholder="entrez votre question"></textarea>
        </div>
        <div class="form-group">
            <label for="nbrPoint">Nbr point</label>
            <input type="number" class="form-control nbPoint border-primary bg-light" id="nbrPoint" name="nbrPoint" >
        </div>

    <div class="col-auto my-1 ">
        <label class="mr-sm-2 sr-only" for="">type de reponse</label>
        <select class="custom-select mr-sm-2 form-question Textbleu bg-light" name="typeReponse" id="typeReponse">
            <option selected>type de reponse</option>
            <option name="simple" id="simple" value="simple">choix simple</option>
            <option name="multiple" id="multiple" value="multiple">choix multiple</option>
            <option name="text" id="text" value="text">choix texte</option>
        </select>
        <button type="button" id="ajout">+</button>
    </div>
    <div class="" id="Zone-reponse">
            <!-- <label for="nbrPoint">Reponse</label>
            <input type="text" class="form-control border-primary bg-light rep" id="reponse" name="reponse" > -->
        </div>
    <div class="col-auto my-1">
        <button type="submit" id="enregistrer" class="btn Monbleu btn-enregistrer">enregistrer</button>
        </div>
    </form>
</div>

<!-- </div> -->

<script>
    $(document).ready(function () {
        var i=1;
        $('#ajout').on("click",function() { 
            i++;
            var typeReponse= $("#typeReponse").val();
            if(typeReponse=='simple'){
                $("#Zone-reponse").append('<input type="text" class="form-control border-primary bg-light rep" id="reponse'+i+'" name="reponse" placeholder="reponse Simple"><input type="radio" name="radio" value="" id="check"><button type="button" class="btn btn-danger btn_remove" id="'+i+'">X</button>');
            }else if(typeReponse=='multiple'){
                $("#Zone-reponse").append('<input type="text" class="form-control border-primary bg-light rep" id="reponse'+i+'" name="reponse" placeholder="reponse multiple"><input type="checkbox" name="check" value="" id=""><button type="button" class="btn btn-danger btn_remove" id="'+i+'">X</button>');
            }else{
                $("#Zone-reponse").append('<input type="text" class="form-control border-primary bg-light rep" id="reponse'+i+'" name="reponse" placeholder="reponse text"><button type="button" class="btn btn-danger btn_remove" id="'+i+'">X</button>');
            }



        });
        $('document').on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#reponse'+button_id+'').remove();
        });

        $("enregistrer").click(function(){
            var question = $("#question").val();
            var nbrPoint= $("#nbrPoint").val();
            var typeReponse= $("#typeReponse").val();
            var reponse= $("#reponse");
            $.ajax({
                url:"./traitement/add_question",
                method:"POST",
                data:{question:question, nbrPoint:nbrPoint, typeReponse:typeReponse, reponse:reponse},
                success:function(data){
                    alert(data);
                    $('#question').val('');
                    $('#nbrPoint').val('');
                    $('#typeReponse').val('');
                    $('#reponse').val('');
                    $('#questionnaire').text(data);
                  
                }
            });
        });

    });

</script>
