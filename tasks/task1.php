<?php 

// wrap the result inside the body tag with header
include '../views/header.php';

echo "<div style=text-align:left;background-color:black;color:white;margin:30px;padding:20px;><p>
-- Select email addresses from the 'emails' table <br>
-- Filter to include only profiles where 'Deceased' is 0 (i.e., not deceased) <br>
-- Group the results by 'UserRefID' and 'emailaddress' to aggregate data <br>
-- The requirement is to filter the groups with more than one email address <br>
 -- And where the email is marked as 'Default' <br><br>
SELECT e.emailaddress 
FROM emails e 
JOIN profiles p ON e.UserRefID = p.UserRefID 
WHERE p.Deceased = 0 
GROUP BY e.UserRefID, e.emailaddress 
HAVING COUNT(*) > 1 AND MAX(e.`Default`) = 1; 
                                             
</p></div>";

// close the footer
include '../views/footer.php';
?>

