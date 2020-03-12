function validateForm(){
    var userName = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;
    if ( userName == "" || password == "" ){
        alert("User name and password must be filled out.");
        return false;
    }else{
        window.location.href = "./php/login.php";
    }
}
