<?php

class API{

    public function read(){
        require_once("./API/read.php");
    }
    public function read_single(){
        require_once("./API/read_single.php");
    }
    public function create(){
        require_once("./API/create.php");
    }
    public function update(){
        require_once("./API/update.php");
    }
    public function delete(){
        require_once("./API/delete.php");
    }
}

?>