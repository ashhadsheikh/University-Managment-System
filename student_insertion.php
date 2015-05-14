<?php

		
$RollNo = $_POST["rollno"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$father_name = $_POST["father_name"];
$gender = $_POST["gender"];
$bg = $_POST["bg"];
$Day = $_POST["Day"];
$Mon = $_POST["Mon"];
$Year = $_POST["Year"];
$cnic = $_POST["cnic"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$dept = $_POST["dep"];

$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"INSERT INTO student VALUES
        ($RollNo,  '$fname',  '$lname',  '$father_name',  '$gender',  '$bg',
        TO_DATE('$Day-$Mon-$Year', 'DD-MON-YYYY'),  $cnic, '$email', $phone,$dept)");
oci_execute($sql2);
$sql2 = oci_parse($conn,"INSERT INTO pass VALUES
        ('$RollNo',  '123',  'std')");
oci_execute($sql2);
oci_commit($conn);
header("Location: admin.php");

?>