<?php

$conn = mysqli_connect("localhost", "root", "root", "Pharmacy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* Get manufacturer from JSON using cURL */
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "http://localhost/exim/Medications.json",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
curl_close($curl);

$jsonData = json_decode($response, true);

$manufacturers = [];

foreach ($jsonData as $item) {
    $manufacturers[$item["MedicationID"]] = $item["Manufacturer"];
}

/* Get name and strength from DB */
$sql = "SELECT * FROM Medications";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Medications</title>
</head>
<body>

<h1>Medications Details:</h1>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Strength</th>
        <th>Manufacturer</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row["MedicationID"];

        echo "<tr>";
        echo "<td>" . $row["MedicationName"] . "</td>";
        echo "<td>" . $row["Strength"] . "</td>";
        echo "<td>" . $manufacturers[$id] . "</td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>