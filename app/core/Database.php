<?php

class Database
{
    protected $host = db_host;
    protected $user = db_user;
    protected $pass = db_pass;
    protected $name = db_name;

    protected $dbh;
    protected $stmt;


    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
        $option = [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function setQuery($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }


    public function bind($param, $value, $type = null)
    {
        if ($type == null) {

            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }


    public function execute()
    {
        $this->stmt->execute();
    }


    public function resultAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function resultOne()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
