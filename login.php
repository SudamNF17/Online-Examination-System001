<?php
require('php/config.php'); 
include('php/functions.php');

session_start();

if(isset($_POST['submit'])){

    //getting login form values
    $email = $_POST["email"];
    $pass = ($_POST["password"]);

    //checking user type

    if ($email == "itsd@gmail.com"){
        $_SESSION['user_email'] = "itsd@gmail.com" ;
        $_SESSION['user_ID'] = "0";
        $_SESSION['user_name'] = "itsd";
        $_SESSION['account'] = "itsd";
        header("location: itsdprofile.php");
        die;
    }

    if ($email == "admin@gmail.com"){
        $_SESSION['user_email'] = "admin@gmail.com" ;
        $_SESSION['user_ID'] = "0";
        $_SESSION['user_name'] = "Admin";
        $_SESSION['account'] = "admin";
        header("location: adminprofile.php");
        die;
    }else{

    //reading user data using email and password
    $select = "SELECT * FROM registerUser WHERE mail = '$email' AND password = '$pass'";

    $result = $con->query($select); // Executes the SQL query using the database connection

    if($result->num_rows > 0){

        $row = $result->fetch_assoc(); //Fetches the user's data from the database as an associative array

        //checking user type
        if ($row['User_type'] == 'employee') { 

            $_SESSION['user_email'] = $row['mail'];
            $_SESSION['user_ID'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['account'] = "employee";
            header('location:home.php');
            die;
        
        //checking user type
        }elseif ($row['User_type'] == 'examiner') {

            $_SESSION['user_email'] = $row['mail'];
            $_SESSION['user_ID'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['account'] = "examiner";
            header('location:examinerprofile.php'); 
            die;
        }
    }else{ 
        //calling msgErr function from functions.php file
        msgErr("Login Failed. Please enter the correct email and password."); 
    }
    
    }
};

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
    <link rel="stylesheet" type="text/css" href="styles/login.css">

    <!--Javascript file location-->
    <script src="js/main.js"></script>

    <!--mouse over - the link is not clickable or is restricted.-->
    <style type="text/css">
        .nav-bar ul li a{
            cursor: not-allowed;
        }
    </style>

    <title>Login Form</title>

    </head>

    <body>
        <!--Navigation bar-->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Registration</a></li>
                <li><a href="#">Results</a></li>
                <li><a href="#">Attempt Exam</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <button class="nav-btn" onclick="location.href='register.php'">Register</button> <!--link to login page-->
        </div>
    </nav>

    <!-- login content -->
    <!-- Login content wrapper -->
<div class="banner-login">
    <!-- Centered login container -->
    <div class="login-container">
        <h1>Login</h1>

        <!-- Form for user login, using POST method -->
        <form method="post">

            <!-- Email label and input field -->
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required autocomplete="off">

            <!-- Password label and input field -->
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="off">

            <!-- Submit button to log in -->
            <input type="submit" name="submit" value="Log in">

            <!-- Message for users without an account, with a link to register -->
            <center> 
                <p style="color: red;">
                    Don't have an account?  
                    <a href="register.php" class="create-account">Create Account</a>
                </p> 
            </center>
        </form>
    </div>
</div>








<!--Footer Content-->
<footer class="footer">
     <div class="container">
        <div class="row">
            
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Exam Registration</a></li>
                    <li><a href="#">Exam Results</a></li>
                    <li><a href="#">Attempt Exam</a></li>
                    <li><a href="#">About Us</a></li>
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
    
