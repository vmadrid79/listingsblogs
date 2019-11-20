<?php

class Route{
    public static $validRoutes = array();

    public static function set($route, $function){
        self::$validRoutes[] = $route;
        
        //Ensure the __invoke() call back is made for valide route
        if($_GET['url'] == $route){
            //Call the tie back function in Routes.php
            //echo "GET: " . $_GET['url'];
            $function->__invoke();
        }
        // if($_POST['url']== $route){
        //     //Call the tie back function in Routes.php
        //     $function->__invoke();
        // }
    }
}

?>