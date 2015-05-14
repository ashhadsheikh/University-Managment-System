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
<h2 style="	position:absolute;left:30px;"> <br> Welcome 
<?php
session_start();
	$RollNo=$_SESSION['RollNo'] ;
		echo "$RollNo";	
	?> :)</h2>
<p style="	position:absolute;left:10px;top:150px;">


 <img src="./images/admin.png" alt="Smiley face" style="	position:absolute;top:50px;width:150px;height:150px;">
</p>

</p>


<button style="	position:absolute;left:170px;top:100px;"onclick="window.location.href='view_dept.php'">View Departments</button>
<button style="	position:absolute;left:170px;top:170px;"onclick="window.location.href='view_courses.php'">View Courses</button>
<button style="	position:absolute;left:170px;top:240px;"onclick="window.location.href='view_instructors.php'">View Instructors</button>
<button style="	position:absolute;left:170px;top:310px;"onclick="window.location.href='view_students.php'">View Students</button>




<button style="	position:absolute;left:300px;top:30px;"onclick="window.location.href='add_course.php'">Add Course</button>
<button style="	position:absolute;left:300px;top:100px;"onclick="window.location.href='add_department.php'">Add Department</button>
<button style="	position:absolute;left:300px;top:170px;"onclick="window.location.href='create_account.php'">Create account</button>
<button style="	position:absolute;left:300px;top:240px;"onclick="window.location.href='reset_password.php'">Reset password</button>
<button style="	position:absolute;left:300px;top:310px;"onclick="window.location.href='view_all.php'">View All accounts</button>



<button style="	position:absolute;left:430px;top:30px;"onclick="window.location.href='insert_student.php'">Add Student</button>
<button style="	position:absolute;left:430px;top:100px;"onclick="window.location.href='insert_instructor.php'">Add Instructor</button>
<button style="	position:absolute;left:430px;top:170px;"onclick="window.location.href='assign_course.php'">Assign Course</button>
<button style="	position:absolute;left:430px;top:240px;"onclick="window.location.href='change_password.php'">Change Password</button>
<button style="	position:absolute;left:430px;top:310px;"onclick="window.location.href='index.html'">Log Out</button>
</main>

<footer>
<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
</footer>


</body>



</html>