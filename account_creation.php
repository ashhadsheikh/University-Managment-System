<?php

		
$uname = $_POST["uname"];
$pwd= $_POST["pwd"];
$desig = $_POST["desig"];


$conn = oci_connect("system","123","localhost/xe");

$sql2 = oci_parse($conn,"INSERT INTO pass VALUES
        ('$uname',  '$pwd',  '$desig')");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");

?>