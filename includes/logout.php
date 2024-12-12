<?php session_start();

session_unset();
session_destroy();

// Ensure connection is valid before using
global $conn;
if ($conn instanceof mysqli) {
    $conn->close();
}

header("Location: ../index.html");
exit();

?>