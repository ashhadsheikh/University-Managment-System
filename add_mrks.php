<?php
		session_start();
$name=$_SESSION['name'];
$no=$_SESSION['no'];
$c_id=$_SESSION['C_ID'];
$sec=$_SESSION['sec'];
$conn = oci_connect("system","123","localhost/xe");
		$sql = oci_parse($conn,"select roll_no from stakec where c_id='$c_id' and sec='$sec'");
			oci_execute($sql);	
	foreach($_POST['MyArray'] as $value){
		$mrks = $value;
		echo"$mrks<br>";
			$row2=oci_fetch_array($sql);
		 $sql2 = oci_parse($conn,"insert into assesmarks VALUES('$name','$no',$row2[0],$mrks)");
		oci_execute($sql2);
		oci_commit($conn);
	}
header("Location: instructor.php");
?>