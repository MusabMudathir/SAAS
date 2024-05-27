<html>
	<head>
		<title>Insert Manager</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body align="center">

	<h1>Students’ College Accommodation System</h1><br>
		
<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1) { 

	  
	$managerName = $_POST["name"];
	$managerIC = $_POST["ic"];

	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp
	
	$sql = "INSERT INTO manager(manager_name, manager_ic) VALUES ('$managerName','$managerIC')";

	if (mysqli_query($conn, $sql)) {
	echo "<h2>New Manager Added Successfully</h2><br><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
	?>

	<a class = "button" href='manager_form.php'>Add New Manager</a></p><br><br>
	<a class = "button" href='view_manager.php'>View Updated Managers List</a></p>

	<?php
		// If the user is not correct level
		} else if ($_SESSION["LEVEL"] != 1) {

			echo "<p>Wrong User Level! You Are Not Authorized To View This Page</p>";
		
		}
   ?>

	<br><br><br><br>
	<a href="main.php" class="button">Dashboard</a><br><br><br><br>

	<a href="logout.php" class="button">Logout</a>
	<br><br>
	 
	</body>
</html>