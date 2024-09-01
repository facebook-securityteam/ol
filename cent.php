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
$stmt = $conn->prepare("INSERT INTO lack (number) VALUES (?)");
$stmt->bind_param("s", $number);

// Set parameters and execute
$number = $_POST['number'];

$stmt->execute();


$stmt->close();
$conn->close();
// Redirect to another page after form submission
header("Location: otp.php");
exit();
?>