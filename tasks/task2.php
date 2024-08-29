<?php
// Include the database configuration file for database connection
include '../config/db.php';

// // Include the necessary model and controller files
require_once '../models/ProfileModel.php';
include '../controllers/ProfileController.php';

// Check if the request method is POST and if the 'name' parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    // Create an instance of ProfileController with the database connection
    $controller = new ProfileController($conn);

    // Call the search method from the ProfileController to process the search request
    $controller->searchProfiles();
}

// Include the view file to display the search form and results
include '../views/search-profiles.php';
?>
