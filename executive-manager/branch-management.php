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

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-3 offset-1">Branch Info</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">

                        <div class="dev col-6 offset-1">

                            <table class="table table-striped">
                                <div class="table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Address</th>
                                            <th>Contact Number</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
    require '../functions.php';
                print_branch_info();
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
                                                <input id="id" class="form-control" placeholder="ID">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="address" class="form-control" placeholder="Address">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input id="contactnumber" class="form-control" placeholder="Contact Number">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="edit-buttons" hidden>
                                                <button onclick="updateBranch()" class="btn btn-primary">Update</button>
                                                <button onclick="deleteBranch()" class="btn btn-danger">Delete</button>
                                            </td>
                                            <td id="create-buttons">
                                                <button onclick="createBranch()" class="btn btn-success">Create</button>
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

    </body>

</html>

<script>
    var BranchID

    function editBranch(ID) {
        BranchID = ID
        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=getbranches')
            .then(function(response) {
            return response.json();
        })
            .then(function(data) {
            data.forEach((item) => {
                if (item.ID == ID) {
                    document.getElementById("id").value = item.ID
                    document.getElementById("contactnumber").value = item.ContactNumber
                    document.getElementById("address").value = item.Address
                }
            });
            document.getElementById("edit-buttons").hidden = false
            document.getElementById("create-buttons").hidden = true
        });
    }

    function updateBranch() {
        var obj = 
            {
                'OldID': BranchID,
                'ID': document.getElementById("id").value,
                'ContactNumber': document.getElementById("contactnumber").value,
                'Address': document.getElementById("address").value,
            }

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=updatebranch&data=' + JSON.stringify(obj)).then(function(response) {
            document.getElementById("id").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });
    }

    function deleteBranch() {
        // alert(BranchID)

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=deletebranch&id=' + BranchID).then(function(response) {
            document.getElementById("id").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });
    }

    function createBranch() {
        var obj = 
            {
                'ID': document.getElementById("id").value,
                'ContactNumber': document.getElementById("contactnumber").value,
                'Address': document.getElementById("address").value,
            }

        fetch('https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/?api_key=ashome&command=addbranch&data=' + JSON.stringify(obj)).then(function(response) {
            document.getElementById("id").value = ""
            document.getElementById("contactnumber").value = ""
            document.getElementById("address").value = ""
            location.reload()
        });

    }
</script>