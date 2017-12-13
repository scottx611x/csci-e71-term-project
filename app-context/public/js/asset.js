showComputerForm();
function showComputerForm() {
    if (document.getElementById("is_computer").checked == true) {
        document.getElementById("computer_form").style.display = "block";
    } else {
        document.getElementById("computer_form").style.display = "none";
    }
}

showOutofserviceForm();
function showOutofserviceForm() {
    if (document.getElementById("is_out_of_service").checked == true) {
        document.getElementById("outofservice_form").style.display = "block";
    } else {
        document.getElementById("outofservice_form").style.display = "none";
    }
}
