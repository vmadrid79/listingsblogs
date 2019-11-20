<?php
include_once './Models/Listing.php';

class HomeController extends Controller{
    private static $pl;

    public function getCities(){
        //Get the cities for SELECT dropdown list
        $pl = new PropertyListing();
        return $pl->exeQuery("SELECT * FROM cities ORDER BY city");
        //return self::exeQuery("SELECT * FROM cities ORDER BY city");
    }
    public function getPropertyTypes(){
        //Load
        $pl = new PropertyListing();
        return $pl->exeQuery("SELECT * FROM propertytypes");
        //return self::exeQuery("SELECT * FROM propertytypes");
    }
}

?>