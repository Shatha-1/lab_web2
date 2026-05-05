<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pharmacy</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $("#displayPrescriptions").click(function () {

                var patientID = $("input[name='patient']:checked").val();

                if (!patientID) {
                    alert("Please select a patient");
                    return;
                }

                $.ajax({
                    url: "RetrievePrescriptions.php",
                    type: "POST",
                    data: { patientID: patientID },
                    
                    success: function (data) {
                        data = JSON.parse(data);

                        var output = "<h1>Patients Prescriptions</h1>";
                        output += "<table border='1'>";
                        output += "<tr><th>Medication</th><th>Dose</th></tr>";

                        for (var i = 0; i < data.length; i++) {
                            output += "<tr>";
                            output += "<td>" + data[i].MedicationName + "</td>";
                            output += "<td>" + data[i].Dose + "</td>";
                            output += "</tr>";
                        }

                        output += "</table>";

                        $("#prescriptions").html(output);
                    }
                });

            });

        });
    </script>
</head>

<body>

<a href="ListMedications.php">Click Here For All Available Medications</a>

<h1>Patients Names:</h1>

<?php
$conn = mysqli_connect("localhost", "root", "root", "Pharmacy");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Patients";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $fullName = $row["FirstName"] . " " . $row["LastName"];

    echo "<input type='radio' name='patient' value='" . $row["PatientID"] . "'>";
    echo $fullName . "<br>";
}
?>

<br>
<button type="button" id="displayPrescriptions">Display Prescriptions</button>

<div id="prescriptions"></div>

</body>
</html>