<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('db.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the request method is set and is POST
if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $password = $_POST['pass'];

    // Check if the email is already registered
    $emailCheckQuery = "SELECT COUNT(*) as count FROM users WHERE email = ?";
    $emailCheckStmt = $conn->prepare($emailCheckQuery);
    $emailCheckStmt->bind_param("s", $email);
    $emailCheckStmt->execute();
    $emailCheckResult = $emailCheckStmt->get_result();
    $emailCount = $emailCheckResult->fetch_assoc()['count'];
    $emailCheckStmt->close();

    if ($emailCount > 0) {
        // Email already registered
        echo json_encode(["status" => "error", "message" => "Email already registered"]);
    } else {
        // Proceed with registration
        $password = password_hash($password, PASSWORD_DEFAULT);
        $userType = mysqli_real_escape_string($conn, $_POST['user_type']);

        $sql = "INSERT INTO users (name, phone, email, city, password, user_type) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $phone, $email, $city, $password, $userType);

        if ($stmt->execute()) {
            // Registration successful
            echo json_encode(["status" => "success", "message" => "Registration successful!"]);
        } else {
            // Registration failed
            echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    }
} else {
    // Invalid request method or not a POST request
    echo json_encode(["status" => "error", "message" => "Invalid request method or not a POST request"]);
}

mysqli_close($conn);
?>