<?php


include 'databases/Config.php';

        


    $stmt = $conn->prepare("INSERT INTO enrolment (fk_student, fk_course, enrolment_date, active) VALUES (?, ?, ?, ?)"
    );


        $stmt->bind_param("iisi", $fk_student, $fk_course, $enrolment_date, $active);

        $stmt->execute();

        header("Location: enrol-student.php");
          
?>
