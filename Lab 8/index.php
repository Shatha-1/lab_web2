<?php
session_start();

// 🎯 PART A - COOKIES


$bgColor = "#ffffff";


if (isset($_COOKIE['backgroundColor'])) {
    $bgColor = $_COOKIE['backgroundColor'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") { //
    $selectedColor = $_POST['favcolor'];

    // نحفظ في cookie لمدة ساعة
    setcookie("backgroundColor", $selectedColor, time() + 3600);

    $bgColor = $selectedColor;
}

// 🎯 PART B - SESSION COUNTER

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 1;
} else {
    $_SESSION['counter']++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab 8</title>

    <style>
        body {
            background-color: <?php echo $bgColor; ?>;
        }
    </style>

</head>
<body>

<h1>Lab 8 - Cookies and Session Variables</h1>

<h3>Cookies for background color</h3>

<form method="POST">
    Select your favorite color:
    <input type="color" id="favcolor" name="favcolor" value="#ff0000">
    <br><br>
    <input type="submit" value="Submit">
</form>

<hr>

<p>Counter Value: <?php echo $_SESSION['counter']; ?></p>

</body>
</html>