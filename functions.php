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
                  <td scope="row">' . $row["ID"] . '</td>
                  <td>' . $row["BranchID"] . '</td>
                  <td> ' . $row["PartDetails"] . '</td>
                  <td> ' . $row["Quantity"] . '</td>
                  <td> ' . $row["PartTypeID"] . '</td>
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
                  <td scope="row">' . $row["ID"] . '</td>
                  <td>' . $row["ContactNumber"] . '</td>
                  <td> ' . $row["Address"] . '</td>
                </tr>';
    }
    mysqli_close($con);
}
