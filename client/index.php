<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Repair Tracking</title>

    <style>

        .dev {
            /*            border: solid 2px green;*/
        }

        .devr {
            /*            border: solid 2px red;*/
        }

        a {
            color: blue;  
        }

    </style>

</head>

<body>

    <div class="container-fluid">
        <div style="height: 10vh" class="devr row align-items-center">
            <div class="col-4 dev h1 pl-5 text-left">ASHOME REPAIRS</div>
            <div hidden id="logged-in" class="col-4 offset-4 dev h5 pr-5 text-right">John Doe | <a onclick="logout()" href="#" >Logout</a></div>
            <div id="not-logged-in" class="col-4 offset-4 dev h5 pr-5 text-right"><a onclick="promptLogin()" href="#">Login</a></div>
        </div>

        <div class="dev mt-5 row">
            <div class="devr mt-5 text-center col-10 offset-1">

                <div hidden id="login-prompt" class="row">
                    <div class="col-6 text-right">
                        <p>Username: <input type="text" id="user"></p>
                        <p>Password: <input type="password" id="pass"></p>
                    </div>
                    <div class="col-6 text-left">
                        <a onclick="login()" href="#">Login</a>
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
    }

    function login()
    {        
        if ((document.getElementById("user").value === "john") && (document.getElementById("pass").value === "doe"))
        {
            document.getElementById("not-logged-in").hidden = true;
            document.getElementById("logged-in").hidden = false;
            document.getElementById("login-prompt").hidden = true;
        }
    }

</script>