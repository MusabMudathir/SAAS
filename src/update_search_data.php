<html>

<head>
    <title>Search Data</title>
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body align="center">

    <h1>Welcome To Students’ College Accommodation System</h1><br><br>

        
    <h2>Enter IC Number</h2>
    <br></br>

    <form name="UpdatedData" action="update_form.php" method="GET"  onsubmit="return updateSearchData()">
    

        <b>IC Number</b><br><br>
        <input type="text" name="ic" size="15"><br><br>
        <input type="submit" name="Submit" value="Search"><br><br><br>

    </form>

    <br><br>
    <p><a href="main.php" class="button">Dashboard</a></p><br><br>
    <p><a href="logout.php" class="button">Logout</a></p><br><br>

</body>

</html>