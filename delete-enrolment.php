<?php
 // database config file to connect database
include 'databases/Config.php';
include 'includes/header.php';




$student = $conn->prepare('SELECT 
    s.student_id,
    s.student_name,
    s.dob,
    e.enrolment_id,
    e.enrolment_date,
    c.course_id,
    c.course_name
    FROM enrolment e
    INNER JOIN student s ON e.fk_student = s.student_id
    INNER JOIN course c ON e.fk_course = c.course_id
    ORDER BY e.enrolment_date 
');

$student->execute();
$student->store_result();
$student->bind_result($studentId, $studentName, $dob, $enrolId, $enrolDate, $courseId, $course);
?>

<div class="bg-gray-100 px-4 py-2.5 gap-4">
    <div class="flex items-center justify-center flex-wrap gap-y-2 gap-x-6 pr-7 text-center relative">
        <p class="text-[15px] text-slate-900 font-medium leading-relaxed">DELETE AN ENROLMENT RECORD</p>
    </div>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100 whitespace-nowrap">
            <tr>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">ID</th>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">Name</th>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">DOB</th>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">Enrolled On</th>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">Course Name</th>
                <th class="px-4 py-4 text-left text-xs font-semibold text-slate-900 uppercase tracking-wider" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($student->fetch()): ?>
            <tr>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium"><?= $studentId ?></td>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium"><?= $studentName ?></td>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium"><?= $dob ?></td>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium"><?= $enrolDate ?></td>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium"><?= $course ?></td>
                <td class="px-4 py-4 text-sm text-slate-900 font-medium">
                    <form method="POST" action="delete-enrolment-controller.php" onsubmit="return confirm('Are you sure you want to delete this enrolment?');">
                        <input type="hidden" name="delete_enrolment_id" value="<?= $enrolId ?>">
                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>
