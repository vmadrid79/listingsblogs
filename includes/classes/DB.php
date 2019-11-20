<?php

//class DB extends Database{
trait DB{
    public function exeQuery($query, $params = array()){
        $stmt = parent::connect()->prepare($query);
        $stmt->execute($params);
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $stmt->fetchAll();
            return $data;
        }
        return false;
    }
}


?>