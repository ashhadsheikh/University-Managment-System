<?php
session_start();
$c_id=$_SESSION['C_ID'];
$sec=$_SESSION['sec'];
$name = $_POST["name"];
$no = $_POST["no"];
$marks = $_POST["marks"];
$weightage = $_POST["weightage"];
echo" $c_id $sec $name $no $marks $weightage";
$conn = oci_connect("system","123","localhost/xe");
 $sql2 = oci_parse($conn,"INSERT INTO assesment VALUES
        ('$name',  $no, $marks,  $weightage,  '$sec',
        $c_id)");
oci_execute($sql2);
header("Location: update_marks.php"); 

?>
