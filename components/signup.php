<!-- Button trigger modal -->
<!-- Modal -->
<style>
    .signup-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .signup-form {
        background-color: #ffffff;
        padding: 5px;
        width: 300px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .signup-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 1px;
        border: 1px solid #cccccc;
        border-radius: 5px;
    }

    .form-group input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #ffffff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .error-message {
        color: #ff0000;
        font-size: 12px;
        margin-top: 5px;
    }

    .form-group i {
        margin-top: 9px;
        position: absolute;
        right: 145px;
    }
</style>

<div class="modal" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Start Your Search</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="signup-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signup-form" onsubmit="return validateForm()">
                        <h2>Sign Up</h2>
                        <a href="" class="mx-4">Already have an account ?</a>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" class="p-1 form-control me-2" name="username">
                            <div id="usernameError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="p-1 form-control me-2" name="email">
                            <div id="emailError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <i id="hide" class="fas fa-eye" onclick="hide('password')"></i>
                            <input type="password" id="password" class="p-1 form-control me-2" name="password">
                            <div id="passwordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <label for="c_password">Confirm Password:</label>
                            <i id="hide" class="fas fa-eye" onclick="hide('c_password')"></i>
                            <input type="password" id="c_password" class="p-1 form-control me-2" name="password">
                            <div id="c_passwordError" class="error-message"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rentalapp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // If there are no validation errors, proceed with inserting data into database
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Email already exists in the database";
        } else {
            // Insert data into database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if (mysqli_query($conn, $sql)) {
                echo "Sign up Successful! Please login to continue";
            } else {
                $errors[] = "Error: " . mysqli_error($conn);
            }
        }
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }


// Close connection
mysqli_close($conn);
?>

        </div>
    </div>

</div>

<script src="components/validations.js"></script>
<script src="components/signup_login_combine.js"></script>

