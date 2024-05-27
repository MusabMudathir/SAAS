<html>

<head>
<link rel="stylesheet" href="css/style.css">

</head>
<body align="center">


</html>
<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
	header("Location: login.php");

if ($_SESSION["LEVEL"] != 2) {


	$studentName = $_POST["studentName"];
	$studentIC = $_POST["studentIC"];
	$studentMatric = $_POST["studentMatric"];

	$studentMatric = strtoupper($studentMatric);  // convert matric to uppercase

	require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "INSERT INTO student(student_name, student_ic, student_matric) VALUES ('$studentName','$studentIC','$studentMatric')";

	if (mysqli_query($conn, $sql)) {
		echo"<h1>Students’ College Accommodation System</h1><br>";
		echo "<h2>New Student Added Successfully</h2><br><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
	if ($_SESSION['LEVEL'] == 1) {

	?>
	
		<a class = "button" href='student_form.php'>Add New Student</a></p><br><br>
		<a class = "button" href='view_student.php'>View Updated Students List</a></p><br>
	<?php

	} else if ($_SESSION['LEVEL'] == 3) {
	?>
		echo "<p><a href='view_student.php'>Click here to view Your Information</a></p>";

	<?php
	}

	// If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {

	echo "<p>Wrong User Level! You are not authorized to view this page</p>";
}
?>

<br><br><br><br>
	<a href="main.php" class="button">Dashboard</a><br><br><br><br>

	<a href="logout.php" class="button">Logout</a>
	<br><br>

</body>
	</html>