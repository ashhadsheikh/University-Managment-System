<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" href="mainstyle2.css" type="text/css" />
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
<form method="POST" action="acd.php">
<ul class="first">
	<h2>	Student Roll No	</h2>
<input type="text" name="RollNo">
</ul>
<ul class="second">
	<h2>	Operation	</a></h2>
	<input type="radio" name="operation" value="print" >Print Admit Card<br>
	<input type="radio" name="operation" value="atdnc">View Attendance<br>
	<input type="radio" name="operation" value="fee">View Fee Status<br>
	<input type="radio" name="operation" value="transcript">Print Transcript<br>
	
</ul>
<ul class="third"><br>
<input type="submit" value="Submit">
</ul>
</form>
</main>

<footer>
<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
</footer>


</body>



</html>