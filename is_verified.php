<?php
    include 'connect.php';
    $user_id = isset($_GET["user_id"]) ? $_GET["user_id"] : null;
    
	
	$sql = "SELECT verified FROM user WHERE id='$user_id' and verified=1";
    $res = mysqli_query($conn,$sql);
    $row = $res->fetch_assoc();
    $count = mysqli_num_rows($res);
        
    if($count==1){
        echo json_encode("Success");
	}else{
        echo json_encode("Error");
    }
?>