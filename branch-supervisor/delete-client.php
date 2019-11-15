<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <title>Branch Supervisor</title>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php include "sidebar.html" ?>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-4 offset-1">Client - Delete</div>
                    </div>

                    <div style="margin-top: 3em;" id="initialRow" class="row">
                        <div class="dev col-3 offset-1">
                            <p>Please Enter ID of Client to be Deleted: <input placeholder="ID" type="text" id="ID"></p>
                            <button style="margin-top: 1em" class="btn btn-primary" onclick="getClient()" type="button">Submit</button>
                        </div>
                    </div>

                    <div hidden style="margin-top: 3em;" id="confirmRow" class="row">
                        <div class="dev col-5 offset-1">
                            <p id="response-text"></p>
                            <button style="margin-top: 1em" class="btn btn-danger" onclick="deleteClient()" id="submit" type="button">Confirm</button>
                        </div>
                    </div>


                    <script>

                        function getClient() {
                            fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getclient&clientid='+ document.getElementById("ID").value)
                                .then(function (response) {
                                return response.json();
                            })
                                .then(function (data) {
                                console.log(data);
                                data.forEach((item) => {
                                    document.getElementById("response-text").innerHTML = "Are you sure you want to delete " + item.FName + " " + item.LName + " with ID: " + item.ID;

                                    document.getElementById("confirmRow").hidden = false;
                                    document.getElementById("initialRow").hidden = true;

                                });
                            });
                        }


                        function deleteClient() {

                            console.log(document.getElementById("ID").value)

                            if (window.XMLHttpRequest) {
                                xmlhttp = new XMLHttpRequest();
                            } else {
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("response-text").innerHTML = this.responseText
                                    document.getElementById("submit").hidden = true;
                                }
                            };
                            xmlhttp.open("GET", 'https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=deleteclient&clientid=' + document.getElementById("ID").value, true);
                            xmlhttp.send();
                        }
                    </script>


                </div>



            </div>

        </div>

    </body>

</html>