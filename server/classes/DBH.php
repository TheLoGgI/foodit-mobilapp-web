<?php


class Dbh
{
    
    protected function connect()
    {
        $host = "mysql95.unoeuro.com";
$username = "stensgaard_medie_dk";
$password = "MidlertidigKode12";
$database = "stensgaard_medie_dk_db_web_dev";

        
        
        try {
            include 'creditials.php'; 
            if (empty($host)) {
                include '../database/creditials.php';
            }
            
            $dbh = new mysqli($host, $username, $password, $database);
            return $dbh;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
