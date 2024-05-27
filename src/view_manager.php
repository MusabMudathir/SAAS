
<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
	header("Location: index.php");

if ($_SESSION["LEVEL"] != 3) {   //only user with access level 1 and 2 can view

?>
	<html>

	<head>
		<title>Viewing Manager Data</title>
		<link rel="stylesheet" href="css/style.css"></link>
	<head>

		<body align="center">
			<h1>Students’ College Accommodation System</h1><br>
			<h2>View Manager Details</h2>
			<br></br>
			<?php
			require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

			$sql = "SELECT * FROM manager";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			?>

				<!-- Start table tag -->
				<table class="table" width="600" border="0" cellspacing="0" cellpadding="3" align="center">

					<!-- Print table heading -->
					<tr class="table_header">
						<td align="center"><strong>Name</strong></td>
						<td align="center"><strong>IC</strong></td>

						<?php if ($_SESSION["LEVEL"] == 1) { ?>

							<td align="center"><strong>Update</strong></td>
							<td align="center"><strong>Delete</strong></th>

						<?php } ?>

					</tr>

					<?php
					// output data of each row
					while ($rows = mysqli_fetch_assoc($result)) {
					?>

						<tr >
							<td class="table_row"  align="center"><?php echo $rows['manager_name']; ?></td>
							<td class="table_row"  align="center"><?php echo $rows['manager_ic']; ?></td>

							<?php if ($_SESSION["LEVEL"] == 1) { ?>

								<!--only user with access level 1 can view update and delete button-->
								<td  align="center"> <a class="update" href="manager_update_form.php?id=<?php echo $rows['manager_id']; ?>">Update</a> </td>
								<td  align="center"> <a class="delete" href="delete_Manager.php?id=<?php echo $rows['manager_id']; ?>">Delete</a> </td>
						</tr>

			<?php }
						}
					} else {
						echo "<h3>There Is No Manager Data</h3>";
					}

					mysqli_close($conn);
			?>

				</table>

				<?php if ($_SESSION["LEVEL"] == 1) { ?>
					<br><br><br><br>
					<a href="manager_form.php" class="button">Add New Manager</a>
					<br><br>
				<?php
				}
				?>

			<?php } // If the user is not correct level
		else if ($_SESSION["LEVEL"] == 3) {
			// allow the Manager to see his information.	
			echo "<p>Wrong User Level! You are not authorized to view this page</p>";
		}

		// echo "<p class=\"button\"><a href='main.php'style='text-decoration:none'>Dashboard</a></p>";
		// echo "<p class=\"button\"><a href='logout.php'style='text-decoration:none'>Logout</a></p>";
			?>

<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>
		</body>

	</html>