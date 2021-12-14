<?php


class Dbh
{
    
    protected function connect()
    {
  
        
        
        try {
            include 'creditials.php'; 
            if (empty($host)) {
                include 'creditials.php';
            }
            
            $dbh = new mysqli($host, $username, $password, $database,$port);
            return $dbh;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
