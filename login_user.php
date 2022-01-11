<?php
    include 'connect.php';

    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;

    $query = "SELECT email,password FROM user WHERE email = '$email' and password = '$password'";

    $res = mysqli_query($conn,$query);
    $count = mysqli_num_rows($res);

    if($count==1){
        echo json_encode(array('status' => "Success"));
    }else{
        echo json_encode("Error");
    }
?>