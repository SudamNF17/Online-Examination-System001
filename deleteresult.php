<?php

include('php/config.php');

//Delete Results Operation
if(isset($_GET['deleteid'])){
    $resultID = $_GET['deleteid'];

    $delete = "DELETE FROM result WHERE resultID = '$resultID'";
    
    $result = $con->query($delete);

    if($result){
        header('location:adminprofile.php');
    }else{
        die($con->error);
    }
}

?>