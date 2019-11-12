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

        .devb {
/*            border: solid 2px blue;*/
        }

        .notes {
            color: #999999;
        }
    </style>

</head>

<?php require '../functions.php' ?>

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
                            <div style="background-color: #ffffff; color: black; height: 35vh;" class="dev overflow-auto p-3 col-10 offset-1">

                                <div class="devr row">
                                    <div class="col-10">
<!--                                        <h5 class="devb">Opel Astra 1.6 TD 2005</h5>-->
<!--                                        <p class="devb notes">It very broke...</p>-->
                                        <?php include "cars-awaiting-repair.php"; ?>
                                    </div>
                                    <div class="col-2 dev">
                                        <a href="#">></a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="devr col-5 mb-0 h3">
                        <div class="row">
                            <div style="background-color: white; color: black; height: 40.7vh; font-size: 0.7em;" class="overflow-auto p-3 mt-5 col-10 offset-1">
                                <?php //require 'cars-in-repair.php'; ?>


                                <div style="color: black;" id="txtHint"><b>Repairs info will be listed here...</b></div>
                                
                                

                                <script>
                                    function getVehicles() {
                                        if (window.XMLHttpRequest) {
                                            // code for IE7+, Firefox, Chrome, Opera, Safari
                                            xmlhttp = new XMLHttpRequest();
                                        } else {
                                            // code for IE6, IE5
                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                        }
                                        xmlhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("txtHint").innerHTML = this.responseText;
                                            }
                                        };
                                        xmlhttp.open("GET","getvehicle.php?passed="+ "lol" ,true);
                                        xmlhttp.send();

                                    }
                                </script>
                                
                                <script>
                                    getVehicles();
                                </script>


                            </div>
                        </div>
                    </div>

                </div>


                <div hidden class="text-center row">
                    <div class="col-6 h2">Mechanic Notes #1</div>
                    <div class="col-6 h2">Mechanic Notes #2</div>
                </div>

            </div>

            <div class="dev mb-0 col-4 h4">

                <div class="row">

                    <div style="background-color: #bbbbbb; height: 90vh" class="rounded-lg mt-5 col-10 offset-1">

                        <div class="mt-5 mb-5 row">

                            <div class="col-10 offset-1">
                                <!-- Search form -->
                                <!-- <form action="parts-search.php" method="get"> -->
                                <input id="partsearch" name="partsearch" class="rounded-lg shadow form-control" type="text" placeholder="Search for parts" aria-label="Search">
                                <input style="margin-top: 1em" class="btn btn-primary" onclick="loadsearch()" name="searchbutton" id="searchbutton" value="Submit" />
                                <!-- </form> -->
                            </div>
                        </div>

                        <div style="font-size: 0.7em;" class="row">

                            <div class="col-12">
                                <div style="background-color: white; color: black; height: 60vh;" class="overflow-auto pt-2 pb-2 rounded-lg shadow col-10 offset-1">

                                    <p id="searchtext"></p>

                                    <table class="table table-striped">                     
                                        <div class="table responsive">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>ID</th>
                                                    <th>Part Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php print_search_parts(""); ?>
                                            </tbody>
                                        </div>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>