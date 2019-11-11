<?php
$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM client;");
//mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) VALUES ('Glenn','Quagmire',33)");

while ($row = $result->fetch_assoc()) {
    //echo $row['Address']."<br>";
    echo $row['FName']  . ' ' . $row['LName']."<br>" . $row['Address']. '<br>' . $row['ContactNumber'] . ' <br> '. $row['Email'] .'<br><br>';

}

mysqli_close($con);
?>