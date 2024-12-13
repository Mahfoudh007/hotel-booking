<?php
session_start();
require_once '../config/config.php';

// تأكد من أن المستخدم هو المسؤول
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// تأكد من وجود معرف الحجز
if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE booking SET status = 'cancelled' WHERE booking_id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();


    if ($stmt->execute()) {
        // Update room status
        $stmt = $conn->prepare("UPDATE rooms SET available = 1 WHERE room_id = ?");
        $stmt->bind_param("i", $room_id);
        $stmt->execute();

        $message = "Booking cancelled successfully!";
    } else {
        $message = "Failed to cancel booking.";
    }
    $stmt->close();
}

header("Location: ./admin_panel.php");
exit();
?>
