<?php
// Define the student's marks
$marks = 85;  // Change this value to test different inputs

// Determine the grade based on the marks
if ($marks >= 90) {
    $grade = "A";
} elseif ($marks >= 80) {
    $grade = "B";
} elseif ($marks >= 70) {
    $grade = "C";
} elseif ($marks >= 60) {
    $grade = "D";
} else {
    $grade = "F";
}

// Display the result in the expected format
echo "Input: $marks\n";
echo "Output: You got a $grade!\n";
?>
