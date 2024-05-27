<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
	header("Location: index.php");

if ($_SESSION["LEVEL"] == 1 || $_SESSION["LEVEL"] == 2) {   //only user with access level 1 and 2 can view

?>
	<html>

	<head>
		<title>Viewing Student Data</title>
		<link rel="stylesheet" href="css/style.css">


	</head>

	<body align="center">

		<h1>Students’ College Accommodation System</h1><br>
		<h1>View Student Details</h1><br>
	
		<form name="View_studentInfo" action="view_student_info.php" method="GET" onsubmit="return viewStudentInfo()"></form>


		<?php
		require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

		$sql = "SELECT * FROM student";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		?>

			<!-- Start table tag -->
			<table  class="table" width="600" border="0" cellspacing="0" cellpadding="3" align="center">

				<!-- Print table heading -->
				<tr class="table_header">
					<td align="center"><strong>Name</strong></td>
					<td align="center"><strong>IC</strong></td>
					<td align="center"><strong>Matric</strong></td>

					<?php if ($_SESSION["LEVEL"] == 1) {
					?>

						<td align="center"><strong>Update</strong></td>
						<td align="center"><strong>Delete</strong></td>

					<?php
					}
					?>

				</tr>

				<?php
				// output data of each row
				while ($rows = mysqli_fetch_assoc($result)) {
				?>

					<tr>
						<td class="table_row"  align="center"><?php echo $rows['student_name']; ?></td>
						<td class="table_row"  align="center"><?php echo $rows['student_ic']; ?></td>
						<td class="table_row"  align="center"><?php echo $rows['student_matric']; ?></td>

						<?php if ($_SESSION["LEVEL"] == 1) { ?>
							<!--only user with access level 1 can view update and delete button-->
							<td align="center"> <a class = "update" href="update_form.php?id= <?php echo $rows['student_id']; ?>">Update</a> </td>
							<td align="center"> <a class = "delete" href="delete_student.php?id=<?php echo $rows['student_id']; ?>">Delete</a> </td>

					</tr>


		<?php }
					}
				} else {
					echo "<h3>There Is No Student Data</h3>";
				}
				mysqli_close($conn);
		?>
			</table>

			<?php if ($_SESSION["LEVEL"] == 1) { ?>
				<br><br><br>
				<a href="student_form.php" class="button">Add New Student</a>
			<?php
			}
			?>

			<br><br>

		<?php  // If the user is not correct level
	} else if ($_SESSION["LEVEL"] == 3) {

		echo "<p>Wrong User Level! You are not authorized to view this page</p>";
	}

	// echo "<p class=\"button\"><a href='main.php' style='text-decoration:none'>Dashboard</a></p>";
	// echo "<p class=\"button\"><a href='logout.php'style='text-decoration:none'>Logout</a></p>";
		?>

		
				<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>


		</table>
		</form>
	</body>

	</html>