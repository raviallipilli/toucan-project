<?php
/**
 * ProfileModel class to handle operations related to the 'profiles' and 'emails' tables.
 */
class ProfileModel {
    private $conn;

    /**
     * Constructor to initialize the database connection.
     *
     * @param PDO $dbConnection The PDO database connection object.
     */
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    /**
     * Search profiles based on the provided name.
     *
     * This method searches for profiles where the first name or surname matches
     * the given name and returns only those profiles where the email is marked as default
     * and the profile is not marked as deceased.
     *
     * @param string $name The name to search for in first name and surname.
     * @return array An array of associative arrays containing profile details.
     */
    public function searchProfiles($name) {
        // SQL query to select profiles matching the search criteria
        $sql = "SELECT p.Firstname, p.Surname, e.emailaddress
                FROM profiles p
                JOIN emails e ON p.UserRefID = e.UserRefID
                WHERE (p.Firstname LIKE :name OR p.Surname LIKE :name)
                AND p.Deceased = 0 AND e.Default = 1";

        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);

        // Check if statement preparation was successful
        if ($stmt === false) {
            throw new Exception('Failed to prepare SQL statement: ' . $this->conn->errorInfo()[2]);
        }

        // Bind parameters to the SQL statement
        $likeName = "%$name%";
        $stmt->bindParam(':name', $likeName, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Fetch all results as an associative array
        $profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the array of profiles
        return $profiles;
    }
}
?>
