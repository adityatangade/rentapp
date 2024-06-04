<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger Menu</title>
    <link rel="stylesheet" href="components/burger.css">
</head>
<body>
    <div class="burger-menu">
        <div class="burger-icon" onclick="openNav()">&#9776;</div>
        <nav class="side-nav z-2" id="sideNav">
            <a href="javascript:void(0)" class="closebtn my-5" onclick="closeNav()">&times;</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <a href="#profile" class="profile my-1"><div class="profile-div"><i class="fa-solid fa-user" style="color: white;"></i></div>
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                    echo '<p class="text-light">'.$_SESSION['username'].'</p>';
                }
            ?>
            </a>
        </nav>
    </div>
    <script src="components/burger.js"></script>
</body>
</html>
