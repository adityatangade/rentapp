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
        <div class="burger-icon" onclick="openNav()"><i class="fa-solid fa-filter" style="color:grey;font-size:25px;"></i></div>
        <nav class="side-nav z-2" id="sideNav">
            <!-- <a href="javascript:void(0)" class="closebtn my-5" onclick="closeNav()">&times;</a> -->
            <!-- filters -->
            <div id="mob-filters" class="mob-filters w-25 mx-1 my-4">

                <form id="autoFilters" action="getContent.php" method="post">
                    <!-- range -->
                     <div class="submit-btn">
                        <button class="btn btn-success" type="submit" id="submit-btn" onclick="autoSubmit()" >click to filter</button>
                     </div>
                    <div class="price-range container my-7">
                        <input type="range" min="2000" max="50000"  value="<?php echo isset($_SESSION['priceRange']) ?  ($_SESSION['priceRange']) : '2000' ?>" class="slider" name="priceRange" id="mob-priceRange">
                        <p>Price: <span id="mob-priceValue">Rs.<?php echo isset($_SESSION['priceRange']) ?  ($_SESSION['priceRange']) : '2000' ?>/month</span></p>
                    </div>
                    <!-- radio buttons -->
                    <div class="gender container mx-2">
                        <label>
                            <input type="radio" name="gender" value="boys"  <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'boys')  ?  'checked' : '' ?>> Boys
                        </label>
                        <label>
                            <input type="radio" name="gender" value="girls"  <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'girls')  ?  'checked' : '' ?>> Girls
                        </label>
                    </div>
                    <!-- checkboxes for types -->

                    <div class="my-4 container mx-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="flatsCheckbox" name="accommodation[]" value="FLAT"  <?php echo (isset($_SESSION['accommodations']) && in_array('FLAT', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="flatsCheckbox">
                                FLATS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="pgsCheckbox" name="accommodation[]" value="PG"  <?php echo (isset($_SESSION['accommodations']) && in_array('PG', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="pgsCheckbox">
                                PGs
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hostelsCheckbox" name="accommodation[]" value="HOSTEL"  <?php echo (isset($_SESSION['accommodations']) && in_array('HOSTEL', $_SESSION['accommodations'])) ? 'checked' : ''; ?>>
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
                            <input class="form-check-input" type="checkbox" id="wifi" name="facility[]" value="wifi"  <?php echo (isset($_SESSION['facilities']) && in_array('wifi', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="wifi">Internet Wifi</label><br>

                            <input class="form-check-input" type="checkbox" id="security" name="facility[]" value="security"  <?php echo (isset($_SESSION['facilities']) && in_array('security', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="security">Security</label><br>

                            <input class="form-check-input" type="checkbox" id="furnished" name="facility[]" value="furnished"  <?php echo (isset($_SESSION['facilities']) && in_array('furnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="furnished">Furnished</label><br>

                            <input class="form-check-input" type="checkbox" id="semifurnished" name="facility[]" value="semifurnished"  <?php echo (isset($_SESSION['facilities']) && in_array('semifurnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="furnished">Semi Furnished</label><br>

                            <input class="form-check-input" type="checkbox" id="unfurnished" name="facility[]" value="unfurnished"  <?php echo (isset($_SESSION['facilities']) && in_array('unfurnished', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="furnished">Unfurnished</label><br>

                            <input class="form-check-input" type="checkbox" id="parking" name="facility[]" value="parking"  <?php echo (isset($_SESSION['facilities']) && in_array('parking', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="parking">Parking(Two Wheeler)</label><br>

                            <input class="form-check-input" type="checkbox" id="cleaning" name="facility[]" value="cleaning"  <?php echo (isset($_SESSION['facilities']) && in_array('cleaning', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="cleaning">Cleaning Services</label><br>

                            <input class="form-check-input" type="checkbox" id="laundry" name="facility[]" value="laundry"  <?php echo (isset($_SESSION['facilities']) && in_array('laundry', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="laundry">Laundry</label><br>

                            <input class="form-check-input" type="checkbox" id="kitchen" name="facility[]" value="kitchen"  <?php echo (isset($_SESSION['facilities']) && in_array('kitchen', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="kitchen">Kitchen Facilities/Mess</label><br>

                            <input class="form-check-input" type="checkbox" id="storage" name="facility[]" value="storage"  <?php echo (isset($_SESSION['facilities']) && in_array('storage', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="storage">Personal Storage Space</label><br>
                        </div>
                        <!-- Medium Priority (Conducive Study Environment and Basic Comfort) -->
                        <div>
                            <!-- <h6>Study Environment / Basic Comfort:</h6> -->
                            <input class="form-check-input" type="checkbox" id="study" name="facility[]" value="study"  <?php echo (isset($_SESSION['facilities']) && in_array('study', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="study">Study Area</label><br>

                            <input class="form-check-input" type="checkbox" id="transport" name="facility[]" value="transport"  <?php echo (isset($_SESSION['facilities']) && in_array('transport', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="transport">Proximity to Public Transportation</label><br>
                        </div>
                        <div>
                            <!-- <h6>Social Amenities:</h6> -->
                            <input class="form-check-input" type="checkbox" id="gym" name="facility[]" value="gym"  <?php echo (isset($_SESSION['facilities']) && in_array('gym', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="gym">Gym</label><br>

                            <input class="form-check-input" type="checkbox" id="socialFacilities" name="facility[]" value="socialFacilities"  <?php echo (isset($_SESSION['facilities']) && in_array('socialFacilities', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="socialFacilities">Social Facilities</label><br>


                        </div>
                        <div>
                            <!-- <h6>Personal Preferences :</h6> -->
                            <input class="form-check-input" type="checkbox" id="petPolicy" name="facility[]" value="petPolicy"  <?php echo (isset($_SESSION['facilities']) && in_array('petPolicy', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="petPolicy">Pet Policy</label><br>

                            <input class="form-check-input" type="checkbox" id="roommates" name="facility[]" value="roommates"  <?php echo (isset($_SESSION['facilities']) && in_array('roommates', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="roommates">Compatible Roommates</label><br>

                            <input class="form-check-input" type="checkbox" id="leaseTerms" name="facility[]" value="leaseTerms"  <?php echo (isset($_SESSION['facilities']) && in_array('leaseTerms', $_SESSION['facilities'])) ? 'checked' : ''; ?>>
                            <label for="leaseTerms">Flexible Lease Terms</label><br>
                        </div>
                    </div>
                </form>
            </div>

        </nav>
    </div>
    <script src="components/burger.js"></script>
</body>

</html>