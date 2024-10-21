</html>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  <hr>
</div>
	

<?php

include "dbconnect.php"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

include "compareresult.php";
echo $country_1;
echo $c1;

/*
$sql6 = "SELECT country.iso_id, total, gold, silver, bronze, (SELECT COUNT(*) FROM cyclist WHERE cyclist.iso_id = country.iso_id) AS cyclist_count, (SELECT AVG(height) FROM cyclist WHERE cyclist.iso_id = country.iso_id) AS avg_height
FROM country
WHERE country.iso_id IN ('$country_1', '$country_2')
order by total desc";
$results6 = mysqli_query($conn, $sql6);


if (mysqli_num_rows($results6) > 0){
    echo "<h1>NUMBER OF BRONZES</h1>";
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total</th><th>gold</th><th>silver</th><th>bronze</th><th>number of cyclist</th><th>average height</th></tr>";
    while ($row = mysqli_fetch_array($results6)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["gold"] . "</td>";
        echo "<td>" . $row["silver"] . "</td>";
        echo "<td>" . $row["bronze"] . "</td>";
        echo "<td>" . $row["cyclist_count"] . "</td>";
        echo "<td>" . $row["avg_height"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
*/
?>
</body>
</html>



