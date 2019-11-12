<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

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

        <div hidden id="login-prompt" class="dev mt-5 row">
            <div class="devr mt-5 text-center col-10 offset-1">

                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <p>Use <b>john</b> and <b>doe</b> as the login details</p>
                        <p>Username: <input type="text" id="user"></p>
                        <p>Password: <input type="password" id="pass"></p>
                        <a onclick="login()" href="#">Login</a>
                    </div>
                </div>

            </div>
        </div>

        <div style="height: 60vh" id="client-area" class="dev mt-5 row align-items-center">
            <div style=" color: white; background-color: #a3a3c2; height: 40vh" class="mt-5 text-center col-10 offset-1">
                <div class="row">
                    <div style="height: 40vh" class="dev col-4">
                            <p>Select or Enter Service ID </p>

                            <div class="dev col-4">
                            <select class=" col-10 align-items-center" name = "serviceID">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                            </select>
                            </div>
                    </div>
                    
                    <div class="dev col-8">
                            <div class="col-4 ">Service ID</div>
                            <div class="col-4 "> Status: </div>
                            <div class="col-4 "> Delivery Date</div> 
                    </div>
                </div>

            </div>
        </div>

    </div>

</body>

<script>

    function promptLogin()
    {
        document.getElementById("not-logged-in").hidden = true;
        document.getElementById("logged-in").hidden = true;
        document.getElementById("login-prompt").hidden = false;
    }

    function logout()
    {
        document.getElementById("not-logged-in").hidden = false;
        document.getElementById("logged-in").hidden = true;
        document.getElementById("login-prompt").hidden = true;
        document.getElementById("client-area").hidden = true;
    }

    function login()
    {        
        if ((document.getElementById("user").value === "john") && (document.getElementById("pass").value === "doe"))
        {
            document.getElementById("not-logged-in").hidden = true;
            document.getElementById("logged-in").hidden = false;
            document.getElementById("login-prompt").hidden = true;
            document.getElementById("client-area").hidden = false;
        }
    }
</script>