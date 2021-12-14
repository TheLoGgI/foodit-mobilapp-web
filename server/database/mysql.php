<?php

        include('creditials.php');
        
        try {
            $mySQL = new mysqli($host, $username, $password, $database,$port);
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }



?>