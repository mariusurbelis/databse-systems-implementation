<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mechanic Screen</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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

<body onload="enterPage()">

    <div hidden id="main-content" class="container-fluid">

        <div style="height: 100vh" class="row">
            <div class="dev col-8">

                <div style="height: 50vh" class="row">
                    <div class="devr col-7">
                        <div class="row">
                            <div style="background-color: #bbbbbb; color: black;" class="text-left mt-5 mb-0 p-3 h4 col-10 offset-1">Car Service Waiting List</div>
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

                    <div id="notes-tab" style="height: 40vh; background-color: white; margin-left: 2.5em; color: black;" class="text-left overflow-auto mt-5 pb-2 p-3 pt-2 h4 col-11">
                        <!-- Notes will be here -->
                    </div>
                </div>
            </div>


            <div class="mb-0 col-4 h4">

                <div class="row">

                    <div style="background-color: #bbbbbb; height: 90vh" class="rounded-lg mt-5 col-10 offset-1">
                        <div class="mt-5 mb-5 row align-items-center">
                            <div class="col-7 offset-1">
                                <input id="partsearch" name="partsearch" class="rounded-lg shadow form-control" type="text" placeholder="Search for parts" aria-label="Search">
                            </div>
                            <div class="col-3">
                                <button style="width: 105%;" class="btn btn-primary" onclick='search()' name="searchbutton" id="searchbutton" type="button">Submit</button>
                            </div>
                        </div>

                        <div style="font-size: 0.7em;" class="row">

                            <div class="col-12">
                                <div style="background-color: white; color: black; height: 72.7vh;" class="overflow-auto pt-2 pb-2 rounded-lg shadow col-10 offset-1">

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
                                                        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=searchparts&part=' + document.getElementById("partsearch").value)
                                                            .then(function(response) {
                                                            return response.json();
                                                        })
                                                            .then(function(data) {
                                                            console.log(data);
                                                            document.getElementById("part-table").innerHTML = "";
                                                            data.forEach((item) => {
                                                                document.getElementById("part-table").innerHTML += '<tr>' +
                                                                    '<td scope="row">' + item.Quantity + '</td>' +
                                                                    '<td>' + item.PartTypeID + '</td>' +
                                                                    '<td>' + item.PartDetails + '</td>' +
                                                                    '<td><button onclick="usePart(' + item.PartTypeID + ')" style="color: red" class="btn">Use</button><button onclick="orderPart(' + item.PartTypeID + ')" style="color: green" class="btn">Order</button></td></tr>';
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
    var ServiceIDs = []

    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 1500;  //time in ms, 5 second for example

    function loadData(branchID) {
        var mechanics = []

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getbranchstaff&branchid=' + branchID)
            .then(function(response) {
            return response.json();
        })
            .then(function(data) {
            //            console.log(data);

            //var 

            data.forEach((mechanic) => {
                //document.write(mechanic.FName + " " + mechanic.LName)
                mechanics.push({ id: mechanic.ID, fname: mechanic.FName, lname: mechanic.LName })
            });
        });


        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=mechanicdata&branchid=' + branchID)
            .then(function(response) {
            return response.json();
        })
            .then(function(data) {
            //            console.log(mechanics);

            document.getElementById("cars-tab").innerHTML = ""
            document.getElementById("repairs-tab").innerHTML = ""
            document.getElementById("notes-tab").innerHTML = ""

            // Clear the array
            ServiceIDs.length = 0

            data.forEach((item) => {
                if (item.Status === "Incomplete" || item.Status === "Delayed") {

                    var elements = ''

                    if (item.Status === "Incomplete") {

                        mechanics.forEach((mech) => {
                            elements += '<a class="dropdown-item" onclick="startRepair(' + item.ID + ', ' + mech.id + ')" href="#">' + mech.fname + " " + mech.lname + '</a>'
                        });


                        document.getElementById("cars-tab").innerHTML += '<div class="row align-items-center"><div class="col-9"><b>' + item.Make + " " + item.Model + '</b> <br>' +
                            item.Notes + '</div><div class="col-2"> \
<div class="dropdown"> \
<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> \
Start \
    </button> \
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">' + elements + '</div></div></div></div><hr>' 
                    } else if (item.Status === "Delayed") {
                        document.getElementById("cars-tab").innerHTML += '<div class="row align-items-center"><div class="col-9"><b>' + item.Make + " " + item.Model + " <span style=\"padding: 0.25em; color: white; background-color: gray\">Delayed</span>"  + '</b> <br>' +
                            item.Notes + '</div><div class="col-2"> \
<button onclick=resumeRepair(' + item.ID + ') class="btn btn-primary">Resume</button> \
    </div></div><hr>' 
                    }


                } else if (item.Status === "In Progress") {
                    // Add the item.ID to the array
                    ServiceIDs.push(item.ID)

                    document.getElementById("repairs-tab").innerHTML += '<div class="row align-items-center"><div class="col-7"><span style="font-size: 1em">' + item.Make + " " + item.Model + '</span> <span style="font-size: 0.6em">' + item.RegNumber + '</span><br><span style="font-size: 0.75em">Mechanic: ' + item.StaffFname + " " + item.StaffLname + '</span></div><div class="col-2"><button onclick="repairDone(' + item.ID + ')" class="btn btn-success">Done</button></div><div class="col-2"><button onclick="delayRepair(' + item.ID + ')" class="btn btn-info">Delay</button></div></div><hr>'

                    document.getElementById("notes-tab").innerHTML +=
                        '<div class="mb-3 row align-items-center"><div style="font-size: 0.6em" class="col-2">' + item.Make + " " + item.Model + " " + item.RegNumber + '</div><div class="col-10"><textarea class="form-control" id="notes-' + item.ID + '"></textarea></div></div>'
                    document.getElementById("notes-" + item.ID).innerHTML = item.Notes
                }

                //checking when mechanic stops typing
                ServiceIDs.forEach((id) => {
                    $('#notes-' + id).keyup(function(){
                        clearTimeout(typingTimer);
                        if ($('#notes-' + ServiceIDs[0]).val) {
                            typingTimer = setTimeout(function(){
                                var notescontent = $('#notes-' + id).val();
                                console.log("For the ID: " + id + " it's " + notescontent);
                                
                                // Here you will be sending a single note update to the api UpdateNotesOf(ID, notes)
                                var obj =
                                    {
                                        'ID' : id,
                                        'Notes' : notescontent,
                                    }
                                
                                // sent to api
                                fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=mechanicnotesupdate&data=' + JSON.stringify(obj))
                                
                            }, doneTypingInterval);
                        }
                    });
                }); 


            });
        });
    }

    function usePart(partID) {
        //alert("Part ID is " + partID + ". This part will have its quantity deduced by one.");
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=repairdone&partid=' + partID + '&branchid=' + document.getElementById("branchSelect").value)
        //loadData(document.getElementById("branchSelect").value)
    }

    /*function orderPart(partID) {
        alert("Part ID is " + partID + ". This part will be ordered.");
        var obj = {

            }

        xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=orderpart&partdata=' + obj, true);
        xmlhttp.send();
    }*/

    function startRepair(repairID, mechanicID) {
        //        alert("Repair with id " + repairID + " was started and assigned to mechanic with id " + mechanicID)
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=startrepair&serviceid=' + repairID + '&mechanicid=' + mechanicID).then(function() {
            loadData(document.getElementById("branchSelect").value)
        })
    }

    function resumeRepair(repairID) {
        //        alert("Repair with id " + repairID + " was resumed")
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=resumerepair&serviceid=' + repairID).then(function() {
            loadData(document.getElementById("branchSelect").value)
        })
    }

    function repairDone(serviceID) {
        //alert("Service ID is " + serviceID + ". This service will have its status set to done.");
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=repairdone&serviceid=' + serviceID).then(function() {
            loadData(document.getElementById("branchSelect").value)
        })
    }

    function delayRepair(serviceID) {
        //alert("Service ID is " + serviceID + ". This service will have its status set to delayed.");
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=delayrepair&serviceid=' + serviceID).then(function() {
            loadData(document.getElementById("branchSelect").value)
        })
    }

    function enterPage() {
        if (document.getElementById("branchSelect").value === "") {
            loadData("DD1")
            document.getElementById("branchSelect").value = "DD1"
            document.getElementById("entrance").hidden = true
            document.getElementById("main-content").hidden = false
        } else {
            loadData(document.getElementById("branchSelect").value)
            document.getElementById("entrance").hidden = true
            document.getElementById("main-content").hidden = false
        }
    }
</script>