<?php
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.n.exchange/en/api/v1/currency/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "GET"
]);

curl_setopt($curl, CURLOPT_CAINFO, "C:/MAMP/bin/cacert.pem");
curl_setopt($curl, CURLOPT_CAPATH, "C:/MAMP/bin/cacert.pem");

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response);
}
?>

<!DOCTYPE html>
<html>
<body>

<h1>Registration Form</h1>

<select>
<?php
foreach ($data as $item) {
    echo "<option value='" . $item->code . "'>" . $item->name . "</option>";
}
?>
</select>

</body>
</html>
