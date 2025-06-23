<?php
include('php/config.php'); // Include database connection settings
session_start(); // Start a new session or resume an existing session

// Check if the user is logged in by verifying the session. If not, redirect to the login page.
if (!isset($_SESSION['user_email'])) {
    header('location: login.php'); // Redirect to login page if not logged in
    exit;
}

$user_email = $_SESSION['user_email'];
$query = "SELECT * FROM registerUser WHERE mail = '$user_email'";
$result = $con->query($query);  // Corrected from $con to $conn
$user = $result->fetch_assoc(); // Get the user data

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $dob = $_POST['dob'];

    // Update user data
    $updateQuery = "UPDATE registerUser SET name='$name', gender='$gender', Phone='$Phone', Address='$Address', dob='$dob' WHERE mail='$user_email'";
    
    if ($con->query($updateQuery)) {
        header("Location: empprofile.php"); // Redirect without echo before the header
        exit(); // Make sure script execution stops
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Linking external CSS files for styles -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    
    
    <!-- Linking an external JavaScript file -->
    <script src="js/main.js"></script>
    
    <title>Update Employee Profile</title>

    




</head>
<body>

    <!-- Navigation bar section -->
    <nav>
        <div class="nav-bar">
            <!-- Logo image for branding -->
            <img src="images/logo.png" class="logo">

            <!-- Navigation menu with links to different pages -->
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="ragisterexam.php">Registration</a></li>
                <li><a href="resultexam.php">Results</a></li>
                <li><a href="attempt.php">Attempt Exam</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>

            <?php
            // Log out link
            $logOut = "<a href='logout.php' class='logout'>Log Out</a>";

            // Display user profile based on account type (employee, admin, examiner)
            if (isset($_SESSION['account'])) {
                if ($_SESSION['account'] == "employee") {
                    // Employee profile link
                    echo ('<p><a href="empprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
                    echo $logOut;
                } elseif ($_SESSION['account'] == "admin") {
                    // Admin profile link
                    echo ('<p><a href="adminprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
                    echo $logOut;
                } elseif ($_SESSION['account'] == "examiner") {
                    // Examiner profile link
                    echo ('<p><a href="examinerprofile.php" class="user-display" style="text-transform: uppercase;">Admin Profile</a></p>');
                    echo $logOut;
                }
            } else {
                // If no session is set, prompt the user to log in
                echo '<p>You are not logged in. <a href="login.php">Login</a></p>';
            }
            ?>
        </div>
    </nav>

    <!--Update form -------------------------------- -->
    
    <form action="updateempprofile.php" method="POST">
    <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
    <input type="text" name="name" value="<?= $user['name']; ?>" required 
           style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br>

    <label for="gender" style="display: block; font-weight: bold; margin-bottom: 5px;">Gender:</label>
    <input type="text" name="gender" value="<?= $user['gender']; ?>" required 
           style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br>

    <label for="Phone" style="display: block; font-weight: bold; margin-bottom: 5px;">Phone:</label>
    <input type="text" name="Phone" value="<?= $user['Phone']; ?>" required 
           style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br>

    <label for="Address" style="display: block; font-weight: bold; margin-bottom: 5px;">Address:</label>
    <input type="text" name="Address" value="<?= $user['Address']; ?>" required 
           style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br>

    <label for="dob" style="display: block; font-weight: bold; margin-bottom: 5px;">Date of Birth:</label>
    <input type="date" name="dob" value="<?= $user['dob']; ?>" required 
           style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;"><br>

    <input type="submit" value="Update Profile" 
           style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">
</form>



    <!-- Footer Section with quick links and contact info -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="registerexam.php">Exam Registration</a></li>
                        <li><a href="examresult.php">Exam Results</a></li>
                        <li><a href="#">Attempt Exam</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Gmail</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Account</h4>
                    <ul>
                        <li><a href="login.php">Log In</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <!-- Centered footer text -->
        <center><p>Exam Hub - Employee Examination System</p></center>
    </footer>

   
        
    </body>

    </head>