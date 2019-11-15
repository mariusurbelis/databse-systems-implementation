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
} else if ($command == "getclient") {
    if (isset($_GET['clientid'])) {
        retrieve_client();
    } else {
        die();
    }
} else if ($command == "editclientset") {
    if (isset($_GET['clientdata'])) {
        set_client();
    } else {
        die();
    }
} else if ($command == "servicesearch") {
    if (isset($_GET['serviceid'])) {
        service_search();
    } else {
        die();
    }
} else if ($command == "getnotes") {
    if (isset($_GET['serviceid'])) {
        get_notes();
    } else {
        die();
    }
} else if ($command == "mechanicdata") {
    if (isset($_GET['branchid'])) {
        mehcanic_data();
    } else {
        die();
    }
}

function mehcanic_data() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM servicedetails WHERE BranchID='" . $_GET['branchid'] . "';");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function search_parts($partsearch) {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM partsearch WHERE PartDetails LIKE '%" . $partsearch . "%';");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function get_notes() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT Notes FROM Service WHERE ID=" . $_GET['serviceid'] . ";");

    echo strval($result->fetch_row()[0]);
    mysqli_close($con);
}

function service_search() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM Service WHERE ID=" . $_GET['serviceid'] . ";");

    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
        mysqli_close($con);
        die();
    }

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

function get_awaiting_repair() {
    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM Service INNER JOIN Vehicle ON Vehicle.RegNumber=Service.RegNumber WHERE Status='Incomplete';");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);


    //    while ($row = $result->fetch_assoc()) {
    //         $row['Make'] $row['Model'] $row['Notes']
    //    }
    //
    //    mysqli_close($con);
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

function retrieve_client()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    $result = mysqli_query($con, 'SELECT * from client WHERE ID =' . $_GET['clientid'] . ';')or die("Client data can not be retrieved, possibly incorrect ID");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function set_client()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    $json = $_GET['clientdata'];
    $clientdata = json_decode($json);

    mysqli_query($con, 
                 'UPDATE client 
        SET
        FName = "' . $clientdata->{'FName'} . '",
        LName = "' . $clientdata->{'LName'} . '",
        ContactNumber = "' . $clientdata->{'ContactNumber'} . '",
        Address = "' . $clientdata->{'Address'} . '",
        Email = "' . $clientdata->{'Email'} . '"  
        WHERE ID = ' . $clientdata->{'ID'} . ' ;');

    mysqli_close($con);
}
