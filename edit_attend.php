<?php
$roll=$_POST["roll"];
$status = $_POST["Status"];
$Day = $_POST["Day"];
$Mon = $_POST["Mon"];
$Year = $_POST["Year"];
$conn = oci_connect("system","123","localhost/xe");
 $sql2 = oci_parse($conn,"update studattend set status=$status where roll_no='$roll' and  a_name='$name' and a_num='$no'");
oci_execute($sql2);
oci_commit($conn);
?>