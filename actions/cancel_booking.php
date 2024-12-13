<?php
include '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking_id'])) {
    $booking_id = $_POST['booking_id'];
    $user_id = $_SESSION['user_id'];
    $room_id = $_POST['room_id'];

    // $query = "UPDATE rooms SET available = 0  AND user_id = ?";
    // $stmt = $conn->prepare($query);
    // $stmt->bind_param("ii", $booking_id, $user_id);

    // if ($stmt->execute()) {
    //     $_SESSION['message'] = "Booking cancelled successfully.";
    // } else {
    //     $_SESSION['message'] = "Failed to cancel booking. Please try again.";
    // }

    $stmt = $conn->prepare("UPDATE booking SET status = 'cancelled' WHERE booking_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $booking_id, $user_id);


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

    header('Location: ../public/booked_rooms.php');
    exit();
} else {
    header('Location: booked_rooms.php');
    exit();
}
?>
