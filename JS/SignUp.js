var displayPic = function(event){
    var output = document.getElementById('R1C1');
    output.src = URL.createObjectURL(event.target.files[0]);
};

function validateForm(){
    var userName = document.forms["SignUp"]["username"].value;
    var password = document.forms["SignUp"]["password"].value;
    var comfirm_password = document.forms["SignUp"]["comfirm_password"].value;
    var gender = document.forms["SignUp"]["gender"].value;
    var ans = document.forms["SignUp"]["security_answer"].value;
    if ( userName == "" || password == "" || comfirm_password == ""){
        alert("User name and password must be filled out.");
        return false;
    }else if ( password != comfirm_password ) {
        alert("Your password does not match. Please try again");
        return false;
    }else if ( gender =="Null") {
        alert("Please choose one of the gender options or select 'Other/ Prefer not to tell'. ");
        return false;
    }else if ( ans == "" ){
        alert("For security resons, please fill up the security question and answer.");
        return false;
    }else{  
        window.location.href = "./MainLoggedin.html";
    }
}