<?php
include('php/config.php'); // Include database connection settings
session_start(); // Start a new session or resume an existing session

// Check if the user is logged in by verifying the session. If not, redirect to the login page.
if(!isset($_SESSION['user_email'])) {
    header('location: login.php'); // Redirect to login page if not logged in
    exit;
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
    <link rel="stylesheet" type="text/css" href="styles/empprofile.css">
    
    <!-- Linking an external JavaScript file -->
    <script src="js/main.js"></script>
    
    <title>Employee Profile</title>


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

    <!--          -----------------------------------------------       -->
    
    <!-- update and delete employee account -->
    <?php
        // Fetch the logged-in user's details using their email
        $user_email = $_SESSION['user_email'];
        $query = "SELECT * FROM registerUser WHERE mail = '$user_email'";
        $result = $con->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); // Get user data
        } else {
            echo "Error: User not found.";
            exit;
        }
    ?>



<h1 style="text-align: center; color: #333; margin-bottom: 20px;">Employee Profile</h1>

<div class="profile-container" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 600px; text-align: left; margin: 20px auto;">
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Name:</strong> <?= $user['name']; ?></p>
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Gender:</strong> <?= $user['gender']; ?></p>
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Phone:</strong> <?= $user['Phone']; ?></p>
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Email:</strong> <?= $user['mail']; ?></p>
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Address:</strong> <?= $user['Address']; ?></p>
    <p style="font-size: 16px; color: #555;"><strong style="color: #333;">Date of Birth:</strong> <?= $user['dob']; ?></p>

    <!-- Links to update or delete profile -->
    <a href="updateempprofile.php" class="btn" style="display: inline-block; margin-top: 20px; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-size: 14px; color: white; background-color: #28a745; margin-right: 10px; transition: background-color 0.3s ease;">Update Profile</a>
    
    <a href="deleteempprofile.php" class="btn" style="display: inline-block; margin-top: 20px; padding: 10px 15px; border-radius: 5px; text-decoration: none; font-size: 14px; color: white; background-color: #dc3545; transition: background-color 0.3s ease;" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</a>
</div>






<!-- --------------------------------------------------------------------------------------  -->
    <!-- Registered Exams Table -->
    <div class="user-table">
        <h2>Registered Exams</h2>
        <br>
        <table class="table-style">
            <thead>
                <tr>
                    <th>Exam Name</th>
                    <th>Exam Date</th>
                    <th width="10%">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Get the employee ID from the session
                $empID = $_SESSION['user_ID'];

                // Query to select the exams registered by the employee
                $sql = "SELECT * FROM employee_exam WHERE empID = '$empID'";
                $result = $con->query($sql);

                // Display the exams if available, otherwise show "No exams registered"
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $exam_name = $row['exam_name'];
                        $edate = $row['edate'];

                        // Output the exam name and date, along with a delete button
                        echo '
                        <tr>
                            <td>'.$exam_name.'</td>
                            <td>'.$edate.'</td>
                            <td>
                                <center>
                                    <button class = "delete-btn"><a href="updateUserRegExam.php?updateid='.$exam_name.'">Update</a></button>
                                    <!-- Delete button triggers confirmDelete() JavaScript function -->
                                    <button class="delete-btn" onclick="return confirmDelete()">
                                        <a href="deleteexam.php?deletename='.$exam_name.'">Delete</a>
                                    </button>
                                </center>
                            </td>
                        </tr>';
                    }
                } else {
                    // If no exams registered, display this message
                    echo '<tr><td colspan="3">No exams registered</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>





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

    <!-- JavaScript function to confirm exam deletion -->
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this exam?');
        }
    </script>

</body>
</html>
