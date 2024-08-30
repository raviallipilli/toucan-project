<?php
/**
 * Checks if a user's default email is valid.
 * 
 * This function checks whether a user's default email is valid by performing the following:
 * 1. Checks if a user ID is provided.
 * 2. Retrieves the default email associated with the user.
 * 3. If no default email is found, attempts to set one and retrieve it again.
 * 4. Validates the email if present and checks its status.
 * 
 * Return values:
 * - -1: No user ID provided or no valid email found
 * -  1: Valid email
 * -  2: Invalid email format
 * -  0: Email is not valid
 */
class UserEmailValidator { // class name is missing , hence named the class as appropriate

    // Check if the default email for a user is valid
    public function checkDefaultEmailValid($userId = null) {
        // Return -1 if no user ID is provided
        if (empty($userId)) {
            return -1;
        }

        // Retrieve the default email for the user
        $defaultEmail = $this->getDefaultEmailByUserId($userId);

        // If no default email, set a new default email and retrieve it again
        if (empty($defaultEmail)) {
            $this->setDefaultEmail($userId); // this method name is renamed from set_default_email to setDefaultEmail to follow naming conventions
            $defaultEmail = $this->getDefaultEmailByUserId($userId);
        }

        // Return -1 if no default email is found
        if (empty($defaultEmail)) {
            return -1;
        }

        // Check if the email is validated and within 12 months of validation
        if ($defaultEmail['valid'] >= 1 && 
            ($defaultEmail['validated_on'] > (time() - strtotime('-12 months')))) {
            return 1;
        }

        // Extract the email for further validation
        $email = $defaultEmail['email'];

        // Check if the email is empty or not a valid format
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 2;
        }

        // Check if the email is valid using an external method
        $validationResults = $this->checkIfValid($email);

        // Return 0 if the email is not valid, otherwise return 1
        if (!$validationResults) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
    * Below three methods are never implemented in the above funtion hence provided a sample logic of methods to implement or TODO
    */

    // missing method of functionality assuming with example fields
    private function getDefaultEmailByUserId($userId) {
        // This method should retrieve the default email for the given user ID from the database
        // Example implementation
        return array(
            'email' => 'user@example.com',
            'valid' => 1,
            'validated_on' => time() - 3600 * 24 * 30 // 30 days ago
        );
    }

    // this method needs to be set to update the user email by userid and the logic should go in there
    private function setDefaultEmail($userId) {
        // This method should set a default email for the given user ID
    }

    // this method needs to be defined to check if email is valid
    private function checkIfValid($email) {
        // This method should validate the email address using an external service or logic
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
// wrap the result inside the body tag with header
include __DIR__ . '/../views/header.html';

echo "<h1 style=text-align:center;>Please visit the file tasks/task4.php for code review</h1>";

// close the footer
include __DIR__ . '/../views/footer.html';

?>
