 <html>

 <head>
 	<title>Login</title>
	 <script src="js/index.js"></script>
	 <link rel="stylesheet" href="css/style.css">
 </head>

 <body align="center">
 	
 	<br><br><br>
 	<h1>Welcome To Students’ College Accommodation System</h1><br>
 	<br><br>
 	<h2>Login</h2>
	<br>

	
 	<form name="loginForm" action="check_login.php" method="post" onsubmit="return validate()">

 		<p><b>Username:</b> <input type="text" name="username" placeholder="Enter The username" id="username" /></p>
 		<p><b>Password:</b> <input type="password" name="password" placeholder="Enter The password" id="password" /></p><br>
 		<input type="submit" id="button" value="Login">
 		
 	</form>

 </body>

 </html>