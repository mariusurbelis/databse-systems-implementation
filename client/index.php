
<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">

    <title>Repair Tracking</title>

    <style>

        .dev {
            border: solid 2px green;
        }

        .devr {
            border: solid 2px red;
        }

        a {
            color: blue;  
        }

        body {
            background-color: #E5E5E5;
        }

    </style>

</head>

<body>
    <div class="container-fluid">
        <div style="color: white; background-color: #6C7A89; height: 10vh" class="devr row align-items-center">
            <div class="col-4 dev h1 pl-5 text-left">ASHOME REPAIRS</div>
            <div hidden id="logged-in" class="col-4 offset-4 dev h5 pr-5 text-right">John Doe | <a onclick="logout()" href="#" >Logout</a></div>
            <div id="not-logged-in" class="col-4 offset-4 dev h5 pr-5 text-right"><a onclick="promptLogin()" href="#">Login</a></div>
        </div>

        <div style="height: 60vh" id="client-area" class="dev mt-5 row align-items-center">
            <div style=" color: white; background-color: #a3a3c2; height: 40vh" class="mt-5 text-center col-12 ">
                <div class="row">
                    <div style="height: 40vh" class="dev col-3 ">
                        
                        <div style="background-color: gray "class=" row ">
                            <div style=" font-size: 20px" class="dev col-10 ">Select or Enter Service ID </div>
                        </div>

                        <div style="padding-top: 20%;  " class="row">       
                            <input id="serviceid" class="rounded-lg offset-2 " type="text"  placeholder=" Enter Service ID Here"> 
                        </div>

                        <div class="row" style="height: 3vh"></div>

                        <div class="row">
                            <button class="btn btn-primary offset-2" onclick="getService()" id="button" type="button">Submit</button>        
                        </div> 
                    </div>

                    <div class="dev col-9">
                        <div style="background-color: gray; font-size: 20px" class="row text-center">
                                <div class="dev col-2">
                                    <div class="row">
                                        <div class="col-12" style="font-size: 1em">
                                            ID
                                         </div>
                                    </div>

                                    <div class="row">
                                        <div id="showID" class="col-12" style="font-size: 1.5em">
                                            
                                         </div>
                                    </div>     
                                </div>
                                     
                                <div class="col-4">                                           
                                     <div class="row">
                                        <div class="col-12" style="font-size: 1em">
                                            Status
                                         </div>
                                    </div>                              
                                    <div class="row">
                                        <div id="showStatus" class="col-12" style="font-size: 1.5em">
                                            
                                         </div>
                                    </div>    
                                </div>

                                <div class="col-6 "> 
                                    <div class="row">
                                        <div class="col-12" style="font-size: 1em">
                                            Date
                                         </div>
                                    </div>                              
                                    <div class="row">
                                        <div id="showDate" class="col-12" style="font-size: 1.5em">
                                            
                                         </div>
                                    </div>      
                                </div>
                        </div>

                          

                            <script>
                                function getService() 
                                {
                                    //for old browsers IE 5 and IE 6
                                    if (window.XMLHttpRequest) 
                                    {
                                        // code for modern browsers
                                        xmlhttp = new XMLHttpRequest()
                                    } 
                                    else 
                                    {
                                        // code for old IE browsers
                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
                                    }  
                                    xmlhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {

                                            serviceData = JSON.parse(this.responseText)
                                            
                                            // Usage: serviceData.<field> (i.e. serviceData.RegNumber)
                                            // Get elements' text: document.getElementById("<YOUR_ID_HERE>").innerHTML
                                            // Example: document.getElementById("<YOUR_ID_HERE>").innerHTML = serviceData.ID

                                            document.getElementById("showID").innerHTML = serviceData.ID
                                            document.getElementById("showStatus").innerHTML = serviceData.Status;
                                            document.getElementById("showDate").innerHTML = serviceData.ServiceActualEnd;


                                            
                                        }
                                    };

                                    xmlhttp.open("GET","https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/api/index.php?api_key=ashome&command=servicesearch&serviceid=" + document.getElementById("serviceid").value,true,) 
                                    xmlhttp.send()                       
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>