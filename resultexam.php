<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en"> <!-- the language of the document (English) -->

<head>
    <meta charset="UTF-8"> <!-- character encoding for the document-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- page uses rendering mode in Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- adapts to mobile and desktop views -->

    <!-- CSS file links -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/resultexam.css">

    <!-- JavaScript file location -->
    <script src="js/main.js"></script>

    <title>Home Page</title>
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

            
            // Log out link
            $logOut = "<a href='logout.php' class='logout'>Log Out</a>";

            // Check if session variable 'account' is set
            if (isset($_SESSION['account'])) {

             // Employee role check
            if ($_SESSION['account'] == "employee") {
            // Display user email and logout for employee
            echo ('<p><a href="empprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
            echo ($logOut);

            // Admin role check
            } elseif ($_SESSION['account'] == "admin") {
            // Display user email and logout for admin
            echo ('<p><a href="adminprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>');
            echo ($logOut);

            // Superadmin role check
            } elseif ($_SESSION['account'] == "examiner") {
            // Display admin profile and logout for superadmin
            echo ('<p><a href="examinerprofile.php" class="user-display" style="text-transform: uppercase;">Admin Profile</a></p>');
            echo ($logOut);
            }
            } else {
            // If session account is not set, redirect to login page or show appropriate message
            echo '<p>You are not logged in. <a href="login.php">Login</a></p>';
        }
    ?>
        </div>
    </nav>

   <!--Exam Result Content-->
   <div class="result-container">
        <h2>Exam Result</h2>
        <form method="get">
            <label for="user-id">Employee ID:</label>
            <input type="text" id="user-id" name="user-id" placeholder="Enter Employee ID" value="<?php echo $_SESSION['user_ID']?>" required>

            <label for="exam">Select Exam:</label>
            
            <?php
                //getting exam names from the database
                $query = "SELECT exam_name FROM exam";
                $result = $con->query($query);
                    
                if ($result->num_rows > 0) {
            ?>
                <select id="exam" name="exam" required>
                    <option value="" disabled selected>Select an exam</option>
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            $examName = $row['exam_name'];
                            echo "<option>$examName</option>";
                        }
                    ?>
                </select>
            <?php
                } else {
                    echo "No exams found.";
                }
            ?>

            <input type="submit" name="submit" value="Show Result">
                
        </form>

    <div id="result-info">
        <h3>Results</h3><br>
        <?php
            //Reading Employee Results
            if (isset($_GET['submit'])){

                $empID = $_GET['user-id'];
                $exam = $_GET['exam'];

                $sql = "SELECT * FROM result WHERE empID = '$empID' AND exam_name = '$exam'";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {

                    $row = $result->fetch_assoc();

                    $emp_name = $row['employee_name'];
                    $exam_name = $row['exam_name'];
                    $marks = $row['marks'];
                    
                    //Display employee results
                    echo '<p>Employee ID   : '.$empID.'</p><br>
                          <p>Employee Name : '.$emp_name.'</p><br>
                          <p>Exam Name     : '.$exam_name.'</p><br>
                          <p>Marks         : '.$marks.'</p><br>
                          <p>Grade         : <script>
                                                var marks ='.$marks.';
                                                var grade = checkGrade(marks);
                                                document.write(grade);
                                             </script></p><br>'; //calling "checkGrade" js function

                }else{
                    echo '<script>alert("No results found for the selected exam.")</script>';
                }

            }    

        ?>
    </div>

    </div>
<!-- ------------------------------------------------------------------------------------------------ -->

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