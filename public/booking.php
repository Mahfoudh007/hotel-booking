<?php
include '../includes/header.php';
?>



<!-- Banner Section -->
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center pt-4 ">
        <h1 class="display-4 text-black">Welcome to Our Hotel</h1>
        <p class="lead text-light">Book your perfect stay today and enjoy exceptional comfort and services!</p>
        <a href="#rooms" class="btn btn-primary btn-lg">Explore Our Rooms</a>
    </div>
</div>

<!-- Rooms Section -->
<?php
$selectPopular = "SELECT * FROM rooms";
$popularResult = mysqli_query($conn, $selectPopular);
?>

<div class="container room-section">
  <h2 class="text-center mb-4" id="rooms">Our Hotel Rooms</h2>
  <div class="row">
    <?php  while ($room = $popularResult->fetch_assoc()) { ?>
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
                echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal'.$room['room_id'].'">
                      Book Now
                    </button>';
              } else {
                  echo '<a href="./login.php" class="btn btn-secondary" disabled>Login to Book</a>';
                };
            } else {
              echo '<a href="#" class="btn btn-secondary" disabled>Currently Unavailable</a>';
            }; ?>
          </div>

          <!-- Modal for booking -->
          <div class="modal fade" id="bookingModal<?= $room['room_id']; ?>" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="bookingModalLabel">Book a Room</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="../actions/book-room.php">
                    <input type="hidden" name="room_id" value="<?= $room['room_id']; ?>">
                    <div class="mb-3">
                      <label for="checkInDate" class="form-label">Check-In Date</label>
                      <input type="date" id="checkInDate" name="check_in_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="checkOutDate" class="form-label">Check-Out Date</label>
                      <input type="date" id="checkOutDate" name="check_out_date" class="form-control" required>
                    </div>
                    <button type="submit" id="submitBookingButton" class="btn btn-success">Confirm Booking</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Modal -->
        </div>
      </div>
    <?php } ?>
  </div>
</div>



<?php
include '../includes/footer.php';
?>