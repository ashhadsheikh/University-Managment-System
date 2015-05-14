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
		echo"Date: $row[0]<br><br><br>";
		$sql2 = oci_parse($conn,"select * from stakec where roll_no='$roll'");
		oci_execute($sql2);	
		
		echo "<table border=1 style='width:880px'>";
			echo "<tr><th>Course code</th><th>Course Title</th><th>Credit Hours</th><th>Section </th><th>Status</th></tr>";
		while($row=oci_fetch_array($sql2))
		{
				$sql3 = oci_parse($conn,"select * from course where c_id='$row[2]' and sec='$row[1]'");
				$c_id=$row[2];
				$sec=$row[1];
			oci_execute($sql3);	
			while($row2=oci_fetch_array($sql3))
		{
			echo "<tr>";
			echo "<th>" . $row2[0] . "</th>";
			echo "<th>" . $row2[1] . "</th>";
			echo "<th>" . $row2[2] . "</th>";
			echo "<th>" . $row2[3] . "</th>";
				$sql4 = oci_parse($conn,"select * from feedesc where reciept_no='$roll'");
				oci_execute($sql4);
				$val=0;
					while($row=oci_fetch_array($sql4)){
						$am=$row[2]-$row[3];
						$val+=$am;
					}
			if($val>0){
			echo "<th>Not Allowed</th>";
			}
			else{
			$sql7 = oci_parse($conn,"select * from studatdnc where roll_no=$roll and c_id=$c_id and sec='$sec'");
				oci_execute($sql7);
			$row7=oci_fetch_array($sql7);
			if($row7[3]>80){
			echo "<th>Allowed</th>";
			}
			else if($row7[3]<80){
			echo "<th>Not Allowed</th>";
			}
			}
			echo "</tr>";
		}
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