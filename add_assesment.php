	<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle3.css" type="text/css" />
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
	<form action='update_marks.php' method='post'>
	<ul class="first"><h2>Name   <select name="name" >
				<option value="Quiz">Quiz</option>
				<option value="Assignment">Assignment</option>
				<option value="Project">Project</option>
				<option value="Sessional">Sessional</option>
				<option value="Final">Final</option>
				<option value="CP">CP</option>
				<option value="CP">Lab</option>
				</select> -<select name="no" >
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				</select></h2><br>
	<h2>Total Marks      <input type="text" name="marks"></h2><br>
	<h2>Weightage      <input type="text" name="weightage"></h2><br>
	
	</ul>
	
	<ul class="third"><input type="submit" value="Add"></ul>
	</form>
	</main>

	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>