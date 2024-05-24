<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RentalApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  include "components/login.php";
  include "components/signup.php";
  ?>
  <nav class="navbar">
    <?php require "components/navbar.php" ?>
  </nav>
  
  <div class="content">
    
    <!-- filters -->
    <div class="filters w-25 mx-1">
      <!-- range -->
      <div class="price-range my-4">
        <input type="range" min="1000" max="20000" value="1000" class="slider" id="priceRange">
        <p>Price: <span id="priceValue">Rs.1000/month</span></p>
      </div>
      <!-- radio buttons -->
      <div class="gender mx-3 mx-auto">
        <label>
          <input type="radio" name="gender" value="boys" checked> Boys
        </label>
        <label>
          <input type="radio" name="gender" value="girls"> Girls
        </label>
      </div>
      <!-- checkboxes for types -->
      <div class="my-4 mx-4 px-1">
        <div class="form-check mx-1">
          <input class="form-check-input" type="checkbox" id="flatsCheckbox" value="FLATS">
          <label class="form-check-label" for="flatsCheckbox">
            FLATS
          </label>
        </div>
        <div class="form-check mx-1">
          <input class="form-check-input" type="checkbox" id="pgsCheckbox" value="PGs">
          <label class="form-check-label" for="pgsCheckbox">
            PGs
          </label>
        </div>
        <div class="form-check mx-1">
          <input class="form-check-input" type="checkbox" id="hostelsCheckbox" value="HOSTELS">
          <label class="form-check-label" for="hostelsCheckbox">
            HOSTELS
          </label>
        </div>
      </div>
      <div class="facilities mx-4 px-2">
        <h6>Facilities :</h6>
        <input class="form-check-input" type="checkbox" id="wifi" name="facility[]" value="wifi">
        <label for="wifi">Wi-Fi</label><br>

        <input class="form-check-input" type="checkbox" id="wifi" name="facility[]" value="wifi">
        <label for="wifi">Food / Mess</label><br>

        <input class="form-check-input" type="checkbox" id="laundry" name="facility[]" value="laundry">
        <label for="laundry">Laundry</label><br>

        <input class="form-check-input" type="checkbox" id="gym" name="facility[]" value="gym">
        <label for="gym">Gym</label><br>

        <input class="form-check-input" type="checkbox" id="study" name="facility[]" value="study">
        <label for="study">Study Area</label><br>

        <input class="form-check-input" type="checkbox" id="parking" name="facility[]" value="parking">
        <label for="parking">Parking</label><br>

        <input class="form-check-input" type="checkbox" id="security" name="facility[]" value="security">
        <label for="security">Security</label><br>

        <input class="form-check-input" type="checkbox" id="furnished" name="facility[]" value="furnished">
        <label for="furnished">Furnished</label><br>

      </div>
    </div>
    <!-- properties -->
    <div class="properties w-75 mx-1">
    <p><?php


// Check if the session variable is set
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
  echo '
  <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
   Welcome '.$_SESSION['username'].' you are logged in successfully ! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
} else {
  echo '
  <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
    please log in for better experience !
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
</p>
      <!-- card -->
      <div class="property-details">
        <div class="d-flex">
          <img class="map-logo" src="Images/gmapsymbol-removebg-preview.png" alt="">
          <div class="addressInfo">
            <p class="address" style="font-size:17px;">Gokhale Nagar ,Near Tukaram Omble Ground, Pune</p>
            <p class="nearPlace">2 km form Fergusson College pune</p>
          </div>
        </div>
        <div class="card">
          <div class="carouse-contain">
            <div class="carouse">
              
              <div class="carouse-item">
                <i class="fas fa-expand text-light"></i>
                <img src="Images/diningHall.jpeg" alt="Image 1">
              </div>
              <div class="carouse-item">
                <img src="Images/bedroom.jpeg" alt="Image 2">
              </div>
              <div class="carouse-item">
                <img src="Images/livingroom.jpeg" alt="Image 3">
              </div>
              <div class="carouse-item">
                <img src="Images/kitchen.jpeg" alt="Image 3">
              </div>
              <div class="carouse-item">
                <img src="Images/washroom.jpeg" alt="Image 3">
              </div>
            </div>
            <button class="prev" onclick="prevSlide(0)">&#10094;</button>
            <button class="next" onclick="nextSlide(0)">&#10095;</button>
          </div>
          <div class="Info grid-container">
            <div class="info-content">
              <p class="grid-item text-dark">$7000/month</p>
              <p class="grid-item">Furnished</p>
              <p class="grid-item">Parking</p>
              <p class="grid-item">Internet/Wifi 5G</p>
              <p class="grid-item">Laundary</p>
              <p class="m-auto"><button type="button" class="btn btn-primary mx-1"><a href="moreInfo.php" class="text-light">More Info</a></button></p>    
            </div>
            <div class="rating">
              <span><img id="img1" src="Images/star_1828884.png" alt=""></span>
              <span><img id="img2" src="Images/star_1828884.png" alt=""></span>
              <span><img id="img3" src="Images/star_1828884.png" alt=""></span>
              <span><img id="img4" src="Images/star_1828970.png" alt=""></span>
              <span><img id="img5" src="Images/star_1828970.png" alt=""></span>
            </div>
            <div class="info-buttons d-flex">
              <button type="button" class="btn btn-primary mx-1">Location</button>
              <button type="button" class="btn btn-primary mx-1">Contact Owner</button>
              <button type="button" class="btn btn-primary mx-1">Chat With Owner</button>
            </div>
          </div>
        </div>
        <!-- <div class="Reviews">Reviews</div> -->
      </div>
      <hr class="my-5">
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/85590c8254.js" crossorigin="anonymous"></script>
</body>

</html>