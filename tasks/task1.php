<?php 

// wrap the result inside the body tag with header
include __DIR__ . '/../views/header.html';

echo "<div style=text-align:left;background-color:black;color:white;margin:30px;padding:20px;><p>
-- Select email addresses from the 'emails' table <br>
-- The requirement is to filter the groups with more than one email address <br>
 -- And where the email is marked as 'Default' <br><br> 
SELECT e.emailaddress, e.UserRefID, e.Default, p.Deceased 
FROM emails e 
JOIN profiles p ON e.UserRefID = p.UserRefID 
WHERE p.Deceased = 0;
                                             
</p></div>";

// close the footer
include __DIR__ . '/../views/footer.html';
?>

