<?php
 // database config file to connect database
include 'databases/Config.php';


 // Prepered  insertSQL statment 
    $insert_student = $conn->prepare(
        "INSERT 
        INTO `student` (`student_id`, `student_name`, `dob`, `address`, `tel`)
         VALUES (?, ?, ?, ?, ?)"
    );

//Binding paramaters  
    $insert_student->bind_param("sssss", $_POST['student_id'], $_POST['student_name'], $_POST['dob'], $_POST['address'], $_POST['tel']);
// sucessful execute
    $insert_student->execute();
    
header("Location: add-student.php");

?>
