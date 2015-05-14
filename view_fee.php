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
	<ul class="first">
	<h2>Due Date:</h2>
	<?php
session_start();
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from fee where reciept_no='$roll'");
oci_execute($sql2);
$row=oci_fetch_array($sql2);
echo "$row[1]<br>";

?>

	<h2>Amount Payable:</h2>
	<?php
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from feedesc where reciept_no='$roll'");
oci_execute($sql2);
$val=0;
while($row=oci_fetch_array($sql2)){
$val+=$row[2];
}

echo "$val<br>";

?>
	
<h2>Amount Paid:</h2>
		<?php
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from feedesc where reciept_no='$roll'");
oci_execute($sql2);
$val2=0;
while($row=oci_fetch_array($sql2)){
$val2+=$row[3];
}

echo "$val2<br>";

?>
<h2>Amount Remaining:</h2>
		<?php
$val-=$val2;

echo "$val<br>";

?>
	
	
	</ul>
	</main>

	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>