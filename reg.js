$(document).ready(function () {
    $("#submit").click(function () {
        var emailID = document.getElementById('emialID').value;
        var pword = document.getElementById('pword').value;

        if (emailID.length == 0) {
            alert("Please input an email.");
        } else if (pword.length == 0) {
            alert("Please input a password.");
        }
    });
});