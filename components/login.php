<!-- Button trigger modal -->

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-form {
        background-color: #ffffff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 275px;
    }

    .login-form h2 {
        text-align: center;
        margin: auto;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
        margin: auto;
    }

    .form-group label {
        display: block;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 5px;
        border: 1px solid #cccccc;
        border-radius: 5px;
    }

    .form input {
        padding: 3px;
    }

    .form-group input[type="submit"] {
        width: 100%;
        padding: 1px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #ffffff;
        cursor: pointer;
        transition: background-color 0.3s;
        padding: 5px;
        margin-top: 15px;
    }

    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .form-group input {
        width: 100%;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 5px;
    }

    .form-group i {
        margin-top: 9px;
        margin-right: 5px;
        position: absolute;
    }

    .show-password{
        display: none;
    }

   
    @media (max-width: 1035px){
        .show-password
        {
            display: block;
            position: absolute;
            right: 31%;
            margin-top: 5px;
        }
        .form-group i{
            display: none;
        }
    }
    
    @media (min-width: 320px) and (max-width: 400px)
    {
        .show-password
        {
            position: absolute;
            right: 23%;
            margin-top: 5px;
        }   
    }
    
</style>
<!-- Modal -->
<div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Welcome to RentApp</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login-form" onsubmit="return validateLoginForm()">
                        <h2>Login</h2>
                        <div class="form-group">
                            <label for="username_login">Username:</label>
                            <input type="email" id="username_login" class="p-1 form-control me-2" name="username_login" placeholder="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password_login">Password:</label>
                            <i id="hide" class="fas fa-eye" onclick="togglePasswordVisibility('password_login')"></i>
                            <span id="show-password" class="show-password text-primary" onclick="togglePasswordVisibilityShowBtn('password_login')">show</span>
                            <input type="password" id="password_login" class="p-1 form-control me-2" name="password_login" placeholder="password" required>
                        </div>
                        <a href="" class="mx-4">Forgot Password ?</a>
                        <div class="form-group">
                            <input type="submit" class="bg-primary p1 form-control me-2" value="Login">
                        </div>
                    </form>
                </div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "rentalapp";
                $isFailed=false;
                $userExist=true;

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                //credentials
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['username_login']) || isset($_POST['password_login'])) {
                            $email = $_POST['username_login'];
                            $password = $_POST['password_login'];
                            $query = "SELECT * FROM users WHERE email='$email'";
                            $result = mysqli_query($conn, $query);
                            $row_num = mysqli_num_rows($result);
                            if ($row_num == 0) {
                                $userExist=false;
                            } else if ($row_num == 1) {
                                $row = mysqli_fetch_assoc($result);
                                $name = $row['username'];
                                $hashed_password = $row['password'];
                                if (password_verify($password, $hashed_password)) {
                                    session_start();
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['username'] = $name;
                                } else {
                                    $isFailed="true";
                                }
                            }
                        }
                    }
                    mysqli_close($conn);
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
                    sign up
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script src="components/login_validation.js"></script>