<!DOCTYPE html>
<html>
<head>
    <title>Science Class</title>
</head>
<body>

<h1>Science Class Students</h1>

<?php

$students = array(
    array(
        "name" => "Ahmad",
        "quizzes" => 10,
        "homework" => 9,
        "midterm" => 9.5,
        "project" => 10,
        "projectTitle" => "Planets"
    ),
    array(
        "name" => "Bassam",
        "quizzes" => 9,
        "homework" => 8.5,
        "midterm" => 9,
        "project" => 8,
        "projectTitle" => "Minerals"
    ),
    array(
        "name" => "Majid",
        "quizzes" => 9.5,
        "homework" => 10,
        "midterm" => 10,
        "project" => 9.5,
        "projectTitle" => "Plants"
    )
);

echo "<table border='1' >";

echo "<tr>";
echo "<th>Name</th>";
echo "<th>Quizzes</th>";
echo "<th>Homework</th>";
echo "<th>Midterm</th>";
echo "<th>Project</th>";
echo "<th>Project Title</th>";
echo "<th>Total Semester Work</th>";
echo "</tr>";

foreach ($students as $student) {

    $total = $student["quizzes"] + $student["homework"] + $student["midterm"] + $student["project"];

    echo "<tr>";
    echo "<td>" . $student["name"] . "</td>";
    echo "<td>" . $student["quizzes"] . "</td>";
    echo "<td>" . $student["homework"] . "</td>";
    echo "<td>" . $student["midterm"] . "</td>";
    echo "<td>" . $student["project"] . "</td>";
    echo "<td>" . $student["projectTitle"] . "</td>";
    echo "<td>" . $total . "</td>";
    echo "</tr>";
}

echo "</table>";

?>

</body>
</html>