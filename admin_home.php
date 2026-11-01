<?php
session_start();
if(!isset($_SESSION['login_admin'])){
    header("Location:admin.php");
    exit();
}

include("config.php");
$admin_email = $_SESSION['login_admin'];

// Get stats
$donor_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM donor"))['total'];
$receiver_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM receiver"))['total'];

// Handle search
$search_result = "";
if(isset($_POST['search']) && !empty($_POST['searchname'])) {
    $search = $_POST['searchname'];
    $type = $_POST['search_type'];

    if($type == "donor") {
        $stmt = $conn->prepare("SELECT * FROM donor WHERE d_bloodgroup LIKE ?");
        $like_search = "%".$search."%";
        $stmt->bind_param("s", $like_search);
        $stmt->execute();
        $result = $stmt->get_result();

        $search_result .= "<h2>Donors with blood group '$search'</h2>";
        $search_result .= "<table class='data-table'>
        <tr><th>Name</th><th>Contact</th><th>Email</th><th>Address</th><th>Gender</th><th>Blood Group</th><th>Weight</th><th>Age</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            $search_result .= "<tr>
                <td>".htmlspecialchars($row['d_name'])."</td>
                <td>".htmlspecialchars($row['d_cont'])."</td>
                <td>".htmlspecialchars($row['d_email'])."</td>
                <td>".htmlspecialchars($row['d_address'])."</td>
                <td>".htmlspecialchars($row['d_gender'])."</td>
                <td>".htmlspecialchars($row['d_bloodgroup'])."</td>
                <td>".htmlspecialchars($row['d_weight'])."</td>
                <td>".htmlspecialchars($row['d_age'])."</td>
                <td>".htmlspecialchars($row['d_date'])."</td>
            </tr>";
        }
        $search_result .= "</table>";
        $stmt->close();
    } else {
        $stmt = $conn->prepare("SELECT * FROM receiver WHERE r_bloodgroup LIKE ?");
        $like_search = "%".$search."%";
        $stmt->bind_param("s", $like_search);
        $stmt->execute();
        $result = $stmt->get_result();

        $search_result .= "<h2>Receivers with blood group '$search'</h2>";
        $search_result .= "<table class='data-table'>
        <tr><th>Name</th><th>Contact</th><th>Email</th><th>Address</th><th>Gender</th><th>Blood Group</th><th>Weight</th><th>Age</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            $search_result .= "<tr>
                <td>".htmlspecialchars($row['r_name'])."</td>
                <td>".htmlspecialchars($row['r_cont'])."</td>
                <td>".htmlspecialchars($row['r_email'])."</td>
                <td>".htmlspecialchars($row['r_address'])."</td>
                <td>".htmlspecialchars($row['r_gender'])."</td>
                <td>".htmlspecialchars($row['r_bloodgroup'])."</td>
                <td>".htmlspecialchars($row['r_weight'])."</td>
                <td>".htmlspecialchars($row['r_age'])."</td>
                <td>".htmlspecialchars($row['r_date'])."</td>
            </tr>";
        }
        $search_result .= "</table>";
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard - Mauli Blood Bank</title>
<style>
body {
    background: url('bloo.jpg') no-repeat center center fixed;
    background-size: cover;
    font-family: Arial, sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
}
header {
    background: rgba(0,0,0,0.7);
    padding: 20px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    border-bottom: 2px solid #ff4d4d;
}
.container {
    margin: 40px auto;
    background: rgba(0,0,0,0.6);
    padding: 30px;
    border-radius: 10px;
    width: 90%;
    max-width: 1000px;
    text-align: center;
}
.stats {
    display: flex;
    justify-content: space-around;
    margin-bottom: 40px; /* Added more spacing below stats */
}
.stat-box {
    background: rgba(255,77,77,0.8);
    padding: 20px 40px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
}
form {
    margin: 50px 0; /* Increased spacing around search */
}
input[type="text"], select, input[type="submit"] {
    padding: 10px;
    border-radius: 5px;
    border: none;
    font-size: 16px;
    margin: 5px;
}
input[type="submit"] {
    background-color: #ff4d4d;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}
input[type="submit"]:hover {
    background-color: #cc0000;
}
a.button {
    display: inline-block;
    padding: 10px 25px;
    margin: 10px;
    background: #ff4d4d;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: 0.3s;
}
a.button:hover {
    background: #cc0000;
    transform: scale(1.05);
}
.data-table {
    border-collapse: collapse;
    width: 100%;
    color: #fff;
}
.data-table th, .data-table td {
    border: 1px solid #ff4d4d;
    padding: 8px;
}
.data-table th {
    background-color: #ff4d4d;
}
footer {
    text-align: center;
    color: #ccc;
    margin-top: 30px;
}
</style>
</head>
<body>

<header>Admin Dashboard - Mauli Blood Bank</header>

<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($admin_email); ?></h2>
    <div class="stats">
        <div class="stat-box">Total Donors: <?php echo $donor_count; ?></div>
        <div class="stat-box">Total Receivers: <?php echo $receiver_count; ?></div>
    </div>

    <h3>Search by Blood Group</h3>
    <form method="POST">
        <input type="text" name="searchname" placeholder="Enter blood group (e.g., O+)" required>
        <select name="search_type">
            <option value="donor">Donor</option>
            <option value="receiver">Receiver</option>
        </select>
        <input type="submit" name="search" value="Search">
    </form>

    <?php echo $search_result; ?>

    <div style="margin-top:30px;">
        <a href="logout7.php" class="button">Logout</a>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Mauli Blood Bank | Admin Panel
</footer>

</body>
</html>
