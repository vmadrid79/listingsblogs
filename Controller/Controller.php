<?php

class Controller extends Database{

    public static function CreateView($vc){
        
        if($vc=="Home"){
            $cities = call_user_func($vc."Controller::getCities");
            $propertyTypes = call_user_func($vc."Controller::getPropertyTypes");
        }elseif ($vc="Listings") {
            $listings = call_user_func($vc."Controller::getListings");
        }
        //Load corresponding view
        require_once("./Views/$vc.php");
    }
}

?>