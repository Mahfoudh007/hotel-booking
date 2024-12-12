<?php
include '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    $user_id = $_SESSION['user_id'];

    $query = "DELETE FROM booking WHERE booking_id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $booking_id, $user_id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Booking cancelled successfully.";
    } else {
        $_SESSION['message'] = "Failed to cancel booking. Please try again.";
    }

    header('Location: booked_rooms.php');
    exit();
} else {
    header('Location: booked_rooms.php');
    exit();
}
?>
