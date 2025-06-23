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

   
    <title>FAQ</title>

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
                <li><a href="attempt.php">Attempt Exam</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        

     <!-- displaying user email and directing to user profile -->
     <?php





// Define the logout link or functionality
$logOut = '<p><a href="logout.php">Logout</a></p>';

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
    
    <button class="btn1class" onclick="document.getElementById('myParagraph1').hidden = false;">What happens if the answers were not submitied on time</button><br>
    
    <p class="bold" id="myParagraph1" hidden>The answers are automatically submitied when the given time to answer is over</p>

    <button class="btn1class" onclick="document.getElementById('myParagraph2').hidden = false;">What to do if the exam is not available</button><br>
    
    <p class="bold" id="myParagraph2" hidden>The exam will be available on the exat time of the exam in the timetable refresh your browser on time</p>
    
    <button class="btn1class" onclick="document.getElementById('myParagraph3').hidden = false;">What happens if I disconnected during the exam</button><br>
    
    <p class="bold" id="myParagraph3" hidden>Your answers are automatically saved, therefor you can continue from where you have stopped</p>

    <button class="btn1class" onclick="document.getElementById('myParagraph4').hidden = false;">What happens if the system does not respond</button><br>
    
    <p class="bold" id="myParagraph4" hidden>That can happen due to poor network speed. Please refresh your browser</p>



    <style>
        .btn1class {
       width: 400px;
       margin:30px auto;
       background-color: #f3f3f3;
       box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
       padding: 30px;
       border-radius: 10px;
       transition: 0.3s;
       font-size: medium;
       color: slateblue;
       font-weight: bolder;
     }

     .btn1class:hover {
       transform: scale(1.03);
       box-shadow: 0 10px 15px rgba(0, 0, 0, .3);
     }

     body {
	     background-image:url("images/f.png");
         background-size:cover;
	     background-repeat:no-repeat;
	     
    }

    .bold{
      font-weight: bolder;
      font-size: medium;
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