<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width"/>

<title>Form Processing</title> 

<style>
h1 {
  font-size: 30px;
  font-weight: bold;
  text-align: center;
  color: #555;
  margin-top: 20px;
  margin-bottom: 20px;
}
</style>
</head>

<body>


<?php
$date_1 = $_REQUEST['date_1'];
list($month, $day, $year) = explode("/", $date_1);
$date_1 = sprintf("%d-%02d-%02d", $year, $day, $month);

echo "<br></br>";

$date_2 = $_REQUEST['date_2'];
list($month, $day, $year) = explode("/", $date_2);
$date_2 = sprintf("%d-%02d-%02d", $year, $day, $month); 


echo "<h1> Cyclists between ". $date_1 ." and ". $date_2 ."</h1>";

include "dbconnect.php"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT name, dob, country_name 
from `cyclist`, `country` 
where dob <= '$date_2' and dob >= '$date_1' and cyclist.iso_id = country.iso_id
order by dob desc;";

$result = mysqli_query($conn, $sql);

$allDataArray = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$allDataArray[] = $row;
}
echo json_encode($allDataArray);

?>

</body>