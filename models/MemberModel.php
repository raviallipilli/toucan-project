<?php
/**
 * MemberModel class to handle operations related to the 'members' and 'schools' tables.
 */
class MemberModel {
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
     * Add a new member to the 'members' table.
     *
     * This method inserts a new member with the provided name, email, and school ID
     * only if the email does not already exist in the database.
     *
     * @param string $memberName The name of the member.
     * @param string $memberEmail The email address of the member.
     * @param int $schoolId The ID of the school the member belongs to.
     * @return mixed 'exists' if the email already exists, true if the insertion was successful, false otherwise.
     */
    public function addMember($memberName, $memberEmail, $schoolId) {
        try {
            // First, check if the email already exists
            $checkSql = "SELECT COUNT(*) FROM members WHERE email = :email";
            $checkStmt = $this->conn->prepare($checkSql);
            $checkStmt->bindParam(':email', $memberEmail);
            $checkStmt->execute();
            
            $emailExists = $checkStmt->fetchColumn() > 0;

            if ($emailExists) {
                // If the email already exists, return 'exists'
                return 'exists';
            }

            // SQL query to insert a new member
            $sql = "INSERT INTO members (name, email, school_id) VALUES (:name, :email, :school_id)";
            
            // Prepare the SQL statement
            $stmt = $this->conn->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bindParam(':name', $memberName);
            $stmt->bindParam(':email', $memberEmail);
            $stmt->bindParam(':school_id', $schoolId);

            // Execute the statement and return the result
            return $stmt->execute() ? true : false;
        } catch (PDOException $e) {
            // Handle any SQL exceptions (such as constraint violations)
            error_log("PDOException: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get members by school ID.
     *
     * This method retrieves all members belonging to the specified school, including the school name.
     *
     * @param int $schoolId The ID of the school.
     * @return array An array of associative arrays containing member details.
     */
    public function getMembersBySchool($schoolId) {
        // SQL query to select members and their school name by school ID
        $sql = "SELECT members.name, members.email, schools.school_name 
                FROM members 
                JOIN schools ON members.school_id = schools.school_id 
                WHERE members.school_id = :school_id";

        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters to the SQL statement
        $stmt->bindParam(':school_id', $schoolId, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch all results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the count of members for each school.
     *
     * This method retrieves the count of members for each school, optionally filtering by country.
     *
     * @param string|null $country Optional country filter to narrow down the results.
     * @return array An array of associative arrays containing school details and member counts.
     */
    public function getSchoolMemberCounts($country = null) {
        // Base SQL query to select school details and member count
        $sql = "SELECT s.school_id, s.school_name, s.country, COUNT(m.id) AS member_count
                FROM schools s
                LEFT JOIN members m ON s.school_id = m.school_id";
    
        // Add a WHERE clause to filter by country if specified
        if ($country) {
            $sql .= " WHERE s.country = :country";
        }
    
        // Add GROUP BY and ORDER BY clauses to the SQL query
        $sql .= " GROUP BY s.school_id, s.school_name, s.country ORDER BY s.school_name";

        // Prepare the SQL statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters if a country filter is specified
        if ($country) {
            $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        }

        // Execute the statement
        $stmt->execute();

        // Fetch all results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
