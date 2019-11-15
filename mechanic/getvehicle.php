<?php
    $passed = intval($_GET['passed']);

    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"19ac3d18");
    //        $sql="SELECT * FROM user WHERE id = '".$q."'";
    $sql="SELECT * FROM vehicle;";
    $result = mysqli_query($con,$sql);

    echo "<table class=\"table table-striped\">
    <tr>
    <th>RegNumber</th>
    <th>Make</th>
    <th>Model</th>
    <th>Mileage</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['RegNumber'] . "</td>";
        echo "<td>" . $row['Make'] . "</td>";
        echo "<td>" . $row['Model'] . "</td>";
        echo "<td>" . $row['Mileage'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
?>