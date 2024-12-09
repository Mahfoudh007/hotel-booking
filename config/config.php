<?php
// Database configuration
$host = 'localhost';
$username = 'root'; 
$password = ''; 
$dbname = 'hotelbookingrooms'; 

// Function to establish a connection
function connectDatabase($host, $username, $password, $dbname) {
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check for connection error
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Establish connection
$conn = connectDatabase($host, $username, $password, $dbname);


// Close the connection when done
// $conn->close();
?>