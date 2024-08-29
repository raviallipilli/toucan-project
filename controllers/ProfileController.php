<?php

// Extend the basecontroller features
require_once 'BaseController.php';

/**
 * ProfileController class to manage profile-related operations.
 */
class ProfileController extends BaseController {
    private $model;

    /**
     * Constructor to initialize the ProfileModel with the database connection.
     *
     * @param PDO $dbConnection The PDO database connection object.
     */
    public function __construct($dbConnection) {
        parent::__construct($dbConnection); // Call parent constructor
        $this->model = new ProfileModel($dbConnection);
    }

    /**
     * Handles the search operation for profiles.
     *
     * This method retrieves profiles based on the provided name, generates HTML for the results,
     * and outputs the HTML. It handles both displaying results and showing a message when no results are found.
     */
    public function searchProfiles() {
        // Retrieve the search name from POST data, default to empty string if not set
        $name = isset($_POST['name']) ? $_POST['name'] : '';

        // Perform the profile search using the model
        $profiles = $this->model->searchProfiles($name);

        // Initialize the output variable to store HTML content
        $output = '';

        // Check if any profiles were found
        if (!empty($profiles)) {
            // Start building the HTML table for displaying profiles
            $output .= '<table class="table table-striped">';
            $output .= '<thead><tr><th>Firstname</th><th>Surname</th><th>Email Address</th></tr></thead><tbody>';

            // Loop through each profile and append rows to the table
            foreach ($profiles as $profile) {
                $output .= '<tr>';
                $output .= '<td>' . htmlspecialchars($profile['Firstname'], ENT_QUOTES, 'UTF-8') . '</td>';
                $output .= '<td>' . htmlspecialchars($profile['Surname'], ENT_QUOTES, 'UTF-8') . '</td>';
                $output .= '<td>' . htmlspecialchars($profile['emailaddress'], ENT_QUOTES, 'UTF-8') . '</td>';
                $output .= '</tr>';
            }

            // Close the table HTML
            $output .= '</tbody></table>';
        } else {
            // Display a message if no profiles were found
            $output = '<p>No results found.</p>';
        }

        // Output the generated HTML
        echo $output;

        // Terminate script execution after sending the output
        exit;
    }
}
?>
