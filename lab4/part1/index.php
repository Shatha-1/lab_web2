<?php
require "myFunctions.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Testing Functions</title>
</head>
<body>

<h1>Testing Functions</h1>

<h2>My sentence is:</h2>

<?php
$sentence = "This is the second PHP lab in IT329. ";
echo "<p>" . $sentence . "</p>";
?>

<h2>The result is:</h2>

<?php
echo "<p>" . countWords($sentence) . "</p>";
?>

</body>
</html>