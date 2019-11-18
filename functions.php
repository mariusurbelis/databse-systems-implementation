<?php

function find_staff_from_staffid($StaffID)
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con, 'SELECT * FROM Staff where ID = "' . $StaffID . '";');

    while ($row = $result->fetch_assoc()) {
        echo $row['FName'] . " " . $row['LName'] . "<br>";
    }
}

function print_branch_info()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM branch;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["ID"] . '</td>
                  <td>' . $row["Address"] . '</td>
                  <td> ' . $row["ContactNumber"] . '</td>
                  <td> <button onclick="editBranch(\'' . $row["ID"] . '\')" class="btn btn-primary">Edit</button> </td>
                </tr>';
    }
    mysqli_close($con);
}

function print_order_info()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM PartRequest INNER JOIN PartType ON PartType.ID=PartRequest.PartTypeID;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["BranchID"] . '</td>
                  <td> ' . $row["PartDetails"] . '</td>
                  <td> ' . $row["Quantity"] . '</td>
                  <td> <button class="btn btn-primary">Confirm</button> </td>
                </tr>';
    }

    mysqli_close($con);
}

function print_supplier_info()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM Supplier;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["Name"] . '</td>
                  <td>' . $row["ContactNumber"] . '</td>
                  <td> ' . $row["Address"] . '</td>
                  <td> <button onclick=editSupplier('. $row["ID"] .') class="btn btn-primary">Edit</button> </td>
                </tr>';
    }
    mysqli_close($con);
}

function print_staff_info()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM Staff;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["FName"] . '</td>
                  <td>' . $row["LName"] . '</td>
                  <td> ' . $row["Role"] . '</td>
                  <td> ' . $row["Discplinary"] . '</td>
                  <td> ' . $row["CheckedIn"] . '</td>
                  <td> ' . $row["CheckedOut"] . '</td>
                  <td> ' . $row["BranchID"] . '</td>
                  <td> ' . $row["Password"] . '</td>
                  <td> <button onclick=editStaff('. $row["ID"] .') class="btn btn-primary">Edit</button> </td>
                </tr>';
    }
    mysqli_close($con);
}

function display_clients()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM Client;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["ID"] . '</td>
                  <td>' . $row["FName"] . '</td>
                  <td> ' . $row["LName"] . '</td>
                  <td> ' . $row["ContactNumber"] . '</td>
                  <td> ' . $row["Address"] . '</td>
                  <td> ' . $row["Email"] . '</td>
                </tr>';
    }
    mysqli_close($con);
}

function display_vehicles()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM vehicle;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["RegNumber"] . '</td>
                  <td>' . $row["Make"] . '</td>
                  <td> ' . $row["Mileage"] . '</td>
                  <td> ' . $row["Model"] . '</td>
                  <td> ' . $row["ClientID"] . '</td>
                </tr>';
    }
    mysqli_close($con);
}

function display_services()
{
    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM Service;");

    while ($row = $result->fetch_assoc()) {
        echo
            '<tr>
                  <td scope="row">' . $row["ID"] . '</td>
                  <td> ' . $row["ServiceStart"] . '</td>
                  <td> ' . $row["ServiceExpectedEnd"] . '</td>
                  <td> ' . $row["ServiceActualEnd"] . '</td>
                  <td> ' . $row["Notes"] . '</td>
                  <td> ' . $row["Status"] . '</td>
                  <td> ' . $row["StaffID"] . '</td>
                  <td> ' . $row["BranchID"] . '</td>
                  <td> ' . $row["RegNumber"] . '</td>
                </tr>';
    }
    mysqli_close($con);
}