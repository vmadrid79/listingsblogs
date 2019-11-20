<?php
include_once './Models/Listing.php';

class ListingsController extends Controller{

    public function getListings(){
        //Load
        $pl = new PropertyListing();
        return $pl->read(); 
        //return $conn->exeQuery("SELECT * FROM propertylistings ORDER BY created_at DESC");
        //return self::exeQuery("SELECT * FROM propertylistings ORDER BY created_at DESC");
    }
}

?>