<?php

$C_ID = $_POST["course"];
$instr = $_POST["instr"];
$section=$_POST["section"];
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"INSERT INTO TteachesC VALUES('$instr',  '$section',  $C_ID)");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");
?>