<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle5.css" type="text/css" />
	<title> ..:: Student database ::.. </title>
	<link rel="shortcut icon" href="./images/NULogoRound.png" type="NULogoRound.png">
	</head>

	<body>

	<header>
	<h1>
	<img class="movie" src="./images/nu.png" />
	 FAST Students database </h1>

	</header>
<p style="top:70px; left:920px; position:absolute;">Welcome to <?php session_start(); 
$roll= $_SESSION['RollNo'];
echo"$roll";?> </p><!-- dynamic -->

	<p style="top:90px;left:240px; position:absolute;">Semester: Semester 2014</p> <!-- dynamic -->
	<p style="top:90px;left:900px; position:absolute;">15/01/2014 to 15/05/2014 </p><!-- dynamic -->
	

	<main style="overflow:scroll;">

	<?php
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from course ");
		oci_execute($sql2);	

		echo "<form action='register.php' method='post'>";
		echo "<table border=1 style='width:880px'>";
			echo "<tr><th>Course code</th><th>Course Title</th><th>Credit Hours</th><th>Section </th><th>Instructor </th><th>Pre-requisite </th></tr>";
		while($row=oci_fetch_array($sql2))
		{
			echo "<tr>";
			echo "<th> <input type='checkbox' name='courses[]' value='$row[0]$row[3]'>$row[0]<br> </th>";
			echo "<th>" . $row[1] . "</th>";
			echo "<th>" . $row[2] . "</th>";
			echo "<th>" . $row[3] . "</th>";
			$sql = oci_parse($conn,"select * from TteachesC where c_id='$row[0]' and sec='$row[3]'");
			oci_execute($sql);	
			$row2=oci_fetch_array($sql);
			$sql3 = oci_parse($conn,"select * from Instructor where emp_id='$row2[0]'");
			oci_execute($sql3);	
			$row3=oci_fetch_array($sql3);
			echo "<th>$row3[1] $row3[2]</th>";
			echo "<th>" . $row[7] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		echo "	<input type='submit' value='Save' style='left:500px; position:relative;'>";
		echo "</form>";
		
	?>
<button style="	position:relative;left:650px;"onclick="window.location.href='student.php'">Cancel</button>

	</main>

	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>