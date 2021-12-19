<?php
    include 'connect.php';
	$status = isset($_GET["status"]) ? $_GET["status"] : null;
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
	$error_sms_status = isset($_GET["error_status"]) ? $_GET["error_status"] : false;
	$error_sms_remarks = isset($_GET["error_sms_remarks"]) ? $_GET["error_sms_remarks"] : null;
	if($id) {
		$sms_msg = "SELECT * FROM sms_message WHERE id = '$id'";
		$student_search = $conn->query($sms_msg);
		$row = $student_search->fetch_assoc();
		if($student_search->num_rows>0){
			$que = "UPDATE sms_message SET status = '$status' WHERE id = '$id'";
			$save = $conn->query($que);
		}
	}
?>