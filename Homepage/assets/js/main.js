/**
* Template Name: Eterna
* Updated: Jan 29 2024 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

/**
   * Easy on scroll event listener 
   */
const onscroll = (el, listener) => {
  el.addEventListener('scroll', listener)
}

document.addEventListener("DOMContentLoaded", function() {
  var accordions = document.querySelectorAll(".accordion-toggle");
  
  accordions.forEach(function(accordion) {
    accordion.addEventListener("click", function() {
      var content = this.nextElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        this.querySelector('.accordion-icon').innerHTML = ''; // Icon when closed
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
        this.querySelector('.accordion-icon').innerHTML = ''; // Icon when open
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function() {
  const sections = document.querySelectorAll('.section');

  function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function loadSections() {
    sections.forEach((section, index) => {
      if (isInViewport(section)) {
        section.classList.add('visible');
      }
    });
  }

  window.addEventListener('scroll', loadSections);
});

document.addEventListener("DOMContentLoaded", function() {
  const reviews = [
    { photo: "./assets/img/person1.png", content: "I'm amazed by the efficiency of the vehicle service  provided by this website. It has completely transformed how we manage our fleet, making it easier than ever to schedule maintenance and track repairs.", stars: 3 },
    { photo: "./assets/img/person2.png", content: "This website's vehicle service is a game-changer for our business. With its intuitive interface and robust features, we've been able to streamline our operations and improve overall productivity.", stars: 4.5 },
    { photo: "./assets/img/person3.png", content: "I highly recommend this website's vehicle service  to anyone looking to optimize their fleet operations. It's user-friendly, comprehensive, and has significantly reduced our maintenance costs.", stars: 5 },
    { photo: "./assets/img/person4.png", content: "Since implementing this website's vehicle service , our fleet downtime has decreased dramatically. The automated maintenance scheduling and repair tracking features have been invaluable to our business.", stars: 4 },
    { photo: "./assets/img/person5.png", content: "Our experience with this website's vehicle service  has been nothing short of excellent. It has simplified our maintenance processes and provided valuable insights into our fleet performance.", stars: 5 },
    { photo: "./assets/img/person6.png", content: "I'm impressed by the level of support provided by this website's team. They've been responsive to our needs and have helped us make the most out of their vehicle service.", stars: 4.5 }
  ];

  const container = document.querySelector('.review-container');

  reviews.forEach(review => {
    const card = document.createElement('div');
    card.classList.add('review-card');

    const image = document.createElement('img');
    image.src = review.photo;
    image.alt = "Person";
    card.appendChild(image);

    const content = document.createElement('p');
    content.classList.add('review-content');
    content.textContent = review.content;
    content.style.textAlign = "justify";
    card.appendChild(content);
    

    const starRating = document.createElement('div');
    starRating.classList.add('star-rating');

    for (let i = 0; i < 5; i++) {
      const star = document.createElement('img');
      star.src = i < review.stars ? "./assets/img/star.png" : "./assets/img/not_star.png";
      star.alt = "Star " + (i + 1);
      starRating.appendChild(star);
    }

    card.appendChild(starRating);

    container.appendChild(card);
  });

  setInterval(() => {
    const currentCard = container.querySelector('.review-card');
    container.appendChild(currentCard);
    container.style.transform = `translateX(-${currentCard.offsetWidth + 20}px)`;
    setTimeout(() => {
      container.style.transition = "none";
      container.style.transform = "translateX(0)";
      setTimeout(() => {
        container.style.transition = "transform 0.5s ease-in-out";
      });
    }, 500);
  }, 3000);
});

var cityOptions = {
  Gujarat: ["Surat", "Navsari", "Ahmedabad"],
  Rajasthan: ['Jodhpur', 'Jaisalmer', 'Udaipur'],
  Maharashtra: ['Nagpur', 'Pune', 'Thane']
};

// Function to populate city options based on selected state
document.getElementById('state-select').addEventListener('change', function() {
  var selectedState = this.value;
  var citySelect = document.getElementById('city-select');

  // Clear existing city options
  citySelect.innerHTML = '';

  // Disable city dropdown by default
  citySelect.disabled = true;

  // If no state is selected, display only "Select City" option
  if (selectedState === "") {
    var defaultOption = document.createElement('option');
    defaultOption.value = "";
    defaultOption.textContent = "Select City";
    defaultOption.selected = true;
    citySelect.appendChild(defaultOption);
  } else {
    // Enable city dropdown and populate options based on selected state
    citySelect.disabled = false;
    var cities = cityOptions[selectedState];
    cities.forEach(function(city) {
      var option = document.createElement('option');
      option.value = city;
      option.textContent = city;
      citySelect.appendChild(option);
    });
  }
});

document.getElementById('search-btn').addEventListener('click', function() {
  // Get selected state and city
  var selectedState = document.getElementById('state-select').value;
  var selectedCity = document.getElementById('city-select').value;

  // Clear existing service center list
  var serviceCentersDiv = document.querySelector('.service-centers');
  serviceCentersDiv.innerHTML = '';

  // Simulate fetching service centers from database
  var serviceCenters = getDummyServiceCenters(selectedState, selectedCity);

  // Generate cards for each service center
  serviceCenters.forEach(function(center) {
    var card = document.createElement('div');
    card.classList.add('service-center-card');

    var name = document.createElement('div');
    name.classList.add('service-center-name');
    name.textContent = center.name;

    var address = document.createElement('div');
    address.classList.add('service-center-address');
    address.textContent = center.address;

    // Assuming center.rating is a number between 0 and 5
var rating = document.createElement('div');
rating.classList.add('service-center-rating');

// Calculate the number of full stars and half star
var fullStars = Math.floor(center.rating);
var halfStar = center.rating % 1 !== 0;

// Create star icons based on rating using Unicode characters
for (var i = 0; i < fullStars; i++) {
    var star = document.createElement('span');
    star.textContent = '★'; // Full star Unicode character
    star.style.color = '#FFD700'; // Optional: Set color for stars
    rating.appendChild(star);
}

if (halfStar) {
    var halfStarIcon = document.createElement('span');
    halfStarIcon.textContent = ''; // Half star Unicode character or any other representation
    rating.appendChild(halfStarIcon);
}


    var openingHours = document.createElement('div');
    openingHours.classList.add('service-center-opening-hours');
    openingHours.textContent = 'Opening Hours: ' + center.openingHours;

    card.appendChild(name);
    card.appendChild(address);
    card.appendChild(rating);
    card.appendChild(openingHours);

    serviceCentersDiv.appendChild(card);
  });
});

// Function to fetch dummy service centers (replace with actual API call)
function getDummyServiceCenters(state, city) {
  // Dummy data
  const serviceCenters = [
    { name: 'Castrol Auto Service - Devi', address: '123 Main St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Gujarat', city: 'Surat' },
    { name: 'Jalaram Automobiles', address: '456 Elm St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Gujarat', city: 'Surat' },
    { name: 'G M Motors', address: '789 Oak St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Gujarat', city: 'Surat' },
    { name: 'Jay Jalaram Auto Spares', address: '101 Pine St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Gujarat', city: 'Navsari' },
    { name: 'Khodiyar Motors', address: '202 Maple St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Gujarat', city: 'Navsari' },
    { name: 'Khushi Automobile', address: '303 Birch St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Gujarat', city: 'Ahmedabad' },
    { name: 'Ram Auto Care', address: '404 Cedar St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Gujarat', city: 'Ahmedabad' },
    { name: 'Ashok Motors', address: '505 Spruce St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Gujarat', city: 'Ahmedabad' },
    { name: 'Modern Tyres and Services', address: '606 Walnut St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Maharashtra', city: 'Nagpur' },
    { name: 'Nagpur Auto Works and Car Ac', address: '707 Poplar St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Maharashtra', city: 'Nagpur' },
    { name: 'Unnati Motors', address: '808 Ash St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Maharashtra', city: 'Nagpur' },
    { name: 'Shaw Toyota', address: '909 Elm St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Maharashtra', city: 'Pune' },
    { name: 'Kothari Hyundai', address: '1010 Cedar St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Maharashtra', city: 'Pune' },
    { name: 'Shreenath Motors', address: '1111 Spruce St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Maharashtra', city: 'Thane' },
    { name: 'Ritu Nissan PVT Limited', address: '1212 Maple St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Maharashtra', city: 'Thane' },
    { name: 'Shree Krishna Motors', address: '1313 Oak St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Rajasthan', city: 'Jodhpur' },
    { name: 'Om S S Car Services', address: '1414 Pine St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Rajasthan', city: 'Jodhpur' },
    { name: 'Shree Ram Motors', address: '1515 Birch St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Rajasthan', city: 'Jodhpur' },
    { name: 'Mahadev Automobiles', address: '1616 Walnut St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Rajasthan', city: 'Jaisalmer' },
    { name: 'Swastik Wheel Alignment And Service Centre', address: '1717 Poplar St', rating: (4 + Math.random()).toFixed(1), openingHours: '8:00 AM - 5:00 PM', state: 'Rajasthan', city: 'Jaisalmer' },
    { name: 'Ratan TATA Leyland Automobiles', address: '1818 Ash St', rating: (4 + Math.random()).toFixed(1), openingHours: '10:00 AM - 7:00 PM', state: 'Rajasthan', city: 'Udaipur' },
    { name: 'Auto 360', address: '1919 Elm St', rating: (4 + Math.random()).toFixed(1), openingHours: '9:00 AM - 6:00 PM', state: 'Rajasthan', city: 'Udaipur' }
];


  // Filter service centers based on selected state and city
  var filteredCenters = serviceCenters.filter(function(center) {
    return center.state === state && center.city === city;
  });

  return filteredCenters;
}