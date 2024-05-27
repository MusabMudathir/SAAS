<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
	header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) {

?>

	<html>

	<head>
		<title>Add Manager Data</title>
		<script src="javascript.js"></script>
		<link rel="stylesheet" href="css/style.css"></link>
	</head>

	<body align="center">
        <h1>Students’ College Accommodation System</h1><br>
		<h1>Manager Data Form</h1><br>

		<p><b>Please fill in the following information</b></p><br>

		<form  name="form2" method="POST" action="insert_manager.php" onsubmit="return managerInfo()">


					<b>Manager's Name</b><br>
					<input type="text" name="name" size="30"><br><br>

					<b>IC Number</b><br>
					<input type="text" name="ic" size="15"><br>

					<br><br>
					<input type="submit" name="button1" value="Submit">

		</form>
	</body>

	</html>


<?php
	// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {

	echo "<p>Wrong User Level! You are not authorized to view this page</p><br>";
}


?>
		<br><br><br><br>
		<a href="main.php" class="button">Dashboard</a><br><br><br><br>
	
		<a href="logout.php" class="button">Logout</a>
		<br><br>