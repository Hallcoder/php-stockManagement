<?php
require_once("config/config.php");

class database{
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PWD;
    private string $dbname = DB_NAME;

    private $connection;
    private $error;
    private $stmt;
    private bool $connected = false;
    
    public function __construct()
    {
        //Set PDO Connection
        $dsn = 'mysql:host=' . $this->host. ';dbname=' .$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try{
            $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
            $this->connected= true;
        }catch(PDOException $e){
            $this->error = $e->getMessage(). PHP_EOL;
            $this->connected= false;

        }
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function isConnected(): bool
    {
        return $this->connected;
    }

    // Prepare statement with Query.
    public function Query($query){
        $this->stmt = $this->connection->prepare($query);
    }

    //Execute prepared Statement
    public function execute(){
        return $this->stmt->execute(); 
    }

    //Get result set as Array of Objects
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get Record Row Count
    public function rowCount(){
        return $this->stmt->rowCount();
    }

    //Get Single record as Object
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
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
}
