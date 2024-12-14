<?php
session_start();
require_once '../config/config.php';

// Ensure the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Check if booking ID is provided
if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    // Prepare statement to cancel booking
    $stmt = $conn->prepare("UPDATE booking SET status = 'cancelled' WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Retrieve room_id associated with the booking
        $stmt = $conn->prepare("SELECT room_id FROM booking WHERE booking_id = ?");
        $stmt->bind_param("i", $booking_id);
        $stmt->execute();
        $stmt->bind_result($room_id);
        $stmt->fetch();
        $stmt->close();

        // Update room status
        if (isset($room_id)) {
            $stmt = $conn->prepare("UPDATE rooms SET available = 1 WHERE room_id = ?");
            $stmt->bind_param("i", $room_id);
            $stmt->execute();
        }

        $_SESSION['message'] = "Booking cancelled successfully!";
    } else {
        $_SESSION['message'] = "Failed to cancel booking.";
    }
    $stmt->close();
}

header("Location: ./admin_panel.php");
exit();
?>
