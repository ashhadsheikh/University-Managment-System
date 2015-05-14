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

	<main>
	
	<?php
		session_start();
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$sql = oci_parse($conn,"select * from student where roll_no='$roll'");
		oci_execute($sql);	
		$row=oci_fetch_array($sql);
		echo"<br><br>Student ID: $row[0] 
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		
		Name: $row[1] $row[2]
		
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		
		$sql = oci_parse($conn,"select sysdate from dual");
		oci_execute($sql);	
		$row=oci_fetch_array($sql);
		echo"Date: $row[0]<br><br>";
		$sql = oci_parse($conn,"select due_date from fee where roll_no='$roll' ");
		oci_execute($sql);	
		$row=oci_fetch_array($sql);
		echo"Due Date: $row[0]<br><br>";
		
		
		
		$sql2 = oci_parse($conn,"select * from feedesc where reciept_no='$roll'");
		oci_execute($sql2);	
		
		echo "<table border=1 style='width:880px'>";
			echo "<tr><th>Semester</th><th>Description</th><th>Amount</th><th>Paid </th><th>Balance</th></tr>";
			
		while($row=oci_fetch_array($sql2))
		{
		$count=$row[2]-$row[3];
		echo"<tr><th>Spring 2014</th><th>$row[1]</th><th>$row[2]</th><th>$row[3]</th><th>$count</th></tr>";
		}
		
		echo "</table>";
		echo "<br>";
	?>

	</main>
	<input type="button" onClick="window.print()" style="left:600px;top:560px; position:absolute;" value="Print This Page"/>
	<footer>
	
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>