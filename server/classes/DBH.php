<?php


class Dbh
{
    
    protected function connect()
    {
        include 'creditials.php';
        
        try {
            $dbh = new mysqli($host, $username, $password, $database);
            return $dbh;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
