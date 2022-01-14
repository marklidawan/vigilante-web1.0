<?php
    include 'connect.php';

    $userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;
    $emergencyType = isset($_GET['emergency_type']) ? $_GET['emergency_type'] : null;
    $coords = isset($_GET['coords']) ? $_GET['coords'] : null;
    $connection_type = isset($_GET['connection_type']) ? $_GET['connection_type'] : null;

    $query = "INSERT INTO report (emergencyType, coords, userId,connectionType) VALUES ('$emergencyType','$coords','$userId','$connection_type')";
    mysqli_query($conn, $query);
    echo json_encode(array('status' => "Successfully created report"));
?>