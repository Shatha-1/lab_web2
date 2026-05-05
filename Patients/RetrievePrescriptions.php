<?php



$conn = mysqli_connect("localhost", "root", "root", "Pharmacy");

if (!$conn) {
    exit();
}

if (!isset($_POST["patientID"])) {
    exit();
}

$patientID = $_POST["patientID"];

$sql = "SELECT Medications.MedicationName, Prescriptions.Dose
        FROM Prescriptions
        JOIN Medications
        ON Prescriptions.MedicationID = Medications.MedicationID
        WHERE Prescriptions.PatientID = '$patientID'";

$result = mysqli_query($conn, $sql);

$prescriptions = [];

while ($row = mysqli_fetch_assoc($result)) {
    $prescriptions[] = $row;
}

echo json_encode($prescriptions);

?>