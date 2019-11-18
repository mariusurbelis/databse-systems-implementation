<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Branch Supervisor</title>

        <style>
            input{
                width:100%;
            }
        </style>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php include "sidebar.html" ?>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Vehicle - Edit</div>
                    </div>

                    <div class="row mt-5">
                        <div class="dev col-10 offset-1">

                            <div class="row">
                                <div class="col-3">
                                    <p>Please Enter Registration Number of Vehicle to be Edited: <input placeholder="Reg Number" type="text" id="RegNumber"></p>
                                    <button style="margin-top: 1em" class="btn btn-primary" onclick="sendVehicleData()" id="submit" type="button">Submit</button>
                                </div>
                            </div>

                            <div hidden id="edit-data" class="row mt-5">
                                <div class="col-6">

                                    <p>Provide Changes then Submit</p>

                                    <table class="table table-striped">
                                        <div class="table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Registration Number: </td>
                                                    <td><input placeholder="Reg Number" type="text" id="RegNumber"></td>
                                                </tr>
                                                <tr>
                                                    <td>Make: </td>
                                                    <td><input placeholder="Make" type="text" id="Make"></td>
                                                </tr>
                                                <tr>
                                                    <td>Mileage: </td>
                                                    <td><input placeholder="Mileage" type="text" id="Mileage"></td>
                                                </tr>
                                                <tr>
                                                    <td>Model: </td>
                                                    <td><input placeholder="Model" type="text" id="Model" width="150%"></td>
                                                </tr>
                                                <tr>
                                                    <td>ClientID: </td>
                                                    <td><input placeholder="ClientID" type="text" id="ClientID"></td>
                                                </tr>
                                                

                                            </tbody>
                                        </div>
                                    </table>

                                    <button style="margin-top: 1em" class="btn btn-primary" onclick="saveVehicleDataToDB()" id="submit" type="button">Submit</button>

                                </div>
                            </div>

                            <script>
                                function sendVehicleData() {
                                    fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getvehicle&regnumber=' + document.getElementById("RegNumber").value)
                                        .then(function(response) {
                                        return response.json();
                                    })
                                        .then(function(data) {
                                        console.log(data);
                                        document.getElementById("edit-data").hidden = false;

                                        data.forEach((item) => {
                                            // Access the retrieved vehicledata by item.<field>
                                            document.getElementById("RegNumber").value = item.RegNumber
                                            document.getElementById("Make").value = item.Make
                                            document.getElementById("Model").value = item.Model
                                            document.getElementById("Mileage").value = item.Mileage
                                            document.getElementById("ClientID").value = item.ClientID
                                        });
                                    });
                                }

                                function clearVehicleInputFields() {
                                    document.getElementById("RegNumber").value = "";
                                    document.getElementById("Make").value = "";
                                    document.getElementById("Model").value = "";
                                    document.getElementById("Mileage").value = "";
                                    document.getElementById("ClientID").value = ""; 
                                }

                                function saveVehicleDataToDB() {
                                    var obj = {
                                        'RegNumber': document.getElementById("RegNumber").value,
                                        'Mileage': document.getElementById("Mileage").value,
                                        'Model': document.getElementById("Model").value,
                                        'Make': document.getElementById("Make").value,
                                        'ClientID': document.getElementById("ClientID").value,
                                    }

                                    if (window.XMLHttpRequest) {
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            // document.write(this.responseText)
                                            clearVehicleInputFields();
                                        }
                                    };

                                    xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=editvehicleset&vehicledata=' + JSON.stringify(obj), true);
                                    xmlhttp.send();
                                }
                            </script>

                            <p style="margin-top: 5em;" id="response-text"></p>

                        </div>
                    </div>

                </div>



            </div>

        </div>

    </body>

</html>