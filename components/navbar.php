
<html>
<style>
  .profile-div{
    border: 1px solid black;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    text-align: center;
    font-size: larger;
    margin: auto;
  }
  #list {
    display: flex;
    width: 500px;
    overflow: hidden;
  }

  #list li {
    list-style: none;
    display: flex;
    margin-right: 3px;
  }

  .area-btn {
    position: realative;
    margin-left: 1px;
    border: none;
  }
  .for-mobile{
    display: none;
  }

  .search{
    display: flex;
  }

  @media (max-width: 1035px)
  {
    .for-mobile{
      display: block;
    }
    .search{
      display: none;
    }
  }
</style>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">RentalApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active for-mobile" aria-current="page" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active for-mobile" aria-current="page" href="#">Service</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active for-mobile" aria-current="page" href="#">Contact</a>
        </li>
      </ul>
      <ul id="list" class="d-flex navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <form id="myForm" class="search mx-3" role="search" action="citysearch.php" method="POST">
        <select class="cities mx-2 form-control me-2" name="metro_cities_india" id="metro_cities_india">
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
        </select>

        <ul id="actual-list" class="list-unstyled d-hidden position-absolute"></ul>

        <input class="search-input form-control me-2" type="search" id="searchInput" placeholder="Shivaji Nagar" aria-label="Search">
        <span class="btn btn-outline-success" onclick="addArea()">Add</span>
        <input type="submit" id="go-btn" class="btn btn-outline-success mx-1" value="Search">
      </form>
      
      <button type="button" id="loginbtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        login
      </button>
      <button type="button" id="logoutbtn" class="btn btn-primary">
        <a href="logout.php" style="text-decoration:none;color:white;">logout</a>
      </button>
    </div>
    
  </div>

</nav>




<script>
    function addArea() {
        // Get the list element
        let list = document.getElementById('list');
        let actualList=document.getElementById('actual-list');

        // Get the value of the input field and remove whitespace
        let area = document.getElementById('searchInput').value.replace(/\s/g, '');
        let areaName = document.getElementById('searchInput').value;
        if (area != "") {
            // Create a new list item
            let listItem = document.createElement('li');
            listItem.id = area;
            listItem.className = 'mx-2';
            listItem.textContent = areaName;
            listItem.value=areaName;

            // Create a hidden input for the area
            let hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'area[]';
            hiddenInput.value = areaName;
            actualList.appendChild(hiddenInput);

            // Create a delete button
            let deleteButton = document.createElement('button');
            deleteButton.className = 'area-btn text-warning';
            deleteButton.textContent = 'X';
            deleteButton.onclick = function() {
                deleteParent(area);
            };

            // Append the delete button to the list item
            listItem.appendChild(deleteButton);

            // Append the list item to the list
            list.appendChild(listItem);
        } else {
            console.log("Empty");
        }
    }

    function deleteParent(area) {
        // Find the list item corresponding to the area
        let listItem = document.getElementById(area);

        // Check if the list item exists
        if (listItem) {
            // Remove the list item from its parent node
            listItem.parentNode.removeChild(listItem);
        } else {
            // Handle the case where the list item is not found (optional)
            console.log("List item not found for area: " + area);
        }
    }
    
  // managing login and logout button displays
  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    echo "loginbtn.style.display='none';";
    echo "logoutbtn.style.display='block';";
  } else {
    echo "logoutbtn.style.display='none';";
    echo "loginbtn.style.display='block';";
  }
  ?>
</script>

</html>