<html>
<style>
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
</style>

<head>
  <link rel="stylesheet" href="style.css">
</head>
<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
      <ul id="list" class="d-flex navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <form class="search d-flex mx-3" role="search">
        <select class="cities mx-2 form-control me-2" name="metro_cities_india" id="metro_cities_india">
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

        <input class="search-input form-control me-2" type="search" id="searchInput" placeholder="Shivaji Nagar" aria-label="Search">
        <span class="btn btn-outline-success" onclick="addArea()">Add</span>

      </form>

      <button type="button" id="loginbtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        login
      </button>
      <button type="button" id="logoutbtn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        <a href="logout.php" style="text-decoration:none;color:white;">logout</a>
      </button>
    </div>
  </div>

</nav>
<script>
  function addArea() {
    // Get the list element
    let list = document.getElementById('list');
    // Get the value of the input field and remove whitespace
    let area = document.getElementById('searchInput').value.replace(/\s/g, '');
    if (area != "") {
      // Create a new list item
      let listItem = document.createElement('li');
      listItem.id = area;
      listItem.className = 'mx-2';
      listItem.textContent = area;

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
    echo "loginbtn.style.display='block';";
    echo "logoutbtn.style.display='none';";
  }
  ?>
</script>

</html>