<?php
session_start();
// store session data

$RollNo = $_POST["RollNo"];
$pwd = $_POST["pwd"];
$_SESSION['RollNo']=$RollNo ;
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"select * from pass where rollno='$RollNo'");
oci_execute($sql2);
$row=oci_fetch_array($sql2);
if($row[1]==$pwd){
	if($row[0]==$RollNo){
		if($row[2]=='acdm'){
	header("Location: academic_office.php");
	}
	else if($row[2]=='acc'){
	header("Location: account_office.php");
	}
		else if($row[2]=='instr'){
	header("Location: instructor.php");
	}
		else if($row[2]=='admin'){
	header("Location: admin.php");
	}
	else if ($row[2]=='std'){
	header("Location: student.php");
	}
	}
	else{
		header("Location: index.html");
	}
}
else{
header("Location: index.html");
}
?>