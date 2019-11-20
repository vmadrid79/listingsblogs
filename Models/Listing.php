<?php

class PropertyListing extends Database{
    //DB Table name
    private static $table;
    //Listing Properties
    public $id;
    public $propertyType_id;
    public $city_id;
    public $address;
    public $description;
    public $price;
    public $sqft;
    public $bedrooms;
    public $washrooms;
    public $floors;
    public $parkings;
    public $lockers;
    public $created_at;
    public $updated_at;

    // Constructor with DB
    public function __construct($data = null)
    {
        self::$table = 'propertyListings';
        
        if(isset($data)){
            //Clean up data array
            $data = array_map(function($a){ return htmlspecialchars(strip_tags($a));}, json_decode(json_encode($data),true));
            //print_r($data);
            $this->propertyType_id = $data['propertyType_id'];
            $this->city_id = $data['city_id'];
            $this->address = $data['address'];
            $this->description = $data['description'];
            $this->address = $data['address'];
            $this->price = $data['price'];
            $this->sqft = $data['sqft'];
            $this->bedrooms = $data['bedrooms'];
            $this->washrooms = $data['washrooms'];
            $this->floors = $data['floors'];
            $this->parkings = $data['parkings'];
            $this->lockers = $data['lockers'];
        }
    }
    
    //Check if the record is a duplicate
    public function isDuplicate(){
        $query = "SELECT TRUE FROM " . self::$table . " WHERE address = :address AND propertyType_id = :propertyType_id AND city_id = :city_id LIMIT 1";

        $params = [':address'=>$this->address, ':propertyType_id'=>$this->propertyType_id,':city_id'=>$this->city_id];
        $stmt = parent::exeQuery($query, $params);

        if($stmt){
            return true;
        }
        return false;
    }

    //Create Post
    public function create(){
      if(!$this->isDuplicate()){
        $query = "INSERT INTO " . self::$table . " SET propertyType_id = :propertyType_id, city_id = :city_id, description = :description, address = :address, price = :price, sqft = :sqft, bedrooms = :bedrooms, washrooms = :washrooms, floors = :floors, parkings = :parkings, lockers = :lockers ";
        
        $params = $this->setParamsArr();      
        $stmt = parent::exeQuery($query, $params);
        if($stmt){
            return parent::getLastId();
            //return true;
        }else{
            // print error if something went wrong
            printf("Create Error: %s. \n", $stmt->error);
            return false;
        }
     }else{
        return '99';
     }
    }

    // Read Listings
    public function read(){
        //Query
        $query = "SELECT p.type, c.city, pl.address, pl.description, pl.price,  pl.sqft, pl.bedrooms, pl.washrooms, pl.floors, pl.lockers, pl.created_at FROM ".self::$table ." pl LEFT JOIN propertytypes p ON pl.propertyType_id = p.id LEFT JOIN cities c ON pl.city_id = c.id ORDER BY pl.created_at DESC";
        // Call parent method to connect to DB, executes query, and returns data result set
        return parent::exeQuery($query);
    }
    // Read a Single Listing
    public function read_single($id){
        $query = "SELECT p.type, c.city, pl.address, pl.description, pl.price,  pl.sqft, pl.bedrooms, pl.washrooms, pl.floors, pl.lockers, pl.created_at FROM ".self::$table ." pl LEFT JOIN propertytypes p ON pl.propertyType_id = p.id LEFT JOIN cities c ON pl.city_id = c.id WHERE pl.id = $id ORDER BY pl.created_at DESC LIMIT 1";
        // Call parent method to connect to DB, executes query, and returns data result set
        return parent::exeQuery($query);
    }

    private function stripOutHTML($obj){
        //Strip out any HTML tags
        return htmlspecialchars(strip_tags($obj));
 
    }

    private function setParamsArr(){
        return [
            ':propertyType_id'=>$this->propertyType_id,
            ':city_id'=>$this->city_id,
            ':description'=>$this->description,
            ':address'=>$this->address,
            ':price'=>$this->price,
            ':sqft'=>$this->sqft,
            ':bedrooms'=>$this->bedrooms,
            ':washrooms'=>$this->washrooms,
            ':floors'=>$this->floors,
            ':parkings'=>$this->parkings,
            ':lockers'=>$this->lockers
        ];
    }

}


?>