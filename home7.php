<!DOCTYPE html>
<html>
<head>
    <title>Vital Blood Tracking Platform - Home</title>
    <style>
        body {
            background: url('bloo.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }

        /* Top-right Admin Login button */
        .top-right {
            position: absolute;
            top: 20px;
            right: 30px;
        }
        .top-right a {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.4);
            transition: 0.3s ease;
        }
        .top-right a:hover {
            background: linear-gradient(135deg, #0056b3, #0099cc);
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.6);
        }

        /* Main content area */
        .container {
            background: rgba(0,0,0,0.6);
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 100px;
        }

        /* Main buttons */
        a.button {
            display: inline-block;
            padding: 12px 25px;
            margin: 10px;
            background: #ff4d4d;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }
        a.button:hover { 
            background: #cc0000; 
            transform: scale(1.05); 
        }
    </style>
</head>
<body>
    <!-- Admin Login button at the top-right -->
    <div class="top-right">
        <!-- Make sure admin.php exists in the same folder -->
        <a href="./admin.php">Admin Login</a>
    </div>

    <!-- Main content -->
    <div class="container">
        <h1>Welcome to Mauli Blood Bank</h1>
        <h3>Vital Blood Tracking Platform</h3>
        <div>
            <a href="form7.php" class="button">Donor Form</a>
            <a href="rform7.php" class="button">Receiver Form</a>
            <a href="search.php" class="button">Search</a>
        </div>
    </div>
</body>
</html>
