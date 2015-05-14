<?php
$roll=$_POST["roll"];
$name = $_POST["name"];
$no = $_POST["no"];
$marks = $_POST["marks"];
$conn = oci_connect("system","123","localhost/xe");
 $sql2 = oci_parse($conn,"update assesmarks set marks_obt=$marks where roll_no='$roll' and  a_name='$name' and a_num='$no'");
oci_execute($sql2);
oci_commit($conn);
		
		
		
		?>