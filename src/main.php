<html>

<head>
	<title>Dashboard</title>
	 <link rel="stylesheet" href="css/style.css">

</head>

<body align="center">

<br><h1>Welcome To Students’ College Accommodation System</h1><br><br>

<h3>Hi <?php echo $_COOKIE["user"] ; ?>!</h3>

<h1>Dashboard</h1><br>



	<?php

	session_start();
	if ($_SESSION["LEVEL"] == 1) {
	?>
		<br><br><a href="view_student.php" class="button">View Students</a><br><br><br>
		<br><br><a href="view_manager.php" class="button">View Managers</a><br><br><br>
		<br><br><a href="manage_accommodation_application.php" class="button">View Accommodation Application</a><br><br><br>


	<?php
	} else if ($_SESSION['LEVEL'] == 2) {
	?>


		<br><br><a href="update_search_data.php" class="button">Edit Profile</a><br><br><br>
		<br><br><a href="view_search_data.php" class="button">View Profile</a><br><br><br>
		<br><br><a href="manage_accommodation_application.php" class="button">Manage Students' Accommodation Applications</a> <br><br><br>

	<?php
	} else if ($_SESSION['LEVEL'] == 3) {
	?>

<br>

		<br><a href="update_search_data.php" class="button">Edit Profile</a><br><br><br>
		<br><br><a href="view_search_data.php" class="button">View Profile</a><br><br><br>
		<br><br><a href="accommodation_application_form.php" class="button">Fill Accommodation Application</a><br><br><br>
		<br><br><a href="accommodation_search_data.php" class="button">Accommodation Application Status</a><br><br><br>

	<?php
	} else {
	?>

		<p>Error In main.php, Unknown Level!</p>

	<?php
	}
	?>

	<br><br><br>
	<br><br><a href="logout.php" class="button">Logout</a><br>

	


	
</body>

</html>