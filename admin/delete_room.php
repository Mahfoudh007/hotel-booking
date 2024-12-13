<?php

include '../config/config.php';

// Check if the room_id is set in the URL
if (isset($_GET['room_id'])) {
  // Get the room_id from the URL
  $room_id = $_GET['room_id'];

  // SQL query to delete the room from the database
  $deleteQuery = "DELETE FROM rooms WHERE room_id = ?";
  
  // Prepare the query
  if ($stmt = $conn->prepare($deleteQuery)) {
    // Bind the parameter
    $stmt->bind_param("i", $room_id);

    // Execute the query
    if ($stmt->execute()) {
      echo "Room deleted successfully!";  
      header("Location: ./admin_panel.php");  
    } else {
      echo "Error deleting room: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
  } else {
    echo "Error preparing query: " . $conn->error;
  }
}

// Close the database connection
$conn->close();
?>
