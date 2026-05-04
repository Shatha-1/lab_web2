<?php
// constant
define("NAME", "Shatha");

// random number
$numberOfToday = rand(1,10);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Today's Number</title>
</head>
<body>

<p>Hello <?php echo NAME; ?>!</p>

<p>Your number today is <?php echo $numberOfToday; ?></p>

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
