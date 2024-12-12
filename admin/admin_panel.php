<?php
session_start();
require_once '../config/config.php'; // Database connection file

// Ensure the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit();
}

// Add a new room
if (isset($_POST['add_room'])) {
    $img = $_POST['img'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO rooms (img, price, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $img, $price, $description);

    if ($stmt->execute()) {
        $message = "Room added successfully!";
    } else {
        $message = "Failed to add room!";
    }
    $stmt->close();
}

// Display rooms
$roomsQuery = "SELECT * FROM rooms";
$roomsResult = $conn->query($roomsQuery);

// Display bookings
$bookingsQuery = "SELECT b.booking_id, r.description, u.username, b.check_in_date, b.check_out_date, b.status 
                  FROM booking b 
                  JOIN rooms r ON b.room_id = r.room_id
                  JOIN users u ON b.user_id = u.user_id";
$bookingsResult = $conn->query($bookingsQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Admin Panel</h2>

        <!-- Display messages -->
        <?php if (isset($message)) { ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php } ?>

        <!-- Add a new room -->
        <h3>Add New Room</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="img" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="img" name="img" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="add_room">Add Room</button>
        </form>

        <!-- Display rooms -->
        <h3 class="my-4">Rooms</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($room = $roomsResult->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $room['room_id'] ?></td>
                        <td><img src="<?= $room['img'] ?>" alt="Room Image" width="100"></td>
                        <td><?= $room['price'] ?></td>
                        <td><?= $room['description'] ?></td>
                        <td><?= $room['available'] ? 'Available' : 'Not Available' ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Display bookings -->
        <h3 class="my-4">Bookings</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Room</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($booking = $bookingsResult->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $booking['booking_id'] ?></td>
                        <td><?= $booking['username'] ?></td>
                        <td><?= $booking['description'] ?></td>
                        <td><?= $booking['check_in_date'] ?></td>
                        <td><?= $booking['check_out_date'] ?></td>
                        <td><?= $booking['status'] ?></td>
                        <td>
                            <?php if ($booking['status'] != 'cancelled') { ?>
                                <a href="cancel_booking_admin.php?id=<?= $booking['booking_id'] ?>" class="btn btn-danger">Cancel</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>