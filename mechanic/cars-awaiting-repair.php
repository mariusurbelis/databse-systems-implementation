<?php

include '../functions.php';

$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM Service WHERE Status = 'Incomplete';");

while ($row = $result->fetch_assoc()) {
    find_vehicle_from_regnumber($row['RegNumber']);
    echo $row['Notes']."<br>"; 
}

mysqli_close($con);
?>