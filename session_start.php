<?php
    $server="localhost";
    $username="root";
    $password="";
    $mysqli = new mysqli($server,$username,$password,"society management system");

        if ($mysqli -> connect_errno) 
    {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
?>