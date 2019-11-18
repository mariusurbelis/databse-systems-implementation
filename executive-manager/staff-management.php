<html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="../styles.css">

        <title>Executive Manager</title>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php include "sidebar.html" ?>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-3 offset-1">Staff Management</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">

                        <div class="dev col-10 offset-1">

                            <div class="row">

                                <div class="col-12">

                                    <div style="height: 45vh" class="overflow-auto col-12">
                                        <table class="table table-striped">
                                            <div class="table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>Forename</th>
                                                        <th>Surname</th>
                                                        <th>Role</th>
                                                        <th>Disciplinary</th>
                                                        <th>Checked In</th>
                                                        <th>Checked Out</th>
                                                        <th>Branch ID</th>
                                                        <th>Password</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
    require '../functions.php';
                print_staff_info();
                                                    ?>
                                                </tbody>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">

                                <div id="edit-tab" class="col-6">

                                    <table class="table">
                                        <div class="table-responsive">

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input id="FName" class="form-control" placeholder="Forename">
                                                    </td>
                                                    <td>
                                                        <input id="LName" class="form-control" placeholder="Surname">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="BranchID" class="form-control" placeholder="Branch ID">
                                                    </td>
                                                    <td>
                                                        <input id="Role" class="form-control" placeholder="Role">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input id="Disciplinary" class="form-control" placeholder="Disciplinary">
                                                    </td>
                                                    <td>
                                                        <input id="Password" class="form-control" placeholder="Password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="edit-buttons" hidden>
                                                        <button onclick="updateStaff()" class="btn btn-primary">Update</button>
                                                        <button onclick="deleteStaff()" class="btn btn-danger">Delete</button>
                                                    </td>
                                                    <td id="create-buttons">
                                                        <button onclick="createStaff()" class="btn btn-success">Create</button>
                                                    </td>
                                                </tr>
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

    </body>

</html>

<script>
    var StaffID

    function editStaff(ID) {
        StaffID = ID
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getstaff')
            .then(function(response) {
            return response.json();
        })
            .then(function(data) {
            console.log(data);
            //document.getElementById("part-table").innerHTML = "";
            data.forEach((item) => {
                if (item.ID == ID) {
                    document.getElementById("FName").value = item.FName
                    document.getElementById("LName").value = item.LName
                    document.getElementById("Role").value = item.Role
                    document.getElementById("Disciplinary").value = item.Disciplinary
                    document.getElementById("BranchID").value = item.BranchID
                    document.getElementById("Password").value = item.Password
                }
            });
            document.getElementById("edit-buttons").hidden = false
            document.getElementById("create-buttons").hidden = true
        });
    }

    function updateStaff() {
        alert("Requires implementation")
    }

    function deleteStaff() {
        // alert(StaffID)
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=deletestaff&id=' + StaffID).then(function(response) {
            document.getElementById("FName").value = ""
            document.getElementById("LName").value = ""
            document.getElementById("Role").value = ""
            document.getElementById("Disciplinary").value = ""
            document.getElementById("BranchID").value = ""
            document.getElementById("Password").value = ""
            location.reload()
        });
    }

    function createStaff() {
        alert("Requires implementation")

        var obj = 
            {
                'FName': document.getElementById("FName").value,
                'LName': document.getElementById("LName").value,
                'Role': document.getElementById("Role").value,
                'Disciplinary': document.getElementById("Disciplinary").value,
                'BranchID': document.getElementById("BranchID").value,
                'Password': document.getElementById("Password").value,
            }

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addstaff&data=' + JSON.stringify(obj))

    }
</script>