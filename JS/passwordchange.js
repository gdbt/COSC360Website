function newpas(){
    var newpass = document.forms["newpass"]["newPW"].value;
    var renewpass = document.forms["newpass"]["re_newPW"].value;
    if((newpass == "") || (renewpass == "")){
        alert("Please fill in both input fields");
        return false;
    }
    else if(newpass != renewpass){
        alert("Please make sure both passwords match.")
        return false;
    }
    else{
        window.location.href ="./login.html";
    }
}
function valsecurity(){
    var secanswer = document.forms["secanswer"]["getsecanswer"].value;
    var newpass = document.forms["secanswer"]["getpass"].value;
    var renewpass = document.forms["secanswer"]["getpassconf"].value;

    if(secanswer == "" || newpass == "" || renewpass == ""){
        alert("Please input all values");
        return false;
    }
    else if(newpass != renewpass){
        alert("Please make sure both passwords match.")
        return false;
    }
    else{
        window.location.href ="NewPWSetup.html";
    }
}
function valname(){
    var name = document.forms["accNameCheck"]["getUserName"].value;
    if(name == ""){
        alert("Please do not leave blank");
        return false;
    }
    else{
        window.location.href ="forgotPWsecurity.html";
    }
}
