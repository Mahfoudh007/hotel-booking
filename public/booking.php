<?php
include '../includes/header.php';
?>



<!-- Banner Section -->
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center ">
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
        <?php while ($room = $popularResult->fetch_assoc()) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= $room['img']; ?>" class="card-img-top" alt="<?= $room['description']; ?>">
                    <div class="card-body">
                        <p class="card-text"><?= $room['description']; ?></p>
                        <p><strong>Price:</strong> $<?= $room['price']; ?>per night</p>
                        <p><strong>Availability:</strong>
                            <?php if ($room['available']) {
                                echo '<span class="badge bg-success">Available</span>';
                            } else {
                                return '<span class="badge bg-danger">Not Available</span>';
                            }; ?>
                        </p>
                        <?php if ($room['available']) {
                            echo '<a href="#" class="btn btn-primary">Book Now</a>';
                        } else {
                            return '<a href="#" class="btn btn-secondary" disabled>Currently Unavailable</a>';
                        }; ?>

                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
</div>




<?php
include '../includes/footer.php';
?>