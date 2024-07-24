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
  require_once "components/login.php";
  include_once "components/signup.php";
  $searched = false;
  ?>
  <nav class="navbar">
    <?php require "components/navbar.php" ?>
  </nav>

  <div class="content">
    <!-- filters -->
    <div class="filters w-25 mx-1">
      <form id="autoFilters" action="getContent.php" method="post" id="filter-form">
        <!-- range -->
        <div class="price-range my-4">
          <input type="range" min="2000" max="50000" onchange="autoSubmit()" value="<?php echo isset($_SESSION['priceRange']) ?  ($_SESSION['priceRange']) : '2000' ?>" class="slider" name="priceRange" id="priceRange">
          <p>Price: <span id="priceValue">Rs.<?php echo isset($_SESSION['priceRange']) ?  ($_SESSION['priceRange']) : '2000' ?>/month</span></p>
        </div>
        <!-- radio buttons -->
        <div class="gender mx-3 mx-auto">
          <label>
            <input type="radio" name="gender" value="boys" onchange="autoSubmit()" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'boys')  ?  'checked' : '' ?>> Boys
          </label>
          <label>
            <input type="radio" name="gender" value="girls" onchange="autoSubmit()" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'girls')  ?  'checked' : '' ?>> Girls
          </label>
        </div>
        <!-- checkboxes for types -->

        <div class="my-4 mx-4 px-1">
          <div class="form-check mx-1">
            <input class="form-check-input" type="checkbox" id="flatsCheckbox" name="accommodation[]" value="FLAT" onchange="autoSubmit()" <?php echo (isset($_SESSION['accommodations']) && in_array('FLAT', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="flatsCheckbox">
              FLATS
            </label>
          </div>
          <div class="form-check mx-1">
            <input class="form-check-input" type="checkbox" id="pgsCheckbox" name="accommodation[]" value="PG" onchange="autoSubmit()" <?php echo (isset($_SESSION['accommodations']) && in_array('PG', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="pgsCheckbox">
              PGs
            </label>
          </div>
          <div class="form-check mx-1">
            <input class="form-check-input" type="checkbox" id="hostelsCheckbox" name="accommodation[]" value="HOSTEL" onchange="autoSubmit()" <?php echo (isset($_SESSION['accommodations']) && in_array('HOSTEL', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
            <label class="form-check-label" for="hostelsCheckbox">
              HOSTELS
            </label>
          </div>
        </div>
        
        <div class="facilities mx-4 px-2">
          <strong>Facilities</strong>

          <!-- High Priority (Essential Needs) -->
          <div>
            <!-- <h6>Essential Needs</h6> -->
            <input class="form-check-input" type="checkbox" id="wifi" name="facility[]" value="wifi" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('wifi', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="wifi">Internet Wifi</label><br>

            <input class="form-check-input" type="checkbox" id="security" name="facility[]" value="security" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('security', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="security">Security</label><br>

            <input class="form-check-input" type="checkbox" id="furnished" name="facility[]" value="furnished" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('furnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="furnished">Furnished</label><br>

            <input class="form-check-input" type="checkbox" id="semifurnished" name="facility[]" value="semifurnished" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('semifurnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="furnished">Semi Furnished</label><br>

            <input class="form-check-input" type="checkbox" id="unfurnished" name="facility[]" value="unfurnished" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('unfurnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="furnished">Unfurnished</label><br>

            <input class="form-check-input" type="checkbox" id="parking" name="facility[]" value="parking"onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('parking', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="parking">Parking(Two Wheeler)</label><br>

            <input class="form-check-input" type="checkbox" id="cleaning" name="facility[]" value="cleaning"onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('cleaning', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="cleaning">Cleaning Services</label><br>

            <input class="form-check-input" type="checkbox" id="laundry" name="facility[]" value="laundry"onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('laundry', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="laundry">Laundry</label><br>

            <input class="form-check-input" type="checkbox" id="kitchen" name="facility[]" value="kitchen"onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('kitchen', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="kitchen">Kitchen Facilities/Mess</label><br>

            <input class="form-check-input" type="checkbox" id="storage" name="facility[]" value="storage"onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('storage', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="storage">Personal Storage Space</label><br>
          </div>
          <!-- Medium Priority (Conducive Study Environment and Basic Comfort) -->
          <div>
            <!-- <h6>Study Environment / Basic Comfort:</h6> -->
            <input class="form-check-input" type="checkbox" id="study" name="facility[]" value="study" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('study', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="study">Study Area</label><br>

            <input class="form-check-input" type="checkbox" id="transport" name="facility[]" value="transport" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('transport', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="transport">Proximity to Public Transportation</label><br>
          </div>
          <div>
            <!-- <h6>Social Amenities:</h6> -->
            <input class="form-check-input" type="checkbox" id="gym" name="facility[]" value="gym" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('gym', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="gym">Gym</label><br>

            <input class="form-check-input" type="checkbox" id="socialFacilities" name="facility[]" value="socialFacilities" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('socialFacilities', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="socialFacilities">Social Facilities</label><br>


          </div>
          <div>
            <!-- <h6>Personal Preferences :</h6> -->
            <input class="form-check-input" type="checkbox" id="petPolicy" name="facility[]" value="petPolicy" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('petPolicy', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="petPolicy">Pet Policy</label><br>

            <input class="form-check-input" type="checkbox" id="roommates" name="facility[]" value="roommates" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('roommates', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="roommates">Compatible Roommates</label><br>

            <input class="form-check-input" type="checkbox" id="leaseTerms" name="facility[]" value="leaseTerms" onchange="autoSubmit()" <?php echo (isset($_SESSION['facilities']) && in_array('leaseTerms', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
            <label for="leaseTerms">Flexible Lease Terms</label><br>
          </div>
        </div>
      </form>
    </div>
    <!-- properties -->
    <div class="properties mx-1">
      <div class="for-mob">
        <form id="citySearch" class="search mx-3 for-mob-search" action="citysearch.php" method="post" role="search">
            <select id="metro_cities_india_index_page" class="cities mx-2 form-control me-2" name="metro_cities_india" onchange='autoSubmitCity()'>
            <option value="<?php echo isset($_SESSION['city']) ?  ($_SESSION['city']) : 'Select Your City' ?>"><?php echo isset($_SESSION['city']) ?  ($_SESSION['city']) : 'Select Your City' ?></option>
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
            <input class="search-input form-control" type="search" id="search-input" placeholder="Shivaji Nagar" aria-label="Search"  onchange="autoSubmitCity()">
            <span class="btn btn-outline-success mx-1" onclick="addAreaIndex()" >Add</span>
          </div>
        </form>
        <br>
      </div>
      <div class="my-3">
        <ul id="index-list" class="me-auto mb-2 mb-lg-0 for-mob"></ul>
      </div>
      <p>
        <?php
        // Check if the session variable is set
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
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
        }
        ?>
      </p>
      <!-- card -->

      <div id="response"></div>
      <div>
          <div class="for-mob-burger">
            <?php
              include "burger.php";
            ?>
          </div>
        <?php

        // }                
        // echo "Selected City: " . htmlspecialchars($city) . "<br>";
        include_once "components/db_connection.php";
        $sql = "SELECT * FROM properties";
        if (isset($_SESSION['city'])) {
          $city = $_SESSION['city'];
          $sql = $sql . " WHERE city = '$city'";
        }

        //To show flats in particular price range

        if (!isset($_SESSION['city'])) {
          echo '
        <div class="w-75 m-auto my-3 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>please select your city .</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        } else {
          
          if($_SESSION['area']){
              $area=$_SESSION['area'];
              $sql = $sql . "AND area_location IN ('"
              . implode("','", $area)
              . "')";
          }

          if (isset($_SESSION['priceRange'])) {
            $LowPriceRange = $_SESSION['priceRange'] - 2000;
            $HighPriceRange = $_SESSION['priceRange'] + 2000;
            $sql = $sql . " AND rent BETWEEN '$LowPriceRange' And '$HighPriceRange'";
          }

          if (isset($_SESSION['gender'])) {
            $gender = $_SESSION['gender'];
            $sql = $sql . " AND gender = '$gender'";
          }

          if (isset($_SESSION['accommodations'])) {
            $accom = $_SESSION['accommodations'];
            $sql = $sql . "AND flat_pg_hostel IN ('"
              . implode("','", $accom)
              . "')";
          }

          //facilities 
         //checkinh internet wifi
          if(isset($_SESSION['facilities']) && in_array('wifi', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where wifi='1')";
          }
          
          // checking safety security
          if(isset($_SESSION['facilities']) && in_array('security', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where safety_security='1')";
          }
          
          //furnished
          if(isset($_SESSION['facilities']) && in_array('furnished', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where furnished='1')";
          }

          // parking
          if(isset($_SESSION['facilities']) && in_array('parking', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where parking='1')";
          }
          //cleaning services 
          if(isset($_SESSION['facilities']) && in_array('cleaning', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where cleaning_services='1')";
          }

          //laundry
          if(isset($_SESSION['facilities']) && in_array('laundry', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where laundry='1')";
          }

          // kitchen
          if(isset($_SESSION['facilities']) && in_array('kitchen', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where kitchen_facilities='1')";
          }
          //storage
          if(isset($_SESSION['facilities']) && in_array('storage', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where storage_space='1')";
          }
          
          //transport
          if(isset($_SESSION['facilities']) && in_array('transport', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where proximity_to_public_transport='1')";
          }
          
          //gym
          if(isset($_SESSION['facilities']) && in_array('gym', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where gym='1')";
          }

          //pet policy
          if(isset($_SESSION['facilities']) && in_array('petPolicy', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where pet_policy='1')";
          }

          //leaseTerms
          if(isset($_SESSION['facilities']) && in_array('leaseTerm', $_SESSION['facilities']))
          {
            $sql.="AND id IN(SELECT id FROM property_facilities where flexible_lease_terms='1')";
          }

        }

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


          echo '
                  <div class="property-details">
                    <div class="d-flex">
                      <img class="map-logo" src="Images/gmapsymbol.png" alt="">
                      <div class="addressInfo">
                        <p class="address">' . $maintype . ' for ' . $gender . ' in "' . $street_address . '"  <strong>' . $area_location . '</strong>  ' . $city . '</p>
                        <p class="nearPlace">2 km form Fergusson College pune</p>
                      </div>
                    </div>
                    <div class="card">
                      <div class="carouse-contain">
                      <i class="fas fa-expand text-light"></i>
                        <div class="carouse">';
          if ($result2) {
            while ($row = mysqli_fetch_row($result2)) {
              // Loop through each field in the row
              $k = 0; // for skipping id field
              foreach ($row as $field) {
                if ($field == "") {
                  break; // Stop processing this row if a null value is encountered
                }
                if ($k > 0) {
                  echo '
              <div class="carouse-item">
                <img src="Images/' . $field . '" alt="Image 1">
              </div>';
                }
                $k++;
              }
            }
          } else {
            echo '
                        <div class="carouse-item">
                          <img src="" class="text-light text-center" alt="Images Not Provided">
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
                          <p class="grid-item text-dark"><strong class="text-success">Rs.' . $rent . '</strong>/mon</p>
                          <p class="grid-item">' . $gender . '</p>
                          <p class="grid-item">' . $type . '</p>
                          <p class="grid-item removable">Internet/Wifi 5G</p>
                          <p class="grid-item removable">Laundary</strong></p>
                          <p class="m-auto removable"><a href="moreInfo.php?p_id=' . $id . '">View Details</a></p>    
                        </div>
        
                        <div class="info-buttons d-flex">
                        <a href="' . $location_url . '">
                        <button type="button" class="btn btn-outline-primary m-2"><i class="fa-solid fa-location-dot"></i></button>
                        </a>
                          <button type="button" class="btn btn-outline-primary m-2"><i class="fa-solid fa-phone"></i></button>
                          <button type="button" class="btn btn-outline-primary c-w-o m-2"><i class="fa-brands fa-telegram"></i></button>
                          <button type="button" id="moreDetailsBtn" class="btn btn-outline-primary m-2"><a  href="moreInfo.php?p_id=' . $id . '" class="text-primary">More..</a></button>   
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



        // Retrieve the areas
        ?>
      </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/85590c8254.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</body>

</html>


<script>
  // $(document).ready(function() {
  //   $('.myForm_filters').on('change', function(e) {
  //     e.preventDefault();
  //     $.ajax({
  //       type: 'POST',
  //       url: 'getContent.php',
  //       data: $(this).serialize(),
  //       success: function(response) {
  //         $('#response').html(response);
  //       }
  //     });
  //   });
  // });
</script>