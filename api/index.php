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
} else if ($command == "addstaff") {
    if (isset($_GET['data'])) {
        add_staff();
    } else {
        die();
    }
} else if ($command == "mechanicnotesupdate") {
    if (isset($_GET['data'])) {
        mechanic_notes_update();
    } else {
        die();
    }
}else if ($command == "getvehicle") {
    if (isset($_GET['regnumber'])) {
        retrieve_vehicle();
    } else {
        die();
    }
} 
else if ($command == "editvehicleset") {
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
        add_service();
    } else {
        die();
    }
} else if ($command == "viewservice") {
    if (isset($_GET['data'])) {
        view_service();
    } else {
        die();
    }
} else if ($command == "getservice") {
    if (isset($_GET['serviceid'])) {
        retrieve_service();
    } else {
        die();
    }
}else if ($command == "editserviceset") {
    if (isset($_GET['servicedata'])) {
        set_service();
    } else {
        die();
    }
} else if ($command == "updatesupplier") {
    if (isset($_GET['data'])) {
        update_supplier();
    } else {
        die();
    }
} else if ($command == "updatebranch") {
    if (isset($_GET['data'])) {
        update_branch();
    } else {
        die();
    }
} else if ($command == "deleteservice") {
    if (isset($_GET['data'])) {
        delete_service();
    } else {
        die();
    }
} else if ($command == "deletesupplier") {
    if (isset($_GET['id'])) {
        delete_supplier();
    } else {
        die();
    }
} else if ($command == "deletebranch") {
    if (isset($_GET['id'])) {
        delete_branch();
    } else {
        die();
    }
} else if ($command == "deletestaff") {
    if (isset($_GET['id'])) {
        delete_staff();
    } else {
        die();
    }
} else if ($command == "getsuppliers") {
    get_suppliers();
}  else if ($command == "getbranches") {
    get_branches();
} else if ($command == "getstaff") {
    get_staff();
} else if ($command == "addsupplier") {
    if (isset($_GET['data'])) {
        add_supplier();
    } else {
        die();
    }
} else if ($command == "addbranch") {
    if (isset($_GET['data'])) {
        add_branch();
    } else {
        die();
    }
}

function mechanic_data() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

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

    $result = mysqli_query($con, "SELECT Notes FROM Service WHERE ID=" . $_GET['serviceid'] . ";");

    echo strval($result->fetch_row()[0]);
    mysqli_close($con);
}

function service_search() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $result = mysqli_query($con, "SELECT * FROM Service WHERE ID=" . $_GET['serviceid'] . ";");

    while ($row = $result->fetch_assoc()) {
        echo json_encode($row);
        mysqli_close($con);
        die();
    }

}

function add_client() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);

    $query = 'CALL AddClientVehicleService(
        "' . $data->{'FName'} . '",
        "' . $data->{'LName'} . '",
        "' . $data->{'ContactNumber'} . '",
        "' . $data->{'Address'} . '",
        "' . $data->{'Email'} . '",
        "' . $data->{'RegNumber'} . '",
        "' . $data->{'Make'} . '",
        "' . $data->{'Model'} . '",  
        "' . $data->{'Mileage'} . '",
        "' . $data->{'ServiceStart'} . '",
        "' . $data->{'ServiceExpectedEnd'} . '",
        "' . $data->{'Notes'} . '",
        "DD1"
    );';

    mysqli_query($con, $query)or die($query);
    mysqli_close($con);
    echo $query;
}

function add_supplier() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO Supplier VALUES( NULL,
        "' . $data->{'ContactNumber'} . '",
        "' . $data->{'Address'} . '",
        "' . $data->{'Name'} . '"
    );');
    mysqli_close($con);
}

function add_branch() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO Branch VALUES(
        "' . $data->{'ID'} . '",
        "' . $data->{'Address'} . '",
        "' . $data->{'ContactNumber'} . '"
    );');
    mysqli_close($con);
}

function add_service() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);
    
    mysqli_query($con, 'INSERT INTO Service VALUES( NULL,
        "' . $data->{'Notes'} . '",
        
        "' . $data->{'BranchID'} . '",
        "' . $data->{'RegNumber'} . '",
        "' . $data->{'ServiceStart'} . '",
        NULL,
        "' . $data->{'ServiceExpectedEnd'} . '"
    );');
    mysqli_close($con);

//    mysqli_query($con, 'CALL AddService(
//        "' . $data->{'ServiceStart'} . '",
//        "' . $data->{'ServiceExpectedEnd'} . '",
//        "' . $data->{'Notes'} . '",
//        "' . $data->{'BranchID'} . '",
//        "' . $data->{'RegNumber'} . '",
//    );');
    
}

function retrieve_service()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18"); 

    //$result = mysqli_query($con, 'CALL GetServiceData(' . $_GET['serviceid'] . ');')or die("Service data can not be retrieved, possibly incorrect ID");
    $result = mysqli_query($con, 'SELECT * from service WHERE ID ="' . $_GET['serviceid'] . '";')or die("\Vehicle data can not be retrieved, possibly incorrect Reg number");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function set_service()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");  

    $json = $_GET['servicedata'];
    $servicedata = json_decode($json);
    
    if(empty($servicedata->{'StaffID'}))
    {
        $query = 'UPDATE Service 
        SET
        Notes = "' . $servicedata->{'Notes'} . '",
        Status = "' . $servicedata->{'Status'} . '",
        BranchID = "' . $servicedata->{'BranchID'} . '", 
        RegNumber = "' . $servicedata->{'RegNumber'} . '",
        ServiceStart = "' . $servicedata->{'ServiceStart'} . '",
        ServiceExpectedEnd = "' . $servicedata->{'ServiceExpectedEnd'} . '"
        WHERE ID = ' . $servicedata->{'ID'} . ';';
    }
    else
    {
        $query = 'UPDATE Service 
        SET
        Notes = "' . $servicedata->{'Notes'} . '",
        Status = "' . $servicedata->{'Status'} . '",
        StaffID = ' . $servicedata->{'StaffID'} . ',
        BranchID = "' . $servicedata->{'BranchID'} . '", 
        RegNumber = "' . $servicedata->{'RegNumber'} . '",
        ServiceStart = "' . $servicedata->{'ServiceStart'} . '",
        ServiceExpectedEnd = "' . $servicedata->{'ServiceExpectedEnd'} . '"
        WHERE ID = ' . $servicedata->{'ID'} . ';';
    }
    
    echo $query;
    
    mysqli_query($con, $query) or die("");

    mysqli_close($con);
}

function update_supplier()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");  

    $json = $_GET['data'];
    $servicedata = json_decode($json);

    mysqli_query($con, 
                 'UPDATE Supplier 
        SET
        Name = "' . $servicedata->{'Name'} . '",
        ContactNumber = "' . $servicedata->{'ContactNumber'} . '",
        Address = "' . $servicedata->{'Address'} . '"
        WHERE ID = ' . $servicedata->{'ID'} . ';');

    mysqli_close($con);
}

function update_branch()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");  

    $json = $_GET['data'];
    $data = json_decode($json);

    mysqli_query($con, 
                 'UPDATE Branch 
        SET
        ID = "' . $data->{'ID'} . '",
        ContactNumber = "' . $data->{'ContactNumber'} . '",
        Address = "' . $data->{'Address'} . '"
        WHERE ID = "' . $data->{'OldID'} . '";');

    mysqli_close($con);
}

function add_vehicle() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO vehicle values(
        "' . $data->{'RegNumber'} . '",
        "' . $data->{'Make'} . '",
        ' . $data->{'Mileage'} . ',
        "' . $data->{'Model'} . '",
        ' . $data->{'ClientID'} . '  
    );');
    mysqli_close($con);
}

function add_staff() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];

    $data = json_decode($json);

    mysqli_query($con, 'INSERT INTO staff values( NULL,
        "' . $data->{'FName'} . '",
        "' . $data->{'LName'} . '",
        "' . $data->{'Role'} . '",
        "' . $data->{'Disciplinary'} . '",
        NULL, NULL,
        "' . $data->{'BranchID'} . '"  
        "' . $data->{'Password'} . '"  
    );');
    mysqli_close($con);
}

function get_awaiting_repair() {
    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");

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

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM Supplier;");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function get_branches() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM Branch;");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function get_staff() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");

    // Perform queries
    $result = mysqli_query($con,"SELECT * FROM staff;");

    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
    mysqli_close($con);
}

function delete_client() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    echo "Client with id ". $_GET['clientid'] ." was almost deleted";
    mysqli_query($con, 'DELETE FROM Client WHERE ID = ' . $_GET['clientid'] . ';')or die("Client can not be deleted, possibly has a vehicle assigned");
    echo "Client with id ". $_GET['clientid'] ." was deleted";
    mysqli_close($con);
}

function retrieve_client()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $result = mysqli_query($con, 'SELECT * FROM Client WHERE ID = "' . $_GET['clientid'] . '";')or die("Client data can not be retrieved, possibly incorrect ID");

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

    $json = $_GET['clientdata'];
    $clientdata = json_decode($json);

    mysqli_query($con, 'UPDATE Client
        SET
        ID = ' . $clientdata->{'ID'} . ',
        FName = "' . $clientdata->{'FName'} . '",
        LName = "' . $clientdata->{'LName'} . '",
        ContactNumber = "' . $clientdata->{'ContactNumber'} . '",
        Address = "' . $clientdata->{'Address'} . '",
        Email = "' . $clientdata->{'Email'} . '"
        WHERE ID = ' . $clientdata->{'ID'} . '
    ;');

    mysqli_close($con);
}

function repair_done()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

    mysqli_query($con, 'CALL SetServiceStatusCompleted(' . $_GET['serviceid'] . ');');
    mysqli_close($con);

}

function delay_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

    mysqli_query($con, 'CALL SetServiceStatusDelayed(' . $_GET['serviceid'] . ');');

    mysqli_close($con);
}

function get_branch_staff()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

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

    mysqli_query($con, 'CALL RemoveOneFromStock("' . $_GET['branchid'] . '",' . $_GET['partid'] . ');');
    mysqli_close($con);
}

function resume_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

    mysqli_query($con, 'CALL SetServiceStatusInProgress(' . $_GET['serviceid'] . ');');
    mysqli_close($con);
}

function start_repair()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3extra18", "a1bc23", "19ac3d18");

    mysqli_query($con, 'CALL StartRepair(' . $_GET['serviceid'] . ',' . $_GET['mechanicid'] . ');');
    mysqli_close($con);
}

function retrieve_vehicle()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");  

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

    mysqli_query($con, 'DELETE FROM Vehicle WHERE RegNumber= "' . $_GET['regnumber'] . '";') or die("Vehicle can not be deleted, possibly has a service assigned");
    //echo 'vehicle with Reg Number '. $_GET['regnumber'] . ' was deleted';
    mysqli_close($con);
}

function delete_supplier() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    // mysqli_query($con, 'CALL DeleteSupplier("' . $_GET['id'] . '");');
    mysqli_query($con, 'DELETE FROM Supplier where ID=' . $_GET['id'] . ';');
    mysqli_close($con);
}

function delete_branch() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    // mysqli_query($con, 'CALL DeleteBranch("' . $_GET['id'] . '");');
    mysqli_query($con, 'DELETE FROM Branch where ID="' . $_GET['id'] . '";');
    mysqli_close($con);
}

function delete_staff() {
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    mysqli_query($con, 'CALL DeleteStaff(' . $_GET['id'] . ');');
    // mysqli_query($con, 'DELETE FROM Staff where ID=' . $_GET['id'] . ';') or die("Has some shit attached???");
    mysqli_close($con);
}


function mechanic_notes_update()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    $json = $_GET['data'];
    $data = json_decode($json);
    
    mysqli_query($con, 
                 'UPDATE service 
        SET
        Notes = "' . $data->{'Notes'} . '"
        WHERE ID = ' . $data->{'ID'} . ';');
    mysqli_close($con);
}

/*function order_part()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

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