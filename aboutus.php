<?php
require('php/config.php'); 
include('php/functions.php');

session_start();




?>



<!DOCTYPE html>
<html lang="en"> <!-- the language of the document (English) -->
<html>
    <head>
    <meta charset="UTF-8"> <!-- character encoding for the document-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- page usesrendering mode in Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!--adapts to mobile and desktop views)-->

    <!--css file link-->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    
    <!--Javascript file location-->
    <script src="js/main.js"></script>

   

    <title>AboutUs</title>

    </head>

    <body>
        <!--Navigation bar-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="ragisterexam.php">Registration</a></li>
                <li><a href="resultexam.php">Results</a></li>
                <li><a href="#">Attempt Exam</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
              <!-- displaying user email and directing to user profile -->
              <?php

// Ensure session is started


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

    <!-- FAQ content -->
    
     <h1>About Us</h1>
     <h2>Who We Are</h2>
     <p>We are a development team of five members from faculity of computing at Sri lanka Institute of Information Technology.<br>
             We created the online examination system Examhub which is used for secure employee examinations.<br>
                       Our development team members: sudam, rashmika, chamod, arosha, avishka<br> 
    </p><br>
    <h2>What We Do</h2>
     <p>
        We create static webpages and dynamic webapplications for every kind of organizational and bussiness needs <br>
        using the latest technologies.<br>
     </p><br>
     <h2>Our vision</h2>
     <p>Our vision is to deliver our clients  trustable, reliable and secure web based systems with the improvements of the latest technologies.<br><br></p>


    <style>
         h1 {
      color: blueviolet;              
      font-size: 36px;            
      font-family: Arial, sans-serif; 
      text-align: center;        
      background-color: white;
      padding: 20px;              
         }

         h2 {
    text-align: center;
     }
         p {
    text-align: center;
     }
          
         
    </style>













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
    </body>
</html>