<?php

$api_key = $_GET['api_key'];

if(!isset($api_key))
    die();
else
    if ($api_key != "ashome")
        die();

$command = $_GET['command'];

if ($command == "searchparts") {
    $partquery = $_GET['part'];
    search_parts($partquery);
}

function search_parts($partsearch) {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT PartType.ID, PartType.PartDetails, Stock.Quantity
FROM Stock
INNER JOIN PartType ON Stock.PartTypeID = PartType.ID
WHERE Stock.BranchID='DD1'
AND PartType.PartDetails LIKE '%" . $partsearch . "%';");

    while ($row = $result->fetch_assoc()) {
        echo json_encode(
            array(
                'Quantity'      =>  $row["Quantity"],
                'ID'            =>  $row["ID"],
                'PartDetails'   =>  $row["PartDetails"]
            )
        );
    }
    mysqli_close($con);
}

?>