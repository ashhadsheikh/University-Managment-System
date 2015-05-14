<?php

		
$id = $_POST["id"];
$name = $_POST["name"];
$loc= $_POST["loc"];
$ph = $_POST["ph"];
$fax = $_POST["fax"];

$conn = oci_connect("system","123","localhost/xe");

$sql2 = oci_parse($conn,"INSERT INTO department VALUES
        ($id,  '$name',  '$loc',  $ph, $fax)");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");

?>