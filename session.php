<?php

    include 'roles.php';
    
    $session_staff_id = $_POST['staffid'];
    $session_password = $_POST['password'];

    $con = mysqli_connect("silva.computing.dundee.ac.uk", "19ac3u18", "a1bc23", "19ac3d18");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, 'SELECT * FROM Staff WHERE StaffID="' . $session_staff_id . '"AND Password="' . $session_password . '";');

    echo $result;

    $session_role;
    $session_branch_id;

    if ($session_role == MECHANIC) {
        header('Location: https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/mechanic/');
    } else if ($session_role == BRANCH_SUPERVISOR) {
        header('Location: https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/branch-supervisor/');
    } else if ($session_role == EXECUTIVE_MANAGER) {
        header('Location: https://zeno.computing.dundee.ac.uk/2019-ac32006/team18/dev/executive-manager/');
    }


    // class Session {
    //     private $sessionRole;

    //     function __construct($sessionRole) {
    //         $this->sessionRole = $sessionRole;
    //     }

    //     function getSessionRole() {
    //         return $this->sessionRole;
    //     }
    // }

?>
