<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css file link-->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/adminprofile.css">
    <!--Javascript file location-->
    <script src="js/mainScript.js"></script>

    <title>Examiner Profile</title>

</head>
<body>

<!--Navigation Content-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
            <li><a href="home.php">Home</a></li>
                <li><a href="#.php">Registration</a></li>
                <li><a href="#.php">Results</a></li>
                <li><a href="#.php">Attempt Exam</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
            <!--displaying user email and directing to user profile-->
            <?php

           // Log out link
$logOut = "<a href='logout.php' class='logout'>Log Out</a>";

// Display user-specific profile based on the account type
if (isset($_SESSION['account'])) {
    if ($_SESSION['account'] == "employee") {
        echo ('<p><a href="empprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
        echo $logOut;
    } elseif ($_SESSION['account'] == "admin") {
        echo ('<p><a href="adminprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
        echo $logOut;
    } elseif ($_SESSION['account'] == "itsd") {  
        echo ('<p><a href="itsdprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
        echo $logOut;
    } elseif ($_SESSION['account'] == "examiner") {
        echo ('<p><a href="examinerprofile.php" class="user-display" style="text-transform: uppercase;">Examiner Profile</a></p>');
        echo $logOut;
    }
} else {
    // If session is not set, redirect to login
    echo '<p>You are not logged in. <a href="login.php">Login</a></p>';
}

            ?>
        </div>
    </nav>
        </div>
    </nav>

            hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh



    

    <!--Footer Content-->
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
                    <li><a href="#">Gamil</a></li>
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
     </div> <br>
     <center><p>Exam Hub - Employee Examination System</p></center>
  </footer>

</body>
</html>