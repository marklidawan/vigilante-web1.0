<?php
ob_start();
session_start();
include("connect.php");
    if(empty($_SESSION['login_user'])){
    header("Location:index.php");
    exit;
    }
    $user = $_SESSION['login_user'];
    $station_id = "SELECT id FROM authority WHERE username='$user'";
    $station_id_conn = mysqli_query($conn, $station_id);
    $station_id_output = $station_id_conn->fetch_assoc();

    $report_message = "SELECT * FROM report LEFT JOIN user ON user.id = report.userId WHERE report.status = 0";
	$unattended = "SELECT COUNT(status) as total FROM report WHERE status = 0";
    
    $output = mysqli_query($conn, $report_message);
    $output2 = mysqli_query($conn, $unattended);
    $unattended_output = $output2->fetch_assoc();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel = "icon" type = "image/png" href = "assets/Images/vigilante-logo.png">

    <!-- css -->
    <link rel="stylesheet" href="./assets/CSS/home.css">
    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Leaflet plugin -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>


</head>
<body>
    <div class="layouts">
        <div id="header">
          <div class="header-container">
            <div class="logo">
                <img src="assets/Images/vigilante-logo.png" alt="">
            </div>
            <div class="table">
                <table>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Timestamp</th>
                    <th>Emergency Type</th>
                    <th>Action</th>
                    </tr>
                    <?php
                    while($row = $output->fetch_assoc()) {
                     echo "<tr class='view-map-coordinate' id='view-map-coordinate' data-id=".$row['userId']." data-coordinate=".$row['coords']." data-fname=".$row['fname']." data-lname=".$row['lname']."  data-status=".$row['status'].">
                        <td>" .$row['fname'] . ' ' . $row['lname'] ."</td>
                        <td>" .$row['contactNumber']. "</td>
                        <td>" .$row['reportTimestamp']."</td>
                        <td>" .$row['emergencyType']."</td>
                        <td><input type='button' value='Attend' class='button' id='remove-btn-marker'/></td>
                        </tr>";
                    }
                    ?>

                </table>
            </div>
            
            <div>
                <span>Total Unattended: <?php echo $unattended_output['total'] ?> </span><br>
                <button class="button"><a href="logout.php">Logout</a></button>
                
            </div>
          </div>
        </div>
        <div id="map">
      </div>
    </div>
</body>
</html>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    $( document ).ready(function() {
        // Initialize map
        var map = L.map('map').setView([8.477217, 124.64592], 13);
        var markerArray = [];
        // Map
        var osm = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=SQBQ9GFuIgQnIQjD3uVy', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
        maxZoom: 20,
        tileSize: 512,
        zoomOffset: -1,
        }).addTo(map);

        $('body').on('click','#view-map-coordinate',function() {
            var coordinates = JSON.parse($(this).attr('data-coordinate'));
            var fname = $(this).attr('data-fname');
            var lname = $(this).attr('data-lname');
            var status = $(this).attr('data-status');
            var status_code;
            switch(status){
                case "0":
                    status_code = "Unattended";
                    break;
                case "1":
                    status_code = "Attended";
                    break;
            }
            var getArrLength = markerArray.length > 0 ? markerArray.length - 1 : 0;

            var gps1 = L.marker(coordinates)
            .bindPopup("<strong>Name: </strong>" + fname +' '+ lname+"<br /><strong>Status:</strong>" +status_code+"<br/>") //<input type='button' value='Attend' class='button' data-marker-coordinates="+ JSON.stringify(coordinates) + " data-leaflet-id="+getArrLength+" id='remove-btn-marker'/>
            .addTo(map);
            markerArray.push(gps1._leaflet_id);
        });

        $('body').on('click','#remove-btn',function(){
            
        });
    });

</script>