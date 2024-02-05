<?php

// DATABASE CONNECTION
$con = mysqli_connect('localhost', 'root', '', 'conference_db');

if (!$con) {
    echo 'Database not connected!';
    die();
}