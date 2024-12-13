<?php
session_start();
require_once '../config/config.php'; // Database connection file

// Ensure the user is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../public/login.php");
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4 text-center">Admin Dashboard</h2>
        <a href="../public/home.php" class="btn btn-primary mb-3">HOME</a>

        <!-- Add a new room -->
        <div class="card">
            <div class="card-header">
                <h5>Add New Room</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="./add_room.php">
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
            </div>
        </div>

        <!-- Display rooms -->
        <div class="card">
            <div class="card-header">
                <h5>Rooms</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Availability</th>
                            <th>Action</th>
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
                                <td><a href="delete_room.php?room_id=<?= $room['room_id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Display bookings -->
        <div class="card">
            <div class="card-header">
                <h5>Bookings</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
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
                                        <a href="cancel_booking_admin.php?id=<?= $booking['booking_id'] ?>" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
