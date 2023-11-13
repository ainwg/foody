<?php

// we connect to localhost at port 3307
$link = mysqli_connect('localhost', 'root', '', 'foody');
if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

?>