<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mechanic Screen</title>

    <style>
        body {
            background-color: #303030;
            color: white;
        }

        .dev {
                        border: solid 2px green;
        }

        .devr {
                        border: solid 2px red;
        }

        .devb {
                        border: solid 2px blue;
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
                                            xmlhttp = new XMLHttpRequest();
                                        } else {
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


                <div class="text-center row">
                    <div class="devb col-12 h2">
                        <div class="devr row">
                            <div style="background-color: white; color: black;" class="dev rounded-lg mt-5 col-10 offset-1">
                                     The wtf
                                
                                <div class="row">
                                    <div class="dev col-2">ok col 2</div>
                                    <div class="dev col-2">ok col 2</div>
                                    <div class="dev col-6">
                                    
                                        <div class="dev row"><div class="col-12">ss</div></div>
                                        <div class="devr row"><div class="col-12"></div>
                                            <div class="dev col-6">ss</div>
                                            <div class="dev col-6">ss</div>
                                        
                                            </div>
                                            
                                           
                                        <div class="devr row"><div class="col-12">ss</div></div>
                                        
                                    </div>
                                    <div class="devr col-1">ok col 1</div>
                                    <div class="devb col-1">ok col 1</div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="dev col-6 offset-4">ok col 6</div>
                                    <div class="devr col-1">ok col 1</div>
                                    <div class="devb col-1">ok col 1</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="dev mb-0 col-4 h4">

                <div class="row">

                    <div style="background-color: #bbbbbb; height: 90vh" class="rounded-lg mt-5 col-10 offset-1">

                        <div class="mt-5 mb-5 row align-items-center">

                            <div class="col-8 offset-1">
                                <input id="partsearch" name="partsearch" class="rounded-lg shadow form-control" type="text" placeholder="Search for parts" aria-label="Search">
                            </div>
                            <div class="col-1">
                                <button class="btn btn-primary" onclick='search()' name="searchbutton" id="searchbutton" type="button">Submit</button>
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
                                            <tbody id="part-table">
                                                <!-- Get the parts to print -->
                                                <script>

                                                    function search(partQuery) {
                                                        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=searchparts&part='+ document.getElementById("partsearch").value)
                                                            .then(function (response) {
                                                            return response.json();
                                                        })
                                                            .then(function (data) {
                                                            console.log(data);
                                                            document.getElementById("part-table").innerHTML = "";
                                                            data.forEach((item) => {
                                                                document.getElementById("part-table").innerHTML += '<tr>' +
                                                                    '<td scope="row">' + item.Quantity + '</td>' +
                                                                    '<td>' + item.ID + '</td>' +
                                                                    '<td>' + item.PartDetails + '</td></tr>';
                                                            });
                                                        });
                                                    }
                                                </script>
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