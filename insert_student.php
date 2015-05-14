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
<form method="POST" action="student_insertion.php">

<div style="margin-left:70px; width:570px;">
<div style="margin-left:70px;">
<h3>Student DATA</h3>
Student ID<input type="text" name="rollno" style="margin-left:25px;"><br><br>
First Name<input type="text" name="fname" style="margin-left:25px;"><br><br>
Last Name<input type="text" name="lname" style="margin-left:25px;"><br><br>
Father's name<input type="text" name="father_name" style="margin-left:25px;"><br><br>

Gender  <select name="gender" >
				<option value="M">Male</option>
				<option value="F">Female</option>
				</select><br><br>
Blood Group<select name="bg" >
				<option value="A+">A+</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B-">B-</option>
				<option value="O+">O+</option>
				<option value="O-">O-</option>
				<option value="AB+">AB+</option>
				<option value="AB-">AB-</option>
				</select><br><br>
Date Of Birth  <select name="Day" >
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				
			</select>
			
			<select name="Mon" >
				<option value="JAN">January</option>
				<option value="FEB">February</option>
				<option value="MAR">March</option>
				<option value="APR">April</option>
				<option value="MAY">May</option>
				<option value="JUN">June</option>
				<option value="JUL">July</option>
				<option value="AUG">August</option>
				<option value="SEP">September</option>
				<option value="OCT">October</option>
				<option value="NOV">November</option>
				<option value="DEC">December</option>
				
			</select>
			
						<select name="Year">
						<option value="1985">1985</option>
				<option value="1986">1986</option>
				<option value="1987">1987</option>
				<option value="1988">1988</option>
				<option value="1989">1989</option>
				<option value="1990">1990</option>
				<option value="1991">1991</option>
				<option value="1992">1992</option>
				<option value="1993">1993</option>
				<option value="1994">1994</option>
				<option value="1995">1995</option>
				<option value="1996">1996</option>
				<option value="1997">1997</option>
				
			</select><br><br>

CNIC<input type="text" name="cnic" style="margin-left:25px;"><br><br>
Email<input type="text" name="email" style="margin-left:25px;"><br><br>
Phone<input type="text" name="phone" style="margin-left:25px;"><br><br>
Department  <?php
		$conn = oci_connect("system","123","localhost/xe");

	$sql2 = oci_parse($conn,"select * from department");
		oci_execute($sql2);	
	echo"<select name='dep' >";
			
		while($row=oci_fetch_array($sql2))
		{
			
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo"</select>";
		?><br><br>
<input type="submit" value="submit" style="margin-left:25px;"> <br>
</div>

</form>

</body>