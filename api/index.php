<?php

$api_key = $_GET['api_key'];

if(!isset($api_key))
    die();
else
    if ($api_key != "ashome")
        die();

if (isset($_GET['command']))
    $command = $_GET['command'];
else
    die();

if ($command == "searchparts") {
    if (isset($_GET['part'])) {
        $partquery = $_GET['part'];
        search_parts($partquery);
    } else {
        search_parts("");
    }
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

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

?>