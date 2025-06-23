<?php

include('php/config.php');

session_start();

if(!isset($_SESSION['user_email'])){
    header('location: login.php');
}

?>

<?php 

    //Create Result Operation
    if (isset($_POST['submit'])){ 

        $exam = $_POST['selectExam'];
        $employee = $_POST['selectEmployee'];
        $marks = $_POST['marks'];

        //getting exam id from the database
        $selectExamID = "SELECT examID FROM exam WHERE exam_name = '$exam'";
        $results = $con->query($selectExamID);
        $row = $results->fetch_assoc();
        $examID = $row['examID'];

        //getting employee id from the database
        $selectEmpID = "SELECT id FROM registeruser WHERE name = '$employee'";
        $results = $con->query($selectEmpID);
        $row = $results->fetch_assoc();
        $empID = $row['id'];

        $select = "SELECT * FROM result WHERE examID ='$examID' AND empID = '$empID'";

        $results = $con->query($select);

        // checking if results already added
        if ($results->num_rows > 0){

            echo '<script>alert("Sorry! Results for this exam and the employee is already added. Please pick another exam.");</script>';
            echo '<script>window.location.href = "add_results.php";</script>';

        }else{
            
            $insert = "INSERT INTO result(examID,exam_name,empID,employee_name,marks)
                   VALUES('$examID','$exam','$empID','$employee','$marks')";

            if($con->query($insert)){
                echo '<script>alert("Successfully Added Results!");</script>';
                echo '<script>window.location.href = "addresults.php";</script>';
            }else{
                die($con->error);
            }
        }
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
    <link rel="stylesheet" type="text/css" href="styles/addresult.css">
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
                <li><a href="ragisterexam.php">Registration</a></li>
                <li><a href="resultexam.php">Results</a></li>
                <li><a href="attempt.php">Attempt Exam</a></li>
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

<!--Add Results Content-->
    <div class="add-result-container">

    <h2>Add Results</h2>

    <form method="post">

        <label for="selectEmployee">Select Employee:</label>
        
        <?php
            //getting employee names from the database
            $sql = "SELECT id, name FROM registeruser WHERE User_type ='employee'";
            $results = $con->query($sql);

            if($results->num_rows > 0){
        ?>
            <select name ="selectEmployee" required>
                <option value = "" disabled selected>Select an employee</option>
                <?php
                    while($row = $results->fetch_assoc()){
                        $employee = $row['id'];
                        $employeeName = $row['name'];
                        echo "<option>$employeeName</option>";
                    }
                ?>
            </select>
            <?php
            } else {
                echo "No employees found.";
            }
            ?>
        
        <label for="selectExam">Select Exam:</label>

            <?php
                //getting exam names from the database
                $query = "SELECT exam_name FROM exam";
                $result = $con->query($query);
                    
                if ($result->num_rows > 0) {
            ?>
                <select name="selectExam" required>
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

        <label for="marks">Enter Marks:</label>
        <input type="text" id="marks" name="marks" placeholder="Enter Exam Marks" required>

        <input type="submit" name="submit" value="Add Results">
        
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

</body>
</html>