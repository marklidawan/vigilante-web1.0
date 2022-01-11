<?php
    include 'connect.php';

    $email = isset($_GET['email']) ? $_GET['email'] : null;
    $password = isset($_GET['password']) ? $_GET['password'] : null;

    $query = "SELECT email,password FROM user WHERE email = '$email' and password = '$password'";
    mysqli_query($conn, $query);
    echo json_encode(array('status' => "Success"));
?>