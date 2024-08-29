<?php
/**
 * Member Management Script
 * 
 * This script handles the logic for adding new members and displaying members by school.
 * It interacts with the database through models and controllers and renders the appropriate views.
 */

// Include necessary configurations, models, and controllers
require_once '../config/db.php'; 
require_once '../models/MemberModel.php'; 
require_once '../models/SchoolModel.php'; 
require_once '../controllers/MemberController.php'; 

// Initialize the MemberController with the database connection
$controller = new MemberController($conn);

// Retrieve the list of schools for the dropdown in the form
$schools = $controller->getSchools();

// Initialize variables for handling form input and selected school
$selectedSchool = null;
$members = [];
$message = ''; // Variable to hold the message for the user

// Handle form submission for adding a new member
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate form inputs
    $name = htmlspecialchars(trim($_POST['name'])); // Sanitize name input
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); // Sanitize email input
    $school = intval($_POST['school']); // Convert school ID to an integer

    // Validate email format before proceeding
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Try to add the new member via the controller
        $result = $controller->addMember($name, $email, $school);

        if ($result === 'exists') {
            $message = "User with this email already exists."; // Email already exists
        } elseif ($result === true) {
            $message = "Member successfully added."; // Successfully added
        } else {
            $message = "Failed to add member. Please try again."; // Error during addition
        }
    } else {
        // Handle invalid email scenario
        $message = "Invalid email format.";
    }

    // Redirect to avoid form resubmission on page refresh
    header('Location: ' . $_SERVER['PHP_SELF'] . '?msg=' . urlencode($message));
    exit; // Ensure script stops executing after the redirect
}

// Handle school selection to display members
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['school'])) {
    $selectedSchool = intval($_GET['school']); // Convert school ID to an integer
    $members = $controller->getMembersBySchool($selectedSchool); // Fetch members for the selected school
}

// Include the view to render the HTML page
include '../views/members-view.php';
?>
