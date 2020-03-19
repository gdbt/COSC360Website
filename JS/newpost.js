function validateForm(){
    var posttitle = document.forms["postmake"]["posttitle"].value;
    var postdesc = document.forms["postmake"]["postdesc"].value;
    if (posttitle == ""){
        alert("Post Title must be filled out.");
        return false;
    }else if(postdesc ==""){
	alert("Post Description must be filled out.");
	return false;
    }else{
        window.location.href = "../php/newpost.php";
    }
}
