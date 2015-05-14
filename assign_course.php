
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

	<main>
	<div style="margin-left:70px; width:570px;">
	<br><br>
	<h2>Course Title</h2>
<?php
		$conn = oci_connect("system","123","localhost/xe");

	$sql2 = oci_parse($conn,"select DISTINCT c_name,c_id from course ");
		oci_execute($sql2);	
		echo "<form action='assig.php' method='post'>";
	echo"<select name='course' >";
			
		while($row=oci_fetch_array($sql2))
		{
			
			echo "<option value='$row[1]'>$row[0]</option>";
		}
		echo"</select>";
		echo "<br><h2>Section</h2>";
		echo"<select name='section' >";
		echo "<option value='A'>A</option>";
		echo "<option value='B'>B</option>";
		echo "<option value='C'>C</option>";
		echo"</select>";
		echo "<br>";
		echo"<h2>Instructor Name</h2>";
		$sql2 = oci_parse($conn,"select * from instructor");
		oci_execute($sql2);	
	echo"<select name='instr' >";
			
		while($row=oci_fetch_array($sql2))
		{
			
			echo "<option value='$row[0]'>$row[1] $row[2]</option>";
		}
		echo"</select>";
		echo "<br><br><br><br>";
		
		echo "	<input type='submit' value='Save' style=' position:relative;'>";
		echo "</form>";
		
	?>
	</div>
	</main>

	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>