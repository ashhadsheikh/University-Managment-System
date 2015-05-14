<?php

		
$uname = $_POST["uname"];
$conn = oci_connect("system","123","localhost/xe");

$sql2 = oci_parse($conn,"UPDATE pass
SET password='123'
WHERE rollno='$uname'");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");

?>