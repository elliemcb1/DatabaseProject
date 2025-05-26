<?php
//database connection
include 'databases/Config.php';

// prepered  Insertsql statment
$Enroll_student = $conn->prepare("INSERT 
INTO enrolment (fk_student, fk_course, enrolment_date, active) 
VALUES (?, ?, ?, ?)");

$Enroll_student->bind_param(
    "iisi", 
    $_POST['fk_student'], 
    $_POST['fk_course'], 
    $_POST['enrolment_date'], 
    $_POST['active']
);


$Enroll_student->execute();


header("Location: enrol-student.php?success=1");
exit;
?>
