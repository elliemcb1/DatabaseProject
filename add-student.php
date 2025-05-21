<?php
include 'databases/Config.php';
include 'includes/header.php';
?>

<div class="bg-gray-100 px-4 py-2.5 gap-4">
  <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
    <p class="text-[15px] text-slate-900 font-medium leading-relaxed">ADD A NEW STUDENT</p>
  </div>
</div>

<!-- HTML FORM -->
<form method="POST" action="">
  <input type="text" name="student_id" placeholder="Student ID" required><br>
  <input type="text" name="student_name" placeholder="Student Name" required><br>
  <input type="date" name="dob" required><br>
  <input type="text" name="address" placeholder="Address" required><br>
  <input type="text" name="tel" placeholder="Telephone" required><br>
  <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from POST
    $student_id = $_POST["student_id"];
    $student_name = $_POST["student_name"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    // Prepare statement
    $insert_student = $conn->prepare(
        "INSERT INTO `student` (`student_id`, `student_name`, `dob`, `address`, `tel`) VALUES (?, ?, ?, ?, ?)"
    );

    if ($insert_student === false) {
        echo "<p>Prepare failed: " . $conn->error . "</p>";
        exit;
    }

    // Bind parameters
    $insert_student->bind_param("sssss", $student_id, $student_name, $dob, $address, $tel);

    // Execute statement
    if ($insert_student->execute()) {
        echo "<p class='text-green-600 text-center'>Student added successfully.</p>";
    } else {
        echo "<p class='text-red-600 text-center'>Error: " . $insert_student->error . "</p>";
    }

    $insert_student->close();
}
?>

<?php include 'includes/footer.php'; ?>
