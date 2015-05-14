<?php
	session_start();
		$roll= $_SESSION['RollNo'];
		$conn = oci_connect("system","123","localhost/xe");
		$count=0;
	foreach($_POST['courses'] as $value){
		$cid = substr($value, 0,-1);
		$section = substr($value,-1,3);
		$sql2 = oci_parse($conn,"insert into stakec VALUES('$roll','$section','$cid','NA',0)");
		oci_execute($sql2);
		$sql = oci_parse($conn,"insert into studatdnc VALUES('$roll','$cid','$section',0)");
		oci_execute($sql);
		oci_commit($conn);
		$count++;
	}
	$count*=15000;
	$sql = oci_parse($conn,"select add_months(trunc(sysdate),1) from dual");
		oci_execute($sql);
		$row=oci_fetch_array($sql);
		
	$sql = oci_parse($conn,"insert into fee VALUES($roll,'$row[0]',$roll)");
		oci_execute($sql);
			$sql = oci_parse($conn,"insert into feedesc VALUES($roll,'Tuition Fee',$count,0)");
		oci_execute($sql);
		$sql4 = oci_parse($conn,"insert into feedesc VALUES($roll,'Students Fund',8000,0)");
		oci_execute($sql4);
		$sql5 = oci_parse($conn,"insert into feedesc VALUES($roll,'Sports Fund',5000,0)");
		oci_execute($sql5);
		
		oci_commit($conn);
	
	header("Location: student.php");
?>