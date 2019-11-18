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
        mechanic_data();
    } else {
        die();
    }
} else if ($command == "repairdone") {
    if (isset($_GET['serviceid'])) {
        repair_done();
    } else {
        die();
    }
} else if ($command == "startrepair") {
    if (isset($_GET['serviceid']) && isset($_GET['mechanicid'])) {
        start_repair();
    } else {
        die();
    }
} else if ($command == "resumerepair") {
    if (isset($_GET['serviceid'])) {
        resume_repair();
    } else {
        die();
    }
} else if ($command == "delayrepair") {
    if (isset($_GET['serviceid'])) {
        delay_repair();
    } else {
        die();
    }
} else if ($command == "usepart") {
    if (isset($_GET['partid']) && isset($_GET['branchid'])) {
        use_part();
    } else {
        die();
    }
} else if ($command == "orderpart") {
    if (isset($_GET['partid'])) {
        order_part();
    } else {
        die();
    }
} else if ($command == "getbranchstaff") {
    if (isset($_GET['branchid'])) {
        get_branch_staff();
    } else {
        die();
    }
} else if ($command == "addvehicle") {
    if (isset($_GET['data'])) {
        add_vehicle();
    } else {
        die();
    }
} else if ($command == "getvehicle") {
    if (isset($_GET['regnumber'])) {
        retrieve_vehicle();
    } else {
        die();
    }
} else if ($command == "editvehicleset") {
    if (isset($_GET['vehicledata'])) {
        set_vehicle();
    } else {
        die();
    }
} else if ($command == "deletevehicle") {
    if (isset($_GET['regnumber'])) {
        delete_vehicle();
    } else {
        die();
    } 
} else if ($command == "addservice") {
    if (isset($_GET['data'])) {
        add_client();
    } else {
        die();
    }
} else if ($command == "viewservice") {
    if (isset($_GET['data'])) {
        add_client();
    } else {
        die();
    }
} else if ($command == "deleteservice") {
    if (isset($_GET['data'])) {
        add_client();
    } else {
        die();
    }
} else if ($command == "getsuppliers") {
    get_suppliers();
} else if ($command == "addsupplier") {
    if (isset($_GET['data'])) {
        add_supplier();
    } else {
        die();
    }
}

function mechanic_data() {
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

    mysqli_query($con, 'CALL AddClientVehicleService(
        "' . $data->{'FName'} . '",
        "' . $data->{'LName'} . '",
        "' . $data->{'ContactNumber'} . '",
        "' . $data->{'Address'} . '",
        "' . $data->{'Email'} . '"
        "' . $data->{'RegNumber'} . '",
        "' . $data->{'Make'} . '",
        "' . $data->{'Model'} . '",  
        ' . $data->{'Mileage'} . ',
        "' . $data->{'ServiceStart'} . '",
        "' . $data->{'ServiceExpectedEnd'} . '",
        "' . $data->{'Notes'} . '",
    );');
    mysqli_close($con);
}

function add_supplier() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'CALL AddSupplier(
        "' . $data->{'Name'} . '",
        "' . $data->{'ContactNumber'} . '",
        "' . $data->{'Address'} . '"
    );');
    mysqli_close($con);
}

function add_service() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'CALL AddService(
        "' . $data->{'ServiceStart'} . '",
        "' . $data->{'ServiceExpectedEnd'} . '",
        "' . $data->{'Notes'} . '",
        "' . $data->{'BranchID'} . '",
        "' . $data->{'RegNumber'} . '",
    );');
    mysqli_close($con);
}

function add_vehicle() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO vehicle values(
        NULL,
        "' . $data->{'RegNumber'} . '",
        "' . $data->{'Make'} . '",
        "' . $data->{'Model'} . '",
        ' . $data->{'Mileage'} . ',
        ' . $data->{'ClientID'} . '  
    );');
    mysqli_close($con);
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
}

function get_suppliers() {
    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM Supplier;");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function delete_client() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    mysqli_query($con, 'CALL DeleteClient(' . $_GET['clientid'] . ');')or die("Client can not be deleted, possibly has a vehicle assigned");
    echo "Client with id ". $_GET['clientid'] ." was deleted";
    mysqli_close($con);
}

function retrieve_client()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    $result = mysqli_query($con, 'CALL GetClientData(' . $_GET['clientid'] . ');')or die("Client data can not be retrieved, possibly incorrect ID");

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

    mysqli_query($con, 'CALL SetClientData(
        "' . $clientdata->{'ID'} . '",
        "' . $clientdata->{'FName'} . '",
        "' . $clientdata->{'LName'} . '",
        "' . $clientdata->{'ContactNumber'} . '",
        "' . $clientdata->{'Address'} . '",
        "' . $clientdata->{'Email'} . '",
    );');

    mysqli_close($con);
}

function repair_done()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($con, 'CALL SetServiceStatusCompleted(' . $_GET['serviceid'] . ');');
    mysqli_close($con);

}

function delay_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($con, 'CALL SetServiceStatusDelayed(' . $_GET['serviceid'] . ');');

    mysqli_close($con);
}

function get_branch_staff()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, 'CALL GetBranchStaff("' . $_GET['branchid'] . '");');

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function use_part()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($con, 'CALL RemoveOneFromStock("' . $_GET['branchid'] . '",' . $_GET['partid'] . ');');
    mysqli_close($con);
}

function resume_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($con, 'CALL SetServiceStatusInProgress(' . $_GET['serviceid'] . ');');
    mysqli_close($con);
}

function start_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($con, 'CALL StartRepair(' . $_GET['serviceid'] . ',' . $_GET['mechanicid'] . ');');
    mysqli_close($con);
}

function retrieve_vehicle()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    $result = mysqli_query($con, 'SELECT * from vehicle WHERE RegNumber ="' . $_GET['regnumber'] . '";')or die("\Vehicle data can not be retrieved, possibly incorrect Reg number");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function set_vehicle()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    $json = $_GET['vehicledata'];
    $vehicledata = json_decode($json);

    mysqli_query($con, 
                 'UPDATE vehicle 
        SET
        RegNumber = "' . $vehicledata->{'RegNumber'} . '",
        Make = "' . $vehicledata->{'Make'} . '",
        Model = "' . $vehicledata->{'Model'} . '",
        Mileage = ' . $vehicledata->{'Mileage'} . ',
        ClientID= ' . $vehicledata->{'ClientID'} . '  
        WHERE RegNumber = "' . $vehicledata->{'RegNumber'} . '";');

    mysqli_close($con);
}

function delete_vehicle() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }    

    mysqli_query($con, 'CALL DeleteVehicle("' . $_GET['regnumber'] . '");')or die("Vehicle can not be deleted, possibly has a client assigned");
    echo 'vehicle with Reg Number '. $_GET['regnumber'] . ' was deleted';
    mysqli_close($con);
}

/*function order_part()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $json = $_GET['partdata'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO PartRequest values(
        NULL,
        ' . 5 . ',
        ' . 0 . ',
        " 2019-03-04 12:46:46 ",
        "' . $data->{'BranchID'} . '",
        "' . $data->{'Email'} . '"  
    );');
}*/