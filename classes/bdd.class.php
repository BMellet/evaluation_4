<?php

class Database
{
    static private $host = "localhost";
    static private $dbname = "evaluation_4";
    static private $dbuser = "root";
    static private $dbpassword = "Mellet082217";
    static private $db = NULL;   
    static public function getDB()
    { 
        $host = self::$host;
        $dbname  = self::$dbname;
        $dbuser = self::$dbuser;
        $dbpassword = self::$dbpassword;

        if(self::$db == NULL)
        {
            self::$db=new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
            return self::$db;        
        }
        else
        {
            return self::$db;

        }
    }

}
