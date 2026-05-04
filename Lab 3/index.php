<?php
// (1) constant
define("NAME", "Shatha");

// (2) variable (random number)
$numberOfToday = rand(1,10);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Today's Number</title>
</head>
<body>

<!-- (3) paragraph 1 -->
<p>
<?php
echo "Hello " . NAME . "!";
?>
</p>

<!-- (4) paragraph 2 -->
<p>
<?php
echo "Your number today is " . $numberOfToday;
?>
</p>

<!-- (5) paragraph 3 (condition) -->
<p>
<?php
if ($numberOfToday >= 1 && $numberOfToday <= 5) {
    echo "Good luck today!";
} else {
    echo "Have a nice day!";
}
?>
</p>

</body>
</html>
