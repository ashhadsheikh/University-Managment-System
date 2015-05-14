	<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle8.css" type="text/css" />
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
	

	<main style="overflow:scroll">
		<?php
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from Tteachesc where emp_id='$roll'");
		oci_execute($sql2);
		while($row=oci_fetch_array($sql2))
		{
		$sql = oci_parse($conn,"select * from course where C_id='$row[2]' and sec='$row[1]'");
		$c_id=$row[2];
		$sec=$row[1];
		oci_execute($sql);
		$row2=oci_fetch_array($sql);
		
			echo "<h2>$row2[1] $row2[3]</h2>";
			
			echo"<TABLE BORDER=1 >";
			echo"<TR><TH>Student ID</TH><TH>Student Name</TH><TH> Assessment Name</TH><TH>Weightage </TH><TH>Total Marks</TH><TH>Marks Obt</TH><TH>Absolutes</TH></TR>";
			$total=0;
			$tr=0;
			$sql3 = oci_parse($conn,"select * from assesment where C_id='$row[2]' and sec='$row[1]'");
			$C_id=$row[2];
			$sec=$row[1];
			oci_execute($sql3);
			while($row3=oci_fetch_array($sql3)){
			$sql4 = oci_parse($conn,"select * from assesmarks where roll_no in (Select roll_no from stakec where C_id='$row[2]' and sec='$row[1]' ) ");
			oci_execute($sql4);
			while($row4=oci_fetch_array($sql4)){
			$abs=($row4[3]/$row3[2])*$row3[3];
			$total+=$abs;
			$tr+=$row3[3];
			$sql5 = oci_parse($conn,"select * from student where roll_no = $row4[2] ");
			oci_execute($sql5);
			$row5=oci_fetch_array($sql5);
			echo"<TR><TD>$row4[2]</TD><TD>$row5[1] $row5[2]</TD><TD>$row3[0] $row3[1]</TD><TD>$row3[3] </TD><TD>$row3[2]</TD><TD>$row4[3]</TD><TD>$abs</TD></TR>";
			}
			}
	
		echo"</TABLE>";
		if($tr=='100'){
		if($total>=90){
		$sql4 = oci_parse($conn,"update stakec set letter_grade='A+', gp='4' where roll_no='$roll' and c_id=$c_id and sec=$sec");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		else if($total>=80 && $total <90){
				$sql4 = oci_parse($conn,"update stakec set letter_grade='A', gp='4' where roll_no='$roll' and c_id=$c_id and sec='$sec'");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		else if($total>=70 && $total <80){
				$sql4 = oci_parse($conn,"update stakec set letter_grade='B', gp='3' where roll_no='$roll' and c_id=$c_id and sec='$sec'");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		else if($total>=60 && $total <70){
				$sql4 = oci_parse($conn,"update stakec set letter_grade='C', gp='2' where roll_no='$roll' and c_id=$c_id and sec='$sec'");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		else if($total>=50 && $total <60){
				$sql4 = oci_parse($conn,"update stakec set letter_grade='D', gp='1' where roll_no='$roll' and c_id=$c_id and sec='$sec'");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		else if( $total <50){
			$sql4 = oci_parse($conn,"update stakec set letter_grade='F', gp='0' where roll_no='$roll' and c_id=$c_id and sec='$sec'");
			oci_execute($sql4);
			oci_commit($conn);
		
		}
		
		
		
		
		}
			
			
			
			
			
			
		}		
		
		
		?>

	</main>
	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>