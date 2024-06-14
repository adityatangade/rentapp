
const priceRange = document.getElementById("priceRange");
const priceValue = document.getElementById("priceValue");

priceRange.oninput = function() {
  priceValue.textContent = "Rs." + this.value +"/month";
}

function toggleImage(id) {
  const image = document.getElementById(id);
  if (image.src.endsWith('star_1828970.png')) {
      image.src = 'Images/star_1828884.png';
      image.alt = 'Image 2';
  } else {
      image.src = 'Images/star_1828970.png';
      image.alt = 'Image 1';
  }
}


// crousal

const carousels = document.querySelectorAll('.carouse');
const prevButtons = document.querySelectorAll('.prev');
const nextButtons = document.querySelectorAll('.next');
const slideCounts = carousels.length;
const currentIndexes = new Array(slideCounts).fill(0);

function showSlide(index, carouselIndex) {
  carousels[carouselIndex].style.transform = `translateX(-${index * 100}%)`;
  currentIndexes[carouselIndex] = index;
}

function prevSlide(carouselIndex) {
  currentIndexes[carouselIndex] = (currentIndexes[carouselIndex] - 1 + carousels[carouselIndex].children.length) % carousels[carouselIndex].children.length;
  showSlide(currentIndexes[carouselIndex], carouselIndex);
}

function nextSlide(carouselIndex) {
  currentIndexes[carouselIndex] = (currentIndexes[carouselIndex] + 1) % carousels[carouselIndex].children.length;
  showSlide(currentIndexes[carouselIndex], carouselIndex);
}

// Function to get the index of the carousel closest to the middle of the viewport
function getVisibleCarouselIndex() {
  const windowHeight = window.innerHeight;
  const windowMiddle = windowHeight / 2;

  let closestCarouselIndex = 0;
  let closestDistanceToMiddle = Infinity;

  carousels.forEach((carousel, index) => {
    const rect = carousel.getBoundingClientRect();
    const carouselMiddle = rect.top + (rect.height / 2);
    const distanceToMiddle = Math.abs(carouselMiddle - windowMiddle);

    if (distanceToMiddle < closestDistanceToMiddle) {
      closestCarouselIndex = index;
      closestDistanceToMiddle = distanceToMiddle;
    }
  });

  return closestCarouselIndex;
}

document.addEventListener('keydown', function(event) {
  const visibleCarouselIndex = getVisibleCarouselIndex();
  if (event.keyCode === 37) { // Left arrow key
    prevSlide(visibleCarouselIndex);
  } else if (event.keyCode === 39) { // Right arrow key
    nextSlide(visibleCarouselIndex);
  }
});



//caraousal end

//onclick images

function moveToImagesPage() {
  window.location.href = 'moreInfo.php';
}


// search

function addAreaIndex() {
  // Get the list element
  let list = document.getElementById('index-list');
  // Get the value of the input field and remove whitespace
  let area = document.getElementById('search-input').value.replace(/\s/g, '');
  let areaName=area;
  if (area != "") {
    // Create a new list item
    let listItem = document.createElement('li');
    listItem.id = area;
    listItem.className = 'mx-2 my-2';
    listItem.textContent = areaName;

    // Create a delete button
    let deleteButton = document.createElement('button');
    deleteButton.className = 'area-btn text-warning delete-btn';
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