<?php
include("config.php"); // should contain $conn = new mysqli(...)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $a = $_POST['d_name'];
    $b = $_POST['d_cont'];
    $c = $_POST['email'];  // matches form
    $d = $_POST['d_address'];
    $e = $_POST['d_gender'];
    $f = $_POST['d_bloodgroup'];
    $g = $_POST['d_weight'];
    $h = $_POST['d_age'];
    $i = $_POST['d_date'];

    // Prepared statement prevents SQL Injection
    $sql = "INSERT INTO donor 
            (d_name, d_cont, d_email, d_address, d_gender, d_bloodgroup, d_weight, d_age, d_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssis", $a, $b, $c, $d, $e, $f, $g, $h, $i);

    if ($stmt->execute()) {
        echo "<center>Inserted successfully!</center>";
    } else {
        echo "Error: " . $stmt->error;
    }

} else {
    echo "Request method is not POST";
}
?>
