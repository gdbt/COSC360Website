function requestcheck(){
    var channelName = document.forms["channelmake"]["channel"].value;
    if(channelName ==""){
        alert("You must pick a name.");
        return false;
    }
    else{
        window.location.href="redirect.html";
    }
}