<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mechanic Screen</title>

    <style>

        body {
            background-color: #303030;
            color: white;
        }

        .dev {
/*            border: solid 2px green;*/
        }

        .devr {
/*            border: solid 2px red;*/
        }

    </style>

</head>

<body>

    <div class="container-fluid">

        <div style="height: 100vh" class="row">
            <div class="dev col-8">

                <div style="height: 50vh" class="row">
                    <div class="devr col-7">
                        <div class="row">
                            <div style="background-color: #bbbbbb; color: black;" class="text-left mt-5 mb-0 p-3 h4 col-10 offset-1">Cars awaiting repair</div>
                        </div>
                        <div class="row">
                            <div style="background-color: #ffffff; color: black; height: 35vh;" class="overflow-auto p-3 col-10 offset-1"><?php include 'cars-awaiting-repair.php';?></div>
                        </div>
                    </div>
                    <div class="devr col-5 mb-0 h3">
                        <div class="row">
                            <div style="background-color: white; color: black; height: 40.7vh; font-size: 0.7em;" class="overflow-auto p-3 mt-5 col-10 offset-1">
                                <?php include 'cars-in-repair.php';?>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="text-center row">
                    <!--                    <div class="col-6 h2">Mechanic Notes #1</div>-->
                    <!--                    <div class="col-6 h2">Mechanic Notes #2</div>-->
                </div>

            </div>

            <div class="dev mb-0 col-4 h4">

                <div class="row">

                    <div style="background-color: #bbbbbb; height: 90vh" class="rounded-lg mt-5 col-10 offset-1">

                        <div class="mt-5 mb-5 row">

                            <div class="col-10 offset-1">
                                <!-- Search form -->
                                <div class="md-form mt-0">
                                    <input class="rounded-lg shadow form-control" type="text" placeholder="Search for parts" aria-label="Search">
                                </div>
                            </div>

                        </div>

                        <div style="font-size: 0.7em;" class="row">

                            <div class="col-12">
                                <div style="background-color: white; color: black; height: 73vh;" class="overflow-auto pt-2 pb-2 rounded-lg shadow col-10 offset-1">
                                    <?php include 'parts-search.php';?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
