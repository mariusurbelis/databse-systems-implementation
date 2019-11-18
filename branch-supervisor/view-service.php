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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Service - View</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div style="height: 75vh" class="overflow-auto col-10 offset-1">

                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Service Start Date</th>
                                            <th>Service Expected End Date</th>
                                            <th>Service End Date</th>
                                            <th>Notes</th>
                                            <th>Status</th>
                                            <th>Staff ID</th>
                                            <th>Branch ID</th>
                                            <th>Registration Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php require '../functions.php'; display_services(); ?>
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