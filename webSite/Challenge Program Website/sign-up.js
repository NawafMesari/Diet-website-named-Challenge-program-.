

function start(){

    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirmPassword");

   
    confirmPassword.addEventListener("input",Cheak,"false");
    password.addEventListener("input",Cheak,"false");

}

function Cheak(){

    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword");
    var confirmvalue = confirmPassword.value;


    if(password == confirmvalue){
        confirmPassword.setAttribute("style","border:3px solid green");
    }else{
        confirmPassword.setAttribute("style","border:3px solid red");
    }

    


}
addEventListener("load",start,false);