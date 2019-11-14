<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <title>Branch Supervisor</title>

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div style="background: #5D5C61; height: 100vh;" class="col-2 text-center sidebar">
                <b>
                    <p style="color: #938E94; font-size: 3em; margin-top: 0.5em">Branch Supervisor</p>
                </b>
                &nbsp;

                <p style="color: #938E94; font-size: 2em; margin-top: 0.5em">Client</p>
                <a href="">
                    <p class="nav-item"><b>Add New</b></p>
                </a>
                <a href="view-client.php">
                    <p class="nav-item">View</p>
                </a>
                <a href="">
                    <p class="nav-item">Edit Existing</p>
                </a>
                <a href="delete-client.php">
                    <p class="nav-item">Delete Existing</p>
                </a>
            </div>

            <div class="col-10 content">
                <div class="row">

                    <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Client - Add New</div>
                </div>

                <div style="margin-top: 3em;" class="row">
                    <div class="dev col-10 offset-1">
                        <p>Forename: <input type="text" id="FName"></p>
                        <p>Surname: <input type="text" id="LName"></p>
                        <p>Contact Number: <input type="text" id="ContactNumber"></p>
                        <p>Address: <input type="text" id="Address"></p>
                        <p>Postcode: <input type="text" id="Postcode"></p>
                        <p>Email Address: <input type="text" id="Email"></p>

                        <button style="margin-top: 1em" class="btn btn-primary" onclick="sendClientData()" id="submit" type="button">Submit</button>

                        <script>
                            function sendClientData() {

                                var obj = {
                                    'FName': document.getElementById("FName").value,
                                    'LName': document.getElementById("LName").value,
                                    'ContactNumber': document.getElementById("ContactNumber").value,
                                    'Address': document.getElementById("Address").value,
                                    'Postcode': document.getElementById("Postcode").value,
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

    </div>

</body>

</html>