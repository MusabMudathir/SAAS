<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out
    header("Location: index.php");

$IC = $_GET['ic'];

?>

<html>

<head>
    <title>Viewing Student Data</title>
    <link rel="stylesheet" href="css/style.css">
    <head>

    <body align="center">
        <br></br>
       

        <h1>Students’ College Accommodation System</h1><br>
        <h1>View Student Details</h1>
        <form name="View_studentInfo" action="view_student_info.php" method="GET" onsubmit="return viewStudentInfo()">

            <?php
            require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

            $sql = "SELECT * FROM student WHERE student_ic='$IC'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $rows = mysqli_fetch_assoc($result)
            ?>

                <!-- Start table tag -->
                <table class="table" align="center" width="600" border="0" cellspacing="0" cellpadding="3">

                    <!-- Print table heading -->
                    <tr  class="table_header" align="center">
                        <td align="center"><strong>Name</strong></td>
                        <td align="center"><strong>IC</strong></td>
                        <td align="center"><strong>Matric</strong></td>
                    </tr>

                    <tr align="center">
                        <td class="table_row"><?php echo $rows['student_name']; ?></td>
                        <td class="table_row"><?php echo $rows['student_ic']; ?></td>
                        <td class="table_row"><?php echo $rows['student_matric']; ?></td>
                    </tr>

        </form>
    <?php
            } else {
                echo "<br><br><h3>There Is No Student Data<h3>";
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