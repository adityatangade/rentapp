<?php
session_start();
?>
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
      <?php
      include "burger.php";
      ?>
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
        <h5>Facilities :</h5>

        <!-- High Priority (Essential Needs) -->
        <div>
          <h6>Essential Needs</h6>
          <input class="form-check-input" type="checkbox" id="wifi" name="facility[]" value="wifi">
          <label for="wifi">Wi-Fi</label><br>

          <input class="form-check-input" type="checkbox" id="security" name="facility[]" value="security">
          <label for="security">Security</label><br>

          <input class="form-check-input" type="checkbox" id="furnished" name="facility[]" value="furnished">
          <label for="furnished">Furnished</label><br>

          <input class="form-check-input" type="checkbox" id="bathroom" name="facility[]" value="bathroom">
          <label for="bathroom">Clean Bathroom</label><br>

          <input class="form-check-input" type="checkbox" id="kitchen" name="facility[]" value="kitchen">
          <label for="kitchen">Kitchen Facilities</label><br>
        </div>

        <!-- Medium Priority (Conducive Study Environment and Basic Comfort) -->
        <div>
          <h6>Study Environment / Basic Comfort:</h6>
          <input class="form-check-input" type="checkbox" id="study" name="facility[]" value="study">
          <label for="study">Study Area</label><br>

          <input class="form-check-input" type="checkbox" id="laundry" name="facility[]" value="laundry">
          <label for="laundry">Laundry</label><br>

          <input class="form-check-input" type="checkbox" id="transport" name="facility[]" value="transport">
          <label for="transport">Proximity to Public Transportation</label><br>
        </div>


        <div>
          <h6>Social Amenities:</h6>
          <input class="form-check-input" type="checkbox" id="commonAreas" name="facility[]" value="commonAreas">
          <label for="commonAreas">Common Areas</label><br>

          <input class="form-check-input" type="checkbox" id="cleaning" name="facility[]" value="cleaning">
          <label for="cleaning">Cleaning Services</label><br>

          <input class="form-check-input" type="checkbox" id="gym" name="facility[]" value="gym">
          <label for="gym">Gym</label><br>

          <input class="form-check-input" type="checkbox" id="storage" name="facility[]" value="storage">
          <label for="storage">Storage Space</label><br>

          <input class="form-check-input" type="checkbox" id="socialFacilities" name="facility[]" value="socialFacilities">
          <label for="socialFacilities">Social Facilities</label><br>

          <input class="form-check-input" type="checkbox" id="parking" name="facility[]" value="parking">
          <label for="parking">Parking</label><br>
        </div>


        <div>
          <h6>Personal Preferences :</h6>
          <input class="form-check-input" type="checkbox" id="petPolicy" name="facility[]" value="petPolicy">
          <label for="petPolicy">Pet Policy</label><br>

          <input class="form-check-input" type="checkbox" id="roommates" name="facility[]" value="roommates">
          <label for="roommates">Compatible Roommates</label><br>

          <input class="form-check-input" type="checkbox" id="leaseTerms" name="facility[]" value="leaseTerms">
          <label for="leaseTerms">Flexible Lease Terms</label><br>
        </div>
      </div>

    </div>
    <!-- properties -->
    <div class="properties mx-1">
      <div class="for-mob">
        <form class="search mx-3 for-mob-search" role="search">
          <select class="cities mx-2 form-control me-2" name="metro_cities_india" id="metro_cities_india_index_page">
            <option value="Ahmedabad">Ahmedabad</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Chennai">Chennai</option>
            <option value="Delhi">Delhi</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Jaipur">Jaipur</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Pune">Pune</option>
            <option value="Surat">Surat</option>
          </select> <br>
          <div class="add-area">
            <input class="search-input form-control me-2 " type="search" id="search-input" placeholder="Shivaji Nagar" aria-label="Search">
            <span class="btn btn-outline-success" onclick="addAreaIndex()">Add</span>
          </div>
        </form>
        <br>
      </div>
      <div class="my-3">
          <ul id="index-list" class="me-auto mb-2 mb-lg-0 for-mob"></ul>
        </div>
      <p><?php
          // Check if the session variable is set
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            echo '
  <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
  Login successful ! 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
          } else if ($signedup) {
            echo '
            <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
             You are registered Now ! Please login to continue . 
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          } else if ($isFailed) {
            echo '   <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
        login failed ! please try again .
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
          } else if (!$userExist) {
            echo '   <div class="alert alert-success alert-dismissible fade show w-75 mx-auto" role="alert">
        user does not exist ! please sign up if not have an account.
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
      <?php
      include_once "components/db_connection.php";
      $sql = 'SELECT * FROM properties limit 3';
      $result = mysqli_query($conn, $sql);
      $i = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $maintype = strtoupper($row['flat_pg_hostel']);
        $rent = $row['rent'];
        $type = $row['type'];
        $street_address = $row['address'];
        $area_location = $row['area_location'];
        $city = $row['city'];
        $location_url = $row['location_url'];
        $owner_id = $row['owner_id'];
        $gender = $row['gender'];
        $sql2 = "SELECT * FROM IMAGES WHERE id=$id";
        $result2 = mysqli_query($conn, $sql2);
        $img_row = mysqli_fetch_assoc($result2);
        $img_array = explode(",", $img_row['image_url']);
        $length = count($img_array);

        echo '
      <div class="property-details">
        <div class="d-flex">
          <img class="map-logo" src="Images/gmapsymbol.png" alt="">
          <div class="addressInfo">
            <p class="address">' . $maintype . ' ,"' . $street_address . '" ,' . $area_location . ' ,' . $city . '</p>
            <p class="nearPlace">2 km form Fergusson College pune</p>
          </div>
        </div>
        <div class="card">
          <div class="carouse-contain">
          <i class="fas fa-expand text-light"></i>
            <div class="carouse">';
        for ($j = 0; $j < $length; $j++) {
          echo '
              <div class="carouse-item">
                <img src="Images/' . $img_array[$j] . '" alt="Image 1">
              </div>';
        }
        echo '
            </div>
            <button class="prev" onclick="prevSlide(' . $i . ')">&#10094;</button>
            <button class="next" onclick="nextSlide(' . $i . ')">&#10095;</button>
          </div>
          <div class="info-container">
          <div class="Info grid-container">
           <div class="rating">
              <span><h5>3.5<i class="fa-solid fa-star" style="color: #FFD43B;"></i></h5></span>
            </div>
            <div class="info-content mx-auto">
              <p class="grid-item text-dark"><strong class="text-success">$' . $rent . '</strong>/month</p>
              <p class="grid-item">' . $gender . '</p>
              <p class="grid-item">' . $type . '</p>
              <p class="grid-item removable">Internet/Wifi 5G</p>
              <p class="grid-item removable">Laundary</strong></p>
              <p class="m-auto removable"><button type="button" class="btn btn-primary mx-1"><a href="moreInfo.php?p_id=' . $id . '" class="text-light">View Details</a></button></p>    
            </div>

            <div class="info-buttons d-flex">
            <a href="' . $location_url . '">
            <button type="button" class="btn btn-primary">Location</button>
            </a>
              <button type="button" class="btn btn-primary">Contact Owner</button>
              <button type="button" class="btn btn-primary c-w-o">Chat With Owner</button>
              <button type="button" id="moreDetailsBtn" class="btn btn-primary mx-1"><a href="moreInfo.php?p_id=' . $id . '" class="text-light">View Details</a></button>   
            </div>
          </div>
          </div>
        </div>
        <!-- <div class="Reviews">Reviews</div> -->
      </div>
      <hr class="my-5">';
        $i++;
      }
      mysqli_close($conn);
      ?>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/85590c8254.js" crossorigin="anonymous"></script>
</body>

</html>