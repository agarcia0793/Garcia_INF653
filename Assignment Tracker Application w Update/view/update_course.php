<?php
require_once('model/course_db.php');
$course_id = $_GET['id'];
$course = get_course($course_id);
?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="update_course">
    <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
    <label>Course Name:</label>
    <input type="text" name="course_name" value="<?php echo htmlspecialchars($course['courseName']); ?>">
    <button type="submit">Update Course</button>
</form>