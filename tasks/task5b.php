<?php
/**
* This script generates reports that display a list of schools and their member counts.
* It includes an option to download the report as a CSV file and extends the functionality with a country filter.
 * It interacts with the database through models and controllers and renders the appropriate views.
 */

// Include necessary files for database connection, models, and controller
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/MemberModel.php';
require_once __DIR__ . '/../models/SchoolModel.php';
require_once __DIR__ . '/../controllers/MemberController.php';

// Initialize the controller with the database connection
$controller = new MemberController($conn);

$selectedSchools = [];
$countryFilter = '';

// Check if a country filter is set
if (isset($_GET['country'])) {
    $countryFilter = $_GET['country'];
}

// Check if the download CSV request is set and if any schools are selected
if (isset($_GET['download-csv']) && !empty($_GET['schools'])) {
    // Sanitize and validate school IDs to prevent SQL Injection and ensure integers
    $selectedSchools = array_map('intval', $_GET['schools']); 

    // Set HTTP headers to prompt the user to download a CSV file
    header('Content-Type: text/csv'); // Set content type to CSV
    header('Content-Disposition: attachment; filename="reports_'.date('d_m_Y_h_i_s_A').'.csv"');

    // Open PHP output stream for writing CSV data
    $output = fopen('php://output', 'w');

    // Output the CSV header row
    fputcsv($output, ['Name', 'Email', 'School']);

    // Iterate over each selected school to fetch members and write to CSV
    foreach ($selectedSchools as $schoolId) {
        // Fetch members for the current school
        $members = $controller->getMembersBySchool($schoolId);

        // Write each member's data as a row in the CSV file
        foreach ($members as $member) {
            fputcsv($output, [$member['name'], $member['email'], $member['school_name']]);
        }
    }

    // Close the output stream to complete the CSV generation
    fclose($output);

    // Exit script to prevent any additional output after CSV
    exit;
}

// If no CSV download is requested, display the school member counts and available schools
$countryFilter = isset($_GET['country']) ? $_GET['country'] : null;
$schoolCounts = $controller->getSchoolMemberCounts($countryFilter);
$schools = $controller->getSchools();

// Include the view file to render the HTML
include __DIR__ . '/../views/reports.html';
?>
