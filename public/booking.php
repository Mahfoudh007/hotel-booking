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
    <div class="container room-section">
        <h2 class="text-center mb-4" id="rooms">Our Hotel Rooms</h2>
        <div class="row">
            <!-- Room 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../assets/images/Luxury Hotel Room HD Wallpaper.jpg" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">A luxurious room with a king-size bed, sea view, and modern amenities.</p>
                        <p><strong>Price:</strong> $150 per night</p>
                        <p><strong>Availability:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Room 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../assets/images/Luxury Hotel Room HD Wallpaper.jpg" class="card-img-top" alt="Standard Room">
                    <div class="card-body">
                        <h5 class="card-title">Standard Room</h5>
                        <p class="card-text">Comfortable room with a queen-size bed and city view.</p>
                        <p><strong>Price:</strong> $100 per night</p>
                        <p><strong>Availability:</strong> <span class="badge bg-danger">Not Available</span></p>
                        <a href="#" class="btn btn-secondary" disabled>Currently Unavailable</a>
                    </div>
                </div>
            </div>

            <!-- Room 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../assets/images/Luxury Hotel Room HD Wallpaper.jpg" class="card-img-top" alt="Family Suite">
                    <div class="card-body">
                        <h5 class="card-title">Family Suite</h5>
                        <p class="card-text">Spacious suite with two bedrooms, perfect for families.</p>
                        <p><strong>Price:</strong> $200 per night</p>
                        <p><strong>Availability:</strong> <span class="badge bg-success">Available</span></p>
                        <a href="#" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include '../includes/footer.php';
?>