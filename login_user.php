<?php
    include 'connect.php';

    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;

    $query = "SELECT email,password,role FROM user WHERE email = '$email' and password = '$password' and role=0";
    mysqli_query($conn, $query);
    echo json_encode(array('status' => "Successfully created report"));
?>