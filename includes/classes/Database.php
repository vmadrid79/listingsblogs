<?php

class Database{

    private static $host = "localhost";
    private static $db = "bloglistings";
    private static $user = "root";
    private static $pwd = "";
    private static $lastId = "";
    private $conn;

    public function connect(){
        $this->conn=null;

        try{
            $this->conn = new PDO("mysql:host=".self::$host.";dbname=".self::$db, self::$user, self::$pwd);
            //Set PDO error attributes for capturing errors
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "PDO exception: " . $e->getMessage();
        }
        return $this->conn;
    }

    public function exeQuery($query, $params = array()){
        $stmt = $this->connect()->prepare($query);
        
        $stmt->execute($params);
        $sqlStmt = explode(' ', $query);
        //if(explode(' ', $query)[0] == 'SELECT'){
        if($sqlStmt[0]=='SELECT'){
            if(!empty($params)){
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            if($sqlStmt[0]=='INSERT'){
                self::$lastId = $this->conn->lastInsertId();
            }
            return $stmt;
        }
    }

    public function getLastId(){
        return self::$lastId;
    }

}


?>