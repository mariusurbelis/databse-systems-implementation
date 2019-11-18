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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Service - Add New</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div class="dev col-4 offset-1">

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

                            <button style="margin-top: 1em" class="btn btn-primary" onclick="sendClientData()" id="submit" type="button">Submit</button>

                            <script>
                                function sendClientData() {

                                    var obj = {
                                        //service data
                                        'ServiceStart': document.getElementById("ServiceStart").value,
                                        'ServiceExpectedEnd': document.getElementById("ServiceExpectedEnd").value,
                                        'Notes': document.getElementById("Notes").value,
                                        'BranchID': document.getElementById("BranchID").value,
                                        'RegNumber': document.getElementById("RegNumber").value,
                                    }

                                    if (window.XMLHttpRequest) {
                                        xmlhttp = new XMLHttpRequest();
                                    } else {
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.write(this.responseText)
                                        }
                                    };
                                    xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addservice&data=' + JSON.stringify(obj), true);
                                    xmlhttp.send();
                                }
                            </script>

                        </div>



                    </div>

                </div>



            </div>

        </div>

    </body>

</html>