<?php
		session_start();
		$c_id=$_SESSION['C_ID'];
$sec=$_SESSION['sec'];
$Day=$_SESSION['Day'];
$Mon=$_SESSION['Mon'];
$Year=$_SESSION['Year'];
$conn = oci_connect("system","123","localhost/xe");
		$sql = oci_parse($conn,"select roll_no from stakec where c_id='$c_id' and sec='$sec'");
			oci_execute($sql);	
	foreach($_POST['status'] as $value){
		$mrks = $value;
		echo"$mrks<br>";
			$row2=oci_fetch_array($sql);
		 $sql2 = oci_parse($conn,"insert into studattend VALUES(TO_DATE('$Day-$Mon-$Year', 'DD-MON-YYYY'),$row2[0],'$value')");
		oci_execute($sql2);
		oci_commit($conn);
	}
header("Location: instructor.php");
		?>