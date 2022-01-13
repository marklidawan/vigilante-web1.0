<?php
    include 'connect.php';
    $user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : null;
    
	if($user_id) {
		$sql = "UPDATE user SET verified = 1 WHERE id=$user_id";
		$save = $conn->query($sql);
        
        echo json_encode(array('status' => "Success"));
        
	}else{
        echo json_encode("user_id is required");
    }
?>