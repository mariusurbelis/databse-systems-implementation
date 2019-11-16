<?php

    include 'session.php';
    include 'authrole.php';

    $s1 = new Session('MECHANIC');

    if ($authRole('CLIENT', $s1->getSessionRole())) {
        echo "authenticated!";
    }
?>