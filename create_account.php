	<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle.css" type="text/css" />
	<title> ..:: Student database ::.. </title>
	<link rel="shortcut icon" href="./images/NULogoRound.png" type="NULogoRound.png">
	</head>

	<body>

<header>
<h1>
<img class="movie" src="./images/nu.png" />
 FAST Students database </h1>

</header>
<form method="POST" action="account_creation.php">

<div style="margin-left:70px; width:570px;">
<div style="margin-left:70px;">
<h3>User  DATA</h3>
username<input type="text" name="uname" style="margin-left:25px;"><br><br>
password<input type="text" name="pwd" style="margin-left:25px;"><br><br>

Role  <select name="desig" >
				<option value="instr">Instructor</option>
				<option value="std">student</option>
				<option value="acdm">Academic Office</option>
				<option value="acc">Account Office</option>
				<option value="admin">Admin</option>
				</select>

<input type="submit" value="submit" style="margin-left:25px;"> <br><br>
</div>

</form>

</body>