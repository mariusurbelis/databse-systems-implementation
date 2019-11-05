<html>
    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <title>Executive Manager</title>
        
        <script src="insert-product-request.js"></script>
        
    </head>

    <body>

        <div class="container-fluid">

            <div class="row">


                <div style="background: #5D5C61; height: 100vh;" class="col-2 text-center sidebar">
                    <b><p style="color: #938E94; font-size: 3em; margin-top: 0.5em">Executive Manager</p></b>
                    &nbsp;
                    <a href=""><p class="nav-item">Orders</p></a>
                    <a href=""><p class="nav-item">Branch Info</p></a>
                    <a href=""><p class="nav-item">Supplier Info</p></a>
                    <a href=""><p class="nav-item">Sales Trends</p></a>
                </div>

                <div class="col-10 content">
                    <div class="row">

                        <div style="margin-top: 1em; font-size: 2.6em;" class="col-2 offset-2">Orders</div>
                    </div>

                    <div style="margin-top: 3em;" class="row">

                        <div class="dev col-1 offset-2">Branch</div>
                        <div class="dev col-1">Part ID</div>
                        <div class="dev col-4">Part Description</div>
                        <div class="dev col-1">Quantity</div>
                        <div class="dev col-1">Actions</div>

                    </div>

                    <div id="topinforow" class="row">
                        <div class="col-8 offset-2">
                            <hr style="border: 1px black solid">
                        </div>
                    </div>
                    
                    <script>
                        
                        insertRequestRow("topinforow", "euro ", "R-214124", "Biggest and baddest part", 5);
                        insertRequestRow("topinforow", "euro ", "R-214124", "Biggest and baddest part", 5);
                        insertRequestRow("topinforow", "euro ", "R-214124", "Biggest and baddest part", 5);
                        insertRequestRow("topinforow", "euro ", "R-214124", "Biggest and baddest part", 5);
                    </script>

                </div>

            </div>

        </div>

    </body>

</html>