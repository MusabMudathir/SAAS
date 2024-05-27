<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <!-- <style> 
		body {
    margin-top: 7%;
    padding: 0;
    min-height: 7vh;
    font-family: 'Jost', sans-serif;
    background: #333333;
}


h1, h2 {
    color: gold;
    font-family: verdana;
    font-size: 150%;
    align-content: center;
}






input[type="submit"] {
    margin-top: 15px;
    background-color: gold;
    padding: 15px 80px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 50px;
    border: none;
    outline: none;
    width: 16%;
    
}



#button:hover {
   border: 3px solid #333333 ;
   
}


a {
    text-decoration: none;
    margin-top: 3%;
    font-size: 19px;
    margin-left: 10px;
}
b {
    color: white;
}


.button {
    margin-top: 15px;
    background-color: gold;
    padding: 15px 80px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 50px;
    border: none;
    outline: none;
    width: 16%;
    color: black;

}

input[type="text"],
input[type="password"] {
    width: 15%;
    height: 5%;
    padding: 24px 5px;
    margin-bottom: 10px;
   background-color: #e6e6e6;
   border-radius: 15px;
   
}











        
	</style> -->
</head>

</html>

<?php
session_start(); // Start up your PHP Session

if ($_SESSION["Login"] != "YES") //if the user is not logged in or has been logged out..
    header("Location: index.php");   //send user to login page

if ($_SESSION["LEVEL"] == 1) {     //only user level 1 can access

?>
    <html>

    <head>
        <title>Updating Manager Data</title>

        <head>

        <body align="center">
            <h1>Students’ College Accommodation System</h1><br>
            <h1>Update Manager Data Form</h1>

            <?php

            $ID = $_GET['id'];

            require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

            // Retrieve data from database
            $sql = "SELECT * FROM manager WHERE manager_id='$ID'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);

            ?>

            <form name="form1" method="post" action="update_manager.php">

                <b>Name:</b></strong><br>
                <input name="id" type="hidden" id="id" value="<?php echo $rows['manager_id']; ?>">
                <input name="name" type="text" id="name" size="30" value="<?php echo $rows['manager_name']; ?>"><br><br>

                <b>IC:</b></strong><br>
                <input name="ic" type="text" id="ic" size="15" value="<?php echo $rows['manager_ic']; ?>"><br>
                <input type="submit" name="Submit" value="Update">


                </table>

            </form>

        </body>

    </html>

<?php

    mysqli_close($conn);

    // If the user is not correct level
} else if ($_SESSION["LEVEL"] != 1) {
    echo "<p>Wrong User Level! You are not Authorized to view this page</p>";
}


?>

<br><br><br><br>
<a href="main.php" class="button">Dashboard</a><br><br><br><br>

<a href="logout.php" class="button">Logout</a>
<br><br>