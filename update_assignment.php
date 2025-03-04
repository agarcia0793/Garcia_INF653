<?php
require_once('model/assignment_db.php');
require_once('model/course_db.php');
$courses = get_courses(); // Fetch all courses
$assignment_id = $_GET['id'];
$assignment = get_assignment($assignment_id);
?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="update_assignment">
    <input type="hidden" name="assignment_id" value="<?php echo $assignment['id']; ?>">
    <label>Description:</label>
    <input type="text" name="description" value="<?php echo htmlspecialchars($assignment['description']); ?>">
    <label>Course:</label>
    <select name="course_id">
        <?php foreach ($courses as $course) : ?>
            <option value="<?php echo $course['id']; ?>" <?php if ($course['id'] == $assignment['courseID']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($course['courseName']); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Update Assignment</button>
</form>