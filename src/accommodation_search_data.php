<html>

<head>
    <title>Search Data</title>
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="css/style.css">

   
</head>

<body align="center">


    <br><h1>Students’ College Accommodation System</h1><br>
    <h2>Enter IC Number</h2><br>

    <form name="Application_status" action="accommodation_application_report.php" method="GET" onsubmit="return AppStatus()">


        <b>IC Number</b><br>
        <input type="text" name="ic" size="15"> <br><br>
        <input type="submit" name="Submit" value="Search">

    </form>

<br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>
</body>

</html>