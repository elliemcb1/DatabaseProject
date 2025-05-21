<?php
include 'databases/Config.php';
include 'includes/header.php';
?>

<div class="bg-gray-100 px-4 py-2.5 gap-4">
  <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
    <p class="text-[15px] text-slate-900 font-medium leading-relaxed">UPDATE STUDENT</p>
  </div>
</div>

<?php
// Get student ID from the URL if available
$student_id = isset($_GET['sid']) ? $_GET['sid'] : null;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $student_name = $_POST['student_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $student_id = $_POST['student_id']; // Use from form

    // Prepare the update statement
    $updateStudent = $conn->prepare("UPDATE student SET student_name = ?, dob = ?, address = ?, tel = ? WHERE student_id = ?");
    if ($updateStudent) {
        $updateStudent->bind_param("ssssi", $student_name, $dob, $address, $tel, $student_id);
        if ($updateStudent->execute()) {
            echo "<p style='color:green;'>Student updated successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error executing update: " . $updateStudent->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Error preparing statement: " . $conn->error . "</p>";
    }
}
?>

<!-- Update Form -->
<form method="POST" action="">
  <input type="text" name="student_id" placeholder="Student ID" value="<?php echo htmlspecialchars($student_id); ?>" required><br>
  <input type="text" name="student_name" placeholder="Student Name" required><br>
  <input type="date" name="dob" required><br>
  <input type="text" name="address" placeholder="Address" required><br>
  <input type="text" name="tel" placeholder="Telephone" required><br>
  <button type="submit">Submit</button>
</form>

<?php
include 'includes/footer.php';
?>
