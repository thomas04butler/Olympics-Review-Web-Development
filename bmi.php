<!DOCTYPE html>
<html lang ="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width"/>

<title>Form Processing</title> 

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
  background-color: #f2f2f2;
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
<h1>BMI CALCULATOR<h1>

</head>

<body>


<?php
$min_weight = $_REQUEST['min_weight'];
$max_weight = $_REQUEST['max_weight'];
$min_height = $_REQUEST['min_height'];
$max_height = $_REQUEST['max_height'];

$difference_weight = $max_weight - $min_weight;
$difference_height = $max_height - $min_height;
$number_rows = $difference_weight / 5; 
$number_columns = $difference_height / 5;
?>
<table>
  <thead>
    <tr>
      <th></th>
      <?php
      for ($j = 0; $j <= $number_columns; $j++){
        $k = $j * 5; 
        $num2 = $min_height + $k;
        $metre = $num2 / 100; 
        $metre_squared = $metre * $metre;
        echo "<th>". $metre ."m</th>"; // add header cell for each column
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    for ($i = 0; $i <= $number_rows; $i = $i+1){
      if ($i == 0){
        $num1 = $min_weight;
        echo "<tr><th>".$num1."kg</th>"; // add header cell for first column
      } 
      else {
        $m1 = 5 * $i;
        $num1 = $min_weight + $m1;
        echo "<tr><th>". $num1 ."kg</th>"; // add row name cell for each row
      }
      for ($j = 0; $j <= $number_columns; $j++){
        $k = $j * 5; 
        $num2 = $min_height + $k;
        $metre = $num2 / 100; 
        $metre_squared = $metre * $metre; 
        $bmi = $num1 / $metre_squared;
        $three_d_p = round($bmi, 3);
        echo "<td>".$three_d_p."</td>";
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

</body>