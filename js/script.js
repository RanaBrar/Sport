function validate() {
    var name = document.myForm.name.value; // get name field value
    var status = false; //declare status variable
    if (name == "") {
        document.getElementById("name").innerHTML =
            "Please enter name !!!";
        document.myForm.name.focus();
        status = false;
    } else {
        document.getElementById("name").innerHTML =
            "";
        status = true;
    }


    return status;
}