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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-3 offset-1">Supplier Management</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">

                        <div class="dev col-10 offset-1">

                            <div class="row">

                                <div class="col-8">
                                    <table class="table table-striped">
                                        <div class="table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Address</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
    require '../functions.php';
                print_supplier_info();
                                                ?>
                                            </tbody>
                                        </div>
                                    </table>
                                </div>

                                <div id="edit-tab" class="col-4">

                                    <table class="table">
                                        <div class="table-responsive">

                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input id="name" class="form-control" placeholder="Name">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="contactnumber" class="form-control" placeholder="Contact Number">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input id="address" class="form-control" placeholder="Address">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="edit-buttons" hidden>
                                                        <button onclick="updateSupplier()" class="btn btn-primary">Update</button>
                                                        <button onclick="deleteSupplier()" class="btn btn-danger">Delete</button>
                                                    </td>
                                                    <td id="create-buttons">
                                                        <button onclick="createSupplier()" class="btn btn-success">Create</button>
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
    var SupplierID

    function editSupplier(ID) {
        SupplierID = ID
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getsuppliers')
            .then(function(response) {
            return response.json();
        })
            .then(function(data) {
            console.log(data);
            //document.getElementById("part-table").innerHTML = "";
            data.forEach((item) => {
                if (item.ID == ID) {
                    document.getElementById("name").value = item.Name
                    document.getElementById("contactnumber").value = item.ContactNumber
                    document.getElementById("address").value = item.Address
                }
            });
            document.getElementById("edit-buttons").hidden = false
            document.getElementById("create-buttons").hidden = true
        });
    }

    function updateSupplier() {
        var obj = 
            {
                'ID': SupplierID,
                'Name': document.getElementById("name").value,
                'ContactNumber': document.getElementById("contactnumber").value,
                'Address': document.getElementById("address").value,
            }

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=updatesupplier&data=' + JSON.stringify(obj)).then(function(response) {
            document.getElementById("name").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });
    }

    function deleteSupplier() {
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=deletesupplier&id=' + SupplierID).then(function(response) {
            document.getElementById("name").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });
    }

    function createSupplier() {
        var obj = 
            {
                'Name': document.getElementById("name").value,
                'ContactNumber': document.getElementById("contactnumber").value,
                'Address': document.getElementById("address").value,
            }

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addsupplier&data=' + JSON.stringify(obj)).then(function(response) {
            document.getElementById("name").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });

    }
</script>