<?php
$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM PartType;");

while ($row = $result->fetch_assoc()) {
    echo $row['ID']." ".$row['PartDetails']." ".$row['Quantity']."<br>";
}

mysqli_close($con);
?>