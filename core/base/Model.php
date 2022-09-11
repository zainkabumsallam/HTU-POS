<?php

namespace Core\Base;

class Model
{
    protected $connection;
    public $data = [];

    final function __construct()
    {
        $this->connection = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }
}
