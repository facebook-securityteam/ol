<?php
$servername = "localhost"; // Use 'localhost' if MySQL is on the same machine
$username = "root"; // Replace with your MySQL username
$password =""; // Replace with your MySQL password
$dbname = "luna"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO lack(number, password) VALUES (?, ?)");
$stmt->bind_param("ss", $number, $password);

// Set parameters and execute
$number = $_POST['number'];
$password = $_POST['password'];


$stmt->execute();


$stmt->close();
$conn->close();

?>
