function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var c_password = document.getElementById("c_password").value;
    var usernameError = document.getElementById("usernameError");
    var emailError = document.getElementById("emailError");
    var passwordError = document.getElementById("passwordError");
    var c_passwordError = document.getElementById("c_passwordError");
  
    var valid = true;
  
    usernameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
  
    if (username == "") {
      usernameError.innerHTML = "Username is required";
      valid = false;
    }
  
    if (email == "") {
      emailError.innerHTML = "Email is required";
      valid = false;
    } else if (!isValidEmail(email)) {
      emailError.innerHTML = "Invalid email address";
      valid = false;
    }
  
    if (password == "") {
      passwordError.innerHTML = "Password is required";
      valid = false;
    }

    if(password != c_password){
      c_passwordError.innerHTML="Password does not match";
      valid=false;
    }
  
    return valid;
  }
  
  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  