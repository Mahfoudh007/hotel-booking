<?php include '../includes/header.php'; ?>

<!-- Hero Section -->
<section id="hero" class="hero-section d-flex align-items-center" style="background-image: url('../assets/images/about-1.jpg'); background-size: cover; height: 100vh;">
    <div class="overlay bg-dark opacity-50 w-100 h-100"></div>
    <div class="container text-center text-white">
        <h1 class="display-3 fw-bold">Welcome to Our Story</h1>
        <p class="lead">We are dedicated to creating unforgettable experiences for our customers. Here’s our journey.</p>
        <a href="#mission" class="btn btn-light btn-lg">Learn More</a>
    </div>
</section>

<!-- Mission and Values Section -->
<section id="mission" class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="fw-bold text-center">Our Mission</h2>
                <p class="lead text-center">To be a leader in our industry by providing innovative solutions and exceptional service. We aim to make a difference, one customer at a time.</p>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <i class="bi bi-lightbulb-fill display-3 text-primary"></i>
                <h5 class="fw-bold">Innovation</h5>
                <p>We continuously strive to innovate and improve, ensuring our products/services are always ahead of the curve.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-heart-fill display-3 text-primary"></i>
                <h5 class="fw-bold">Customer Focus</h5>
                <p>Our customers are at the heart of everything we do. We are committed to delivering exceptional value and satisfaction.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-people-fill display-3 text-primary"></i>
                <h5 class="fw-bold">Teamwork</h5>
                <p>We believe in the power of collaboration, working together to achieve excellence in every aspect of our business.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="bg-light py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Meet Our Team</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="../assets/images/about-team1.jpg" alt="Team Member" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Founder & CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="../assets/images/about-team2.jpg" alt="Team Member" class="card-img ">
                    <div class="card-body">
                        <h5 class="card-title">Jane Smith</h5>
                        <p class="card-text">Marketing Director</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="../assets/images/about-team3.jpg" alt="Team Member" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Alex Johnson</h5>
                        <p class="card-text">Lead Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <img src="../assets/images/about-team4.jpg" alt="Team Member" class="card-img">
                    <div class="card-body">
                        <h5 class="card-title">Emily Davis</h5>
                        <p class="card-text">Operations Manager</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-dark text-white">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">What Our Clients Say</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p class="text-center">"This company transformed our business! Highly recommend their services." - Client A</p>
                </div>
                <div class="carousel-item">
                    <p class="text-center">"Professional, efficient, and great to work with." - Client B</p>
                </div>
                <div class="carousel-item">
                    <p class="text-center">"A pleasure to do business with. They truly care about customer success." - Client C</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Get In Touch</h2>
        <p class="lead">We’d love to hear from you! Reach out with any questions or inquiries.</p>
        <a href="contact.php" class="btn btn-primary btn-lg">Contact Us</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
