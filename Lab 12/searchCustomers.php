<?php

if (!isset($_POST['locationID'])) {
    exit();
}

$locationID = $_POST['locationID'];


$conn = mysqli_connect("localhost", "root", "root", "onlineksastore");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM customer WHERE locationID = $locationID";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header("Content-Type: text/plain");
echo json_encode($data);

?>