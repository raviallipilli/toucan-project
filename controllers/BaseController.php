<?php
/**
 * BaseController class to handle common operations for all controllers.
 */
abstract class BaseController {
    protected $conn;

    /**
     * Constructor to initialize the database connection.
     *
     * @param PDO $dbConnection The PDO database connection object.
     */
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }
}
?>
