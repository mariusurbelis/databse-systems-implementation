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

    <div hidden id="main-content" class="container-fluid">

        <div style="height: 100vh" class="row">
            <div class="dev col-8">

                <div style="height: 50vh" class="row">
                    <div class="devr col-7">
                        <div class="row">
                            <div style="background-color: #bbbbbb; color: black;" class="text-left mt-5 mb-0 p-3 h4 col-10 offset-1">Cars awaiting repair</div>
                        </div>
                        <div class="row">
                            <div id="cars-tab" style="background-color: #ffffff; color: black; height: 35vh;" class="overflow-auto p-3 col-10 offset-1">
                                <!-- Cars awaiting repair appears here -->
                            </div>
                        </div>
                    </div>
                    <div class="devr col-5 mb-0 h3">
                        <div class="row">
                            <div id="repairs-tab" style="background-color: white; color: black; height: 40.7vh; font-size: 0.7em;" class="overflow-auto p-3 mt-5 col-10 offset-1">

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div id="notes-tab" style="background-color: white; color: black;" class="rounded-lg text-left mt-5 ml-5 mr-5 pb-2 p-3 pt-2 h4 col-11">                        
                        <!-- Notes will be here -->
                    </div>
                </div>
            </div>


            <div class="mb-0 col-4 h4">

                <div class="row">

                    <div style="background-color: #bbbbbb; height: 90vh" class="rounded-lg mt-5 col-10 offset-1">
                        <div class="mt-5 mb-5 row align-items-center">
                            <div class="col-8 offset-1">    
                                <input id="partsearch" name="partsearch" class="rounded-lg shadow form-control" type="text" placeholder="Search for parts" aria-label="Search">
                            </div>
                            <div class="col-2">
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
                                                    <th>Actions</th>
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
                                                                    '<td>' + item.PartTypeID + '</td>' +
                                                                    '<td>' + item.PartDetails + '</td>' +
                                                                    '<td><button onclick="usePart(' + item.PartTypeID + ')" style="color: red" class="btn">Use</button><button style="color: green" class="btn">Order</button></td></tr>';
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

    <div id="entrance" class="container-fluid">
        <div class="h-100 row align-items-center">
            <div class="col-4 offset-4 text-center">
                <input id="branchSelect" class="rounded-lg shadow form-control" type="text" placeholder="Enter a valid branch ID / Leave empty for DUN55412" aria-label="Branch ID">
                <button onclick="enterPage()" style="margin-top: 1em" class="btn btn-success">Enter</button>
            </div>
        </div>
    </div>

</body>

<script>

    function loadData(branchID) {
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=mechanicdata&branchid='+ branchID)
            .then(function (response) {
            return response.json();
        })
            .then(function (data) {
            console.log(data);
            //document.getElementById("part-table").innerHTML = "";
            data.forEach((item) => {
                if (item.Status === "Incomplete") {
                    document.getElementById("cars-tab").innerHTML += '<div class="row align-items-center"><div class="col-9"><b>' + item.Make + " " + item.Model + '</b><br>' +
                        item.Notes + '</div><div class="col-2">generate buttons for each mechanic???</div></div><hr>'
                } else if (item.Status === "In Progress") {
                    document.getElementById("repairs-tab").innerHTML += '<div class="row align-items-center"><div class="col-7"><span style="font-size: 1em">' + item.Make + " " + item.Model + '</span><br><span style="font-size: 0.75em">Mechanic: ' + item.StaffFname + " " + item.StaffLname + '</span></div><div class="col-2"><button onclick="repairDone(' + item.ID + ')" class="btn btn-success">Done</button></div><div class="col-2"><button onclick="delayRepair(' + item.ID + ')" class="btn btn-info">Delay</button></div></div><hr>'

                    document.getElementById("notes-tab").innerHTML +=
                        '<div class="row align-items-center"><div style="font-size: 0.6em" class="col-2">' + item.Make + " " + item.Model + '</div><div class="col-10"><textarea class="form-control" id="notes-'+ item.ID +'"></textarea></div></div>'
                    document.getElementById("notes-" + item.ID).innerHTML = item.Notes
                }
            });
        });
    }

    function usePart(partID) {
        alert("Part ID is " + partID + ". This part will have its quantity deduced by one.");
    }

    function repairDone(serviceID) {
        alert("Service ID is " + serviceID + ". This service will have its status set to done.");
    }

    function delayRepair(serviceID) {
        alert("Service ID is " + serviceID + ". This service will have its status set to delayed.");
    }

    function enterPage() {
        if (document.getElementById("branchSelect").value === "") {
            loadData("DUN55412")
            document.getElementById("entrance").hidden = true
            document.getElementById("main-content").hidden = false
        } else {
            loadData(document.getElementById("branchSelect").value)
            document.getElementById("entrance").hidden = true
            document.getElementById("main-content").hidden = false
        }
    }

</script>