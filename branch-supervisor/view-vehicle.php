<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Branch Supervisor</title>

        <script src="insert-product-request.js"></script>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php include "sidebar.html" ?>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Vehicle - View</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div style="height: 80vh" class="overflow-auto col-10 offset-1">

                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Registration Number</th>
                                            <th>Make</th>
                                            <th>Mileage</th>
                                            <th>Model</th>
                                            <th>ClientID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require '../functions.php'; display_vehicles(); ?>
                                    </tbody>
                                </div>
                            </table>


                        </div>
                    </div>

                </div>



            </div>

        </div>

    </body>

</html>