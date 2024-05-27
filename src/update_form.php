<html>

<head>
	<title>Updating Student Data</title>
	<link rel="stylesheet" href="css/style.css"></link>

	<head>

	<body align="center">

		<?php
		session_start(); // Start up your PHP Session

		require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

		if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
			header("Location: index.php");   //send user to login page

		if ($_SESSION["LEVEL"] != 2) { 	//only user level 1&3 can access


			if ($_SESSION["LEVEL"] == 1) {
				$ID = $_GET['id'];

				// Retrieve data from database
				$sql = "SELECT * FROM student WHERE student_id='$ID'";
				$result = mysqli_query($conn, $sql);
				$rows = mysqli_fetch_assoc($result);
			} else if ($_SESSION["LEVEL"] == 3) {
				$IC = $_GET['ic'];
				$_SESSION["IC"] = $IC;
				// Retrieve data from database
				$sql = "SELECT * FROM student WHERE student_ic='$IC'";
				$result = mysqli_query($conn, $sql);
				$rows = mysqli_fetch_assoc($result);
			}

		?>

			
            <h1>Students’ College Accommodation System</h1><br>
			<h1 align="center">Update Student Data Form</h1><br><br>

			<form name="form1" method="post" action="update_student.php">


				<b>Name</b><br>
				<input name="name" type="text" id="name" size="30" value="<?php echo $rows['student_name']; ?>"><br><br>

				<b>IC</b><br>
				<input name="ic" type="text" id="ic" size="15" value="<?php echo $rows['student_ic']; ?>"><br><br>

				<b>Matric Number</b><br>
				<input name="matric" type="text" id="matric" size="15" value="<?php echo $rows['student_matric']; ?>"><br><br><br>

				<input name="id" type="hidden" id="id" value="<?php echo $rows['student_id']; ?>">
				<input type="submit" name="Submit" value="Update">

			</form>

		<?php

			// If the user is not correct level
		} else if ($_SESSION["LEVEL"] == 2) {

			// Manager part here later
			$IC = $_GET['ic'];
			$_SESSION["IC"] = $IC;
			// Retrieve data from database
			$sql = "SELECT * FROM manager WHERE manager_ic='$IC'";
			$result = mysqli_query($conn, $sql);
			$rows = mysqli_fetch_assoc($result);
		?>
            <h1>Students’ College Accommodation System</h1><br>
			<h1 align="center">Update Manager Data Form</h1><br>
			<form name="form1" method="post" action="update_manager.php">

				<b>Name</b><br>
				<input name="id" type="hidden" id="id" value="<?php echo $rows['manager_id']; ?>">
				<input name="name" type="text" id="name" size="30" value="<?php echo $rows['manager_name']; ?>"><br><br>

				<b>IC</b><br>
				<input name="ic" type="text" id="ic" size="15" value="<?php echo $rows['manager_ic']; ?>"><br><br>
				<input type="submit" name="Submit" value="Update">

			</form>

		<?php
		}
		mysqli_close($conn);
		?>
		<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>

	</body>

</html>