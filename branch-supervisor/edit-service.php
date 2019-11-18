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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Service - Edit</div>
                    </div>

                    <div class="row mt-5">
                        <div class="dev col-10 offset-1">

                            <div class="row">
                                <div class="col-3">
                                    <p>Please Enter ID of the Service to be edited: <input placeholder="ID" type="text" id="ID"></p>
                                    <button style="margin-top: 1em" class="btn btn-primary" onclick="retrieveServiceData()" id="submit" type="button">Submit</button>
                                </div>
                            </div>

                            <div hidden id="edit-data" class="row mt-5">
                                <div class="col-6">

                                    <p>Provide Changes then Submit</p>

                                    <table class="table table-striped">
                                        <div class="table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Service Start Date: </td>
                                                    <td><input placeholder="Service Start Date" type="text" id="ServiceStart"></td>
                                                </tr>
                                                <tr>
                                                    <td>Service Expected End Date: </td>
                                                    <td><input placeholder="Service Expected End Date" type="text" id="ServiceExpectedEnd"></td>
                                                </tr>
                                                <tr>
                                                    <td>Notes: </td>
                                                    <td><input placeholder="Notes" type="text" id="Notes"></td>
                                                </tr>
                                                <tr>
                                                    <td>Status: </td>
                                                    <td><input placeholder="Status" type="text" id="Status"></td>
                                                </tr>
                                                <tr>
                                                    <td>Staff ID: </td>
                                                    <td><input placeholder="Staff ID" type="text" id="StaffID"></td>
                                                </tr>
                                                <tr>
                                                    <td>Branch ID </td>
                                                    <td><input placeholder="Branch ID" type="text" id="BranchID"></td>
                                                </tr>
                                                <tr>
                                                    <td>Registration Number: </td>
                                                    <td><input placeholder="AB01 XYZ" type="text" id="RegNumber"></td>
                                                </tr>

                                            </tbody>
                                        </div>
                                    </table>

                                    <button style="margin-top: 1em" class="btn btn-primary" onclick="saveServiceDataToDB()" id="submit" type="button">Submit</button>

                                </div>
                            </div>

                            <script>
                                function retrieveServiceData() {
                                    fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getservice&serviceid=' + document.getElementById("ID").value)
                                        .then(function(response) {
                                        return response.json();
                                    })
                                        .then(function(data) {
                                        console.log(data);
                                        document.getElementById("edit-data").hidden = false;

                                        data.forEach((item) => {
                                            // Access the retrieved client data by item.<field>
                                            document.getElementById("ServiceStart").value = item.ServiceStart
                                            document.getElementById("ServiceExpectedEnd").value = item.ServiceExpectedEnd
                                            document.getElementById("Notes").value = item.Notes
                                            document.getElementById("Status").value = item.Status
                                            document.getElementById("StaffID").value = item.StaffID
                                            document.getElementById("BranchID").value = item.BranchID
                                            document.getElementById("RegNumber").value = item.RegNumber
                                        });
                                    });
                                }

                                function clearServiceInputFields() {
                                    document.getElementById("ServiceStart").value = "";
                                    document.getElementById("ServiceExpectedEnd").value = "";
                                    document.getElementById("Notes").value = "";
                                    document.getElementById("Status").value = "";
                                    document.getElementById("StaffID").value =  "";
                                    document.getElementById("BranchID").value = "";
                                    document.getElementById("RegNumber").value = "";
                                }

                                function saveServiceDataToDB() 
                                {
                                    var obj = 
                                        {
                                            'ID': document.getElementById("ID").value,
                                            'ServiceStart': document.getElementById("ServiceStart").value,
                                            'ServiceExpectedEnd': document.getElementById("ServiceExpectedEnd").value,
                                            'StaffID': document.getElementById("StaffID").value,
                                            'Notes': document.getElementById("Notes").value,
                                            'Status': document.getElementById("Status").value,
                                            'BranchID': document.getElementById("BranchID").value,
                                            'RegNumber': document.getElementById("RegNumber").value,
                                        }

                                    //                                    document.write(JSON.stringify(obj))

                                    if (window.XMLHttpRequest) {
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            // document.write(this.responseText)
                                            clearServiceInputFields()
                                        }
                                    };

                                    xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=editserviceset&servicedata=' + JSON.stringify(obj), true);
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