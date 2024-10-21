</html>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Access MySQL</title>

  <style>
table {
  border-collapse: collapse;
  font-family: Arial, sans-serif;
  font-size: 14px;
  width: 100%;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #f2f2f2;
}

tr:nth-child(even) {
  background-color: #f1f1f1;
}

td:hover {
  background-color: #ddd;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  color: #333;
  margin-top: 20px;
  margin-bottom: 20px;
}


</style>
</head>
<body>
<div> 
  <h1>Access MySQL Database with MySQLi</h1>
  <hr>
</div>
	

<?php

include "dbconnect.php"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$country_id = $_GET['country_id'];
$part_name = $_GET['part_name'];

$sql = "SELECT iso_id, name, count(event.cyclist_id) 
FROM `cyclist`, `event` 
where name like '%$part_name%' and iso_id = '$country_id' and event.cyclist_id = cyclist.cyclist_id 
group by event.cyclist_id";

$results = mysqli_query($conn, $sql);

if (mysqli_num_rows($results) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>name</th><th>events</th></tr>";
    while ($row = mysqli_fetch_array($results)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["count(event.cyclist_id)"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

/*echo "<br>";
echo "<br>";
echo "<br>";
$sql1 = "SELECT iso_id, count(name) FROM `cyclist` where iso_id = 'PRK' and name like '%wo%'";
$results1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($results1) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>name</th></tr>";
    while ($row1 = mysqli_fetch_array($results1)){
        echo "<tr>";
        echo "<td>" . $row1["iso_id"] . "</td>";
        echo "<td>" . $row1["count(name)"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}*/
?>
</body>
</html>



