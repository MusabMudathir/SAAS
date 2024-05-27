`<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
	header("Location: index.php");
?>

	<html>

	    <head>
		    <title>Viewing Student Accommodation Applications</title>
            <link rel="stylesheet" href="css/style.css">
            
		<head>

		<body align="center" >
            <h1>Students’ College Accommodation System</h1><br>
			<h2>Viewing Student Accommodation Applications</h2>
            <br></br>
			<?php
			require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

            $sql = "SELECT accommodation_application.accommodation_application_id,accommodation_application.student_name, accommodation_application.student_matric, accommodation_application.student_ic, college.college_name, college.college_location, college.room_availability, accommodation_application.approval_status 
                    FROM accommodation_application
                    INNER JOIN college 
                    ON accommodation_application.college_name = college.college_name
					ORDER BY accommodation_application.student_name";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			?>

				<!-- Start table tag -->
				<table class="table" width="1400" border="0" cellspacing="0" cellpadding="3" align="center" >

					<!-- Print table heading -->
					
					<tr class="table_header" align="Center">
						<td align="center"><strong>Student Name</strong></td>
						<td align="center"><strong>Student IC</strong></td>
						<td align="center"><strong>Student Matric</strong></td>
						<td align="center"><strong>College Name</strong></td>
						<td align="center"><strong>College Location</strong></td>
						<td align="center"><strong>Room Availability</strong></td>
                        <td align="center"><strong>Approval Status</strong></td>
						<?php if ($_SESSION["LEVEL"] == 2) {?>
                        	<td align="center"><strong>Approve Application</strong></td>
						<?php 
						}
						?>

					</tr>

					<?php
					// output data of each row
					while ($rows = mysqli_fetch_assoc($result)) {

					?>
					<tr align="Center" >
						<td class="table_row"><?php echo $rows['student_name']; ?></td>
						<td class="table_row"><?php echo $rows['student_ic']; ?></td>
						<td class="table_row"><?php echo $rows['student_matric']; ?></td>
                        <td class="table_row"><?php echo $rows['college_name']; ?></td>
                        <td class="table_row"><?php echo $rows['college_location']; ?></td>
                        <td class="table_row"><?php echo $rows['room_availability']; ?></td>
                        <td class="table_row">
                            <?php 
                                switch ($rows['approval_status']) {
                                    case 0:
                                        echo "Waiting Approval";
                                        break;
                                    case 1:
                                        echo "Approved";
                                        break;
                                    case -1:
                                        echo "Rejected";
                                        break;
                                    default:
                                        echo "Unknown Status";
                                        break;
                                }
								$ID = $rows['accommodation_application_id'];
                            ?>
                        </td>
						<?php if ($_SESSION["LEVEL"] == 2) {?>
							<td class="table_row" align="center"> 
								<a class="approve" href="update_approval_status.php?id=<?php echo $ID;?>&approval_status=1">Approve</a>
                                <b>/</b>
								<a class="delete" href="update_approval_status.php?id=<?php echo $ID;?>&approval_status=-1">Reject</a>
							</td>
						<?php 
						}
						?>

					</tr>

		<?php }
				} 
			else {
				echo "<br><h3>No Applications have been Submitted</h3><br>";
			}

			mysqli_close($conn);
		?>

				</table>

				<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>

		</body>

	</html>