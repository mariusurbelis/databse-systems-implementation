<?php

// Check connection
$conn = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
if ($conn->connect_error) {
    die("Could not connect: " . $conn->connect_error);
}

//search query
$sql = "SELECT service.ID FROM service";
$result = $conn->query($sql);


?>