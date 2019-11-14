<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <title>Branch Supervisor</title>

    <script src="insert-product-request.js"></script>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div style="background: #5D5C61; height: 100vh;" class="col-2 text-center sidebar">
                <b>
                    <p style="color: #938E94; font-size: 3em; margin-top: 0.5em">Branch Supervisor</p>
                </b>
                &nbsp;

                <p style="color: #938E94; font-size: 2em; margin-top: 0.5em">Client</p>
                <a href="add-client.php">
                    <p class="nav-item">Add New</p>
                </a>
                <a href="">
                    <p class="nav-item"><b>View</b></p>
                </a>
                <a href="">
                    <p class="nav-item">Edit Existing</p>
                </a>
                <a href="delete-client.php">
                    <p class="nav-item">Delete Existing</p>
                </a>
            </div>

            <div class="col-10 content">
                <div class="row">

                    <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Client - View</div>
                </div>

                <div style="margin-top: 3em;" class="row">
                    <div class="col-10 offset-1">

                        <table class="table table-striped">
                            <div class="table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Surname</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../functions.php';
                                    display_clients();
                                    ?>
                                </tbody>
                            </div>
                        </table>



                    </div>
                </div>

            </div>



        </div>

    </div>

    </div>

</body>

</html>