<?php
    include 'connect.php';
    $id = isset($_GET["id"]) ? $_GET["id"] : null;
	if($id) {
		$sms_msg = "SELECT * FROM report WHERE id = '$id'";
		$student_search = $conn->query($sms_msg);
		$row = $student_search->fetch_assoc();
		if($student_search->num_rows>0){
			$que = "UPDATE report SET status = 1 WHERE id = '$id'";
			$save = $conn->query($que);
            echo json_encode(array('status' => "Successfully attended report"));
		}
	}
?>