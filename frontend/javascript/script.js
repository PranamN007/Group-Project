var content1 = document.getElementById("content1");
var content2 = document.getElementById("content2");
var content3 = document.getElementById("content3");

function openHTML() {
    content1.style.transform = "translateX(0)";
    content2.style.transform = "translateX(100%)";
    content3.style.transform = "translateX(100%)";
    content1.style.display = "flex";
    content2.style.display = "none";
    content3.style.display = "none";
}

function openCSS() {
    content1.style.transform = "translateX(100%)";
    content2.style.transform = "translateX(0)";
    content3.style.transform = "translateX(100%)";
    content1.style.display = "none";
    content2.style.display = "flex";
    content3.style.display = "none";
}

function openJS() {
    content1.style.transform = "translateX(100%)";
    content2.style.transform = "translateX(100%)";
    content3.style.transform = "translateX(0)";
    content1.style.display = "none";
    content2.style.display = "none";
    content3.style.display = "flex";
}

// Set initial state to show the first content
document.addEventListener('DOMContentLoaded', function() {
    openHTML();  // or you can call any other function based on your preference
});




var navbar = document.getElementById("navbar");
function showMenu(){
  navbar.style.right = "0";
}
function hideMenu(){
  navbar.style.right = "-200px";
}


$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
 });

document.getElementById('contactForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // Gather form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const message = document.getElementById('message').value;
  
    try {
      // Send the data to the backend
      const response = await fetch('http://localhost:3000/api/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, email, phone, message })
      });
  
      if (response.ok) {
        // Show success message
        document.getElementById('successMessage').style.display = 'block';
        document.getElementById('contactForm').reset(); // Reset the form
      } else {
        throw new Error('Failed to send message.');
      }
    } catch (error) {
      // Display error message
      document.getElementById('errorMessages').innerText = error.message;
    }
  });
  
