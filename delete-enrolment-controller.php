<?php

//  config file 
include 'databases/Config.php'; 

    $deleteId = $_POST['delete_enrolment_id'];

    // Prepared SQL statement to delete the enrolment record
    $deleteEnrollment = $conn->prepare("DELETE FROM enrolment WHERE enrolment_id = ?");
 $deleteEnrollment->bind_param("i", $deleteId);
    $deleteEnrollment->execute();
    $deleteEnrollment->close();
    
 header("Location: delete-enrolment.php");
?>
