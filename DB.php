<?php


class DB
{
    private $con;
    private $host='localhost';
    private $dbname = 'repairorder';
    private $user = 'root';
    private $password = '';

    public function __construct()
    {
        $dsn = "mysql:host=". $this->host . ";dbname=" . $this->dbname;
        try{
            $this->con = new PDO($dsn, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function viewData(){
        $query ="SELECT * FROM repair";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function searchData($name){
        $query = "SELECT * FROM repair WHERE bezeichnung LIKE :name OR details LIKE :name";
        $stmt = $this->con->prepare($query);
        $stmt->execute(["name"=> "%" . $name . "%"]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}