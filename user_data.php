<?php
    include 'connect.php';

    $email = isset($_GET['email']) ? $_GET['email'] : null;

    $query = "SELECT * FROM user WHERE email = '$email'";

    $res = mysqli_query($conn,$query);
    $row = $res->fetch_assoc();
    $count = mysqli_num_rows($res);

    if($count==1){
        echo json_encode(
            array(
                'status' => "Success",
                'id' => $row['id'],
                'email' => $row['email'],
                'fname' => $row['fname'],
                'mname' => $row['mname'],
                'lname' => $row['lname'],
                'gender' => $row['gender'],
                'address' => $row['address'],
                'contactNumber' => $row['contactNumber'],
                'emergencyNumber' => $row['emergencyNumber'],
                'verified' => $row['verified'],
                'verificationCode' => $row['verificationCode']
            )
        );
    }else{
        echo json_encode("Error");
    }
?>