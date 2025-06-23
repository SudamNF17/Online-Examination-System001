<!DOCTYPE html>
<html lang="en"> <!-- the language of the document (English) -->

<head>
    <meta charset="UTF-8"> <!-- character encoding for the document-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- page uses rendering mode in Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- adapts to mobile and desktop views -->

    <!-- CSS file links -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    
    
    
        <!-- JavaScript file location -->
    <script src="js/main.js"></script>

    <script>
        function showSuccessMessage() {
            alert("Message has been sent successfully!"); // This displays the alert message
        }
    </script>

    <title>Contact us</title>
</head>

<body>
    <!-- Navigation bar -->
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

            // Ensure session is started
            session_start();

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
    <br>

    
    <header style="background-color: #333;
     color: white;
      padding: 10px
      ; text-align: center;">

        <h1>Contact Us</h1>
    </header>

    <div style="max-width: 600px; 
    margin: 50px auto; 
    padding: 20px; 
    background-color: white; 
    border-radius: 5px; 
    box-shadow: 0 0 10px rgba(0,0,0,0.1);">

        <h3 style="text-align: center;">If you have any questions, feel free to reach out by filling out the form below</h3>
        <br>
        <form action="" method="post" onsubmit="showSuccessMessage()" style="display: flex; flex-direction: column;">
            <label for="name" style="margin-bottom: 5px;">Name:</label>
            <input type="text" id="name" name="name" required 
            style="padding: 10px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px;">

            <label for="email" style="margin-bottom: 5px;">Email:</label>
            <input type="email" id="email" name="email" required 
            style="padding: 10px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px;">

            <label for="message" style="margin-bottom: 5px;">Message:</label>
            <textarea id="message" name="message" rows="5" required 
            style="padding: 10px; 
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 4px;"></textarea>

            <button type="submit" id = "sbtn" 
            style="padding: 10px; 
            background-color: #5cb85c; 
            color: white; border: none; 
            border-radius: 4px; 
            cursor: pointer;">Send Message</button>
        </form>
    </div>



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


</html>
</body>