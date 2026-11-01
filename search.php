<?php
require_once("config.php"); // Make sure $conn is defined in config.php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["searchname"];

    // Prepare query to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM donor WHERE d_bloodgroup LIKE ?");
    $like_search = "%".$search."%";
    $stmt->bind_param("s", $like_search);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<center>";
    echo "<table border='1'>
        <tr>
            <th>Donor Name</th>
            <th>Donor Contact</th>
            <th>Donor Email</th>
            <th>Donor Address</th>
            <th>Donor Gender</th>
            <th>Donor Bloodgroup</th>
            <th>Donor Weight</th>
            <th>Donor Age</th>
            <th>Donate Date</th>
        </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".htmlspecialchars($row['d_name'])."</td>";
        echo "<td>".htmlspecialchars($row['d_cont'])."</td>";
        echo "<td>".htmlspecialchars($row['d_email'])."</td>";
        echo "<td>".htmlspecialchars($row['d_address'])."</td>";
        echo "<td>".htmlspecialchars($row['d_gender'])."</td>";
        echo "<td>".htmlspecialchars($row['d_bloodgroup'])."</td>";
        echo "<td>".htmlspecialchars($row['d_weight'])."</td>";
        echo "<td>".htmlspecialchars($row['d_age'])."</td>";
        echo "<td>".htmlspecialchars($row['d_date'])."</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Count total bags
    $count_stmt = $conn->prepare("SELECT COUNT(*) AS count FROM donor WHERE d_bloodgroup LIKE ?");
    $count_stmt->bind_param("s", $like_search);
    $count_stmt->execute();
    $count_result = $count_stmt->get_result();
    $count_row = $count_result->fetch_assoc();

    echo "<h2>The Total Bags Available Of Bloodgroup ".htmlspecialchars($search)." Is = ".$count_row['count']."</h2>";
    echo "</center>";

    $stmt->close();
    $count_stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Donor - Mauli Blood Bank</title>
    <style>
        body {
            background: url('bk55.png.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            text-align: center;
        }
        table {
            border-style: solid;
            border-width: 5px;
            border-color: orange;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px 15px;
            border: 1px solid orange;
        }
        input[type="text"], input[type="submit"], button a {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin: 10px 0;
            font-size: 16px;
        }
        button a {
            color: #fff;
            text-decoration: none;
        }
        button {
            background-color: #ff4d4d;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #cc0000;
        }
        h1, h2 {
            margin: 10px 0;
        }
        hr {
            border: 1px solid orange;
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>Mauli Blood Bank</h1>
    <hr>
    <h2>Search By Blood Group:</h2>
    <form action="" method="POST">
        <input type="text" name="searchname" placeholder="Enter Blood Group"><br><br>
        <input type="submit" name="search" value="Search"><br><br>
        <button><a href="home7.php">Back To Home</a></button>
    </form>
</body>
</html>
