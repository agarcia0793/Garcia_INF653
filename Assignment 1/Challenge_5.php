<?php
// Function to check if a year is a leap year
function isLeapYear($year) {
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        return true;
    }
    return false;
}

// Input year
$year = 2024;

// Check and display whether it's a leap year
if (isLeapYear($year)) {
    echo "$year is a leap year.";
} else {
    echo "$year is not a leap year.";
}
?>
