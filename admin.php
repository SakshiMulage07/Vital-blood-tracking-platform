<?php
session_start();
include("config.php"); // Database connection

// Redirect if already logged in
if(isset($_SESSION['login_admin'])){
    header("Location:home7.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mya_email = $_POST['a_email'];
    $mya_pass = $_POST['a_pass'];
    $a_pass = md5($mya_pass); // encrypted password

    $sql = "SELECT a_id FROM blood.admin WHERE a_email='$mya_email' AND a_pass='$a_pass'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['login_admin'] = $mya_email;
        header("Location:admin_home.php");
        exit();
    } else {
        $error = "Your login email or password is invalid";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Vital Blood Tracking Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('bloo.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            color: #fff;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px #ff4d4d;
            text-align: center;
        }
        h1 {
            color: #ffcccc;
            margin-bottom: 10px;
        }
        h3 {
            color: #ff9999;
            margin: 5px 0 20px 0;
        }
        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 85%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #ff4d4d;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #cc0000;
            transform: scale(1.05);
        }
        p.error {
            color: #ff8080;
        }
        hr {
            border: 1px solid #ff4d4d;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Vital Blood Tracking Platform</h1>
        <h3><i>A BIT OF BLOOD CAN SAVE A LIFE!!!</i></h3>
        <hr>
        <h2>Login Here</h2>

        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form action="" method="post">
            <input type="text" name="a_email" placeholder="Enter email" required><br/>
            <input type="password" name="a_pass" placeholder="Enter password" required><br/>
            <input type="submit" value="Log In">
        </form>
<!-- Back to Home button -->
<a href="home7.php" class="back-home"><strong>Back to Home</strong></a>

    </div>
</body>
</html>

