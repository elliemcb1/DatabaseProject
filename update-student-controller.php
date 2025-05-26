<?php
//database config file 
include 'databases/Config.php';

$student_id = $_POST['student_id'];
// update SQL statment
$updateStudent = $conn->prepare(
    "UPDATE student 
    SET student_name = ?, dob = ?, address = ?, tel = ?
     WHERE student_id = ?"
);


$updateStudent->bind_param("ssssi", $_POST['student_name'], $_POST['dob'], $_POST['address'], $_POST['tel'], $_POST['student_id']);


$updateStudent->execute();


header("Location: update-student.php");
exit;
?>
