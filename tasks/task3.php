<?php

// wrap the result inside the body tag with header
include '../views/header.php';

/**
 * Generates a sequence of numbers from 1 to 100 with specific rules:
 * - Print "ToucanTech" for numbers divisible by both 3 and 5
 * - Print "Toucan" for numbers divisible by 3 only
 * - Print "Tech" for numbers divisible by 5 only
 * - Print the number itself if none of the above conditions are met
 */
echo "<div style=text-align:center;background-color:black;color:white;margin:30px;padding:20px;><p>
<p style=text-align:left;>Generates a sequence of numbers from 1 to 100 with specific rules: <br>
 - Print 'ToucanTech' for numbers divisible by both 3 and 5 <br>
 - Print 'Toucan' for numbers divisible by 3 only <br>
 - Print 'Tech' for numbers divisible by 5 only <br>
 - Print the number itself if none of the above conditions are met </p><br>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "ToucanTech<br>";
    } elseif ($i % 3 == 0) {
        echo "Toucan<br>";
    } elseif ($i % 5 == 0) {
        echo "Tech<br>";
    } else {
        echo $i . "<br>";
    }
}
echo "</p></div>";

// close the footer
include '../views/footer.php';
?>
