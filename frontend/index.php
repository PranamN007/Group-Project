<?php
session_start(); // Start the session

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: ./html/login.html?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeti Tech Pvt. Ltd</title>
    <link rel="stylesheet" href="./style/style.css">

     <!-- font awesome cdn link  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- bootstrap cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

</head>
<body>
     
   <nav class="navbar" style="position: sticky;">
      <label for="check">
         <i class="fas fa-bars" id="btn"></i>
         <i class="fas fa-times" id="cancel"></i>
      </label>
      <a class="logo" href=""><img src="logo.png" alt=""></a>
      <ul>
         <li><a href="#home">home</a></li>
         <li><a href="#about">about</a></li>
         <li><a href="#teams">Teams</a></li>
         <li><a href="#gallery">gallery</a></li>
         <li><a href="services.php">Services</a></li>
         <li><a href="orders.php">order</a></li>
         <li><a href="#contact">contact</a></li>
         <li><a href="logout.php">Logout</a></li>
      </ul>
      </nav>    

    <!-- <section class="home" id="home">
        <div class="slide">
            <img src="./img/vector.jpg" alt="">

        </div> -->
        
    </section>

    





    <section class="home" id="home">

        <div class="container">
     
           <div class="row align-items-center text-center text-md-left min-vh-100">
              <div class="col-md-6">
                 <h3>Welcome to Yeti Tech Pvt. Ltd.
                  <p>At Yeti Tech, we bring your digital dreams to life. Whether you need a website, an app, or a complete digital solution, we’ve got you covered. Explore our services, meet our team, and see how we can help you succeed in the digital world.</p></h3>
                 <button class="btn">Read more</button>
              </div>

              <div class="overlay-image">
               <img src="giphys.gif" alt="">
            </div>
    
           </div>

     </section>





     <!-- Badges -->
     
    <div class="stats-container">
      <div class="container">
         <div class="row" style="display: flex;">
            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
               <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                  <div class="teacher">
                     <img src="img/teacher.jfif" alt="">
                  </div>
                  <strong class="stat-number mt-10">4</strong>
                  <h4 class="stat-title">Expert Instructors</h4>
                  <p class="stat-desc mt-10">Our team of dedicated and highly skilled instructors bring years of experience and expertise to provide top-quality education.</p>

               </div>
               
            </div>


            <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
              <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                 <div class="stat-icon-box teacher">
                    <img src="img/student.png" alt="">
                 </div>
                 <strong class="stat-number mt-10">200+</strong>
                 <h4 class="stat-title">Committed Learners</h4>
                 <p class="stat-desc mt-10">Over 200 passionate students are enrolled, driven by a thirst for knowledge and a commitment to achieving their educational goals.</p>

              </div>
              
           </div>

           <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
              <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
                 <div class="stat-icon-box teacher">
                    <img src="img/employee.jfif" alt="">
                 </div>
                 <strong class="stat-number mt-10">10+</strong>
                 <h4 class="stat-title">Professional Staff</h4>
                 <p class="stat-desc mt-10">A robust team of more than 10 staff members ensures that every aspect of your learning experience is smooth and well-supported.</p>

              </div>
              
           </div>



           <div class="col-sm-6 col-lg-3 mt-25 mt-lg-0">
            <div class="stats-item d-flex flex-column align-items-center text-center py-30 px-5 w-100">
               <div class="stat-icon-box teacher">
                  <img src="img/teacher.jfif" alt="">
               </div>
               <strong class="stat-number mt-10">100+</strong>
               <h4 class="stat-title">Alumni</h4>
               <p class="stat-desc mt-10">Join a network of over 100 successful graduates who have gone on to excel in their respective fields.</p>

            </div>
            
         </div>
         </div>
      </div>
   </div>



     


     
     <!-- home section ends -->
     
     <!-- about section starts  -->
     
     <section class="about" id="about">
     
        <div class="container">
     
           <div class="row align-items-center">
              <div class="col-md-6">
                 <img src="img/signup-bg.jpg" class="w-100" alt="">
              </div>
              <div class="col-md-6">
                 <span>Why choose us?</span>
                 <p>Experience: We have years of experience in the tech industry.
                  Innovation: We use the latest technologies to deliver cutting-edge solutions.
                  Customer Focus: Your satisfaction is our priority.</p>
                 <button class="btn">Discover Our Journey</button>
                  
              </div>
           </div>
     
        </div>
     
     </section>



     <!-- Tab pan -->

      <!-- <div class="container-fluid mt-md-6 mt-5" id="nav-pills" style="margin-top: 3em; margin-bottom: 3em; background-color: #eee; padding-top: 2em; padding-bottom: 2em;">
      <div class="row">
        <div class="col-lg-9 col-xl-7 mx-auto text-center">
          <h1>Lorem ipsum dolor sit amet.</h1>
          <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid, a.</p>
        </div>
      </div>
      <div class="row align-items-center mt-md-6 mt-4">
        <div class="col-lg-6 d-none d-lg-block">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane active show" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
              <img alt="Web Content Management" class="img-fluid" src="img/lap.avif">
            </div>
            <div class="tab-pane" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
              <img alt="Customer Experience Platform" class="img-fluid" src="img/phone.jfif">
            </div>
            <div class="tab-pane" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
              <img alt="Team Collaboration" class="img-fluid" src="img/lap.avif">
            </div>
            <div class="tab-pane" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
              <img alt="AWS Hosting" class="img-fluid" src="img/laptop.jfif">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="px-lg-5 nav nav-pills outline-pills text-md-left text-center">
            <li class="nav-item position-relative">
              <a class="hover-nav-link text-gray nav-link p-3 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" aria-controls="v-pills-1">
                <h2 class="text-orange">Build better websites</h2>
                <p class="m-0" style="font-size: 1.2rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt mollitia ut provident corrupti blanditiis quaerat quo harum soluta. Atque, ut.</p>
              </a>
            </li>
            <li class="pt-3 nav-item position-relative">
              <a class="hover-nav-link text-gray nav-link p-3" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" aria-controls="v-pills-2">
                <h3 class="text-orange">Create amazing customer experiences</h3>
                <p class="m-0" style="font-size: 1.2rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, similique! Error eaque eveniet earum rerum iure sed excepturi ratione odit.</p>
              </a>
            </li>
            <li class="pt-3 nav-item position-relative">
              <a class="hover-nav-link text-gray nav-link p-3" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" aria-controls="v-pills-3">
                <h3 class="text-orange">Collaborate with your entire team</h3>
                <p class="m-0" style="font-size: 1.2rem;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo hic voluptate iure. Similique reiciendis voluptates hic sequi? Doloribus, molestias. Ullam!</p>
              </a>
            </li>
            <li class="pt-3 nav-item position-relative pb-1">
              <a class="hover-nav-link text-gray nav-link p-3" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" aria-controls="v-pills-4">
                <h3 class="text-orange">Stick with us</h3>
                <p class="m-0" style="font-size: 1.2rem;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptatum reprehenderit cumque aut rerum voluptate! Architecto asperiores maiores vel totam accusamus eum incidunt deleniti aliquid?</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>  -->



    
    
    <div class="hero">
       <div class="btn-box">
          <button id="btn1" onclick="openHTML()">HTML</button>
          <button id="btn2" onclick="openCSS()">CSS</button>
          <button id="btn3" onclick="openJS()">JAVASCRIPT</button>
       </div>
       <div id="content1" class="content">
          <div class="content-left">
             <h1>Learn HTML</h1>
             <p>We create clean, responsive websites using the latest HTML standards. Our websites are fast, secure, and optimized for search engines.</p>
             <a href="">LEARN MORE</a>
          </div>
          <div class="content-right">
             <img src="img/laptop.jfif" alt="">

          </div>

       </div>

       <div id="content2" class="content">
         <div class="content-left">
            <h1>Learn css</h1>
            <p>Our CSS experts make your website look stunning on any device. We focus on user experience and ensure that your site is both beautiful and functional.</p>
            <a href="">LEARN MORE</a>
         </div>
         <div class="content-right">
            <img src="img/p.jpg" alt="">

         </div>

      </div>

      <div id="content3" class="content">
         <div class="content-left">
            <h1>Learn javascript</h1>
            <p>We add interactivity to your site with JavaScript. From simple animations to complex applications, our JavaScript solutions make your website dynamic and engaging.</p>
            <a href="">LEARN MORE</a>
         </div>
         <div class="content-right">
            <img src="img/lap.avif" alt="">

         </div>

      </div>

    </div> 




    
     
     
     <!-- about section ends -->
   
     
     <!-- gallery section starts  -->
     
     <section class="gallery" id="gallery">
     
      <h1 class="heading"> our work </h1>
   
      <div class="box-container-1 container-fluid">
   
         <div class="box-1">
            <img src="img/categories/1.jpg" alt="">
            <div class="content">
               <h3>E-commerce Website</h3>
               <p>We built a fully responsive e-commerce platform for a leading retailer. The site features a smooth shopping experience and secure payment processing.</p>
               <button class="btn">Read more</button>
            </div>
         </div>
   
         <div class="box-1">
            <img src="img/categories/2.jpg" alt="">
            <div class="content">
               <h3>Portfolio Website</h3>
               <p>This stylish portfolio website showcases the work of a graphic designer. The site is clean, modern, and easy to navigate.</p>
               <button class="btn">Read more</button>

            </div>
         </div>
   
         <div class="box-1">
            <img src="img/categories/3.jpg" alt="">
            <div class="content">
               <h3>Mobile App Development</h3>
               <p>We developed a mobile app that helps users track their fitness goals. The app is intuitive, easy to use, and available on both Android and iOS.</p>
               <button class="btn">Read more</button>


             </div>
         </div>
   
         <div class="box-1">
            <img src="img/categories/4.jpg" alt="">
            <div class="content">
               <h3>Corporate Website</h3>
               <p>We created a professional corporate website for a consulting firm. The site is optimized for performance and built with the latest web technologies.</p>
               <button class="btn">Read more</button>

            </div>
         </div>
   
         <div class="box-1">
            <img src="img/categories/5.jpg" alt="">
            <div class="content">
               <h3> E-commerce Website</h3>
               <p>We built a fully responsive e-commerce platform for a leading retailer. The site features a smooth shopping experience and secure payment processing.</p>
               <button class="btn">Read more</button>

            </div>
         </div>
   
         <div class="box-1">
            <img src="img/categories/6.jpg" alt="">
            <div class="content">
               <h3>Mobile App Development</h3>
               <p>We created a professional corporate website for a consulting firm. The site is optimized for performance and built with the latest web technologies.</p>
               <button class="btn">Read more</button>

            </div>
         </div>

         <div class="box-1">
            <img src="img/categories/6.jpg" alt="">
            <div class="content">
               <h3>Portfolio Website</h3>
               <p>This stylish portfolio website showcases the work of a graphic designer. The site is clean, modern, and easy to navigate.</p>
               <button class="btn">Read more</button>

            </div>
         </div>

         <div class="box-1">
            <img src="img/categories/6.jpg" alt="">
            <div class="content">
               <h3>Mobile App Development</h3>
               <p>We developed a mobile app that helps users track their fitness goals. The app is intuitive, easy to use, and available on both Android and iOS.</p>
               <button class="btn">Read more</button>

            </div>
         </div>
   
      </div>
   
   </section>
     
     <!-- gallery section ends -->


   
     <!-- product details -->
     <div class="product-details">
     <div class="details" id="details" class="basic-2">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 content-right">
                  <img class="img-fluid" src="img/laptop.jfif" alt="alternative" style="height: 30rem; width: 50rem;">

              </div> 
              <div class="col-lg-6 content-left">
                  <div class="text-container">
                      <h3>QR YETI DETAILS </h3>
                      <p>QR YETI is our innovative solution that simplifies the way you share and access information. With just a scan, QR YETI allows you to instantly connect with websites, download documents, view menus, and more. Whether you’re a business owner looking to engage with customers or an individual wanting to share information quickly, QR YETI makes it easy and convenient.</p>
                      
                  </div> 
              </div> 
          </div> 
      </div> 
  </div> 



  <div class="details" id="details" class="basic-2" style="margin-bottom: 10em; position: relative;">
   <div class="container">
       <div class="row">
           <div class="col-lg-6 content-left">
               <div class="text-container">
                   <h3>YETI Tech ACADEMY</h3>
                   <p>YETI Tech ACADEMY is our educational platform designed to help you learn the skills you need to thrive in the tech world. Whether you’re a beginner or an experienced professional, our courses are tailored to provide you with the knowledge and tools to succeed in web development, programming, and digital design.</p>
                   
               </div> 
           </div> 
           <div class="col-lg-6 content-right" style="float: right;">
            <img class="img-fluid" src="img/lap.avif" alt="alternative" style="height: 30rem; width: 50rem; vertical-align: middle; border-style: none;">

        </div> 
       </div> 
   </div> 
</div> 
</div>







     <!-- Our teams section starts --> 
     
     <div class="menu" id="menu">
     
      <h1 class="heading"> our Teams </h1>
   
      <div class="container-lg box-container">
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>John Doe - Lead Developer</h3>
            <p>John is an experienced developer with a passion for creating efficient and scalable web solutions. His expertise lies in full-stack development.</p>
            <button class="btn">View Profile</button>
         </div>
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>Jane Smith - UI/UX Designer</h3>
            <p>Jane is our design guru. She makes sure that every website we create is not only beautiful but also user-friendly.</p>
            <button class="btn">View Profile</button>

         </div>
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>Alice Johnson - Project Manager</h3>
            <p>Alice ensures that all our projects run smoothly. Her excellent communication skills keep our clients informed and happy.</p>
            <button class="btn">View Profile</button>
         </div>
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>Michael Brown - Quality Assurance</h3>
            <p>Michael is responsible for making sure that every project meets our high standards. He has an eye for detail and a commitment to quality.</p>
            <button class="btn">View Profile</button>

         </div>
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>Alice Johnson - Project Manager</h3>
            <p>Alice ensures that all our projects run smoothly. Her excellent communication skills keep our clients informed and happy.</p>
            <button class="btn">View Profile</button>

         </div>
   
         <div class="box">
            <img src="img/f-1.png" alt="">
            <h3>Michael Brown - Quality Assurance</h3>
            <p>Michael is responsible for making sure that every project meets our high standards. He has an eye for detail and a commitment to quality.</p>
            <button class="btn">View Profile</button>

         </div>
   
      </div>
  </div>

<!-- menu section ends -->





<!-- Product details -->

  


    <!-- our clients -->
    <div class="clients">
      <h2 class="text-center">Our Clients</h2>
       <section class="customer-logos slider">
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/colors-curl-logo-template_23-2147536125.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
          <div class="slick-slide"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></div>
          
       </section>
    </div> 




     
     
     
     
     <!-- contact section starts  -->
     
     <section class="contact" id="contact">
     
        <h1 class="heading"> contact us  </h1>
     
        <div class="container">
     
           <div class="contact-info-container">
     
              <div class="box">
                 <i class="fas fa-phone"></i>
                 <h3>phone</h3>
                 <p>0430028349</p>
                 <p>0430028349</p>
              </div>
        
              <div class="box">
                 <i class="fas fa-envelope"></i>
                 <h3>email</h3>
                 <p>20027179@students.koi.edu.au</p>
                 <p>20027669@students.koi.edu.au</p>
              </div>
        
              <div class="box">
                 <i class="fas fa-map"></i>
                 <h3>address</h3>
                 <p>Bharatpur-10, Chitwan <br>Nepal</p>
              </div>
        
           </div>
           
     
           <div class="row align-items-center">
     
              <div class="col-md-6 mb-5 mb-md-0 ">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8867254366787!2d84.4330430148003!3d27.68989568279906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb33843d6d47%3A0x51e6e5562f7e4593!2sDipendra%20Chowk%20Bus%20Stop!5e0!3m2!1sen!2snp!4v1640708721323!5m2!1sen!2snp" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.8867254366787!2d84.4330430148003!3d27.68989568279906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fb33843d6d47%3A0x51e6e5562f7e4593!2sDipendra%20Chowk%20Bus%20Stop!5e0!3m2!1sen!2snp!4v1640708721323!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>"></iframe>
              </div>
     
              <form id="contactForm" class="col-md-6">
               <h3>Get in Touch</h3>
               <div class="form">
                 <input type="text" id="name" placeholder="Your Name" class="box" required>
                 <input type="email" id="email" placeholder="Email" class="box" required>
                 <input type="number" id="phone" placeholder="Phone" class="box" required>
                 <textarea id="message" placeholder="Message" class="box" cols="30" rows="10" required></textarea>
                 <button type="submit" class="btn">Send Message</button>
               </div>
               <div id="errorMessages"></div>
               <div id="successMessage" style="display: none; color: green;">Your message has been sent!</div>
             </form>
            </div>
     
     
        
     
     </section>




      
     <!-- contact section ends -->
     
     
     
     <!-- blogs section ends -->
     
     
     <!-- footer section starts  -->
     
     <footer class="footer">
        <div class="container">
           <div class="row">
              <div class="footer-col">
                 <h4>company</h4>
                  <ul>
                     <li><a href="#">about us</a></li>
                     <li><a href="#">our services</a></li>
                     <li><a href="#">privacy policy</a></li>

                  </ul>
               </div>
               <div class="footer-col">
                  <h4>get help</h4>
                   <ul>
                      <li><a href="#">about us</a></li>
                     <li><a href="#">about us</a></li>
                     <li><a href="#">about us</a></li>
                     <li><a href="#">about us</a></li>

                   </ul>
                </div>
                <div class="footer-col">
                  <h4>Quick Links</h4>
                   <ul>
                      <li><a href="#home">Home</a></li>
                     <li><a href="#about">About</a></li>
                     <li><a href="#gallery">Gallery</a></li>
                     <li><a href="#contact">Contact</a></li>

                   </ul>
                </div>
                <div class="footer-col">
                  <h4>follow us</h4>
                  <div class="social-links">
                     <a href="#"><i class="fab fa-facebook"></i></a>
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     <a href="#"><i class="fab fa-linkedin-in"></i></a>

            
                </div>


           </div>
           
        </div>
       <!-- Copyright -->
     
 <!-- Copyright -->
     </footer>
        
     </section>

     <div class="text-center" style="background-color: #24262b; color: white; font-size: 2rem; width: 100%; overflow: hidden;">
      © 2024 Copyright:
      <a class="text-reset fw-bold" href="https://digitalyeti.com/">YetiTech.com</a>
      </div>
     
     <!-- footer section ends -->
     
     
     
     
     
     
     
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Include Slick Carousel CSS -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
     
     <!-- Include Slick Carousel Theme (optional) -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
     
     <!-- Include Slick Carousel JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
     
     <!-- custom js file link  -->
   <script src="./javascript/script.js">
     
   </script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    
</body>
</html>