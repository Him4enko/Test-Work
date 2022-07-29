<?php
class database
{
    private $host, $user, $password, $database;
    public function __construct($host='localhost', $user='root', $password='', $database='')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect()
    {
        $connect = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($connect) {
            return $connect;
        }
    }

    public function request($request)
    {
        $query = $this->connect()->query($request);
        return $query;
    }
}