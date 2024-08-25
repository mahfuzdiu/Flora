<?php


namespace app\core;


use app\config\Database;
use app\utility\Logger;

class Model extends Database
{
    public $con;
    const SALT = 'salt for secret values';

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
    public function get(){
        return 'get all data from database';
    }

    public function insert($data)
    {
    }
}