<?php

		
$id = $_POST["id"];
$name = $_POST["name"];
$hours = $_POST["hours"];
$section = $_POST["section"];
$sem_name = $_POST["sem_name"];
$sem_year = $_POST["sem_year"];
$pre_req = $_POST["pre_req"];
$dept = $_POST["dep"];

$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"INSERT INTO course VALUES($id,'$name', $hours,'$section','$sem_name',$sem_year,$dept,$pre_req)");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");

?>