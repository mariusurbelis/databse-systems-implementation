<?php
$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM vehicle;");
//mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) VALUES ('Glenn','Quagmire',33)");

while ($row = $result->fetch_assoc()) {
    //echo $row['Address']."<br>";
    echo  $row['Make']. " " . $row['Model'] . '<br>' . $row['RegNumber'] . '<br>' . $row['Mileage'] . '<br>';
    find_client_by_id($row['ClientID']);
    echo '<br><br>';

}

mysqli_close($con);


function find_client_by_id($clientID) {
    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM client where ID = " . $clientID . ";");
    //mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) VALUES ('Glenn','Quagmire',33)");

    while ($row = $result->fetch_assoc()) {
        //echo $row['Address']."<br>";
        echo '<b>Owner:</b> ' . $row['FName']  . ' ' . $row['LName'] . '<br><br>';

    }

    mysqli_close($con);
}

?>