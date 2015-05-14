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
<h2 style="	position:absolute;left:170px;top:15px;">  Instructor Info</h2>
<p style="	position:absolute;left:170px;top:70px;">


<?php
session_start();
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from instructor where emp_id='$roll'");
oci_execute($sql2);
$row=oci_fetch_array($sql2);
echo "Name: $row[1] $row[2]<br>";
echo"Gender: $row[3]<br>";
echo"Blood Group: $row[4]<br>";
echo"DOB: $row[5]<br>";
echo"CNIC: $row[6]<br>";
echo"Email: $row[7]<br>";
echo"Phone: $row[8]<br>";
?>
</p>

<button style="	position:absolute;left:30px;top:30px;"onclick="window.location.href='cources.php'">Courses</button>
<button style="	position:absolute;left:30px;top:100px;"onclick="window.location.href='change_password.php'">Change Password</button>
<button style="	position:absolute;left:30px;top:170px;"onclick="window.location.href='index.html'">Log Out</button>
</main>

<footer>
<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
</footer>


</body>



</html>