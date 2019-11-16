<?php

    $authRole = function ($role, $sessionrole) {
        if ($role == $sessionrole) return true;
    };

?>
