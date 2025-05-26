<?php
 // database config file to connect database
include 'databases/Config.php';
include 'includes/header.php';



// Fetch students
$student = $conn->prepare('SELECT student_id, student_name FROM student');
$student->execute();
$student->store_result();
$student->bind_result($studentId, $studentName);

// Fetch courses
$course = $conn->prepare('SELECT course_id, course_name FROM course');
$course->execute();
$course->store_result();
$course->bind_result($courseId, $courseName);
?>

<div class="bg-gray-100 px-4 py-2.5 gap-4">
  <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
    <p class="text-[15px] text-slate-900 font-medium leading-relaxed">ENROL STUDENT ON COURSE</p>
  </div>
</div>

<form method="POST" action="enrol-student-controller.php" class="space-y-6 px-4 max-w-sm mx-auto mt-6">
  <div class="flex items-center">
    <label class="text-slate-400 font-medium w-36 text-sm">Student</label>
    <select name="fk_student" required class="w-full px-2 py-2 border-b-2 border-gray-200 focus:border-slate-900 outline-none text-sm bg-white">
      <?php while ($student->fetch()) : ?>
        <option value="<?= $studentId ?>"><?= $studentName ?></option>
      <?php endwhile ?>
    </select>
  </div>

  <div class="flex items-center">
    <label class="text-slate-400 font-medium w-36 text-sm">Course</label>
    <select name="fk_course" required class="w-full px-2 py-2 border-b-2 border-gray-200 focus:border-slate-900 outline-none text-sm bg-white">
      <?php while ($course->fetch()) : ?>
        <option value="<?= $courseId ?>"><?= $courseName ?></option>
      <?php endwhile ?>
    </select>
  </div>

  <div class="flex items-center">
    <label class="text-slate-400 font-medium w-36 text-sm">Enrolment Date</label>
    <input type="date" name="enrolment_date" required class="px-2 py-2 w-full border-b-2 border-gray-200 focus:border-slate-900 outline-none text-sm bg-white" />
  </div>

  <!-- Hidden input for 'active' column -->
  <input type="hidden" name="active" value="1" />

  <button type="submit"
    class="!mt-10 px-6 py-2 w-full bg-slate-800 hover:bg-slate-900 text-sm font-medium text-white mx-auto block cursor-pointer">
    Submit
  </button>
</form>

<?php
include 'includes/footer.php';
?>
