<?php
session_start();

// this variable will check if user has searched or not
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the selected city
  // $string=null;
  // if (isset($_POST['area'])) {

  // }               
  if (isset($_POST['metro_cities_india'])){ 
    $_SESSION['city'] = $_POST['metro_cities_india'];
  }
    if (isset($_POST['area'])) {
      $_SESSION['area'] = $_POST['area'];
    } else {
      $_SESSION['area'] = [];
    }
  }
  header("location:index.php");
?>