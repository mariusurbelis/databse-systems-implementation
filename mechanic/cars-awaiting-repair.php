<?php

$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM Service INNER JOIN Vehicle ON Vehicle.RegNumber=Service.RegNumber WHERE Status='Incomplete';");

while ($row = $result->fetch_assoc()) {
    echo "<h5>" . $row['Make'] . " <b>" . $row['Model']."</b></h5>";
    echo '<p class="notes">' . $row['Notes'] . '</p><hr>';
}

mysqli_close($con);
?>