<?php
    include 'databases/Config.php';
    include 'includes/header.php';

    // bring in students stored in the database

    $student = $conn->prepare('SELECT 
    student_id,
    student_name
   FROM student
   ');
   $student->execute();
   $student->store_result();
   $student->bind_result($studentId, $studentName);

//    bring in courses stored in the database
$course = $conn->prepare('SELECT 
course_id,
course_name
FROM course
');
$course->execute();
$course->store_result();
$course->bind_result($courseId, $courseName);

?>
<div class="bg-gray-100 px-4 py-2.5 gap-4">
      <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
        <p class="text-[15px] text-slate-900 font-medium leading-relaxed">ENROL STUDENT ON COURSE</p>
      </div>
    </div>

<!-- 
Update the following form to add a new enrolment record to the database,
you will also create the backend logic to handle the creation of the record.
 -->
<!-- update the form tag to post the values to the controller that will handle the backend logic -->
 <form class="space-y-6 px-4 max-w-sm mx-auto" >
      <div class="flex items-center">
        <!-- Brings in a list of all the students -->
        <label class="text-slate-400 font-medium w-36 text-sm">Student</label>
        <select name="fk_student" id="">
            <?php while($student->fetch()) : ?>
                <option value="<?= $studentId ?>">
                    <?= $studentName ?>
                </option>
            <?php endwhile ?>
        </select>
      </div>

      <div class="flex items-center">
        <!-- Brings in a list of all the courses -->
        <label class="text-slate-400 font-medium w-36 text-sm">Course</label>
        <select name="fk_course" id="">
            <?php while($course->fetch()) : ?>
                <option value="<?= $courseId ?>">
                    <?= $courseName ?>
                </option>
            <?php endwhile ?>
        </select>
      </div>
    <!-- Update this input to get the value of the enrolment date -->
      <div class="flex items-center">
        <label class="text-slate-400 font-medium w-36 text-sm">Enrolment Date</label>
        <input type="date"
          class="px-2 py-2 w-full border-b-2 border-gray-200 focus:border-slate-900 outline-none text-sm bg-white" />
      </div>

      <!-- do not edit this, this sends a hidden value to update the 'active' column in the database -->
      <div class="flex items-center">
        <input type="hidden" value="1" name="active" placeholder="Enter your state"
          class="px-2 py-2 w-full border-b-2 border-gray-200 focus:border-slate-900 outline-none text-sm bg-white" />
      </div>

      <button type="submit"
        class="!mt-10 px-6 py-2 w-full bg-slate-800 hover:bg-slate-900 text-sm font-medium text-white mx-auto block cursor-pointer">Submit</button>
    </form>




<?php
    include 'includes/footer.php';
?>