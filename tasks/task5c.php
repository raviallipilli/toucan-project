<?php 

// wrap the result inside the body tag with header
include '../views/header.php';

echo "<div style=text-align:left;background-color:black;color:white;margin:30px;padding:20px;><p>
-- Select the names of schools that have no members associated with them <br>
-- Filter to only include schools that do not have any associated members <br><br>
SELECT s.school_name 
FROM schools s 
LEFT JOIN members m ON s.school_id = m.school_id 
WHERE m.school_id IS NULL; 

</p></div>";

// close the footer
include '../views/footer.php';
?>


