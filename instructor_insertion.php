<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$bg = $_POST["bg"];
$Day = $_POST["Day"];
$Mon = $_POST["Mon"];
$Year = $_POST["Year"];
$cnic = $_POST["cnic"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$room=$_POST["room"];
$dept = $_POST["dep"];

$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"INSERT INTO instructor VALUES
        ('$fname.$lname',  '$fname',  '$lname',  '$gender',  '$bg',
        TO_DATE('$Day-$Mon-$Year', 'DD-MON-YYYY'),  $cnic, '$email', $phone,$room,$dept)");
oci_execute($sql2);
$sql = oci_parse($conn,"INSERT INTO pass VALUES
        ('$fname.$lname',  '123',  'instr')");
oci_execute($sql);
oci_commit($conn);
header("Location: admin.php");

?>