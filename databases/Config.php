<!-- copy the contents of your previous dbCongig file -->

<?php

$hn = "localhost";
$un = "root";
$pw = "";
$db = "students";

// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>