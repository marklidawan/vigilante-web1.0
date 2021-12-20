<?php
    include 'connect.php';

    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;
    $fname = isset($_GET['fname']) ? $_GET['fname'] : null;
    $mname = isset($_GET['mname']) ? $_GET['mname'] : null;
    $lname = isset($_GET['lname']) ? $_GET['lname'] : null;
    $gender = isset($_GET['gender']) ? $_GET['gender'] : null;
    $address = isset($_GET['address']) ? $_GET['address'] : null;
    $contactNumber = isset($_GET['contact_number']) ? $_GET['contact_number'] : null;
    $emergencyNumber = isset($_GET['emergency_number']) ? $_GET['emergency_number'] : null;

    $query = "INSERT INTO user (email, password, fname, mname, lname, gender, address, contactNumber,emergencyNumber) VALUES ('$email','$password','$fname','$mname','$lname','$gender','$address','$contactNumber','$emergencyNumber')";
    mysqli_query($conn, $query);
    echo json_encode(array('status' => "Successfully created report"));
?>