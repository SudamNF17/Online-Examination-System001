<?php

include('php/config.php');

//Delete Exam Operation
if(isset($_GET['deleteid'])){

    $examID = $_GET['deleteid']; //$examID = 10

    $delete = "DELETE FROM exam WHERE examID ='$examID'";

    $result = $con->query($delete);

    if($result){
        header('location:examinerprofile.php');
    }else{
        die($con->error);
    }
}

?>