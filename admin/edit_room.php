<?php
session_start();
require_once '../config/config.php';

// Ensure the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit();
}

// Check if room_id is provided
if (!isset($_GET['room_id'])) {
    header("Location: admin_dashboard.php");
    exit();
}

$room_id = $_GET['room_id'];

// Fetch room details
$roomQuery = "SELECT * FROM rooms WHERE room_id = ?";
$stmt = $conn->prepare($roomQuery);
$stmt->bind_param("i", $room_id);
$stmt->execute();
$roomResult = $stmt->get_result();

if ($roomResult->num_rows == 0) {
    echo "Room not found!";
    exit();
}

$room = $roomResult->fetch_assoc();

// Update room details on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $img = $_POST['img'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $available = isset($_POST['available']) ? 1 : 0;

    $updateQuery = "UPDATE rooms SET img = ?, price = ?, description = ?, available = ? WHERE room_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("sisii", $img, $price, $description, $available, $room_id);

    if ($updateStmt->execute()) {
        header("Location: ./admin_panel.php");
        exit();
    } else {
        echo "Failed to update room!";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="my-4 text-center">Edit Room</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="img" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="img" name="img" value="<?= htmlspecialchars($room['img']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="<?= $room['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required><?= htmlspecialchars($room['description']); ?></textarea>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="available" name="available" <?= $room['available'] ? 'checked' : ''; ?>>
            <label for="available" class="form-check-label">Available</label>
        </div>
        <button type="submit" class="btn btn-success">Update Room</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
