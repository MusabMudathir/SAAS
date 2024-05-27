<html>

<head>
<link rel="stylesheet" href="css/style.css"></link>
	
</head>

</html>
<?php
// Start up your PHP Session
session_start();
// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
	header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) {

	$ID = $_GET["id"];

	require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "DELETE FROM student WHERE student_id = $ID";

	$result = mysqli_query($conn, $sql);

	if (mysqli_query($conn, $sql)) {
        echo "<h1>Students’ College Accommodation System</h1><br>";
		echo "<h2>Student Deleted Successfully</h2><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>
	<a class = "button" href='view_student.php'>View Updated List Of Students</a></p><br>

<?php
	// If the user is not correct level

} else if ($_SESSION["LEVEL"] != 1) {

	echo "<p>Wrong User Level! You are not authorized to view this page</p>";
}

?>

<br><br><br><br>
	<a href="main.php" class="button">Dashboard</a><br><br><br><br>

	<a href="logout.php" class="button">Logout</a>
	<br><br>