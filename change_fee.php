	<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle6.css" type="text/css" />
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
	<ul class="first"><h2>Amount Payable</h2>
	<?php
session_start();
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from feedesc where reciept_no='$roll'");
oci_execute($sql2);
$val=0;
while($row=oci_fetch_array($sql2)){
$am=$row[2]-$row[3];
echo "$row[1] : $am<br>";
$val+=$am;
}

echo "Total :$val<br>";

?>
<h2>Due Date</h2>
	<?php
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from fee where reciept_no='$roll'");
oci_execute($sql2);
$val=0;
$row=oci_fetch_array($sql2);
echo "$row[1] <br>";


?>
	<form method="POST" action="chfee.php">
	<h2>Amount</h2><input type="text" name="amount">
	<h2>Category</h2><select name="category">
		<option value="1">Tuition Fee</option>
		<option value="2">Sports Fund</option>
		<option value="3">Student Fund</option>
		<option value="4">All</option>
	</select>
	<br><br><br>
	<input type="submit" value="Save"></ul>
	</form>
	</main>

	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>