<html>
<head>
	<link rel="stylesheet" href="css/style.css"></link>
</head>
<body align="center">
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
header("Location: index.php");   //send user to login page
 
if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) { 	//only user level 1 & 2 can access

	$managerName = $_POST["name"];
	$managerIC = $_POST["ic"];
	$ID = $_POST["id"];
	
	require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "UPDATE manager SET manager_name = '$managerName', manager_ic = '$managerIC' WHERE manager_id = '$ID'" ;

	if (mysqli_query($conn, $sql)) {
		echo "<h1>Students’ College Accommodation System</h1><br>";
		echo "<h2>Manager Updated Successfully</h2><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);

	if ($_SESSION["LEVEL"] == 1)
	{?>

		<a class = "button" href="view_manager.php">View Updated List of Managers</a><br><br>

		<?php
	}
	

// If the user is not correct level
} else if ($_SESSION["LEVEL"] == 3) {
	
  echo "<p>Wrong User Level! You are not Authorized to view this page</p>";
   }


  ?>
			<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>
</body>
</html>
