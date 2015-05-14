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
<p style="top:70px; left:920px; position:absolute;">Welcome to 
<?php session_start(); 
$roll= $_SESSION['RollNo'];
echo"$roll";?>

</p><!-- dynamic -->

	<p style="top:90px;left:240px; position:absolute;">Semester: Semester 2014</p> <!-- dynamic -->
	<p style="top:90px;left:900px; position:absolute;">15/01/2014 to 15/05/2014 </p><!-- dynamic -->
	

	<main style="overflow:scroll">
<?php
		
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$sql2 = oci_parse($conn,"select * from stakec where roll_no='$roll'");
		oci_execute($sql2);
		while($row=oci_fetch_array($sql2))
		{
		$sql = oci_parse($conn,"select * from course where C_id='$row[2]' and sec='$row[1]'");
		oci_execute($sql);
		$row2=oci_fetch_array($sql);
		
			echo "<h2>$row2[1] $row2[3]</h2>";
			echo"<TABLE BORDER=1 >";
			echo"<TR><TH>Date</TH><TH>Duration </TH><TH>Status</TH><TH>Percentage</TH></TR>";
			$total=0;
			$attend=0;
			$sql3 = oci_parse($conn,"select * from attendance where C_id='$row[2]' and sec='$row[1]'");
			$C_id=$row[2];
			$sec=$row[1];
			oci_execute($sql3);
			while($row3=oci_fetch_array($sql3)){
			$sql4 = oci_parse($conn,"select * from studattend where roll_no='$roll' and attenddate='$row3[0]'");
			oci_execute($sql4);
			$row4=oci_fetch_array($sql4);
			echo"<TR><TD>$row3[0] </TD><TD>$row3[1] </TD><TD>$row4[2]</TD></TR>";
			$total+=$row3[1];
			if($row4[2]=='P'){
			$attend+=$row3[1];
			}
			else if($row4[2]=='L'){
			$attend+=($row3[1]/2);
			}

			}
			$perc=($attend/$total)*100;
			$perc=round($perc,2);
		echo"<TR><TH>TOTAL </TH><TH>$total </TH><TH>$attend</TH><TH>$perc</TH></TR>";
		echo"</TABLE>";
		}		
		$sql5 = oci_parse($conn,"update studatdnc set atdnc=$perc where roll_no='$roll' and c_id=$C_id and sec='$sec'");
			oci_execute($sql5);
			oci_commit($conn);
?>

	</main>
	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>