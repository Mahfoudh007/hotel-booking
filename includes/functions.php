<?php
function registerUser($conn, $username, $password, $confirmPassword)
{
    // Ensure the connection is valid before using it
    if ($conn instanceof mysqli && !$conn->ping()) {
        return "Database connection lost!";
    }

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        return "All fields are required for registration!";
    }
    if ($password !== $confirmPassword) {
        return "Passwords do not match!";
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, pwd) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        $stmt->close();
        return "Registration successful! You can now log in.";
    } else {
        $stmt->close();
        return "Registration failed: " . $stmt->error;
    }
}

function loginUser($conn, $username, $password)
{
    // Ensure the connection is valid before using it
    if ($conn instanceof mysqli && !$conn->ping()) {
        return "Database connection lost!";
    }

    if (empty($username) || empty($password)) {
        return "Both fields are required for login!";
    }

    $stmt = $conn->prepare("SELECT user_id, pwd, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashedPassword, $role);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION["role"] = $role;

            $stmt->close();

            header("Location: ./home.php");
            exit();
        } else {
            $stmt->close();
            return "Invalid username or password.";
        }
    } else {
        $stmt->close();
        return "No account found with that username.";
    }
}


?>