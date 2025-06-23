<?php
include('php/config.php');
session_start();

if (!isset($_SESSION['user_email'])) {
    header('location: login.php');
    exit;
}

$user_email = $_SESSION['user_email'];

// Delete user data from the database
$deleteQuery = "DELETE FROM registerUser WHERE mail='$user_email'";

if ($con->query($deleteQuery)) {
    session_destroy(); // End session after deleting the account
    header('location: login.php'); // Redirect to login page
    exit();
} else {
    echo "Error deleting account: " . $conn->error;
}
?>
