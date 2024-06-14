// login_validation.js

function validateLoginForm() {
    var email = document.getElementById("username_login").value;
    var password = document.getElementById("password_login").value;

    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (password === "") {
        alert("Please enter your password.");
        return false;
    }

    return true;
}

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}



function togglePasswordVisibility(passwordFieldId) {
    var passwordField = document.getElementById(passwordFieldId);
    var passwordIcon = document.getElementById("hide");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordIcon.classList.remove("fa-eye");
        passwordIcon.classList.add("fa-eye-slash");
        passwordIcon.style.color='grey';
    } else {
        passwordField.type = "password";
        passwordIcon.classList.remove("fa-eye-slash");
        passwordIcon.classList.add("fa-eye");
    }  
}

function togglePasswordVisibilityShowBtn(passwordFieldId) {
    var passwordField = document.getElementById(passwordFieldId);
    var btnContent=document.getElementsByClassName("show-password");
    if (passwordField.type === "password") {
        btnContent.innerHTML='hide';
    passwordField.type = "text";
    } else {
    btnContent.innerHTML='show';
    passwordField.type = "password";
    }
}
