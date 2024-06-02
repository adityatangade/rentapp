<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="moreInfo.css">
    <title>RentalApp-Property Info</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div>
        <?php
        session_start();
        ?>
    </div>
    <?php
    
    // Database connection parameters
    include "components/db_connection.php";
    $id = $_GET['p_id'];
    // Create connection
    ?>
    
    <div class="info_images d-flex p-2">
    <div class="carouse">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">

                <?php
                $sql2 = "SELECT * FROM IMAGES WHERE id=$id";
                $result2 = mysqli_query($conn, $sql2);
                $img_row = mysqli_fetch_assoc($result2);
                $img_array = explode(",", $img_row['image_url']);
                $length = count($img_array);
                for ($j = 0; $j < $length; $j++) {
                    echo '
              <div class="carousel-item active">
              <img src="Images/' . $img_array[$j] . '" class="d-block w-100" alt="...">
          </div>
              ';
                };
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
        <div class="info">
        <?php
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }            

    // SQL query to retrieve values from the property_facilities table based on ID
    $sql = "SELECT 
            wifi,
            food_mess,
            laundry,
            gym,
            study_area,
            parking,
            security,
            furnished,
            kitchen_facilities,
            proximity_to_public_transport,
            cleaning_services,
            storage_space,
            pet_policy,
            compatible_roommates,
            flexible_lease_terms 
        FROM property_facilities where id=$id";
        $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        $row = mysqli_fetch_assoc($result);
            // Accessing values from the row
        // Process the values (e.g., output them)
        echo '<div class="facility p-4">';
        echo '<h3>Facilities Provided : </h3>';
        echo '<ul class="facilities_list">';


        // Iterate through each field and output it if it's available
        foreach ($row as $fieldName => $value) {
            
                if ($value) {
                echo '<li>'; 
                if($fieldName=="food_mess"){
                 echo '<i class="fa-solid fa-bowl-food"></i><br>';
                }
                else if($fieldName=="wifi")
                {
                 echo '<i class="fa-solid fa-wifi"></i><br>';
                } 
                else if($fieldName=="parking"){
                    echo '<i class="fa-solid fa-square-parking"></i><br>';
                }
                else if($fieldName=="security"){
                    echo '<i class="fa-solid fa-shield-halved"></i><br>';
                }
                else if($fieldName=="furnished"){
                    echo '<i class="fa-solid fa-chair"></i><br>';
                }
                else if($fieldName=="clean_bathroom"){
                     echo '<br>';
                }
                 else if($fieldName=="kitchen_facilities"){
                    echo '<i class="fa-solid fa-utensils"></i><br>';
                }
                 else if($fieldName=="proximity_to_public_transport"){
                    echo '<i class="fa-solid fa-bus"></i><br>';
                }
                 else if($fieldName=="cleaning_services"){
                    echo '<i class="fa-solid fa-broom"></i><br>';
                }
                else if($fieldName=="flexible_lease_terms"){
                    echo '<i class="fa-solid fa-file-signature"></i><br>';
                }
                else if($fieldName == "compatible_roommates"){
                    echo '<i class="fa-solid fa-people-roof"></i><br>';
                }
                else if($fieldName=="study_area"){
                    echo '<i class="fa-solid fa-book-open-reader"></i><br>';
                }
                else if($fieldName=="pet_policy"){
                     echo '<i class="fa-solid fa-paw"></i><br>';
                }
                else if($fieldName=="gym"){
                     echo '<i class="fa-solid fa-dumbbell"></i><br>';
                }
                else if($fieldName=="laundry"){
                     echo '<i class="fa-solid fa-shirt"></i><br>';
                }
                else if($fieldName=="storage_space"){
                     echo '<i class="fa-sharp fa-solid fa-box-archive"></i><br>';
                }
                else{
                    echo '<br>';
                }

                
                echo ucfirst(str_replace('_', ' ', $fieldName)) . '</li>';
            }
        }
        echo '</ul>';
        echo '</div>';
        }
     else {
        echo "0 results";
    }

    // Close connection
    mysqli_close($conn);
    // You can now access the session data on other pages
    ?>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/85590c8254.js" crossorigin="anonymous"></script>
    </body>
</html>