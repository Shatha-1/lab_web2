<?php
$connection = mysqli_connect("localhost", "root", "root", "allemployees");
$error = mysqli_connect_error();

if ($error != null) {
    $output = "There is an error: ".$error;
    exit($output);
}

    
    $employeeId = $_GET['empID'];
    
    $sql = "DELETE FROM employee WHERE ID = $employeeId";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_affected_rows($connection) > 0) {
        echo 'success';
    } else {
        echo 'fail';
    }
?>