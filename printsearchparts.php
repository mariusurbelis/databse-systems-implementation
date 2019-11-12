<?php

$partsearch = $_GET['partsearch'];

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
    echo
        '<tr>
    <td scope="row">' . $row["Quantity"] . '</td>
    <td>' . $row["ID"] . '</td>
    <td> ' . $row["PartDetails"] . '</td>
</tr>';
}
mysqli_close($con);

?>