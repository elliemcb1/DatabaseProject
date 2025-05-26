<?php
 // database config file to connect database
include 'databases/Config.php';




    $updateStudent = $conn->prepare(
        "UPDATE student SET student_name = ?, dob = ?, address = ?, tel = ? WHERE student_id = ?"
    );


        $updateStudent->execute();
        
     header("Location: update-student.php");
?>
