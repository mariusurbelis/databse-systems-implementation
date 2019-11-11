<?php
function find_vehicle_from_regnumber($RegNumber)
{
    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con,'SELECT * FROM Vehicle where RegNumber = "' . $RegNumber . '";');
    
    while ($row = $result->fetch_assoc())
    {
        echo $row['Make']." ".$row['Model']."<br>";
    }
}
?>