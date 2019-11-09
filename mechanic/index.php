<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Mechanic Screen</title>
    
    <style>
    
        .dev {
            border: solid 2px green;
        }
        
        .devr {
            border: solid 2px red;
        }
    
    </style>

</head>

<body>

    <div class="container-fluid">
    
        <div style="height: 100vh" class="row">
            <div class="dev col-8">
            
                <div style="height: 50vh" class="row">
                    <div class="devr col-7 h3"><?php include 'cars-awaiting-repair.php';?></div>
                    <div class="devr col-5 h3"><?php include 'cars-in-repair.php';?></div>
                </div>
                
                <div class="row">
                    <div class="col-6 h2">Mechanic Notes #1</div>
                    <div class="col-6 h2">Mechanic Notes #2</div>
                </div>
            
            </div>
            
            <div class="dev col-4 h1"><?php include 'parts-search.php';?></div>
        </div>
    
    </div>

</body>