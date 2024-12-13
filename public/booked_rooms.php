<?php
include '../includes/header.php';

// تأكد من تسجيل دخول المستخدم
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// جلب الحجوزات الخاصة بالمستخدم
$user_id = $_SESSION['user_id'];
$query = "SELECT b.booking_id, b.status,r.room_id,r.img, r.description, r.price, b.check_in_date, b.check_out_date 
          FROM booking b
          JOIN rooms r ON b.room_id = r.room_id
          WHERE b.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Your Booked Rooms</h2>
    <?php if ($result->num_rows > 0): ?>
        <div class="row">
            <?php while ($booking = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $booking['img'] ?>" class="card-img-top" alt="Room Image">
                        <div class="card-body">
                            <h5 class="card-title">Room Details</h5>
                            <p class="card-text"><?= $booking['description'] ?></p>
                            <p><strong>Price:</strong> $<?= $booking['price'] ?>/night</p>
                            <p><strong>Check-In:</strong> <?= $booking['check_in_date'] ?></p>
                            <p><strong>Check-Out:</strong> <?= $booking['check_out_date'] ?></p>
                            <?php if ($booking['status'] == 'cancelled') { ?>
                                <span class="badge bg-danger">Cancelled</span>
                            <?php } else {?>
                                <form method="POST" action="../actions/cancel_booking.php">
                                    <input type="hidden" name="booking_id" value="<?= $booking['booking_id']?>">
                                    <input type="hidden" name="room_id" value="<?= $booking['room_id']?>">
                                    <button type="submit" class="btn btn-danger w-100">Cancel Booking</button>
                                </form>
                            <?php };?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">No bookings found.</div>
    <?php endif; ?>
</div>

<?php
include '../includes/footer.php';
?>
