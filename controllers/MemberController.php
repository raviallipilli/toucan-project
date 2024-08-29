<?php

// Extend the basecontroller features
require_once 'BaseController.php';

/**
 * MemberController class to manage member-related operations.
 */
class MemberController extends BaseController {
    private $memberModel;
    private $schoolModel;

    /**
     * Constructor to initialize the MemberModel and SchoolModel with the database connection.
     *
     * @param PDO $dbConnection The PDO database connection object.
     */
    public function __construct($dbConnection) {
        parent::__construct($dbConnection); // Call parent constructor
        $this->memberModel = new MemberModel($dbConnection);
        $this->schoolModel = new SchoolModel($dbConnection);
    }

    /**
     * Adds a new member to the database.
     *
     * @param string $name The name of the member.
     * @param string $email The email address of the member.
     * @param int $schoolId The ID of the school the member belongs to.
     * @return bool True if the member was added successfully, false otherwise.
     */
    public function addMember($name, $email, $schoolId) {
        return $this->memberModel->addMember($name, $email, $schoolId);
    }

    /**
     * Retrieves members for a specific school.
     *
     * @param int $schoolId The ID of the school to retrieve members for.
     * @return array An array of members for the specified school.
     */
    public function getMembersBySchool($schoolId) {
        return $this->memberModel->getMembersBySchool($schoolId);
    }

    /**
     * Retrieves all schools from the database.
     *
     * @return array An array of all schools.
     */
    public function getSchools() {
        return $this->schoolModel->getAllSchools();
    }

    /**
     * Retrieves member counts by school.
     *
     * @param string|null $country Optional filter by country.
     * @return array An array of member counts grouped by school.
     */
    public function getSchoolMemberCounts($country = null) {
        return $this->memberModel->getSchoolMemberCounts($country);
    }
}
?>
