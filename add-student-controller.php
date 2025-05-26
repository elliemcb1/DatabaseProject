<?php
 // database config file to connect database
include 'databases/Config.php';


 // Prepered SQL statment to insert into the databased
    $insert_student = $conn->prepare(
        "INSERT INTO `student` (`student_id`, `student_name`, `dob`, `address`, `tel`) VALUES (?, ?, ?, ?, ?)"
    );

//Binding paramaters  
    $insert_student->bind_param("sssss", $student_id, $student_name, $dob, $address, $tel);
// sucessful execute
    $insert_student->execute();
    
header("Location: add-customer.php");

?>
