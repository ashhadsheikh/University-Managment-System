<?php

		session_start();
		
$RollNo = $_POST["RollNo"];
$opt = $_POST["operation"];
$_SESSION['RollNo']= $RollNo;
if($opt=='view'){
	header("Location: view_fee.php");
}
else if($opt=='change'){
header("Location: change_fee.php");
}
else{
header("Location: feeslip.php");
}
?>