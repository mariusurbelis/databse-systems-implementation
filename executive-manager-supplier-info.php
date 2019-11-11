<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">


        <title>Executive Manager</title>
        
        <script src="inser-supplier-info.js"></script>
        
    </head>

    <body>

        <div class="container-fluid">

            <div class="row">


                <div style="background: #5D5C61; height: 100vh;" class="col-2 text-center sidebar">
                    <b><p style="color: #938E94; font-size: 3em; margin-top: 0.5em">Executive Manager</p></b>
                    &nbsp;
                    <a href="executive-manager-orders.php"><p class="nav-item">Orders</p></a>
                    <a href="executive-manager-branch-info.php"><p class="nav-item">Branch Info</p></a>
                    <a href=""><p class="nav-item"><b>Supplier Info</b></p></a>
                    <a href=""><p class="nav-item">Sales Trends</p></a>
                </div>

                <div class="col-10 content">
                     <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-3 offset-2">Supplier Info</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">

                        <div class="dev col-1 offset-2">ID</div>
                        <div class="dev col-2">Contact Number</div>
                        <div class="dev col-3">Supplier Address</div>
                    </div>
                    
                    <div id="topinforow" class="row">
                        <div class="col-5 offset-2">
                            <hr style="border: 1px black solid">
                        </div>
                    </div>

                    <script>
                        insertSupplierRow("topinforow", "2", "01382 521952", "Unit 5, Kirk Street, Dundee" );
                        insertSupplierRow("topinforow", "3", "01382 257205", "Unit 3G, East Haddon Road, Dundee" );
                        insertSupplierRow("topinforow", "4", "01738 264017", "25 Brown Street, Perth" );

                    </script>

                </div>

            </div>

        </div>

    </body>

</html>