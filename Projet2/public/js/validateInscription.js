// get element dom

const form= document.getElementById('form');
const nom= document.getElementById('nom');
const prenom= document.getElementById('prenom');
const login= document.getElementById('login');
const password= document.getElementById('password');
const password2= document.getElementById('password2');
const image= document.getElementById('file');

// function
    function CheckRequired(inputArray){
        inputArray.forEach(input => {
            if(input.value.trim()===''){
                showError(input, `${input.id} est obligatoire`)
            }else{
                showSuccess(input);
            }
        });
    }

    function showError(input, message){
        const formGr=input.parentElement;
        formGr.ClassName= 'form-gr error';

    }

    function showSuccess(input, message){
        const formGr=input.parentElement;
        formGr.ClassName= 'form-gr success';

        const small =formGr.querySelector('small');
        small.innerText= message;
    }
//evement
form.addEventListener("submit", (e)=>{
    // e.preventDefault();
    CheckRequired([nom,prenom,login,password,password2,image]);
});