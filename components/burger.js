function openNav() {
    document.getElementById("sideNav").style.width = "100vw";
}

function closeNav() {
    document.getElementById("sideNav").style.width = "0";
}

//for updating pricerange
const priceRange1 = document.getElementById("mob-priceRange");
const priceValue1 = document.getElementById("mob-priceValue");

priceRange1.oninput = function() {
  priceValue1.textContent = "Rs." + this.value +"/month";
}

