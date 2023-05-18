<?php

class DB{
    private $conn;
    private $connError=null;
    private $queryError=null;

    function __construct(){
        try{
            $this->conn = new PDO("mysql:host=localhost;dbname=QuesHub", "root","admin123");
        }
        catch(PDOException $e){
            $this->connError=$e->getMessage();
        }
    }

    function get($query,$params=[]){
        try{
            if($this->connError==null){
                $stmt=$this->conn->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll();
            }
        }
        catch(PDOException $e){
            $this->queryError=$e->getMessage();
        }
    }

    function put($query,$params=[]){
        try{
            if($this->connError==null){
                $stmt=$this->conn->prepare($query);
                $stmt->execute($params);
            }
        }
        catch(PDOException $e){
            $this->queryError=$e->getMessage();
        }
    }

    function errorCheck(){
        if($this->connError!=null && $this->queryError!=null){
            return true;
        }
        return false;
    }
}