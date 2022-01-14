<?php
    include 'connect.php';
    $user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : null;
    
	
	$sql = "SELECT verified FROM user WHERE id='$user_id'";
	$save = $conn->query($sql);
        
    if($save){
        echo json_encode(array('status' => "Success"));
	}else{
        echo json_encode("user_id is required");
    }
?>