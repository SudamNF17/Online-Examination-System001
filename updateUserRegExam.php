<?php
include('php/config.php'); // Include the database configuration file
session_start(); // Start or resume a session

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['user_email'])) {
    header('location: login.php');
    exit;
}

// Check if the exam name is passed via the URL for updating
if (isset($_GET['updateid'])) {
    $exam_name = $_GET['updateid'];

    // Fetch the existing exam data based on the exam name
    $sql = "SELECT * FROM employee_exam WHERE exam_name = '$exam_name' AND empID = '".$_SESSION['user_ID']."'";
    $result = $con->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        // Store the existing exam data to pre-fill the form
        $current_exam_name = $row['exam_name'];
        $current_exam_date = $row['edate'];
    } else {
        echo "Exam not found.";
        exit;
    }

    // Handle form submission to update exam details
    if (isset($_POST['update_exam'])) {
        $new_exam_name = $_POST['exam_name'];
        $new_exam_date = $_POST['exam_date'];

        // Update the exam information in the database
        $update_sql = "UPDATE employee_exam SET exam_name='$new_exam_name', edate='$new_exam_date' WHERE exam_name='$exam_name' AND empID = '".$_SESSION['user_ID']."'";

        if ($con->query($update_sql) === TRUE) {
            echo "Exam updated successfully!";
            header('location: empprofile.php'); // Redirect back to the employee profile page
            exit;
        } else {
            echo "Error updating exam: " . $con->error;
        }
    }
} else {
    echo "No exam selected for updating.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exam</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/updateUserRegExam.css">
</head>
<body>

<!-- Form for updating exam details -->
<div class="form-container">
    <h2>Update Exam Details</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label for="exam_name">Exam Name:</label>
            <input type="text" id="exam_name" name="exam_name" value="<?php echo $current_exam_name; ?>" required>
        </div>

        <div class="form-group">
            <label for="exam_date">Exam Date:</label>
            <input type="date" id="exam_date" name="exam_date" value="<?php echo $current_exam_date; ?>" required>
        </div>

        <div class="form-group">
            <button type="submit" name="update_exam" class="update-btn">Update Exam</button>
        </div>
    </form>

    <a href="empprofile.php">Back to Profile</a>
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

    

</body>
</html>
