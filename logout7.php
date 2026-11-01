<?php
session_start();

// Destroy all session data
if(isset($_SESSION['login_admin'])) {
    unset($_SESSION['login_admin']);
}

session_destroy();
header("Location:admin.php"); // Redirect to login page
exit();
?>
