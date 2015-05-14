<?php

		session_start();
		
$RollNo = $_SESSION['RollNo'];
$amount = $_POST["amount"];
$category = $_POST["category"];
if($category=='1'){
//tuition	
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+'$amount' where reciept_no='$RollNo' and  fee_desc='Tuition Fee'");
oci_execute($sql2);
}
else if($category=='2'){
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+$amount where reciept_no=$RollNo and fee_desc='Sports Fund'");
oci_execute($sql2);
//sports
}
else if($category=='3'){
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+$amount where reciept_no=$RollNo and fee_desc='Students Fund'");
oci_execute($sql2);
//student
}
else if($category=='4'){
$conn = oci_connect("system","123","localhost/xe");
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+amount_payable where reciept_no='$RollNo' and  fee_desc='Tuition Fee'");
oci_execute($sql2);
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+amount_payable where reciept_no=$RollNo and fee_desc='Students Fund'");
oci_execute($sql2);
$sql2 = oci_parse($conn,"update feedesc set amount_paid=amount_paid+amount_payable where reciept_no=$RollNo and fee_desc='Sports Fund'");
oci_execute($sql2);
//student
}
header("Location: account_office.php");
?>