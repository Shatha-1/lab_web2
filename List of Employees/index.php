<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Final Lab Fajer Alamro 444200800</title>
        <script src="jquery.min.js"></script>
    </head>
<?php
$connection = mysqli_connect("localhost", "root","root","allemployees");
$error = mysqli_connect_error();

if ($error != null){
    $output = "There is an error: ".$error;
    exit($output);
}else{
    
$curl = curl_init();

curl_setopt_array($curl, [
CURLOPT_URL => "http://localhost/exim/salary.json",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_CUSTOMREQUEST => "GET"
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
echo "cURL Error :" . $err;
} else {
    
$data = json_decode($response, true);
$Allsalary = []; 

foreach ($data as $employee) {
    $Allsalary[$employee['id']] = $employee['salary'];
}
}    
}
?>
    <body>

    <h1>List of Employees</h1>
        
    <table border="1">
        <tr><td><strong>ID</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>DoB</strong></td>
        <td><strong>Salary</strong></td>
        <td><strong>Delete</strong></td>
         </tr>   
        <?php
        
        $sql = 'SELECT * FROM `employee`';
        $result = mysqli_query($connection, $sql);
        
while($row = mysqli_fetch_assoc($result)){
    echo "<tr id='".$row['ID']."'>"
           . "<td name='IDEmp'>".$row['ID']."</td>" 
           . "<td>".$row['Name']."</td>" 
           . "<td>".$row['DoB']."</td>"
           . "<td>".$Allsalary[$row['ID']]."</td>"
           ." <td><input type='radio' class='deleteBtn' name='deletBTN' value='".$row['ID']."'></td>"
         ."</tr>";
}

        ?>
    
    </table>
   
    <script>
$(document).ready(function(){
    $('.deleteBtn').click(function () {
        var id = $(this).val();
        
        $.ajax({
            url: 'delete.php',
            type: 'GET',
            data: { empID: id },
            success: function (response) {
                if (response.trim() == 'success') {
                    alert('Employee deleted successfully!');
                    $("#"+id).remove();
                } else {
                    alert('Failed to delete employee: ' + response);
                }
            }
        });
    });
});

    </script>
</body>
</html>    
