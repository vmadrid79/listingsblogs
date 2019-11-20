<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './includes/classes/Database.php';

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

if(isset($data->propertyType_id)){
    include_once './Models/Listing.php';
    $d = "Property Listing";
    $newRec = new PropertyListing($data);

}else{
    include_once './Models/Post.php';
    $d = "Post";
    //Instantiate blog posts object
    $newRec = new Posts();
    //echo "POST DATA: " . $data->category_id;
    $newRec->title = $data->title;
    $newRec->category_id = $data->category_id;
    $newRec->author = $data->author;
    $newRec->body = $data->body;
}

/* 
 * Create Listing/Post and store results in $response
 */
$res = $newRec->create();
if($res){
    
    $msg = "$d Successfully  Created!";
    if($res === '99'){
        $msg = "Duplicate Record - The $d you attempted to add already exist.";
    }
    echo json_encode(
        array('message' => $msg, 'status'=> $res)
    );
}else{
    echo json_encode(
        array('message' => "Oops, something went wrong, your $d was NOT Created.")
    );
}

?>