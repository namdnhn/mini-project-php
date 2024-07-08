<?php

class Model
{
    protected $db;

    public function __construct()
    {
        $config = require 'config/config.php';
        $this->db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
    }
}