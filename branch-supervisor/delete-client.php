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
                <a href="add-client.php">
                    <p class="nav-item">Add New</p>
                </a>
                <a href="view-client.php">
                    <p class="nav-item">View</p>
                </a>
                <a href="">
                    <p class="nav-item">Edit Existing</p>
                </a>
                <a href="">
                    <p class="nav-item"><b>Delete Existing</b></p>
                </a>
            </div>

            <div class="col-10 content">
                <div class="row">

                    <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Client - Delete</div>
                </div>

                <div style="margin-top: 3em;" class="row">
                    <div class="dev col-10 offset-1">
                        <p>Please Enter ID of Client to be Deleted: <input type="text" id="ID"></p>
                        <button style="margin-top: 1em" class="btn btn-primary" onclick="sendClientData()" id="submit" type="button">Submit</button>

                        <p style="margin-top: 5em;" id="response-text"></p>

                        <script>
                            function sendClientData() {

                                console.log(document.getElementById("ID").value)

                                if (window.XMLHttpRequest) {
                                    xmlhttp = new XMLHttpRequest();
                                } else {
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("response-text").innerHTML = this.responseText
                                    }
                                };
                                xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=deleteclient&clientid=' + document.getElementById("ID").value, true);
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