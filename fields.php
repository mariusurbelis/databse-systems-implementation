<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Client</title>

    <style>

        .dev {
                        border: solid 2px green;
        }

        .devr {
            /*            border: solid 2px red;*/
        }

        a {
            color: blue;  
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="pt-5 row align-items-center">
            <div class="col-8 offset-2 text-center">

                <h1>Fields</h1>

            </div>
        </div>

        <div class="pt-5 row">

            <div class="col-lg-2 col-4">             
                <h3>Client</h3>
                <?php describe("Client") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Vehicle</h3>
                <?php describe("Vehicle") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Service</h3>
                <?php describe("Service") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Branch</h3>
                <?php describe("Branch") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Job</h3>
                <?php describe("Job") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Staff</h3>
                <?php describe("Staff") ?>
            </div>
        </div>

        <div class="pt-5 row">


            <div class="col-lg-2 col-4">             
                <h3>PartType</h3>
                <?php describe("PartType") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>PartRequest</h3>
                <?php describe("PartRequest") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Supplier</h3>
                <?php describe("Supplier") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>PartInstance</h3>
                <?php describe("PartInstance") ?>
            </div>

            <div class="col-lg-2 col-4">             
                <h3>Supplier_PartType</h3>
                <?php describe("Supplier_PartType") ?>
            </div>
        </div>



    </div>

    </div>



<!-- Usage of this file -->
<?php // include 'simple-read.php';?>
<!-- ------------------ -->


<?php

    function describe($table){

    $con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Perform queries
    $result = mysqli_query($con,"SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '19ac3d18' AND TABLE_NAME = '" . $table . "';");
    //mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) VALUES ('Glenn','Quagmire',33)");

    while ($row = $result->fetch_assoc()) {
        //echo $row['Address']."<br>";
        echo $row['COLUMN_NAME'] . '<br>';

    }

    mysqli_close($con);
}
?>


</body>