<?php
// Database connection details
$servername = "localhost"; // Usually "localhost"
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$database = "foodfinder_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$concerns = $_POST['concerns'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO submissions (name, email, phone, concerns) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $concerns);

// Execute the statement
if ($stmt->execute()) {
    echo "Your submission was successful!";
    
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
