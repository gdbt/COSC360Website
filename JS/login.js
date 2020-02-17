function validateForm(){
    var userName = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;
    var correctPW = 12345678;
    if ( userName == "" || password == "" ){
        alert("User name and password must be filled out.");
        return false;
    }else if ( password != correctPW ) {
        alert("Incorrect user name or password. Please try again.");
        return false;
    }else{  
        window.location.href = "./MainLoggedin.html";
    }
}