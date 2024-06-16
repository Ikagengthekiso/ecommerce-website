<!doctype html>
<html lang="en">
  <head>




       <!-- Start of Async Drift Code -->
<script>


document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to the "Live Chat" button
    document.getElementById("openDriftChat").addEventListener("click", function() {
      // Call the function to open the Drift live chat
      drift.api.openChat();
    });

    // Add event listener to the "Live Chat" link
    document.getElementById("openDriftChatLink").addEventListener("click", function(event) {
      // Prevent default link behavior
      event.preventDefault();
      // Call the function to open the Drift live chat
      drift.api.openChat();
    });
  });

    















  "use strict";
  
  !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
      if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
      t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
      t.factory = function(e) {
        return function() {
          var n = Array.prototype.slice.call(arguments);
          return n.unshift(e), t.push(n), t;
        };
      }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
      }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
      };
    }
  }();
  drift.SNIPPET_VERSION = '0.3.1';
  drift.load('zwys8zzak8xc');
  </script>
  <!-- End of Async Drift Code -->



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digi Litho</title>

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    

    

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- swiper css -->
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<link rel ="stylesheet" href ="./main.css"/>



    
  </head>
  
  <body>

<!-- top banner end -->
<div class="top-banner">
  <div class="container">
     <a href="https://www.youtube.com/">
        <picture>
           <source srcset="/assets/Beauty_bonanza_top-stri.g
               media="(min-width:769px)/>
           <source srcset="" media="(max-width:768px)" />
           <img src="assets/DIGI-LITHO (1190 x 60 px) (1170 x 60 px).gif" alt="">
        </picture>
     </a>
  </div>
</div>

 <!-- top banner end -->
 
 <!-- primary nav -->
 <div class="primary-navigation">
  <div class="container">
    <a href="#" class="external-link"><i class='bx bxs-star'></i><span>About </span></a>
    <div class="Digi-litho-brands"> 
      <a href="../index.php" class =" Digi-logo"><i class='bx bxs-star' ></i><span>Digi Litho</span></a>
      <a href="#" class = "j-stat"><i class='bx bxs-pencil' ></i><span>Stationery</span></a>
      <a href="#" class ="j-pay"><i class='bx bxl-paypal' ></i><span>Pay</span></a>
      <a href="#" class = "j-fork"><i class='bx bxs-truck' ></i><span>Forklift</span></a>
    </div>
  </div>
</div>



 <!-- primary nav -->


 <!-- main nav -->

 <header>
  <div class="container">
    <nav>
      <a href="/" class = "brand-logo"><i class='bx bxs-star' ></i><span>Digi litho</span></a>
      <form class="d-flex" role="search"> <div class = "search-icon"> <i class='bx bx-search'></i></div>
        <input class="form-control me-2" type="search" placeholder="Search products, categories and brand" aria-label="Search">
        <button class="red-btn" type="submit">Search</button>
      </form>
      <ul class="nav-list ">
        
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bxs-user-circle' ></i>
            Account
          </a>
          <ul class="dropdown-menu">
            <li><button class="red-btn">SIGN IN</button></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../index.php"><i class='bx bxs-user-circle' ></i><span>My Account</span></a></li>
            
            <li><a class="dropdown-item" href="#"><i class='bx bx-box' ></i><span>Order</span></a></li>
            
            <li><a class="dropdown-item" href="#"><i class='bx bx-heart' ></i><span>Saved Items</span></a></li>
          </ul>
        </li>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bx-help-circle' ></i>
            <span>Help</span>

          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./admin/car.html">Place & Track Order</a></li>
            <li><a class="dropdown-item" href="#">Order Cancellation</a></li>
            <li><a class="dropdown-item" href="#"  >Returns and Refunds</a></li>
            <li><a class="dropdown-item" href="#">Payments & Digi Account</a></li>
            <li><a class="dropdown-item" href="#">Help Center</a></li>
            <li><a class="dropdown-item" href="#">Contact us</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><button class="red-btn" id="openDriftChat"><i class='bx bx-message-dots'></i>Live Chat</button></li>




          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class='bx bx-cart' ></i>
            <span>Cart</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        
       
      </ul>
    </nav>
    <div class="mobile-nav">
      <div class="left-mobile">
        <button class="header-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class='bx bx-menu'></i></button>
        <a href="/" class="brand-logo"><i class='bx bxs-star'></i><span>Digi litho</span></a>
      </div>
      <div class="right-mobile">
        <button class="header-btn"><i class='bx bx-search'></i></button>
        <a href="/auth/login.html"><i class='bx bxs-user-circle'></i></a>
        <a href="/auth/cart.html"><i class='bx bx-cart'></i></a>
      </div>
    </div>
    
   <!-- OFF CANVAS -->

   <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <a href="/" class="brand-logo"><i class='bx bxs-star'></i><span>Digi litho</span></a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="sidebar-menu">
            <a href="/" class="link-with-icon"><i class='bx bx-message-dots'></i><span>Live Chat</span></a>
            <!-- Added class attribute -->
            <a href="./auth/login.html" class="link-with-icon"><i class='bx bx-message-dots'></i><span>My Digi Account</span></a>
        </div>
    </div>
</div>


 </header>

 <!-- main nav end -->

  <!-- main page -->
  <main>
    <div class="container">
      <section class = "hero-section">



        <div class="left-sidebar">
          <a href="/" class="link-with-icon"><i class='bx bx-hard-hat' ></i></i><span>Forklift Rental</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-edit-alt' ></i><span>Stationery Supplies</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-reflect-horizontal'></i><span>Industrial Supplies</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-paper-plane' ></i><span>Paper Products</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-water'></i><span>Ink Supplies</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-vertical-top' ></i><span>Lifted Logistics</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-fork' ></i><span>Forklift Solutions</span></a>
          <a href="/" class="link-with-icon"><i class='bx bxl-tailwind-css' ></i></i><span>Industrial Ink</span></a>
          <a href="/" class="link-with-icon"><i class='bx bx-id-card' ></i><span>Bussiness Card</span></a>
          <a href="/" class="link-with-icon"><i class='bx bxs-school' ></i><span>Back to School</span></a>
          
          <a href="/" class="link-with-icon"><i class='bx bx-book-content' ></i><span>Paper</span></a>
          
          <a href="#" id="openDriftChatLink" class="link-with-icon"><i class='bx bx-message-dots'></i><span>Live Chat</span></a>
          
        
          
        </div>
        <div class="home-slider">
          <!-- Slider main container -->
<div class="swiper" id="homeSlider">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><div class="slide"><a href="#"><img src="./assets/Yellow and White Minimalist Big Sale Banner (718 x 384 px).png" alt=""></a></div>

    </div>
    <div class="swiper-slide"><div class="slide"><a href="#"><img src="./assets/Minimalist Big Sale Banner (718 x 384 px).gif" alt=""></a></div>

    </div>
    <div class="swiper-slide"><div class="slide"><a href="#"><img src="./assets/ fork (718 x 384 px).gif" alt=""></a></div>

    </div>
    
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  
</div>
        </div>
        <div class="right-sidebar">
          <div class="right-sidebar-links">
            <a href=""><div class="icon"><img src="./assets/Orange White Modern Gradient  IOS Icon.png" alt=""></div>
              <div class="details"><p class="title">Help Center</p><small>Guide to customer care</small></div></a>
              <a href=""><div class="icon"><img src="./assets/Orange White Modern Gradient  IOS Icon (50 x 50 px).png" alt=""></div>
                <div class="details"><p class="title">Quick Refund</p><small>Guide to customer care</small></div></a>
                <a href=""><div class="icon"><img src="./assets/Orange.png" alt=""></div>
                  <div class="details"><p class="title">Return</p><small>Guide to customer care</small></div></a>
            
            
          </div>
          <a href=""><div class="sidebar-img">
            <img src="./assets/Picture1.png" alt="">
          </div></a>
        </div>
      </section>
     
  </main>


  <!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <!-- Footer Links -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <h5>About Us</h5>
        <p>DIGI-LITHO (PTY) LTD is a shining example of a local business that goes above and beyond to provide quality products while fostering community growth and social responsibility. </p>
      </div>
      <!-- End Footer Links -->

      <!-- Contact Information -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <h5>Contact Us</h5>
        <ul class="list-unstyled">
          <li><a href="https://www.google.com/maps/dir//Unit90,+Van+Dyk+Rd,+Boksburg+East+Ind,+Boksburg,+1459/@-26.2346453,28.1969527,11z/data=!4m8!4m7!1m0!1m5!1m1!1s0x1e9517c4549743b3:0x1c6c78f63256aca7!2m2!1d28.284504!2d-26.204485?entry=ttu">Unit90, Van Dyk Rd, Boksburg East Ind, Boksburg, 1459 </a></li>
          <li><a href="mailto:digi-litho@mweb.co.za">digi-litho@mweb.co.za</a></li>

          <li><a href="tel:+27119145192">Phone: +27-11-914 5192</a></li>
     
        </ul>
      </div>
      <!-- End Contact Information -->

      <!-- Quick Links -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="mailto:digi-litho@mweb.co.za">Contact</a></li>
        </ul>
      </div>
      <!-- End Quick Links -->
    </div>
    <!-- End Row -->
  </div>
  <!-- End Container -->
</footer>
<!-- End Footer -->



    <!-- Bootsrap js cdn -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"
    ></script>
    <!-- Bootsrap js cdn -->
    <!-- SWIPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Custom js -->
    <script src="./js/app.js"></script>
  </body>
</html>







  
  





  

      
      
    


  



