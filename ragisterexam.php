<?php

include('php/config.php');

session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_email'])) {
    header('location: login.php');
}

// Handle form submission
if (isset($_POST['submit'])) {

    // Getting form values and empID from session
    $empid = $_SESSION['user_ID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $select_exam = $_POST['exam'];

    // Reading Exam ID based on exam name
    $select = "SELECT examID FROM exam WHERE exam_name = '$select_exam'";
    $results = $con->query($select);
    $row = $results->fetch_assoc();
    $examID = $row['examID'];

    // Checking for Duplicate Exam Registration
    $sql = "SELECT * FROM employee_exam WHERE examID = '$examID' AND empID = '$empid'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo '<script>alert("You are already registered for this exam!");</script>';
    } else {
        // Check user roles
        if ($_SESSION['account'] == "examiner" || $_SESSION['account'] == "admin" || $_SESSION['account'] == "itsd") {
            echo '<script>alert("Sorry! Only employees can register for exams.");</script>';
        } elseif ($_SESSION['account'] == "employee") {
            // Insert registration record into the database
            $insert = "INSERT INTO employee_exam (empID, examID, exam_name, edate, ename, email) 
                        VALUES ('$empid', '$examID', '$select_exam', '$date', '$name', '$email')";
            if ($con->query($insert)) {
                echo '<script>alert("Successfully Registered for the Exam!"); window.location.href = "empprofile.php";</script>';
            } else {
                die($con->error);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> <!-- Specifies the character encoding to be used -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Optimizes the web page for mobile devices-->
    <title>Exam Registration</title>

    <!-- External CSS files -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css"> <!--header, footer css -->
    <link rel="stylesheet" type="text/css" href="styles/registerexam.css">

    <!-- External JS file -->
    <script src="js/main.js"></script>
</head>

<body>

    <!-- Navigation bar -->
    <nav>
        <div class="nav-bar">
            <img src="images/logo.png" class="logo" alt="Logo">
            <ul>
            <li><a href="home.php">Home</a></li>
                <li><a href="ragisterexam.php">Registration</a></li>
                <li><a href="resultexam.php">Results</a></li>
                <li><a href="attempt.php">Attempt Exam</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>

            <!-- Display user info and log out -->
            <?php
            if (isset($_SESSION['account'])) {
                if ($_SESSION['account'] == "employee") {
                    echo '<p><a href="empprofile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>';
                } elseif ($_SESSION['account'] == "admin") {
                    echo '<p><a href="admin_profile.php" class="user-display">' . $_SESSION['user_email'] . '</a></p>';
                } elseif ($_SESSION['account'] == "examiner") {
                    echo '<p><a href="examinerprofile.php" class="user-display">Admin Profile</a></p>';
                }
                echo '<a href="logout.php" class="logout">Log Out</a>';
            } else {
                echo '<p><a href="login.php">Login</a></p>';
            }
            ?>
        </div>
    </nav>


    <!-- Animation box for exams -->
    <div class="animation-box">
        <div class="exam-list">
            <div class="exam-item">HR Management Exam <br> [2024/10/11 - 10.00am]</div>
            <div class="exam-item">Business Analyist <br> [2024/10/15 - 9.00am]</div>
            <div class="exam-item">Economics <br> [2024/10/22 - 8.00am]</div>
            <div class="exam-item">Financial management <br> [2024/10/12 - 10.00am]</div>
            <div class="exam-item">Sales and marketing knowlwdgw test <br> [2024/10/17 - 11.00am]</div>
            
        </div>
    </div>



    <!-- Exam Registration Form -->
    <div class="registration-container">
        <h2>Exam Registration</h2>
        <form method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" required>

            <label for="exam">Select Exam:</label>
            <select id="exam" name="exam" required>
                <option value="" disabled selected>Select an exam</option>
                <?php
                // Fetching exams from database
                $query = "SELECT exam_name FROM exam";
                $result = $con->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option>' . $row['exam_name'] . '</option>';
                    }
                } else {
                    echo '<option>No exams available</option>';
                }
                ?>
            </select>

            <label for="date">Select Date:</label>
            <input type="date" name="date" required>

            <input type="submit" name="submit" value="Register Exam">
        </form>
    </div>

    <!-- Footer -->
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
        <center><p>Exam Hub - Employee Examination System</p></center>
    </footer>

</body>

</html>
