<?php
		session_start();
		
$RollNo = $_POST["RollNo"];
$opt = $_POST["operation"];
$_SESSION['RollNo']= $RollNo;
if($opt=='fee'){
	header("Location: view_fee.php");
}
else if($opt=='atdnc'){
header("Location: view_attendence.php");
}
elseif($opt=='print'){
header("Location: admitcard.php");
}

elseif($opt=='transcript'){
header("Location: transcript.php");
}
?>