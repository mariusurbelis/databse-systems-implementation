<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add Data</title>

    <style>

        .dev {
            /*            border: solid 2px green;*/
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

        <div style="height: 100vh;" class="row align-items-center">
            <div class="col-8 text-right">

                <h3>Service</h3>

                <form action="post/add-service.php" method="post">
                <p>ServiceStart: <input type="text" name="ServiceStart"></p>
                <p>ServiceExpectedEnd: <input type="text" name="ServiceExpectedEnd"></p>
                <p>ServiceActualEnd: <input type="text" name="ServiceActualEnd"></p>
                <p>HoursDelayed: <input type="text" name="HoursDelayed"></p>
                <p>Notes: <input type="text" name="Notes"></p>
                <p>Status: <input type="text" name="Status"></p>
                <p>StaffID: <input type="text" name="StaffID"></p>
                <p>BranchID: <input type="text" name="BranchID"></p>
                <p>RegNumber: <input type="text" name="RegNumber"></p>

                <input style="margin-top: 1em" class="btn btn-primary" type="submit" name="submit" value="Submit" />
                </form>


            </div>
        </div>

    </div>


</body>