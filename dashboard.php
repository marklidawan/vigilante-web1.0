<!-- $data = array('message' => 'SIDHJFISD dsfg sdfiosd fdaf dfglj dfklg klfdghjkldhfgjk dfgjkndfjkg', '%number' => '09057288808' , '%status' => false); -->
<!-- header('Content-Type: application/json; charset=utf-8'); -->
<!-- echo json_encode($data); -->
<?php
    include 'connect.php';
    $report_message = "SELECT * FROM report LEFT JOIN user ON user.id = report.userId WHERE user.id = 1";
	// $sms_msg = "SELECT * FROM sms_message WHERE status = 0 LIMIT 1";
    $output = mysqli_query($conn, $report_message);
    // $output = mysqli_fetch_assoc(mysqli_query($conn, $report_message));
	// $student_search = $conn->query($report_message);
	// $row = $output->fetch_assoc();
	// if($student_search->num_rows>0){
        // header('Content-Type: application/json; charset=utf-8');
        // $data = array('id' => $row['id'], '%message' => $row['message'], '%number' => $row['number'], '%status' => $row['status'] ? true : false);
        // echo json_encode($data);
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel = "icon" type = "image/png" href = "/assets/Images/vigilante-logo.png">

    <!-- css -->
    <link rel="stylesheet" href="/assets/CSS/home.css">
    
    <!-- Leaflet plugin -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/> -->
    <!-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> -->

</head>
<body>
    <div class="layouts">
        <div id="header">
          <div class="header-container">
            <div class="logo">
                <img src="/assets/Images/vigilante-logo.png" alt="">
            </div>
            <div class="table">
                <table>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Timestamp</th>
                    </tr>
                    <?php 
                    while($row = $output->fetch_assoc()) {
                        echo "<tr>
                        <td>" .$row['fname'] . ' ' . $row['lname'] ."</td>
                        <td>" .$row['contactNumber']. "</td>
                        <td>" .$row['reportTimestamp']."</td>
                        </tr>";
                    }
                    // for($i = 0; $i < count($output); $i++) {
                    //     echo $row['id'];
                    // }
                    // foreach($output as $report) {
                        // echo $report;
                        // echo $report['fname'];
                        // echo $report['id'] . " <br/>";
                        // echo "<tr>
                        // <td>" .$report['fname'] . ' ' . $report['lname'] ."</td>
                        // <td>" .$report['contactNumber']. "</td>
                        // <td>Timestamp</td>
                        // </tr>";
                    // }
                    ?>
                </table>
            </div>
                    
            <div>
            <span>Total Unattended: 1 </span>
            </div>
          </div>
        </div>
        <!-- <div id="map"/> -->
      </div>
    </div>
</body>
</html>
<!-- <script>
    // Initialize map
    res1 = ['8.4834276','124.661025'];
    var map = L.map('map').setView([8.477217, 124.64592], 13);
    var res = res1;
    // Markers
    var gps = L.marker(res)
    .bindPopup("<strong>Name: </strong>Juan dela Cruz<br /><strong>Status:</strong> Unattended<br/><button class='button'>Attend</button>");
    
    var gps1 = L.marker(res) 
    .bindPopup("<strong>Name: </strong>Mark Lid-awan<br /><strong>Status:</strong> Unattended<br/><button class='button'>Attend</button>")
    .addTo(map);

    // Layer Group
    // var layerGroup = L.layerGroup([gps,gps1,gps2,gps3]) //[gps,gps1,gps2,gps3]
    // .addTo(map);

    // Delete
    map.on('click', function(){
        map.removeLayer(gps1);
    });

    // Map on click
    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
    }
    map.on('click', onMapClick);

    // Map
    var osm = L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=SQBQ9GFuIgQnIQjD3uVy', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
    maxZoom: 20,
    tileSize: 512,
    zoomOffset: -1,
    }).addTo(map);
</script> -->