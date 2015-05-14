<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="mainstyle4.css" type="text/css" />
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
<div  style="	position:absolute;left:30px;">
<?php
		session_start();
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from Tteachesc where emp_id='$roll'");
		oci_execute($sql2);
		while($row=oci_fetch_array($sql2))
		{
		$sql = oci_parse($conn,"select * from course where C_id='$row[2]' and sec='$row[1]'");
		oci_execute($sql);
		$row2=oci_fetch_array($sql);
			echo "<h2>$row2[1] $row2[3]</h2>";
			$_SESSION['C_ID']=$row2[0];
			$_SESSION['sec']=$row2[3];
			echo "<A HREF='add_assesment.php'>Add Assesment</A><br>";
			echo "<A  HREF='Add_attendence.php'>Add Attendence</A><br>";
			echo "<A  HREF='view_all_marks.php'>View Marks</A><br>";
			echo "<A  HREF='view_all_attend.php'>View Attendence</A><br>";
			echo "<A  HREF='edit_mrks.php'>Edit Marks</A><br>";
			echo "<A  HREF='edit_attend.php'>Edit Attendence</A><br>";
		}		
?>

</main>

<footer>
<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
</footer>


</body>



</html>