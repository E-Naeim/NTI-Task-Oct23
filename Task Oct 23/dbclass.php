<?php

class DataBase
{
    public $server     = "localhost";
    public $dbName     = "blog";
    public $user       = "root";
    public $dbPassword = "";
    public $connection = null;


    public function __construct()
    {
        $this->connection = mysqli_connect($this->server, $this->user, $this->dbPassword, $this->dbName);

        if (!$this->connection) {
            mysqli_connect_error();
        }
    }

    public function do_query($sql)
    {
        $result =  mysqli_query($this->connection, $sql);
        return $result;
    }


    public function __destruct()
    {
        mysqli_close($this->connection);
    }
}
