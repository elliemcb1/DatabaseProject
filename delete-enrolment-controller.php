<?php

//  config file 
include 'databases/Config.php'; 
$deleteId = $_GET['eid'];

    // Prepared  SQL SQL statement 
    $deleteEnrollment = $conn->prepare("DELETE 
    FROM enrolment 
    WHERE enrolment_id = ?");
 $deleteEnrollment->bind_param("i", $deleteId);
    $deleteEnrollment->execute();
    $deleteEnrollment->close();
    
    
 header("Location: delete-enrolment.php");
?>
