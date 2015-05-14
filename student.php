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
<h2 style="	position:absolute;left:30px;">  Student Info</h2>
<p style="	position:absolute;left:30px;top:50px;">

<?php
session_start();
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from student where roll_No='$roll'");
oci_execute($sql2);
$row=oci_fetch_array($sql2);
echo "Name: $row[1] $row[2]<br>";
echo"Father Name: $row[3]<br>";
echo"Gender: $row[4]<br>";
echo"Blood Group: $row[5]<br>";
echo"DOB: $row[6]<br>";
echo"CNIC: $row[7]<br>";
echo"Email: $row[8]<br>";
echo"Phone: $row[9]<br>";
?>
</p>
<h2 style="	position:absolute;left:30px;top:220px;">  University Info</h2>
<p style="	position:absolute;left:30px;top:270px;">
<?php
$roll= $_SESSION['RollNo'];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from student where roll_No='$roll'");
oci_execute($sql2);
$row=oci_fetch_array($sql2);
echo "RollNo: $row[0]<br>";
$sql3 = oci_parse($conn,"select * from department where D_No='$row[10]'");
oci_execute($sql3);
$row2=oci_fetch_array($sql3);
echo"Degree:  $row2[1]<br>";
echo"Batch: $row[0]<br>";
?>
</p>
<button style="	position:absolute;left:430px;top:30px;"onclick="window.location.href='registration.php'">Course Registration</button>
<button style="	position:absolute;left:430px;top:100px;"onclick="window.location.href='view_marks.php'">View Marks</button>
<button style="	position:absolute;left:430px;top:170px;"onclick="window.location.href='view_attendence.php'">View Attendence</button>
<button style="	position:absolute;left:430px;top:240px;"onclick="window.location.href='change_password.php'">Change Password</button>
<button style="	position:absolute;left:430px;top:310px;"onclick="window.location.href='index.html'">Log Out</button>
</main>

<footer>
<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
</footer>


</body>



</html>