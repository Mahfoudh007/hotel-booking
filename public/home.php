<?php
include '../includes/header.php';
?>
<!-- Carousel -->
<div id="hotelCarousel" class="carousel slide" data-bs-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>

  <!-- Slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/images/home-img-1.jpg" class="d-block w-100" alt="Luxury Hotel Room">
      <div class="carousel-caption d-none d-md-block">
        <h5>Luxury Hotel Rooms</h5>
        <p>Experience comfort and elegance with our premium suites.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/images/home-img-2.jpg" class="d-block w-100" alt="Swimming Pool">
      <div class="carousel-caption d-none d-md-block">
        <h5>Relax by the Pool</h5>
        <p>Enjoy a refreshing swim at our world-class pools.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../assets/images/home-img-3.jpg" class="d-block w-100" alt="Fine Dining">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fine Dining</h5>
        <p>Savor exquisite dishes prepared by our top chefs.</p>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- Features Section  -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold">Why Choose Us?</h2>
      <p class="text-muted">Discover features that make your stay unforgettable</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100 border-0">
          <div class="card-body">
            <i class="bi bi-calendar-check-fill display-4 text-primary mb-3"></i>
            <h5 class="card-title">Easy Booking</h5>
            <p class="card-text">Book your hotel rooms effortlessly with our user-friendly platform.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100 border-0">
          <div class="card-body">
            <i class="bi bi-stars display-4 text-primary mb-3"></i>
            <h5 class="card-title">Top-Rated Hotels</h5>
            <p class="card-text">Choose from a wide range of highly rated accommodations.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100 border-0">
          <div class="card-body">
            <i class="bi bi-wallet-fill display-4 text-primary mb-3"></i>
            <h5 class="card-title">Best Prices</h5>
            <p class="card-text">Enjoy exclusive deals and competitive prices for your stay.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100 border-0">
          <div class="card-body">
            <i class="bi bi-headset display-4 text-primary mb-3"></i>
            <h5 class="card-title">24/7 Support</h5>
            <p class="card-text">Get assistance anytime with our round-the-clock support team.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- popular rooms  -->
<div class="container-fluid text-center">
  <h2 class="text-info py-5">Popular Rooms</h2>
  <div class="row">
    <div class="col-sm-4">
      <div class="card">
        <img src="../assets/images/./Luxury Hotel Room HD Wallpaper.jpg" class="card-img-top" alt="Room 1">
        <div class="card-body">
          <h5 class="card-title">Room 1</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info px-4 my-5">More</button>
</div>


<?php
include '../includes/footer.php';
?>