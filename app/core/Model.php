<?php


namespace app\core;


use app\config\Database;

class Model extends Database
{
    public $con;

    // initiating database

    /**
     * Model constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->con = $this->connection;
    }

    /**
     * @return string
     */
    public static function get(){
        return 'get all data from database';
    }

}