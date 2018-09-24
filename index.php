<!DOCTYPE html>
<html>

	<head>
		<title>SummerTime</title>
		<link rel="stylesheet" href="Summer.css">
	</head>
	
	<body >
	
	
	<div class="Top">
	<h1>Summer Time</h1>
	</div>
	<!-- Slideshow container -->
<div class="container">
	<img src="hat.jpg" style="width:100%; height:100%; display: block;">
</div>
<div class="container">
	<h4>Welcome to the Summer Fun website!<br> This site is dedicated to all things Summer. Feel free to check out our most recent information below.</h4>
</div>

<!-- The dots/circles -->

	<div class="Header">
	<h2>Summer Jokes</h2>
	</div>
	
	<div class="container">
	<div class="content">

	 <?php
// connect to the database
include('/connect-db.php');

// get the records from the database
if ($result = $mysqli->query("SELECT * FROM Jokes ORDER BY ID"))
{
// display records if there are records to display
if ($result->num_rows > 0)
{
// display records in a table
echo "<table border='2' cellpadding='10'>";

// set table headers
echo "<tr><th>Joke Number</th><th>Question</th><th>Answer</th><th rowspan='0' border='0'><img src='mexico.jpg' style='width:100%; display: block; position: relative;'></th></tr>";

while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row->ID . "</td>";
echo "<td>" . $row->Question . "</td>";
echo "<td>" . $row->Answer . "</td>";
echo "</tr>";
}

echo "</table>";
}
// if there are no records in the database, display an alert message
else
{
echo "No results to display!";
}
}
// show an error if there is an issue with the database query
else
{
echo "Error: " . $mysqli->error;
}

// close database connection
$mysqli->close();

?>

	<center><a href='JokeEdit.php'>Edit Jokes</a></center>
	</div>
	</div>
	
	
	<div class="Header">
	<h2>Summer Activities</h2>
	</div>
	<div class="container">
	<div class="content">
	<?php
	$xml = new DOMdocument;
	$xml->load('SummerFun.xml');
	
	$xsl = new DOMdocument;
	$xsl->load('SummerFun.xsl');
	
	$processing = new XSLTProcessor;
	
	$processing->importStyleSheet($xsl);
	
	echo $processing->transformToXML($xml);
?>
	</div>
	</div>

	</body>
</html>