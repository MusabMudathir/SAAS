<html>
    <head><title>Accommodation Application</title>
    <link rel="stylesheet" href="css/style.css">
</head>

    <body align="center">
    <br><h1>Students’ College Accommodation System</h1>
    <br><br>

    <?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES") 
header("Location: login.php");

$studentName = $_POST["name"];
$studentIC = $_POST["ic"];
$studentMatric = $_POST["matric"];
$college = $_POST["college"];

require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

$sql = "INSERT INTO accommodation_application(student_name, student_ic, student_matric, college_name) VALUES ('$studentName','$studentIC','$studentMatric', '$college')" ;

if (mysqli_query($conn, $sql)) {
    echo "<h2>Application Submitted Successfully<h2>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

mysqli_close($conn);

  ?>
        <br><br><br><br>
        <a href='main.php'class="button">Dashboard</a><br><br>
        <br><br>
        <a href="logout.php"class="button">Logout</a>
	
    </body>
</html>