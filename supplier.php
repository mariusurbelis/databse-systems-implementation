<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add A Supplier</title>

</head>

<body>

    <div class="container">

        <div style="margin-top: 5em" class="row">

            <div class="col-4 text-right shadow p-3">

                <form name="Add New Student" action="add-supplier.php" method="post">
                    <p style="margin-bottom: 2em"><b>Add a Supplier</b></p>

                    <p>ID: <input type="text" name="id"></p>
                    <p>Contact Number: <input type="text" name="contactnumber"></p>
                    <p>Address: <input type="text" name="address"></p>

                    <input style="margin-top: 1em" class="btn btn-primary" type="submit" name="submit" value="Submit" />
                </form>

            </div>

            <div class="col-7 offset-1 shadow p-3">

                <?php
                $servername = "silva.computing.dundee.ac.uk";
                $username = "19ac3u18";
                $password = "a1bc23";
                $dbname = "19ac3d18";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM 19ac3d18.supplier;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "ID: " . $row["ID"]. " - Number: " . $row["ContactNumber"]  ." - Address: " . $row["Address"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>

            </div>


        </div>

    </div>

</body>

<?php
include "db.php";
?>