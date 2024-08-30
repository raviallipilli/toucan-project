<?php
// Include the database configuration file for database connection
include __DIR__ . '/../config/db.php';

// // Include the necessary model and controller files
require_once __DIR__ . '/../models/ProfileModel.php';
require_once __DIR__ . '/../controllers/ProfileController.php';

// Check if the request method is POST and if the 'name' parameter is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    // Create an instance of ProfileController with the database connection
    $controller = new ProfileController($conn);

    // Call the search method from the ProfileController to process the search request
    $controller->searchProfiles();
}

// Include the view file to display the search form and results
include __DIR__ . '/../views/search-profiles.html';
?>
