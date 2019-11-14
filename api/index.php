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
} else if ($command == "addclient") {
    if (isset($_GET['data'])) {
        add_client();
    } else {
        die();
    }
} else if ($command == "deleteclient") {
    if (isset($_GET['clientid'])) {
        delete_client();
    } else {
        die();
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

function add_client() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $json = $_GET['data'];
    
    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO client values(
        NULL,
        "' . $data->{'FName'} . '",
        "' . $data->{'LName'} . '",
        "' . $data->{'ContactNumber'} . '",
        "' . $data->{'Address'} . '",
        "' . $data->{'Email'} . '"  
    );');
}

function delete_client() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    mysqli_query($con, 'DELETE from client WHERE ID =' . $_GET['clientid'] . ';')or die("Client can not be deleted, possibly has a vehicle assigned");



    echo "Client with id ". $_GET['clientid'] ." was deleted";
}

?>