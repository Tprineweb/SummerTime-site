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
echo "<center><table border='2' cellpadding='10' align='center'>";

// set table headers
echo "<tr><th>Joke Number</th><th>Question</th><th>Answer</th><th></th><th></th></tr>";

while ($row = $result->fetch_object())
{
// set up a row for each record
echo "<tr>";
echo "<td>" . $row->ID . "</td>";
echo "<td>" . $row->Question . "</td>";
echo "<td>" . $row->Answer . "</td>";
echo "<td><a href='records.php?id=" . $row->ID . "'>Edit</a></td>";
echo "<td><a href='delete.php?id=" . $row->ID . "'>Delete</a></td>";
echo "</tr>";
}

echo "<tr><td colspan='5'><a href='records.php'>New Record</a></td></tr></table></center>";
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
	<a href='index.php'>Back to Home</a>
	</div>
	</div>
	

	</body>
</html>