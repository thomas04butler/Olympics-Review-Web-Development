<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="noindex, nofollow" />
<title>Details Task</title>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	background-color: bisque;
}
.center {
	text-align:center;
}
body,td,th {
	color: brown; 
}
.larger {
	font-size:larger;
	text-align:left;
}
table {
	margin-left:auto;
	margin-right:auto;
}
.fixed {
	font-family: Courier, monospace;
	white-space: pre;
	background-color:cornsilk;
}
</style>
</head>
<body>
<h3 class="center">COA123 - Web Programming</h3>
<h2 class="center">Individual Coursework - Olympic Cyclists</h2>
<h1 class="center">Task 4 - Compare (compare.php)</h1>
  <table>
  <tr>
  <td>
<div class="fixed">~  __0
 _-\<,_
(*)/ (*)
</div>
  </td>
  </tr>
  </table>
  <br />
  <form action="compareresult.php" method="get" id="details">
    <table border="1">
        <tr>
            <th scope="col">Key</th>
            <th scope="col">Value</th>
        </tr>
        <tr>
            <td><label for="country_1">Country 1</label></td>
            <td>
                <input name="country_1" type="text" class="larger" id="country_1" pattern="[A-Z]{3,3}" value="GBR" size="40" maxlength="3" />
            </td>
        </tr>
        <tr>
            <td><label for="country_2">Country 2</label></td>
            <td>
                <input name="country_2" type="text" class="larger" id="country_2" pattern="[A-Z]{3,3}" value="ESP" size="40" maxlength="3" />
            </td>
        </tr>
        <tr>
            <td>Compare</td>
            <td><input type="submit" id="submit" class="larger" /></td>
        </tr>
    </table>
  </form>
</body>
</html>
