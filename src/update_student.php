<html>
	<head>
	<title>Update Student</title>
	<link rel="stylesheet" href="css/style.css">

</head>
<body align = "center">

<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
	header("Location: index.php");   //send user to login page
 
if ($_SESSION["LEVEL"] != 2) { 	//only user level 1 can access

     
	$studentName = $_POST["name"];
	$studentIC = $_POST["ic"];
	$studentMatric = $_POST["matric"];
	$ID = $_POST["id"];

	$studentMatric = strtoupper($studentMatric);  // convert matric to uppercase
	$_SESSION['IC'] = $studentIC;

	
	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "UPDATE student SET student_name = '$studentName', student_ic = '$studentIC', student_matric = '$studentMatric' WHERE student_id = '$ID'" ;

	if (mysqli_query($conn, $sql)) {
	echo "<br><h1>Students’ College Accommodation System</h1><br>";
	echo "<h2>Student Updated Successfully</h2><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	

	if ($_SESSION["LEVEL"] == 1)
	
	{?>
		<a class = "button" href='view_student.php'>View Updated List Of Students</a><br><br>
	<?php
	}
	

// If the user is not correct level
} else if ($_SESSION["LEVEL"] == 2) {
	
	echo "<p>Wrong User Level! You are not authorized to view this page</p>";
   }

  ?>
  		<br><br><br>
		<a href="main.php" class="button">Dashboard</a><br><br><br><br>
	
		<a href="logout.php" class="button">Logout</a>
		<br><br>
</body>
</html>