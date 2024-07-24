<?php
session_start(); // Start the session

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the price range
    if (isset($_POST['priceRange'])) {
        $_SESSION['priceRange'] = $_POST['priceRange'];
        echo "Selected Price Range: Rs." . htmlspecialchars($_SESSION['priceRange']) . "/month<br>";
    }

    // Retrieve the gender
    if (isset($_POST['gender'])) {
        $_SESSION['gender'] = $_POST['gender'];
        echo "Selected Gender: " . htmlspecialchars($_SESSION['gender']) . "<br>";
    }

    // Retrieve the types of accommodations
    if (isset($_POST['accommodation'])) {
        $_SESSION['accommodations'] = $_POST['accommodation'];
    } else {
        $_SESSION['accommodations'] = [];
    }

    echo "Selected Accommodations: ";
    foreach ($_SESSION['accommodations'] as $accommodation) {
        echo htmlspecialchars($accommodation) . " ";
    }
    echo "<br>";

    // Retrieve the selected facilities
    if (isset($_POST['facility'])) {
        $_SESSION['facilities'] = $_POST['facility'];
    } else {
        $_SESSION['facilities'] = [];
    }

    echo "Selected Facilities: ";
    foreach ($_SESSION['facilities'] as $facility) {
        echo htmlspecialchars($facility) . " ";
    }
    echo "<br>";
} else {
    echo "No form data received.";
}

header("location:index.php");

?>
