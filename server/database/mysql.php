<?php

        include('creditials.php');
        
        try {
            $mySQL = new mysqli($host, $username, $password, $database);
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }



?>