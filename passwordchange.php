<?php
session_start();
// store session data

$rollno = $_SESSION['RollNo'];
$old_pass = $_POST['old'];
$new_pass = $_POST['pwd'];

	$conn = oci_connect("system","123","localhost/xe");
	$sql = oci_parse($conn,"update pass set password=$new_pass where rollno='$rollno'");
	oci_execute($sql);
	//
	echo "Password Changed :)";
	header("Location: index.html");
?>