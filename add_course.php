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
<form method="POST" action="course_addition.php">

<div style="margin-left:70px; width:570px;">
<div style="margin-left:70px;">
<h3>Course</h3>
Course ID<input type="text" name="id" style="margin-left:25px;"><br><br>
Course Name<input type="text" name="name" style="margin-left:25px;"><br><br>
Credit Hours<input type="text" name="hours" style="margin-left:25px;"><br><br>

Section  <select name="section" >
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="C">C</option>
				</select><br><br>
Semester NameSection  <select name="sem_name" >
				<option value="Spring">spring</option>
				<option value="Fall">Fall</option>
				<option value="Summer">Summer</option>
				</select><br><br>

Semester Year<input type="text" name="sem_year" style="margin-left:25px;"><br><br>
Department  <?php
		$conn = oci_connect("system","123","localhost/xe");

	$sql2 = oci_parse($conn,"select * from department");
		oci_execute($sql2);	
	echo"<select name='dep' >";
			
		while($row=oci_fetch_array($sql2))
		{
			
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo"</select>";
		?><br><br>
		Pre Req  <?php
		$conn = oci_connect("system","123","localhost/xe");

	$sql2 = oci_parse($conn,"select * from course");
		oci_execute($sql2);	
	echo"<select name='pre_req' >";
			echo "<option value='NULL'>None</option>";
		while($row=oci_fetch_array($sql2))
		{
			
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo"</select>";
		?><br><br>
<input type="submit" value="submit" style="margin-left:25px;"> <br><br>
</div>

</form>

</body>