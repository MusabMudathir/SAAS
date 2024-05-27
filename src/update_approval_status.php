<?php
    $approvalStatus = $_GET["approval_status"];
    $ID = $_GET["id"];

    // Add approvalStatus to approval status in the database
    require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	$sql = "UPDATE accommodation_application SET approval_status = '$approvalStatus' WHERE accommodation_application_id = '$ID'" ;

	if (mysqli_query($conn, $sql)) {
    echo "<h1>Students’ College Accommodation System</h1><br>";
	echo "<h2>Approval Status Updated Successfully</h2><br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>

<html >
    <head><title>Approval Status</title>
    <link rel="stylesheet" href="css/style.css"></link>
    </head>

    <body align="center">

        <a href="manage_accommodation_application.php"class="button">Back To Students' Accommodation Applications</a>
        <br><br><br><br><br>
    


        <a href="main.php"class="button">Dashboard</a><br><br>
        <br><br>
        
        <a href="logout.php"class="button">Logout</a>
        <br><br>

    </body>
</html>