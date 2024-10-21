</html>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  .table-container {
    width: 50%;
    margin: 0 auto;
  }
  table {
      border-collapse: collapse;
      font-family: Arial, sans-serif;
      font-size: 14px;
      width: 100%;
      background-color: #B3FE92;
    }
    
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    
    th {
      background-color: #4CAF50;
      color: white;
    }
    
    tr:nth-child(even) {
      background-color: #B3FE92;
    }
    
    td:hover {
      background-color: #4CAF50;
      color: white;
    }
    
    h1 {
      font-size: 36px;
      font-weight: bold;
      text-align: center;
      color: #333;
      margin-top: 20px;
      margin-bottom: 20px;
    }
    
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 5px;
      width: 500px;
      display: block;
      margin: 0 auto;
    }
    
    .button:hover {
      background-color: #3e8e41;
    }
</style>
</head>
<body>
<?php

include "dbconnect.php"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$country_1 = $_GET['country_1'];
$country_2 = $_GET['country_2'];
$c1= "GBR";

$sql = "SELECT iso_id, total FROM `country` where iso_id = '$country_1' or iso_id = '$country_2'
order by total desc";
$results = mysqli_query($conn, $sql);

echo "<h1>NUMBER OF TOTAL MEDALS</h1>";

if (mysqli_num_rows($results) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total medals</th></tr>";
    while ($row = mysqli_fetch_array($results)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sql1 = "SELECT iso_id, gold FROM `country` where iso_id = '$country_1' or iso_id = '$country_2'
order by gold desc";
$results1 = mysqli_query($conn, $sql1);

echo "<h1>NUMBER OF GOLDS</h1>";

if (mysqli_num_rows($results1) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total golds</th></tr>";
    while ($row = mysqli_fetch_array($results1)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["gold"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sql2 = "SELECT iso_id, silver FROM `country` where iso_id = '$country_1' or iso_id = '$country_2'
order by silver desc";
$results2 = mysqli_query($conn, $sql2);

echo "<h1>NUMBER OF SILVERS</h1>";

if (mysqli_num_rows($results2) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total silvers</th></tr>";
    while ($row = mysqli_fetch_array($results2)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["silver"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sql3 = "SELECT iso_id, bronze FROM `country` where iso_id = '$country_1' or iso_id = '$country_2'
order by bronze desc";
$results3 = mysqli_query($conn, $sql3);

echo "<h1>NUMBER OF BRONZES</h1>";

if (mysqli_num_rows($results3) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total bronzes</th></tr>";
    while ($row = mysqli_fetch_array($results3)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["bronze"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sql4 = "SELECT name FROM `cyclist` where iso_id = '$country_1'";
$results4 = mysqli_query($conn, $sql4);

echo "<h1>CYCLISTS FROM COUNTRY 1</h1>";

if (mysqli_num_rows($results4) > 0){
    echo "<table>";
    echo "<tr><th>name</th></tr>";
    while ($row = mysqli_fetch_array($results4)){
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
$sql5 = "SELECT name FROM `cyclist` where iso_id = '$country_2'"; 
$results5 = mysqli_query($conn, $sql5);

echo "<h1>CYCLISTS FROM COUNTRY 2</h1>";

if (mysqli_num_rows($results5) > 0){
    echo "<table>";
    echo "<tr><th>name</th></tr>";
    while ($row = mysqli_fetch_array($results5)){
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$sql6 = "SELECT country.iso_id, total, gold, silver, bronze, (SELECT COUNT(*) FROM cyclist WHERE cyclist.iso_id = country.iso_id) AS cyclist_count,(SELECT AVG(TIMESTAMPDIFF(YEAR, STR_TO_DATE(dob, '%Y-%m-%d'), '2012-06-01')) FROM cyclist WHERE cyclist.iso_id = country.iso_id) AS avg_age
FROM country
WHERE country.iso_id IN ('$country_1', '$country_2')
order by total desc";
$results6 = mysqli_query($conn, $sql6);

echo "<h1>EVERYTHING</h1>";

if (mysqli_num_rows($results6) > 0){
    echo "<table>";
    echo "<tr><th>iso_id</th><th>total</th><th>gold</th><th>silver</th><th>bronze</th><th>number of cyclist</th><th>average age</th></tr>";
    while ($row = mysqli_fetch_array($results6)){
        echo "<tr>";
        echo "<td>" . $row["iso_id"] . "</td>";
        echo "<td>" . $row["total"] . "</td>";
        echo "<td>" . $row["gold"] . "</td>";
        echo "<td>" . $row["silver"] . "</td>";
        echo "<td>" . $row["bronze"] . "</td>";
        echo "<td>" . $row["cyclist_count"] . "</td>";
        echo "<td>" . $row["avg_age"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>



 