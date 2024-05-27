<html>

<head>
    <title>Accommodation Application</title>
    <script src="js/javascript.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>

<body align="center">
    <h1>Students’ College Accommodation System</h1><br>
    <h2>Accommodation Application Form </h2>

    <form action="insert_accommodation_application.php" method="POST" name="form" onsubmit="return accAppForm()">
        <br></br>

        <b>Name</b><br>
        <input type="text" name="name" size=15>
        <br><br>

        <b>IC</b><br>
        <input type="text" name="ic" size=20>
        <br><br>

        <b>Matric Number</b><br>
        <input type="text" name="matric" size=20>
        <br><br>


        <b> Select college Name</b> <br><br>
        <input class="college" type="radio" name="college" value="KLG" checked="checked"><b> KLG</b>
        <input class="college" type="radio" name="college" value="KDOJ"><b> KDOJ</b>
        <input class="college" type="radio" name="college" value="KRB"><b> KRB</b> <br><br><br>

        <input type="submit" value="Submit">

    </form>

    <br><br><br><br>
                <a href="main.php" class="button">Dashboard</a><br><br><br><br>
            
				<a href="logout.php" class="button">Logout</a>
                <br><br>


</body>

</html>