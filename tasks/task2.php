<?php
/**
 * This script handles profile searches and displays results.
 * It includes logic to process search requests and uses a controller to fetch and display profiles.
 */

// Include the database configuration file to establish a database connection
require_once __DIR__ . '/../config/db.php';
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
