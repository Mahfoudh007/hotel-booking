<?php

include '../config/config.php';

if (isset($_POST['add_room'])) {
    $img = $_POST['img'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO rooms (img, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $img, $price, $description);

    if ($stmt->execute()) {
        $message = "Room added successfully!";
        $stmt->close();
    $conn->close();

        header("Location: ./admin_panel.php");
        
    } else {
        echo "Failed to add room!";
        $stmt->close();
    $conn->close();
        header("Location: ./admin_panel.php");
    }
    
}

?>