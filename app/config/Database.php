<?php

namespace app\config;

Class Database
{
    private static $active;
    public $connection;

    function __construct()
    {
        if(self::$active == null)
        {
            self::$active = 'active';

            $serverName = 'localhost';
            $database = 'mvc';
            $userName = 'root';
            $passWord = '';

            $this->connection = new \mysqli($serverName, $userName, $passWord, $database);

            if($this->connection->connect_error){
                //to debug connection
                //echo 'Database connection error';
            }else{
                //to debug connection
                //echo 'Connection successful';
            }
        }
    }

    function getAll()
    {
        //select all  from db
        //return $result;
    }


}