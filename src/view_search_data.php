<html>

<head>
    <title>Search Data</title>
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body align="center">

    <br><h1>Welcome To Students’ College Accommodation System</h1><br>
    <h2>Enter IC Number</h2><br><br>
    

    <?php
    session_start();

    if ($_SESSION['LEVEL'] == 3) {
    ?>

<form name="ViewSearchData" action="view_student_info.php" method="GET" onsubmit="return viewSearchData()">

            <b>IC Number</b><br><br>
            <input type="text" name="ic" size="15"><br><br><br>
            <input type="submit" name="Submit" value="Search"><br><br>

</form>

    <?php
    } else if ($_SESSION['LEVEL'] == 2) {
    ?>
        <form name="ViewSearchData" action="view_manager_info.php" method="GET" onsubmit="return viewSearchData()">



            
            <b>IC Number</b> <br><br>
            <input type="text" name="ic" size="15"><br>
            <input type="submit" name="Submit" value="Search"><br>

        </form>
    <?php
    }
    ?>
    <br><br><br>
    <p><a href='main.php' class="button">Dashboard</a></p><br>
    <p><a href='logout.php' class="button">Logout</a></p>

</body>

</html>