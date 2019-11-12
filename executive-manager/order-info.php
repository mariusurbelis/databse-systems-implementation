<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <title>Executive Manager</title>

        <script src="insert-product-request.js"></script>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">


                <div style="background: #5D5C61; height: 100vh;" class="col-2 text-center sidebar">
                    <b>
                        <p style="color: #938E94; font-size: 3em; margin-top: 0.5em">Executive Manager</p>
                    </b>
                    &nbsp;

                    <a href="">
                        <p class="nav-item"><b>Order</b></p>
                    </a>
                    <a href="branch-info.php">
                        <p class="nav-item">Branch Info</p>
                    </a>
                    <a href="supplier-info.php">
                        <p class="nav-item">Supplier Info</p>
                    </a>
                    <a href="">
                        <p class="nav-item">Sales Trends</p>
                    </a>
                </div>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-2 offset-1">Orders</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div class="dev col-10 offset-1">
                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Part Request ID</th>
                                            <th>BranchID</th>
                                            <th>Part Details</th>
                                            <th>Quantity</th>
                                            <th>PartTypeID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require '../functions.php';
                                        print_order_info();
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