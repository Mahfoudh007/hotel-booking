<?php
include '../config/config.php';
session_start();

// Set the content type to JSON
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = $_POST['room_id'];
    $user_id = $_SESSION['user_id'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];

    // Check room availability
    $stmt = $conn->prepare("SELECT available FROM rooms WHERE room_id = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($available);
    $stmt->fetch();
    $stmt->close();

    if (!$available) {
        echo '<div
            class="alert alert-primary"
            role="alert"
        >
        Room is not available!
        </div>
        ';
        exit();
    }

    // Execute booking process
    $stmt = $conn->prepare("INSERT INTO booking (user_id, room_id, check_in_date, check_out_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $room_id, $check_in_date, $check_out_date);

    if ($stmt->execute()) {
        // Update room status
        $stmt = $conn->prepare("UPDATE rooms SET available = 0 WHERE room_id = ?");
        $stmt->bind_param("i", $room_id);
        $stmt->execute();

        header("Location: ../public/booked_rooms.php");
    } else {
        echo '<div
            class="alert alert-danger"
            role="alert"
        >
        Failed to book the room. Please try again later.
        </div>
        ';
        exit();
    }
    $stmt->close();
    exit(); // Ensure no further output is sent
}
