<?php
$host = "silva.computing.dundee.ac.uk";
$username = "19ac3u18";
$password = "a1bc23";
$database = "19ac3d18";
$mysql = new PDO("mysql:host=".$host.";dbname=".$database,
                 $username, $password);
?>