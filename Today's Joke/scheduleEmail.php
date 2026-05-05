<?php

$email = $_POST['email'];
$jokes = $_POST['jokes'];

$conn = mysqli_connect("localhost", "root", "root", "JokesDatabase");

if (!$conn) {
    echo "Connection failed";
    exit();
}

foreach ($jokes as $joke) {

    $setup = mysqli_real_escape_string($conn, $joke['setup']);
    $punchline = mysqli_real_escape_string($conn, $joke['punchline']);
    $emailAddress = mysqli_real_escape_string($conn, $email);

    $sql = "INSERT INTO EmailRequestQueue (emailAddress, jokeSetup, jokePunchline)
            VALUES ('$emailAddress', '$setup', '$punchline')";

    mysqli_query($conn, $sql);
}

echo "done";

?>