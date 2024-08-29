<?php
/**
 * SchoolModel class to handle operations related to the 'schools' table.
 */
class SchoolModel {
    private $conn;

    /**
     * Constructor to initialize the database connection.
     *
     * @param PDO $dbConnection The database connection object.
     */
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    /**
     * Fetch all schools from the 'schools' table.
     *
     * @return array An array of associative arrays containing school details.
     */
    public function getAllSchools() {
        // SQL query to select school ID and name from the 'schools' table
        $sql = "SELECT school_id, school_name FROM schools";

        try {
            // Prepare the SQL statement
            $stmt = $this->conn->prepare($sql);
            
            // Execute the statement
            $stmt->execute();

            // Fetch all results as an associative array
            $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $schools;

        } catch (PDOException $e) {
            // Handle any errors
            die("Error fetching schools: " . $e->getMessage());
        }
    }
}
?>
