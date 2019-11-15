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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Client - Add New</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">
                        <div class="dev col-4 offset-1">
                            
                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>Forename: </td>
                                            <td><input placeholder="Forename" type="text" id="FName"></td>
                                        </tr>
                                        <tr>
                                            <td>Surname: </td>
                                            <td><input placeholder="Surname" type="text" id="LName"></td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number: </td>
                                            <td><input placeholder="Contact Number" type="text" id="ContactNumber"></td>
                                        </tr>
                                        <tr>
                                            <td>Address: </td>
                                            <td><input placeholder="Address" type="text" id="Address"></td>
                                        </tr>
                                        <tr>
                                            <td>Email: </td>
                                            <td><input placeholder="Email" type="text" id="Email"></td>
                                        </tr>
                                    
                                    </tbody>
                                </div>
                            </table>
                            
                            <button style="margin-top: 1em" class="btn btn-primary" onclick="sendClientData()" id="submit" type="button">Submit</button>

                            <script>
                                function sendClientData() {

                                    var obj = {
                                        'FName': document.getElementById("FName").value,
                                        'LName': document.getElementById("LName").value,
                                        'ContactNumber': document.getElementById("ContactNumber").value,
                                        'Address': document.getElementById("Address").value,
                                        'Email': document.getElementById("Email").value,
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
                                    xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addclient&data=' + JSON.stringify(obj), true);
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