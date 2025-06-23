<!DOCTYPE html>
<html lang="en"> <!-- the language of the document (English) -->

<head>
    <meta charset="UTF-8"> <!-- character encoding for the document-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- page uses rendering mode in Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- adapts to mobile and desktop views -->

    <!-- CSS file links -->
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/infoexam.css">

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
    } elseif ($_SESSION['account'] == "itsd") {  // Corrected line
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

    <!-- Banner -->
    <div class="banner-index">
        <div class="content">
            <h1>Welcome to Exam Hub</h1>
            <p>Employees Examination System</p>
        </div>
    </div>

    <!-- Welcome Section Content -->
    <section class="section">
      <p>
      <center><h1 class="heading">Welcome to Exam Hub!</h1></center> <br><br> 
        Enhance your skills and seize new opportunities with our intuitive Exam Hub platform. 
         Designed specifically for employees, our system provides a diverse array of exams to help you excel
        in your professional journey. 
        <br><br> With seamless access and an easy-to-navigate interface,
        you can take exams at your convenience, anytime and anywhere.
         Whether you're using a computer, tablet, or smartphone, our platform is ready for you.
        <br><br> Your privacy and exam integrity are our top priorities.
        We implement robust security measures to protect your personal information and results, 
        along with anti-cheating protocols to ensure a fair testing environment. 
        <br><br> Receive immediate results and comprehensive feedback to identify 
        your strengths and areas for growth. Leverage this information to tailor your
        learning path and advance your career. <br><br> Join Exam Hub today and embark
        on your journey toward skill enhancement and professional success. Explore our
        wide range of exams and empower yourself with the knowledge you need to thrive!
        <br><br>
        Feel free to adjust any parts to better fit your vision!
        </p>
    </section>

    <!-- Exam Information Content -->
    <div class="available-exams">

    <h1 class="heading">Exam Informations</h1>

    <div class="box-container">

    <div class="box">
        
        <h3>Bussiness Analyst</h3>
        <p>A business analyst plays a crucial role in identifying and analyzing business needs, facilitating effective communication between stakeholders, and developing solutions to enhance organizational processes.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Business_analyst">More Information</a>
    </div>

    <div class="box">
        
        <h3>Software Developer</h3>
        <p>Software developers are responsible for designing, coding, and maintaining applications or software solutions to meet user requirements, often working closely with designers and analysts</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Software_developer">More Information</a>
    </div>

    <div class="box">
        
        <h3>Project Management</h3>
        <p>Project management encompasses planning, organizing, and coordinating resources to successfully complete a project within defined scope, timeline, and budget, while managing risks and ensuring stakeholder satisfaction.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Project_management">More Information</a>
    </div>

    <div class="box">
        
        <h3>IELTS</h3>
        <p>IELTS (International English Language Testing System) is a globally recognized English proficiency test that assesses the language skills of individuals who aim to study, work, or migrate to English-speaking countries.</p>
        <br><a class="btn" href="https://www.ielts.org/about-ielts/what-is-ielts">More Information</a>
    </div>

    <div class="box">
        
        <h3>Accounting</h3>
        <p>Accounting involves recording, analyzing, and interpreting financial information to support decision-making and provide insights into the financial health and performance of an organization.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Accounting">More Information</a>
    </div>

    <div class="box">
        
        <h3>HR Management</h3>
        <p>HR management focuses on effectively managing human resources within an organization, including tasks such as recruitment, performance management, employee relations, and fostering a positive work culture.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Human_resource_management">More Information</a>
    </div>

    <div class="box">
        
        <h3>Finance Management</h3>
        <p>Finance management involves making informed financial decisions, managing investments, analyzing financial data, and ensuring the efficient utilization of funds to achieve the organization's financial goals and maximize shareholder value.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Financial_management">More Information</a>
    </div>

    <div class="box">
        
        <h3>Marketing Management</h3>
        <p>Marketing management encompasses strategies and tactics to identify and reach target markets, promote products or services, build brand awareness, analyze consumer behavior, and drive customer engagement and satisfaction.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Marketing_management">More Information</a>
    </div>

    <div class="box">
        
        <h3>Leadership Skills</h3>
        <p>Leadership skills involve the ability to inspire, motivate, and guide individuals or teams towards achieving common goals, fostering innovation, making informed decisions, and effectively managing change and conflicts amoung employees.</p>
        <br><a class="btn" href="https://en.wikipedia.org/wiki/Leadership">More Information</a>
    </div>

</div>


</div>   

<!-- Location Content - from google maps -->
<section class="location">
    <div class="section-title">
        <h1 class="h1">Location</h1>
        <h4 class="h4map">Exam HUB main Building</h4>
    </div>
    <div class="map"> <!--google maps link-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.193344432502!2d79.95449056714044!3d6.914698446804928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1685550835799!5m2!1sen!2slk" width="100%" height="450" style="border:0; border-radius:25px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

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