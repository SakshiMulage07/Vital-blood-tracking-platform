<?php
require_once("config.php"); // Make sure $conn is defined

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $r_name = $_POST['r_name'];
    $r_cont = $_POST['r_cont'];
    $r_address = $_POST['r_address'];
    $r_email = $_POST['email'];
    $r_gender = $_POST['r_gender'];
    $r_bloodgroup = $_POST['r_bloodgroup'];
    $r_weight = $_POST['r_weight'];
    $r_age = $_POST['r_age'];
    $r_date = $_POST['r_date'];

    // Insert receiver data
    $stmt = $conn->prepare("INSERT INTO receiver (r_name,r_cont,r_address,r_email,r_gender,r_bloodgroup,r_weight,r_age,r_date)
                            VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss", $r_name, $r_cont, $r_address, $r_email, $r_gender, $r_bloodgroup, $r_weight, $r_age, $r_date);
    
    if($stmt->execute()) {
        // Mark one donor unit as used
        $update_stmt = $conn->prepare("UPDATE donor SET d_status='Used' WHERE d_bloodgroup=? AND d_status='Available' LIMIT 1");
        $update_stmt->bind_param("s", $r_bloodgroup);
        $update_stmt->execute();
        $update_stmt->close();

        echo "<center><h2>Form submitted successfully! Blood unit allocated.</h2></center>";
    } else {
        echo "Error: ".$stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>









