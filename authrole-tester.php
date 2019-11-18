<?php

    include 'session.php';
    include 'authrole.php';

    if ($authRole('CLIENT', $session_role)) {
        echo "authenticated!";
    }

?>