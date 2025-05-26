<?php
 // database config file to connect database
include 'databases/Config.php';
include 'includes/header.php';

?>

<div class="bg-gray-100 px-4 py-2.5 gap-4">
  <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
    <p class="text-[15px] text-slate-900 font-medium leading-relaxed">UPDATE STUDENT</p>
  </div>
</div>



<form method="POST" action="update-student-controller.php">
  <input type="text" name="student_id" placeholder="Student ID" value=""><br>
  <input type="text" name="student_name" placeholder="Student Name" required><br>
  <input type="date" name="dob" required><br>
  <input type="text" name="address" placeholder="Address" required><br>
  <input type="text" name="tel" placeholder="Telephone" required><br>
  <button type="submit">Submit</button>
</form>

<?php
include 'includes/footer.php';
?>
