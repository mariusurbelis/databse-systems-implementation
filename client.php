<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Client</title>

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
            <div class="col-8 offset-2 text-center">

                <h2 class="mb-3">Client</h2>


                <?php include 'get-client-data.php' ?>




            </div>
        </div>

    </div>



    <!-- Usage of this file -->
    <?php // include 'simple-read.php';?>
    <!-- ------------------ -->
</body>