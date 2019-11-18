<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../styles.css">

        <title>Branch Supervisor</title>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php include "sidebar.html" ?>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Vehicle - Add New</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div class="dev col-4 offset-1">

                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <tbody>
                                        <tr><td><b>Vehicle</b></td><td></td></tr>
                                        <tr>
                                            <td>Registration Number: </td>
                                            <td><input placeholder="Registration Number" type="text" id="RegNumber"></td>
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
                                            <td><input placeholder="Model" type="text" id="Model"></td>
                                        </tr>
                                        <tr>
                                            <td>ClientID:  </td>
                                            <td><input placeholder="Client ID" type="text" id="ClientID"></td>
                                        </tr>
                                    </tbody>
                                </div>
                            </table>

                            <button style="margin-top: 1em" class="btn btn-primary" onclick="sendVehicleData()" id="submit" type="button">Submit</button>

                            <script>
                                function sendVehicleData() 
                                {
                                    var obj =
                                        {
                                            //vehicle data
                                            'RegNumber': document.getElementById("RegNumber").value,
                                            'Make': document.getElementById("Make").value,
                                            'Mileage': document.getElementById("Mileage").value,
                                            'Model': document.getElementById("Model").value,
                                            'ClientID': document.getElementById("ClientID").value,
                                        }
                                    if (window.XMLHttpRequest) 
                                    {
                                        xmlhttp = new XMLHttpRequest();
                                    } else 
                                    {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) 
                                        {
                                            document.write(this.responseText)
                                            showViewVehicleScreen()
                                        }
                                    };
                                    xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addvehicle&data=' + JSON.stringify(obj), true);
                                    xmlhttp.send();
                                }

                                function showViewVehicleScreen()
                                {
                                    window.location.href='https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/branch-supervisor/view-vehicle.php';
                                }
                            </script>
                        </div>

                        <!--    <div class="col-4 offset-1">

<table class="table table-striped">
<div class="table-responsive">
<tbody>
<tr><td><b>Service</b></td><td></td></tr>
<tr>
<td>Service Start Time: </td>
<td><input placeholder="Service Start Time" type="text" id="ServiceStart"></td>
</tr>
<tr>
<td>Service End Time: </td>
<td><input placeholder="Service End Time" type="text" id="ServiceExpectedEnd"></td>
</tr>
<tr>
<td>Notes: </td>
<td><input placeholder="Notes" type="text" id="Notes"></td>
</tr>
<tr><td></td><td></td></tr>

</tbody>
</div>
</table>


</div> -->

                    </div>

                </div>



            </div>

        </div>

    </body>

</html>