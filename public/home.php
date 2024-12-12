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

<?php
$selectPopular = "SELECT * FROM rooms LIMIT 5";
$popularResult = mysqli_query($conn, $selectPopular);
?>
<div class="container room-section">
  <h2 class="text-center mb-4" id="rooms">Popular Rooms</h2>
  <div class="row">
    <?php while ($room = $popularResult->fetch_assoc()) { ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="<?= $room['img']; ?>" class="card-img-top" alt="<?= $room['description']; ?>">
          <div class="card-body">
            <p class="card-text"><?= $room['description']; ?></p>
            <p><strong>Price:</strong> $<?= $room['price']; ?> per night</p>
            <p><strong>Availability:</strong>
              <?php if ($room['available']) {
                echo '<span class="badge bg-success">Available</span>';
              } else {
                echo '<span class="badge bg-danger">Not Available</span>';
              }; ?>
            </p>
            <?php if ($room['available']) {
              if (isset($_SESSION["user_id"])){
                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
                      Book Now
                    </button>';
              } else {
                  echo '<a href="./login.php" class="btn btn-secondary" disabled>Login to Book</a>';
                };
            } else {
              echo '<a href="#" class="btn btn-secondary" disabled>Currently Unavailable</a>';
            }; ?>

          </div>
          <!-- model-->
          <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="bookingModalLabel">Book a Room</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="bookingForm">
                    <input type="text" name="room_id" value="<?= $room['room_id']; ?>" hidden>
                    <div class="mb-3">
                      <label for="checkInDate" class="form-label">Check-In Date</label>
                      <input type="date" id="checkInDate" name="check_in_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="checkOutDate" class="form-label">Check-Out Date</label>
                      <input type="date" id="checkOutDate" name="check_out_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Confirm Booking</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end model-->
        </div>
      </div>
    <?php } ?>

  </div>
</div>

<script>
  console.log(document.cookie)
</script>
<?php
include '../includes/footer.php';
?>